<?php

class Noticias extends \Crud {


    protected $primaryKey = 'id_noticias'; // !important

    protected $table = 'noticias';

    protected $fillable = [];

    protected $attributes = [
    ];

    protected $guarded = [];  // Important


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

    //public function beforeIndex(&$params){}
    public function beforeCreate(&$params){}
    //public function beforeEdit(&$params){}
    public function beforePrint(&$params){}

    //public function beforeShow(&$params){}
    
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
        "inputs"    => [ 
            "imagen" => "image",
            "contenido" => "html"
         ],
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
        "default_tabs" => [],
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
        // Validate edit inputs
        // Rules by column
        // "email" => "required|min:10|email"
        // without validation
        // "imagen" => ""  
        //
        // http://laravel.com/docs/4.2/validation#available-validation-rules
        // 
        //
        "edit_validations" => ["imagen" => ""],
        //
        // Columns enable by view
        // Default enable all columns
        //
        "create"    => [],
        "edit"      => [],
        "index"     => [],
        "show"      => [],

        "not_in_create" => [ 'me_gusta', 'created_by', 'updated_by', 'created_at', 'updated_at' ],
        "not_in_edit"   => [ 'me_gusta', 'created_by', 'updated_by', 'created_at', 'updated_at' ],
        "not_in_index"  => [ 'id_noticias', 'contenido', 'imagen', 'created_by', 'updated_by', 'created_at', 'updated_at' ],
        "not_in_show"   => [ 'created_by', 'updated_by', 'created_at', 'updated_at' ],

        //
        // Buttons
        // ["print","create","edit","show","delete","search","advance-search"]

        "btn_in_index"  => [ "create", "edit", "show", "delete", "search", "advance-search" ],
        // "btn_in_show"   => ["print","edit","cancel"],
        // "btn_in_create" => ["create","cancel"],
        // "btn_in_edit"   => ["edit","cancel"],

    ];


    
}