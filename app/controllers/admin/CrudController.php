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
        {
            $view = "crud.".$default;

            if(\Request::ajax())
                $view = "crud.tabs.form-ajax";
        }
            

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

        $records   = $class;

        if (\Input::has('search'))
            $records = $class->search(\Input::get('search'));

        $records = $records->paginate();

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
        $record   = [];
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
                return '{ "success": "false", "msg": "'.trans("crud.error-fields").'" }';
            }else{

                //Input::get('name', 'Sally');

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

                      $fileName = md5($class->getTable()."|".$file."|".$params->key_value); // renameing image
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
                return '{ "success": "false", "msg": "'.trans("crud.error-created").'" }';
            }else
            {
                \Session::flash('error', 'Error Created');
                    return \Redirect::to(getenv('APP_ADMIN_PREFIX')."/".$this->viewName.'/');
            }

        }

        if(\Request::ajax())
        {
            return '{ "success": "true", "msg": "'.trans('crud.success-created').'", "id":"'.$key_value.'" }';
        }else
        {
            \Session::flash('success', trans('crud.success-created'));
                return \Redirect::to(getenv('APP_ADMIN_PREFIX')."/".$path.'/');  
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

        $record   = $class->findOrFail($id);


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
                return '{ "success": "false", "msg": "'.trans('crud.error-fields').'" }';
            }else
            {
                return \Redirect::back()
                    ->withErrors($validator)
                    ->withInput(\Input::except("password")); 
            }

        }

        foreach ($inputs as $index => $name)
        {
            if($index != $class->getKeyName())
                $record->{$index} = \Input::get($index);
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


                      $fileName = md5($class->getTable()."|".$file."|".$params->key_value); // renameing image
                      
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
                return '{ "success": "false", "msg": "'.trans('crud.error-updated').'" }';
            }else
            {
                \Session::flash('error', 'Error Updated');
                    return \Redirect::to(getenv('APP_ADMIN_PREFIX')."/".$this->viewName.'/');
            }

        }

        if(\Request::ajax())
        {
            return '{ "success": "true", "msg": "'.trans("crud.success-updated").'" }';
        }else
        {
            \Session::flash('success', trans("crud.success-updated"));
            return \Redirect::to(getenv('APP_ADMIN_PREFIX')."/".$path.'/');
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
                return '{ "success": "false", "msg": "'.trans("crud.error-deleted").'" }';
            }else
            {
                \Session::flash('error', trans("crud.error-deleted"));
                return \Redirect::to(getenv('APP_ADMIN_PREFIX')."/".$model.'/');
            }

        }

        if(\Request::ajax())
        {
            return '{ "success": "true", "msg": "'.trans("crud.success-deleted").'" }';
        }else
        {
            // redirect
            \Session::flash('success', trans("crud.success-deleted"));
            return \Redirect::to(getenv('APP_ADMIN_PREFIX')."/".$model.'/');
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
        $record   = $class::findOrFail($id);

        $path = $this->viewName.".tabs.".$tab;
        $table = $this->viewName."_".$tab;

        if (!\View::exists($path))
            $path = "crud.tabs.default-tab";
            //return "Please create a view in <strong>".$path."</strong>";

        if($tab == "notes" or $tab == "logs")
        {

            if($tab == "logs")
                $table = "logfile";

            if (!\Schema::hasTable($table))
                return "Please create a table <strong>".$table."</strong>";

            return $class->$tab($id,$record);

        }

        return $class->$tab($id,$record);

       //return $return;

    }

    public function remoteCombo($column){


        $class      = new $this->className(); 
        $fk_column  = $class->getCrud("fk_column");
        $joins      = $class->getCRUD("joins");

        $columns    = isset($fk_column[$column]) ? $fk_column[$column] : [];

        $table      = $column;
        $primay_key = null;

        if(array_key_exists($column, $joins))
        {
            $table      = $joins[$column][0];
            $primay_key = isset($joins[$column][1]) ? $joins[$column][1] : "";
        }
            

        $model      = $class->toModel($table);

        if(array_key_exists($column, $joins) and $column == ""){
            $primay_key  = $model->getKeyName();
        }

        if($column == "created_by" or $column == "updated_by")
        {
            $model          = "Users";
        }


        $class_model= new $model();

        $records    = $class_model;

        if (\Input::has('search'))
            $records = $records->search(\Input::get('search'));

        $records    = $records->take(10)->get();
        $items = [];

        foreach ($records as $record) {
            $items[] =["text" => getColumnsFK($column,$record,$fk_column,$primay_key), "id" => $record->{$class_model->getKeyName()} ] ;
        }

        echo json_encode([
                            "total_count"           =>  10,
                            "incomplete_results"    =>  false,
                            "items"                 =>  $items,
                        ]);
    }


}
