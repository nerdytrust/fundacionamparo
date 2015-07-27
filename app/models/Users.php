<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Zizaco\Entrust\HasRole;

class Users extends Crud implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,HasRole;

	protected $primaryKey = 'id_users'; // !important

	protected $table = 'users';

	//protected $fillable = [];

	protected $hidden = ['password'];

	protected $attributes = [

	];
	
	public function __construct(array $attributes = array())
	{

	    parent::__construct($attributes);
	}

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
        "fk_column" => ["id_roles" => "name"],
        // 
        // Tabs
        // Allways create names of tabs with snake case for example
        // if you want Chart Report tab you will write chart_report
        // ["chart_report","permissions","settings"]
        //
        "tabs"      => ["chart_report"=>"Chart Report"],
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

        "not_in_create"   => [ 'status', 'sex', 'last_ip', 'ip_mask', "remember_token" ],
        "not_in_edit"     => [ "remember_token" ],
        "not_in_show"     => [ "password","remember_token" ],
        "not_in_index"    => [ "ip_mask","last_ip","password","remember_token","created_at","updated_at" ],
        //
        // Buttons
        //

        // "btn_in_index"  => ["print","create","edit","show","delete","search"],
        // "btn_in_show"   => [],
        // "btn_in_create" => [],
        // "btn_in_edit"   => [],

    ];

    public function chart_report()
    {
        return View::make("dashboard.dashboard");
    }

	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	    return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
	    return $this->email;
	}


}