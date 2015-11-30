<?php

class Voluntarios extends \Crud {


    protected $primaryKey = 'id_voluntarios'; // !important

    protected $table = 'voluntarios';

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
    public function afterUpdate(&$params){

        $old_aprobacion = $params->old_values->aprobacion;
        $new_aprobacion = $params->record->attributes['aprobacion'];

        if($old_aprobacion == 0 && $new_aprobacion == 1){

            $welcome = Mail::send( 'public.mail.welcome', [ 'username' => 'Francisco'], function( $message ) {
            $message
                ->from( getenv( 'APP_NOREPLY' ), 'no-reply' )
                ->to( 'aslanlion56@gmail.com', 'Francisco' )
                ->subject( 'Ya eres voluntario' );
            });

        }
        
    }

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
        "labels"    => [
            'id_estados'                => 'Estado',
            'id_ciudades'               => 'Ciudad',
            'id_causas'                 => 'Causa',
            'id_sexos'                  => 'Sexo',
            'id_disponibilidades'       => 'Disponibilidad',
            'id_horarios'               => 'Horario',
            'id_tipo_ayudas'            => 'Tipo de Ayuda'
        ],
        //
        // Replace default inputs by column
        // ["first_name" => "text"] 
        // "radiogroup","radios","editor","toggle","html","text", "hidden", "digit", "textarea", "password", "email","datetime","date","time","select","autocomplete","money","currency","file","document","audio","video","zip"
        //
        "inputs"    => [
            'aprobacion' => 'toggle',
            'nacimiento' => 'date'
        ],
        // 
        // Choose column or columns for the FK to show
        // ["id_roles" => "name"] or ["id_roles" => ["name","status"]]
        //
        "fk_column" => [ 'id_causas' => 'titulo', 'id_estados' => 'name', 'id_ciudades' => 'name', 'id_tipo_ayudas' => 'name', 'id_sexos' => 'name', 'id_disponibilidades' => 'name', 'id_estudiantes' => 'name', 'id_horarios' => 'name' ],
        //
        // JOINS
        // Remember by default the framework create autojoins when you define id_(table)   
        // you can get the info like this : $records->id_(table)_record
        // [ "column" => [ "table","table_column" ]            
        // [ "id_roles"  => ["roles","id_roles"] 
        // [ "id_parent" => ["current_table","id_primary_key"] 
        //    
        "joins"      => [
            'id_disponibilidades' => [ 'periodos', 'id_periodos' ],
            'id_estudiantes'      => [ 'tipo_estudiantes', 'id_tipo_estudiantes' ],
            'id_tipo_ayudas'      => [ 'tipo_ayudas', 'id_tipo_ayudas' ],
            'id_sexos'            => [ 'tipo_sexos', 'id_tipo_sexos' ]
        ], 
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
        "edit_validations" => ["email" => "required|max:180|min:10|email"],
        //
        // Columns enable by view
        // Default enable all columns
        //
        "create"    => [],
        "edit"      => [],
        "index"     => [],
        "show"      => [],

        "not_in_create" => [ 'terminos', 'ip', 'browser', 'created_by', 'created_at', 'updated_at', 'updated_by' ],
        "not_in_edit"   => [ 'ip', 'browser', 'terminos', 'created_by', 'created_at', 'updated_by', 'updated_at' ],
        "not_in_index"  => [ 'id_voluntarios', 'id_estados', 'id_ciudades', 'nacimiento', 'id_sexos', 'id_disponibilidades', 'id_horarios', 'id_estudiantes', 'id_tipo_ayudas', 'terminos', 'ip', 'browser', 'created_at', 'created_by', 'updated_at', 'updated_by' ],
        "not_in_show"   => [ 'created_at', 'created_by', 'updated_at', 'updated_by', 'ip', 'browser' ],

        //
        // Buttons
        // ["print","create","edit","show","delete","search","advance-search"]

        "btn_in_index"  => [ "create", 'edit', "show", "search", "advance-search" ],
        "btn_in_show"   => [ "cancel", 'edit' ],
        // "btn_in_create" => ["create","cancel"],
        // "btn_in_edit"   => ["edit","cancel"],

    ];

    
}