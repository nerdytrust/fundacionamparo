<?php

class Profiles extends Crud {


    protected $primaryKey = 'id_profiles'; // !important

    protected $table = 'profiles';

    protected $fillable = array( 'provider', 'id_registrados' );

    public function user() {
        return $this->belongsTo( 'Registrados', 'id_registrados', 'id_registrados' );
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
        // Columns enable by view
        // Default enable all columns
        //
        "create"    => [],
        "edit"      => [],
        "index"     => ['id_profiles','provider','displayName','firstName','lastName','email'],
        "show"      => [],

        
        // "not_in_create" => ["created_at","updated_at"],
        // "not_in_edit"   => ["created_at","updated_at"],
        //"not_in_index"  => ["created_at","updated_at"],
        //"not_in_show"   => ["created_at","updated_at"],

        //
        // Buttons
        //

        "btn_in_index"  => ["show","search"],
        // "btn_in_show"   => [],
        // "btn_in_create" => [],
        // "btn_in_edit"   => [],

        // HAS_ONE, HAS_MANY, BELONGS_TO
        // "role"      => self::BELONGS_TO,

        "relations" => []

    ];
}