<?php
use Nicolaslopezj\Searchable\SearchableTrait;

class Crud extends \BaseModel {

    use SearchableTrait;
    
	private $schema = null;
	protected $perPage = 25;

    protected $fillable = [];

    protected $attributes = [
    ];

    protected $guarded = [];  // Important


    protected $searchable = [
    ];

    // Project::creating(function($project) { }); // *
    // Project::created(function($project) { });
    // Project::updating(function($project) { }); // *
    // Project::updated(function($project) { });
    // Project::saving(function($project) { });  // *
    // Project::saved(function($project) { });
    // Project::deleting(function($project) { }); // *
    // Project::deleted(function($project) { });

    public function __construct($attributes = array())
    {
        $me = $this;
        $this->schema = \DB::getDoctrineSchemaManager();
        $this->inputTypes = array_merge($this->inputTypes,$this->inputFiles);


        $this::creating(function($table) use( $me )
        {
            if (\Schema::hasColumn($me->getTable(), "created_by"))
                $table->created_by = \Auth::id() ? \Auth::id() : 0; 

            if (\Schema::hasColumn($me->getTable(), "updated_by"))
                $table->updated_by = 0; 
        });

        $this::created(function($table) use( $me )
        {
            $id =  $table->{$me->getKeyName()};
            if (\Auth::check() and $id)
                $me->logfile($id,"created");
        });

        $this::updating(function($table) use( $me )
        {
            if (\Schema::hasColumn($me->getTable(), "updated_by"))
                $table->updated_by = \Auth::id() ? \Auth::id() : 0 ; 
        });


        parent::__construct($attributes);
    }


    protected function updateTimestamps()
    {
        $time = $this->freshTimestamp();

        if ( ! $this->isDirty(static::UPDATED_AT))
        {
            $this->setUpdatedAt($time);

            $id =  $this->{$this->getKeyName()};
            if (\Auth::check() and $id)
                $this->logfile($id,"updated");
        }

        if ( ! $this->exists && ! $this->isDirty(static::CREATED_AT))
        {
            $this->setCreatedAt($time);
        }
    }



    public function logfile($id,$action)
    {
        if (File::exists(app_path()."/models/Logfile.php") and $this->getTable() != "logfile" and \Auth::check())
        {
            Logfile::create([
                'primary_key' => $id,
                'table'       => $this->getTable(),
                'action'      => $action,
                'ip'          => \Request::getClientIp(),
            ]);

        }
    }


    //
    // RELATIONS
    //
    const HAS_ONE = 'hasOne';

    const HAS_MANY = 'hasMany';

    const BELONGS_TO = 'belongsTo';

    const BELONGS_TO_MANY = 'belongsToMany';

    const MORPH_TO = 'morphTo';

    const MORPH_ONE = 'morphOne';

    const MORPH_MANY = 'morphMany';



    // Events
    //  $params return array object link this
    //
    // "me"             => Access to methods of the controller. return object 'index', 'create', 'store', 'show', 'edit', 'update', 'destroy','printItem'
    // "btn"            => Enable buttons. return array "print","create","edit","show","delete","search","advance-search",
    // "fk_column"      => Column(s) of the relation. Only FK. return array ["id_roles" => "name"] ,
    // "title"          => Title of the module,
    // "class"          => Instance of the model. Return object,
    // "model"          => Model name. return string,
    // "key_name"       => Primary Key Name. return string,
    // *"key_value"     => Primary Key Value. return integer.
    // "action"         => Action in action. return string. 'index', 'create', 'store', 'show', 'edit', 'update', 'destroy','printItem',
    // *"record(s)"     => Array with all items. return object array,
    // *"validations"   => Array with the validations. for example ["email" => "required|min:10|email"]
    // *"validator"     => Validator object native of laravel. http://laravel.com/docs/4.2/validation
    // "columns"        => Details of the columns of table . return object array. is_primary, is_foreign_key, auto_increment, model, label, name, type, input, length, data, required
    // "path"           => Path ot the view. for example crud.index or users.index
    //

    public function beforeStore(&$params){}
    public function afterStore(&$params){}

    public function beforeUpdate(&$params){}
    public function afterUpdate(&$params){}

    public function beforeDestroy(&$params){}
    public function afterDestroy(&$params){}

    public function beforeIndex(&$params){}
    public function beforeCreate(&$params){}
    public function beforeEdit(&$params){}
    public function beforePrint(&$params){}

    public function beforeShow(&$params){}


    protected $default_crud = [
        //
        // Title
        //
        "title"     => "",
        //
        //  Rename the columns names.
        //  if not wrote label the column rename like this: 
        //  ["first_name" => "First Name"]
        // 
        "labels"    => [],
        //
        // Replace default inputs by column
        // ["first_name" => "text"] //text,hidden,textarea,password,digit,file,email,title
        //
        "inputs"    => [],

        // 
        // Choose column or columns for the FK to show
        // ["id_roles" => "name"] or ["id_roles" => ["name","status"]]
        //
        "fk_column" => [
                        "created_by" => ["first_name","last_name"],
                        "updated_by" => ["first_name","last_name"]
                    ],
        // 
        // Tabs
        // Allways create names of tabs with snake case for example
        // if you want Chart Report tab you will write chart_report
        // ["chart_report","permissions","settings"]
        //
        "tabs"              => [],
        // 
        // Default Tabs
        // if you can change the columns and inputs you will go to model
        // for example users_notes go to app/models/UsersNotes.php
        //
        "default_tabs"      => ["notes","logs"],
        //
        // New permissions, by default at the framework we have permissions of 
        // index,create,edit,show,destroy and print
        // Example: if you want a permisson (pdf) over some id you will write
        // this ["pdf" => "/*/pdf"] without id only ["pdf" => "/pdf"]
        // to use over view you use @if(!Entrust::can($model."/pdf") and in_array("pdf",$btn))
        //
        "permissions"       => [],
        //
        // Validate inputs
        // validations by column
        // "email" => "required|min:10|email"
        //
        // http://laravel.com/docs/4.2/validation#available-validation-validations

        "validations"       => [],
        //
        // Columns enable by view
        // Default enable all columns
        // ["id_users","name"]
        //
        "create"    => [],
        "edit"      => [],
        "index"     => [],
        "show"      => [],

        "not_in_create" => ["created_by","updated_by","created_at","updated_at"],
        "not_in_edit"   => ["created_by","updated_by","created_at","updated_at"],
        "not_in_index"  => ["created_by","updated_by","created_at","updated_at"],
        "not_in_show"   => [],

        //
        // Buttons
        // ["print","create","edit","show","delete","search","advance-search"]

        "btn_in_index"  => ["print","create","edit","show","delete","search","advance-search"],
        "btn_in_show"   => ["print","edit","cancel"],
        "btn_in_create" => ["create","cancel"],
        "btn_in_edit"   => ["edit","cancel"],

    ];


    protected $inputFiles   = ["file"=>"","image"=>"image","gallery"=>"image","images"=>"image","files"=>"","video"=>"video","audio"=>"audio","zip"=>"zip","document"=>"document"];

    protected $allowed    = [
        "audio"     => ["mp3","wav","ogg"],
        "image"     => ["jpe","jpeg","jpg","gif","png"],
        "video"     => ["mp4"],
        "document"  => ["doc","docx","pot","pps","ppt","pptx","xlsx","xls","pdf","html","htm"],
        "zip"       => ["zip"]
    ];

    protected $inputTypes = ["text", "hidden", "digit", "textarea", "password", "email","datetime","date","time","select","autocomplete","money","currency"];

    protected $inputColumTypes = [
        "boolean"       => "text",
        "smallint"      => "number",
        "integer"       => "number",
        "bigint"        => "number",
        "text"          => "textarea",
        "string"        => "text",
        "enum"          => "select",
        "date"          => "date",
        "datetime"      => "datetime",
        "time"          => "time",
        "float"         => "text",
        "decimal"       => "text",
        "blob"          => "text",
        "simple_array"  => "text"
    ];



    //
    // RELATIONS create functions
    //
    public function __call($method, $params){

        $relations = $this->getRelations();

        $method = str_replace("_record", "", $method);
        $current_class_name = get_class($this);

        $methodVariable = array($this, $method);

        if (array_key_exists($method, $relations)) {
            return $this->createRelation($method);
        }elseif(!is_callable($methodVariable, true)){
            return "Please create a function $method in <strong>app/models/".get_class($this).".php</strong>";
        }
            

        return parent::__call($method, $params);
    }


    protected function getPathView($viewName,$name,$default=null)
    {
        
        $view = ($viewName).".".$name;

        if(!$default)
            $default = $name;

        if (!View::exists($view))
            $view = "crud.".$default;

        return $view;    
    }


    public function tab($table,$where = null)
    {
        $current_class_name = get_class($this);

        if($table == "log")
            $table = "logfile";

        $className = ucfirst(camel_case($table));

        $viewName  = strtolower(snake_case($className));
        $modelName = $viewName;

        if (!File::exists(app_path()."/models/".$className.".php"))
            return "Please create a model in <strong>app/models/".$className.".php</strong>";

        $class     = new $className();

        $title     = $class->getCrud("title");
        $btn       = $class->getCrud("btn_in_index");
        $fk_column = $class->getCrud("fk_column");

        $tables = $class->getRelationsByTables();

        $relations = $class->getFKRelations();

        $records = DB::table($table);


        if(count($relations) > 0)
            $records = call_user_func_array([$records,"with"],$relations);

        

        if(is_numeric($where))
        {
            if($table == "logfile")
            {
                $records = $records->where("primary_key",$where)->where("table",$this->getTable());
            }
            elseif (Schema::hasColumn($table, $this->getKeyName()))
                $records = $records->where($this->getKeyName(),$where);
        }
            

        $records = $records->paginate();

        $columns  = $class->getColumnsByView("index");

        $path     = $this->getPathView(strtolower(snake_case($current_class_name)),"tabs.".$viewName,"tabs.default-tab");
        $key_name = $class->getKeyName();
        $model    = $modelName;

        $params =(object)[
                    "me"        => &$this,
                    "btn"       => &$btn,
                    "fk_column" => &$fk_column,
                    "title"     => &$title,
                    "class"     => &$class,
                    "model"     => &$model,
                    "key_name"  => &$key_name,
                    "action"    => "index",
                    "records"   => &$records,
                    "columns"   => &$columns,
                    "path"      => &$path
                  ];

        return View::make($path)
            ->with('title',$title)
            ->with('btn',$btn)
            ->with('fk_column',$fk_column)
            ->with('key_name',$key_name)
            ->with('action',"index")
            ->with('model',$model)
            ->with('records',$records)
            ->with('columns',$columns);
    }


    public function created_by_record()
    {
        return $this->belongsTo('Users', 'created_by', 'id_users');
    }

    public function updated_by_record()
    {
        return $this->belongsTo('Users', 'updated_by', 'id_users');
    }


    public function getName()
    {
    	$columns = $this->getColumns();
    	$this->name = "";

    	foreach ($columns as $column) {
    		if($column->type == "string")
    		{
    			$this->name = $column->name;
    			break;
    		}
    	}
    	return $this->name;
    }

    public function toModel($model)
    {
    	$model 	   = strtolower($model);
        $model 	   = str_replace(["id_","_id"], "", $model);
        $model     = ucfirst(camel_case($model));
        //$model     = str_singular($model);
        

        return $model;
    }

    protected function createRelation($method)
    {
        $relations = $this->getRelations();
        $function  = $relations->$method;

        $method	   = strtolower($method);
        $model 	   = isset($function["model"]) ? $function["model"] : $method;

        $local_key = (starts_with($method,"id_") or ends_with($method,"_id")) ? $method : $this->getKeyName();
        $local_key = isset($function["local_key"]) ? $function["local_key"] : $local_key;
        $parent_key= isset($function["parent_key"]) ? $function["parent_key"] : $local_key;

        $model     = $this->toModel($model);
 
        //$class 	   = new $model();
        $call      = isset($function["relation"]) ? $function["relation"] : $function;

        
        return $this->$call($model,$local_key,$parent_key);
    }

    public function getFKRelations()
    {
    	$relations = $this->getRelations("belongsTo");
    	$return  = [];

    	foreach ($relations as $key => $relation) 
    		$return[] = $key."_record";
    	
    	return $return;
    }

    public function getRelations($kind = "")
    {
        $relations  = $this->getCRUD("relations");

        $return 	= [];


        if($kind == "belongsTo" or $kind == "")
        {

        	$columns = $this->getColumns();
        	
        	foreach ($columns as $local_key => $column) {

        		if($column->is_foreign_key)
        		{
        			$relation_data = array_get($relations, $column->model);
        			$relation = $relation_data ? $relation_data : $kind;
        			$relation = $relation ? $relation : self::BELONGS_TO;

        			if (File::exists(app_path()."/models/".ucfirst($column->model).".php"))
        				$return[$local_key] = $relation;
        		}

        	}

        }

        // if($kind == self::HAS_MANY or $kind == "")
        // {
        // 	$tables = $this->getRelationsByTables();

        // 	foreach ($tables as $table) {

        // 		$model = $this->toModel($table);

		      //   if (File::exists(app_path()."/models/".$model.".php"))
		      //   {
		      //   	$class 	   = new $model();
	       //  		$return[$table] = [
		      //           "relation"      => self::HAS_MANY,
		      //           "local_key"     => $class->getKeyName(),
		      //           "parent_key"    => $this->getKeyName()
	       //  		];
		      //   }

        // 	}
        // }


        foreach ($relations as $local_key => $relation) {
        	if($relation == $kind or $kind == "")
            	$return[$local_key] = $relation;
        }


        return (object)$return;
    }


    public function getRelationsByTables()
    {
    	
    	$tables = $this->schema->listTables();

    	$return = [];

		foreach ($tables as $table) 
		{
			if(str_contains($table->getName(),$this->getTable()) and $table->getName() != $this->getTable() )
		    	$return[] = $table->getName(); 
		}

		return $return;
    }


    public function getTabs()
    {
        $tabs         = $this->getCRUD("tabs");
        $default_tabs = $this->getCRUD("default_tabs");


        if(array_key_exists(0,$tabs)) // without title
        {
            foreach ($tabs as $tab)
                $new_tabs[$tab] = str_normal($tab);
        }else
            $new_tabs = $tabs;

        if(array_key_exists(0,$default_tabs)) // without title
        {
            foreach ($default_tabs as $tab)
                $new_default_tabs[$tab] = str_normal($tab);
        }else
            $new_default_tabs = $default_tabs;

        return array_merge($new_tabs,$new_default_tabs);
    }




    public function getCRUD($view = "")
    {
        if(isset($this->crud[$view]))
    	{
    		if(isset($this->default_crud[$view]))
            {
                if(is_array($this->default_crud[$view]) and !starts_with($view,"btn_in_"))
                    return array_merge($this->crud[$view],$this->default_crud[$view]);
                else
                    return $this->crud[$view];
            }else
    			return $this->crud[$view];
    	}
		elseif(isset($this->default_crud[$view]))
    		return $this->default_crud[$view];
    	else
    		return [];
    }

    protected function getClassName()
    {
        return get_class($this);
    }

    protected function getPath($path)
    {
        return app_path($path);
    }

    public function getColumns($id = "")
    {

    	$return  = new StdClass;

		$columns = $this->schema->listTableColumns($this->getTable());
		$record  = [];


		foreach ($columns as $column) {

			$crud_inputs = $this->getCRUD("inputs");

			$name   = $column->getName();

			$length = $column->getLength();
			$length = empty($length) ? 0 : $length;

			$type 	= strtolower((string)$column->getType());
			$type   = ($type == "string" and $length == 0) ? "enum" : $type;

			$data   = [];

			if($type == "enum")
			{
				$enum_data = $this->getEnumValues($column->getName());
				    $data[""] = "";
                foreach ($enum_data as $erecord) {
					$data[$erecord] = $erecord;
				}
			}


			// default input
			$input = "text";

			// input type
			if (array_key_exists($type, $this->inputColumTypes))
				$input = $this->inputColumTypes[$type];
			
			if(str_contains($name, 'mail'))
				$input = "email";

			//replace default input
			if (array_key_exists($name, $crud_inputs))
			{
				if(in_array($crud_inputs[$name], $this->inputTypes))
					$input = $crud_inputs[$name];
			}





			$is_primary = $column->getName() == $this->getKeyName() ? 1 : 0;
			$is_foreign_key = ((starts_with($name, 'id_') or ends_with($name, '_id') )  and !$is_primary) ? 1 : 0;
			


			// default label
			$label  = $this->replaceUnderScore(ucwords($name));

			$model  = false;

			if($is_primary)
				$label = "ID";

			if($is_foreign_key)
			{

				$model = (str_replace(["id_","_id"], "", $name));
				$label = ucfirst(str_singular($model));
				$model = ucfirst(camel_case($model));

			}


			$crud_labels = $this->getCrud("labels");

			// replace default label
			if (array_key_exists($name, $crud_labels))
				$label = $crud_labels[$name];

            if (!File::exists(app_path()."/models/".ucfirst($model).".php") and $is_foreign_key)
                $is_foreign_key = false;

            if($name == "created_by" or $name == "updated_by")
                $is_foreign_key = 1;

			$return->{$name}= (object)[
						"is_primary" 	 => $is_primary,
						"is_foreign_key" => $is_foreign_key,
						"auto_increment" => $column->getAutoincrement() ? 1 : 0,
						"model"			 => $model,
                        "default"        => $column->getDefault(),
						"label"			 => $label,
						"name" 		 	 => $name, 
						"type"		 	 => $type,
						"input"			 => $input,
						"length"		 => $length,
						"data"			 => $data,
                        "required"       => $column->getNotNull()
						//"value"			 => $value
						];
		}


		return (object)$return;
    }

    public function getColumnsByView($view = "",$id="")
    {


    	$viewColumns  = $this->getCrud($view);
    	$notInColumns = $this->getCrud("not_in_".$view);

    	$columns 	 = $this->getColumns($id);
    	$return  	 = new StdClass;	


    	if(count($viewColumns) == 0)
    	{
	    	foreach ($columns as $column) 
	    	{
	    		if(!in_array($column->name, $notInColumns))
	    			$return->{$column->name} = $column;
	    	}
	    	
    	}

    	foreach ($columns as $column) {
    		if(in_array($column->name, $viewColumns) and !in_array($column, $notInColumns))
    			$return->{$column->name} = $column;
    	}

    	return $return;
    }

    public function getInputs($columns = [])
    {
    	$inputs = [];
    	foreach ($columns as $column)
    		$inputs[] = $column->name;

    	return $inputs;
    }

    public function getFileNameInputs($inputs = [])
    {
        $file = [];

        foreach ($inputs as $name => $value) {
            if (Input::hasFile($name))
                $file[] = $name;
        }
        return $file;
    }


    

    public function getValidations($columns = [],$id = "")
    {
    	$validations = [];
    	$numeric = ["smallint","integer","bigint","float","decimal","blob"];

    	$crud_validations = $this->getCrud("validations");
        $inputs           = $this->getCrud("inputs");


    	foreach ($columns as $column) {
    		$rule = [];

			if (array_key_exists($column->name, $crud_validations))
				$validations[$column->name] = $crud_validations[$column->name];
			else
			{
				// without primary key

				if($column->name != $this->getKeyName())
				{
                    if($column->required)
		    		    $rule[] = "required";

		    		if($column->length > 0)
		    			$rule[] = "max:".$column->length;

		    		if($column->length > 3)
		    			$rule[] = "min:3";

		    		if( $column->input == "email")
		    		{
		    			$rule[] = "email";

		    			if($id)
		    			 	$rule[] = "unique:".$this->getTable().",".$column->name.",".$id.",".$this->getKeyName();
		    			else
		    				$rule[] = "unique:".$this->getTable().",".$column->name;
		    		}

		    		if( in_array($column->input, $numeric))
		    			$rule[] = "numeric";
		    		

                    $allowed = array_get($this->inputFiles, $column->input);
                    
                    
                    if($allowed)
                        $rule[] = "mimes:".implode(",", $this->allowed[$allowed]);
		    		/*
		    		if( $column->type == "enum" and count($column->data) > 0)
		    			$rule[] = "in:".implode(",",$column->data);
		    		*/

		    		$validations[$column->name] = implode("|",$rule);
				}

			}

    	}

        return $validations;
    }



    protected function replaceUnderScore($text)
    {
        return str_replace("_", " ", $text);
    }




    
}