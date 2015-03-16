<?php
use Zizaco\Entrust\EntrustRole;

// class Role extends EntrustRole
// {
// 	protected $primaryKey = 'id_roles'; // !important
// }



class Roles extends \Crud {

    protected $primaryKey = 'id_roles'; // !important

    protected $table = 'roles';

    protected $fillable = [];

    protected $attributes = [
    ];

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

    /* 
        CRUD
    */

    protected $crud = [
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
        // ["first_name" => "text"] 
        // text,hidden,textarea,password,digit,file,email,title
        //
        "inputs"    => [],
        // 
        // Choose column or columns for the FK to show
        // ["id_roles" => "name"] or ["id_roles" => ["name","status"]]
        //
        "fk_column" => [],
        // 
        // Tabs
        // Allways create names of tabs with snake case for example
        // if you want Chart Report tab you will write chart_report
        // ["chart_report","permissions","settings"]
        //
        "tabs"      => [],
        // 
        // Default Tabs
        // if you can change the columns and inputs you will go to model
        // for example users_notes go to app/models/UsersNotes.php
        //
        "default_tabs" => ["notes","logs"],
        //
        // Validate inputs
        // Rules by column
        // "email" => "required|min:10|email"
        //
        // http://laravel.com/docs/4.2/validation#available-validation-rules
        // 
        //
        "validations"     => [],
        //
        // Columns enable by view
        // Default enable all columns
        //
        "create"    => [],
        "edit"      => [],
        "index"     => [],
        "show"      => [],

        // "not_in_create" => ["created_at","updated_at"],
        // "not_in_edit"   => ["created_at","updated_at"],
        // "not_in_index"  => ["created_at","updated_at"],
        // "not_in_show"   => ["created_at","updated_at"],

        //
        // Buttons
        //

        // "btn_in_index"  => ["print","create","edit","show","delete","search"],
        // "btn_in_show"   => [],
        // "btn_in_create" => [],
        // "btn_in_edit"   => [],

        // HAS_ONE, HAS_MANY, BELONGS_TO
        // "role"      => self::BELONGS_TO,

        "relations" => []

    ];

	private $extenders= ["EntrustRole"];


	public function __call($name, $params){
		foreach($this->extenders as $extender){
		   //do reflection to see if extender has this method with this argument count
		   if (method_exists($extender, $name)){
		      return call_user_func_array(array($extender, $name), $params);
		   }
		}
		return parent::__call($name, $params);
	}

    /**
     * Many-to-Many relations with Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Config::get('auth.model'), "roles_assigned", 'id_users', 'id_roles');
    }

    /**
     * Many-to-Many relations with Permission named perms as permissions is already taken.
     *
     * @return void
     */
    public function perms()
    {
        // To maintain backwards compatibility we'll catch the exception if the Permission table doesn't exist.
        // TODO remove in a future version.
        try {
			return $this->belongsToMany("\Permissions", "permissions_roles",'id_roles','id_permissions')->withPivot('id_permissions_roles');
        } catch (Exception $e) {
            // do nothing
        }
    }


    
}