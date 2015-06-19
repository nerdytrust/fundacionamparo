<?php

class Becas extends \Crud {


    protected $primaryKey = 'id_becas'; // !important

    protected $table = 'becas';

    protected $fillable = [];

    protected $attributes = [
    ];

    protected $guarded = [];  // Important


    // ===================================================================
    // EVENTS
    // ===================================================================
    //
    //  $params return array object link this
    //
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
    
    // ===================================================================
    // FORMAT COLUMNS
    // ===================================================================
    //
    // Example : column first_name
    // you will create a function like this: 

    // public function getFirstNameAttribute($value)
    // {
    //      return $value;
    // }
    public function getNacimientoAttribute( $value ){
        $action = getCurrentAction();
        if ( $action == 'edit'  )
            return date( 'Y-m-d', $value );

        return date( 'd/m/Y', $value );
    }

    /*public function getLugarEstudioAttribute( $value ){
        if ( $value == 1 )
            return 'Extranjero';

        return 'México';
    }

    public function getOtorgadaAttribute( $value ){
        if ( $value == 1 )
            return 'SI';

        return 'NO';
    }

    public function getRechazadaAttribute( $value ){
        if ( $value == 1 )
            return 'SI';

        return 'NO';
    }*/



    // ===================================================================
    // CRUD
    // ===================================================================
    //

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
        "labels"    => [ 'id_becas', 'ID Solicitud', 'id_paises' => 'País', 'id_estados' => 'Estados', 'id_ciudades' => 'Ciudad' ],
        //
        // Replace default inputs by column
        // ["first_name" => "text"] 
        // "radiogroup","radios","editor","toggle","html","text", "hidden", "digit", "textarea", "password", "email","datetime","date","time","select","autocomplete","money","currency","file","document","audio","video","zip"
        //
        "inputs"    => [ 'nacimiento' => 'date', 'otorgada' => 'toggle' ],
        // 
        // Choose column or columns for the FK to show
        // ["id_roles" => "name"] or ["id_roles" => ["name","status"]]
        //
        "fk_column" => [ 'id_paises' => 'name', 'id_estados' => 'name', 'id_ciudades' => 'name' ],
        //
        // JOINS
        // Remember by default the framework create autojoins when you define id_(table)   
        // you can get the info like this : $records->id_(table)_record
        // [ "column" => [ "table","table_column" ]            
        // [ "id_roles"  => ["roles","id_roles"] 
        // [ "id_parent" => ["current_table","id_primary_key"] 
        //    
        "joins"      => [], 
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
        "edit"      => [ ],
        "index"     => [ 'nombre', 'apellidos', 'email', 'sexo', 'promedio' ],
        "show"      => [],

        // "not_in_create" => ["created_at","updated_at"],
        "not_in_edit"   => [ 'lugar_estudio', 'terminos', 'rechazada', 'ip', 'browser', 'created_by', 'updated_by', 'created_at', 'updated_at' ],
        // "not_in_index"  => ["created_at","updated_at"],
        "not_in_show"   => [ 'terminos', 'ip', 'browser', 'created_by', 'updated_by', 'created_at', 'updated_at' ],

        //
        // Buttons
        // ["print","create","edit","show","delete","search","advance-search"]

        "btn_in_index"  => [ "print", "edit", "show", "search","advance-search"],
        // "btn_in_show"   => ["print","edit","cancel"],
        // "btn_in_create" => ["create","cancel"],
        // "btn_in_edit"   => ["edit","cancel"],

    ];

    
}