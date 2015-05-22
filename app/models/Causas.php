<?php

class Causas extends \Crud {


    protected $primaryKey = 'id_causas'; // !important

    protected $table = 'causas';

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

    public function beforeIndex(&$params){}
    public function beforeCreate(&$params){}
    public function beforeEdit(&$params){}
    public function beforePrint(&$params){}

    public function beforeShow(&$params){}

    public function getDescripcionAttribute( $value ){
        $action = getCurrentAction();
            
        if ( $action == "index" )
            return Str::limit( $value, 140 );
        else
            return $value;
    }

    public function getMetaAttribute( $value ){
        $action = getCurrentAction();

        // if ( $action == "index" )
            return '$' . number_format( $value );
    }
    
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
        "labels"    => [ 
                        'id_categorias'      => 'Categoría',
                        'created_by'        => 'Creado por',
                        'updated_by'        => 'Actualizado por',
                        'created_at'        => 'Fecha de Creación',
                        'updated_at'        => 'Fecha de Actualización',
                        'fecha'             => 'Fecha de Cierre',
                        'id_tipo_causas'    => 'Tipo de Causa'
                    ],
        //
        // Replace default inputs by column
        // ["first_name" => "text"] 
        // text,hidden,textarea,password,digit,file,email,title
        //
        "inputs"    => [ 'meta' => 'currency', 'imagen' => 'image', 'twitter' => 'text', 'facebook' => 'text' ],
        // 
        // Choose column or columns for the FK to show
        // ["id_roles" => "name"] or ["id_roles" => ["name","status"]]
        //
        "fk_column" => [ 'created_by' => 'first_name', 'id_categorias' => 'nombre', 'id_tipo_causas' => 'nombre' ],

        // "joins" => [ 'id_categoria' => [ 'categorias' ] ],
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
        //"default_tabs" => ["notes","logs"],
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

        "not_in_create" => [ "me_gusta_interno", 'facebook', 'twitter', "recaudado", "created_at", "updated_at", 'created_by', 'updated_by' ],
        "not_in_edit"   => [ "me_gusta_interno", 'facebook', 'twitter', "recaudado", "created_at", "updated_at", 'created_by', 'updated_by' ],
        "not_in_index"  => [ "created_at", "updated_at", "facebook", "twitter", "imagen", "updated_by", "id_causas", "created_by" ],
        // "not_in_show"   => ["created_at","updated_at"],

        //
        // Buttons
        // ["print","create","edit","show","delete","search","advance-search"]

        "btn_in_index"  => [ "create","edit","show","delete","search","advance-search" ],
        "btn_in_show"   => [ "edit","cancel" ],
        // "btn_in_create" => ["create","cancel"],
        // "btn_in_edit"   => ["edit","cancel"],

    ];
    
}