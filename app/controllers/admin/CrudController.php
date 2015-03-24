<?php
namespace admin;

class CrudController extends \BaseController {

    protected $className = null; // current class name
    protected $viewName  = null; // name of the view


    public function __construct()
    {

        $route =  \Route::currentRouteName();
        
        $route = explode(".", $route);
        if(count($route) > 2)
            $route = $route[1];
        else
            $route = $route[0];

        $this->className = ucfirst(camel_case($route));
        
        $this->viewName  = strtolower(snake_case($this->className));
        $this->modelName = $this->viewName;
        
    }

    protected function getClassName()
    {
        $model =  str_replace("Controller", "", get_class($this));
        return ($model);
    }

    protected function getPath($path)
    {
        return app_path($path);
    }


    protected function getPathView($name,$default=null)
    {
        
        $view = "admin.".$this->viewName.".".$name;

        if(!$default)
            $default = $name;

        if (!\View::exists($view))
            $view = "crud.".$default;

        return $view;    
    }
    
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = \View::make($this->layout);
		}
	}
	

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $class     = new $this->className();
        $title     = $class->getCrud("title");
        $btn       = $class->getCrud("btn_in_index");
        $fk_column = $class->getCrud("fk_column");

        $tables = $class->getRelationsByTables();

        $relations = $class->getFKRelations();

        if(count($relations) > 0)
            $records = call_user_func_array([$class,"with"],$relations)->paginate();
        else
            $records = $class::paginate();
     
        $columns  = $class->getColumnsByView("index");

        $path     = $this->getPathView(__FUNCTION__);
        $key_name = $class->getKeyName();
        $model    = $this->modelName;

        $params =(object)[
                    "me"        => &$this,
                    "btn"       => &$btn,
                    "fk_column" => &$fk_column,
                    "title"     => &$title,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_name"  => &$key_name,
                    "action"    => __FUNCTION__,
                    "records"   => &$records,
                    "columns"   => &$columns,
                    "path"      => &$path
                  ];

        $class->beforeIndex($params);          
        \Event::fire($this->modelName.'.beforeIndex',[$params]);

        return \View::make($path)
            ->with('title',$title)
            ->with('btn',$btn)
            ->with('fk_column',$fk_column)
            ->with('key_name',$key_name)
            ->with('action',__FUNCTION__)
            ->with('model',$model)
            ->with('records',$records)
            ->with('columns',$columns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $class     = new $this->className();
        $title     = $class->getCrud("title");
        $btn       = $class->getCrud("btn_in_create");
        $fk_column = $class->getCrud("fk_column");

        $key_value= "";
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $columns  = $class->getColumnsByView(__FUNCTION__);
        $path     = $this->getPathView(__FUNCTION__);

        foreach ($columns as $column) 
            $record[$column->name] = "";
        
        

        $params = (object)[
                    "me"        => &$this,
                    "title"     => &$title,
                    "btn"       => &$btn,
                    "fk_column" => &$fk_column,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_value" => &$key_value,
                    "key_name"  => &$key_name,
                    "action"    => __FUNCTION__,
                    //"records"   => &$records,
                    "columns"   => &$columns,
                    "path"      => &$path
                  ];

        $class->beforeCreate($params);  
        \Event::fire($this->viewName.'.beforeCreate',[$params]);

        return \View::make($path)
            ->with('title',$title)
            ->with('btn',$btn)
            ->with('fk_column',$fk_column)
            ->with('key_value',$key_value)
            ->with('key_name',$class->getKeyName())
            ->with('action',__FUNCTION__)
            ->with('model',$model)
            ->with('record',(object)$record)
            ->with('columns',$columns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $class     = new $this->className();
        $columns   = $class->getColumnsByView("create");

        $validations = $class->getValidations($columns);
        $_inputs   = $class->getInputs($columns);
        $inputs    = \Input::only($_inputs);
        

        $validator = \Validator::make($inputs, $validations);

        $key_value= "";
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $path     = $this->viewName;

        $inputs = (object)$inputs;
        $params = (object)[
                    "me"        => &$this,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_value" => &$key_value,
                    "key_name"  => &$key_name,
                    "action"    => __FUNCTION__,
                    "validations"     => &$validations,
                    "validator" => &$validator,
                    "inputs"    => &$inputs,
                    "columns"   => &$columns,
                    "path"      => &$path
                  ];

        $class->beforeStore($params);
        \Event::fire($this->viewName.'.beforeStore',[$params]);


        if ($validator->fails()) {

            \Event::fire($this->viewName.'.failValidatorStore',[$params]);

            if(\Request::ajax())
            {
                echo '{ "success": "false", "msg": "Error Fields" }';
            }else{
                return \Redirect::back()
                    ->withErrors($validator)
                    ->withInput(\Input::except("password")); 
            }

		}

        $record = $class;

        foreach ($columns as $column)
            $record->{$column->name} = $inputs->{$column->name};
            //$record->{$column->name} = Input::get($column->name);


        if($record->save())
        {

            $file_inputs = $class->getFileNameInputs($inputs);

            $params->key_value = $record->{$key_name};
            $params->record = $record;

            if(count($file_inputs) > 0)
            {
                $destinationPath = app_path().'/storage/uploads/'; // upload path
                
                foreach ($file_inputs as $file) {
                    if (\Input::file($file)->isValid()) {

                      $fileName = \Crypt::encrypt($class->getTable()."|".$file."|".$params->key_value); // renameing image
                      \Input::file($file)->move($destinationPath, $fileName); // uploading file to given path

                      if($columns->{$file}->type == "text")
                        $record->{$file} = $fileName;
                      else
                        $record->{$file} = 1;

                    }
                }

                $record->save();
            }




            $class->afterStore($params);
            \Event::fire($this->viewName.'.afterStore',[$params]);
        }else
        {
            \Event::fire($this->viewName.'.failStore',[$params]);

            if(\Request::ajax())
            {
                echo '{ "success": "false", "msg": "Error Created" }';
            }else
            {
                \Session::flash('error', 'Error Created');
                    return \Redirect::to($this->viewName.'/');
            }

        }

        if(\Request::ajax())
        {
            echo '{ "success": "true", "msg": "Successfully Created", "id":"'.$key_value.'" }';
        }else
        {
            \Session::flash('success', 'Successfully Created');
                return \Redirect::to($path.'/');  
        }

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $class     = new $this->className();
        $title     = $class->getCrud("title");
        $btn       = $class->getCrud("btn_in_show");
        $fk_column = $class->getCrud("fk_column");

        $key_value= $id;
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $columns  = $class->getColumnsByView(__FUNCTION__,$id);
        $path     = $this->getPathView(__FUNCTION__);

        $record   = $class::findOrFail($id);

        $tabs     = $class->getTabs();

        $params = (object)[
                    "me"            => &$this,
                    "title"         => &$title,
                    "btn"           => &$btn,
                    "fk_column"     => &$fk_column,
                    "class"         => &$class,
                    "model"         => &$model,
                    "key_value"     => &$key_value,
                    "key_name"      => &$key_name,
                    "action"        => __FUNCTION__,
                    "record"        => &$record,
                    "columns"       => &$columns,
                    "tabs"          => &$tabs,
                    "path"          => &$path
                  ];

        $class->beforeShow($params); 
        \Event::fire($this->viewName.'.beforeShow',[&$params]);


        return \View::make($path)
            ->with('title',$title)
            ->with('btn',$btn)
            ->with('fk_column',$fk_column)
            ->with('key_value',$key_value)
            ->with('key_name',$class->getKeyName())
            ->with('action',__FUNCTION__)
            ->with('model',$model)
            ->with('record',(object)$record)
            ->with('tabs',$tabs)
            ->with('columns',$columns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $class     = new $this->className();
        $title     = $class->getCrud("title");
        $btn       = $class->getCrud("btn_in_edit");
        $fk_column = $class->getCrud("fk_column");

        $key_value= $id;
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $columns  = $class->getColumnsByView(__FUNCTION__,$id);
        $path     = $this->getPathView(__FUNCTION__);

        $record   = $class::findOrFail($id);

        $params = (object)[
                    "me"        => &$this,
                    "title"     => &$title,
                    "btn"       => &$btn,
                    "fk_column" => &$fk_column,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_value" => &$key_value,
                    "key_name"  => &$key_name,
                    "action"    => __FUNCTION__,
                    "record"    => &$record,
                    "columns"   => &$columns,
                    "path"      => &$path
                  ];

        $class->beforeEdit($params);           
        \Event::fire($this->viewName.'.beforeEdit',[$params]);

        return \View::make($path)
            ->with('title',$title)
            ->with('btn',$btn)
            ->with('fk_column',$fk_column)
            ->with('key_value',$key_value)
            ->with('key_name',$key_name)
            ->with('action',__FUNCTION__)
            ->with('record',$record)
            ->with('model',$model)
            ->with('columns',$columns);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    	$class     = new $this->className();
        $columns   = $class->getColumnsByView("edit");

        $validations     = $class->getValidations($columns,$id);
        $_inputs   = $class->getInputs($columns);
        $inputs    = \Input::only($class->getInputs($columns));

        $password = \Input::get("password");

        if(empty($password))
        {
            unset($inputs["password"]);
            unset($validations["password"]);
        }


        $key_value= $id;
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $path     = $this->viewName;


        $record = $class::find($key_value);

        $params = (object)[
                    "me"        => &$this,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_value" => &$key_value,
                    "key_name"  => &$key_name,
                    "record"    => &$record,
                    "action"    => __FUNCTION__,
                    "validations"     => &$validations,
                    "validator" => &$validator,
                    "inputs"    => &$_inputs,
                    "columns"   => &$columns,
                    "path"      => &$path
                  ];

        $class->beforeUpdate($params);
        \Event::fire($this->viewName.'.beforeUpdate',[$params]);

        $validator = \Validator::make($inputs, $validations);
        if ($validator->fails()) {

            \Event::fire($this->viewName.'.failValidatorUpdate',[$params]);

            if(\Request::ajax())
            {
                echo '{ "success": "false", "msg": "Error Fields" }';
            }else
            {
                return \Redirect::back()
                    ->withErrors($validator)
                    ->withInput(\Input::except("password")); 
            }

        }

        
        

        foreach ($columns as $column)
        {
            if(!$column->is_primary)
                $record->{$column->name} = \Input::get($column->name);
        }


        if($record->save())
        {

            $file_inputs = $class->getFileNameInputs($inputs);
            $params->record = $record;

            if(count($file_inputs) > 0)
            {
                $destinationPath = app_path().'/storage/uploads/'; // upload path
                
                foreach ($file_inputs as $file) {
                    if (\Input::file($file)->isValid()) {


                      $fileName = \Crypt::encrypt($class->getTable()."|".$file."|".$params->key_value); // renameing image
                      
                      \File::delete($destinationPath."/".$fileName);
                      \Input::file($file)->move($destinationPath, $fileName); // uploading file to given path

                      if($columns->{$file}->type == "text")
                        $record->{$file} = $fileName;
                      else
                        $record->{$file} = 1;

                    }
                }

                $record->save();
            }

            $class->afterUpdate($params);
            \Event::fire($this->viewName.'.afterUpdate',[$params]);
        }else
        {
            \Event::fire($this->viewName.'.failUpdate',[$params]);

            if(\Request::ajax())
            {
                echo '{ "success": "false", "msg": "Error Updated" }';
            }else
            {
                \Session::flash('error', 'Error Updated');
                    return \Redirect::to($this->viewName.'/');
            }

        }

        if(\Request::ajax())
        {
            echo '{ "success": "true", "msg": "Successfully Updated" }';
        }else
        {
            \Session::flash('success', 'Successfully Updated');
            return \Redirect::to($path.'/');
        }

 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	$class     = new $this->className();

        $key_value= $id;
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $path     = $this->viewName;

        $params = (object)[
                    "me"        => &$this,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_value" => &$key_value,
                    "key_name"  => &$key_name,
                    "action"    => __FUNCTION__,
                    "path"      => &$path
                  ];

        $class->beforeDestroy($params);
        \Event::fire($this->viewName.'.beforeDestroy',[$params]);

        // delete
        $awb = $class::findOrFail($id);

        if($awb->delete())
        {
            \Event::fire($this->viewName.'.afterDestroy',[$params]);
            $class->afterDestroy($params);
        }else
        {
            \Event::fire($this->viewName.'.failDestroy',[$params]);
            // redirect

            if(\Request::ajax())
            {
                echo '{ "success": "false", "msg": "Error deleted" }';
            }else
            {
                \Session::flash('error', 'Error deleted');
                return \Redirect::to($model.'/');
            }

        }

        if(\Request::ajax())
        {
            echo '{ "success": "true", "msg": "Successfully deleted" }';
        }else
        {
            // redirect
            \Session::flash('success', 'Successfully deleted');
            return \Redirect::to($model.'/');
        }

    }


    public function printItem($id){

        $class     = new $this->className();
        $fk_column = $class->getCrud("fk_column");

        $key_value= $id;
        $key_name = $class->getKeyName();
        $model    = $this->modelName;
        $path     = $this->viewName;

        $columns  = $class->getColumnsByView("print",$id);
        $path     = $this->getPathView("print");

        $record   = $class::findOrFail($id);


        $params =(object) [
                    "me"            => &$this,
                    "title"         => &$title,
                    "btn"           => &$btn,
                    "class"         => &$class,
                    "fk_column"     => &$fk_column,
                    "model"         => &$model,
                    "key_value"     => &$key_value,
                    "key_name"      => &$key_name,
                    "action"        => "print",
                    "record"        => &$record,
                    "columns"       => &$columns,
                    "path"          => &$path
                  ];

        $class->beforePrint($params);          

        return \View::make($path)
            ->with('title',$title)
            ->with('btn',$btn)
            ->with('fk_column',$fk_column)
            ->with('key_value',$key_value)
            ->with('key_name',$key_name)
            ->with('action',"print")
            ->with('record',$record)
            ->with('model',$model)
            ->with('columns',$columns);
    }


    public function tab($id,$tab)
    {

        $class  = new $this->className(); 
        $return = $class->$tab();

        $path = ($this->viewName).".tabs.".$tab;

        $table = strtolower($this->className)."_".$tab;

        if (!\View::exists($path))
            $path = "crud.tabs.default-tab";
            //return "Please create a view in <strong>".$path."</strong>";

        if($tab == "notes" or $tab == "logs")
        {

            if($tab == "logs")
                $table = "logfile";

            if (!\Schema::hasTable($table))
                return "Please create a table <strong>".$table."</strong>";

            return $class->tab($table,$id);

        }

        if(is_object($return))
             return $return;

       //return $return;

    }




}
