<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudView extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:view';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Mock for each Model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->schema = \DB::getDoctrineSchemaManager();
        parent::__construct();
    }

    protected $inputs = [
        'hidden'          => '{{ Form::hidden("$name",$record->$name); }}',
        'password'        => '{{ Form::password("$name",["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        
        'remotecombo'     => '{{ Form::remotecombo("$name",$record->$name,["table"=>$model,"class" => "form-control","placeholder"=>"$placeholder"] ); }}',
        'combo'           => '{{ Form::combo("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"],$columns->$name->data ); }}',
        'select'          => '{{ Form::combo("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"],$columns->$name->data ); }}',
        
        'text'            => '{{ Form::text("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        'textarea'        => '{{ Form::textarea("$name", $record->$name,["class" => "form-control","placeholder"=>"$placeholder"]) }}',
        'html'            => '{{ Form::editor("$name",$record->$name,[]); }}',
        'editor'          => '{{ Form::editor("$name",$record->$name,[]); }}',

        'radios'          => '{{ Form::radiogroup("$name",$record->$name,[],$columns->$name->data); }}',
        'radiogroup'      => '{{ Form::radiogroup("$name",$record->$name,[],$columns->$name->data); }}',

        'email'           => '{{ Form::email("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',

        'number'          => '{{ Form::number("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        'money'           => '{{ Form::currency("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        'currency'        => '{{ Form::currency("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',

        'toggle'          => '{{ Form::toggle("$name",$record->$name,[],$columns->$name->data); }}',
        
        'date'            => '{{ Form::datepicker("$name",$record->$name,["class"=>"form-control","placeholder"=>"$placeholder"],"$input") }}',
        'datetime'        => '{{ Form::datepicker("$name",$record->$name,["class"=>"form-control","placeholder"=>"$placeholder"],"$input") }}',
        'time'            => '{{ Form::datepicker("$name",$record->$name,["class"=>"form-control","placeholder"=>"$placeholder"],"$input") }}',

        'audio'            => '{{ Form::filepicker("$name",$record->$name) }}',
        'image'            => '{{ Form::filepicker("$name",$record->$name) }}',
        'video'            => '{{ Form::filepicker("$name",$record->$name) }}',
        'document'         => '{{ Form::filepicker("$name",$record->$name) }}',
        'zip'              => '{{ Form::filepicker("$name",$record->$name) }}',
        'file'             => '{{ Form::filepicker("$name",$record->$name) }}'


    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {


        /*
            Filters and permissions
        */

        $models     = explode(",", $this->argument("models"));

        if ($this->option('tables')) 
            $models = $this->getTables();


        foreach ($models as $name) {

            $name     = strtolower($name);
            

            if($this->createViews($name))
                $this->line("$name migration was created");

        }


    }


    protected function createViews($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);

        if (!File::isDirectory($this->getPath("views/admin/".$name))) {
            File::makeDirectory($this->getPath("views/admin/".$name), $mode = 0777, true, true);
        }

        if (!File::isDirectory($this->getPath("views/admin/".$name."/tabs"))) {
            File::makeDirectory($this->getPath("views/admin/".$name."/tabs"), $mode = 0777, true, true);
        }

        $views = ["create","edit","show","index"];
        $camel = ucwords(camel_case(($name)));

        $class = new $camel();



        // $this->line("***** VIEWS *****");

        if(method_exists($class,"getColumnsByView"))
        {
            foreach ($views as $view) {

                $columns  = $class->getColumnsByView($view);
                $content = File::get($this->getPath("commands/templates/views/".$view.".crud"));

                if($view == "index")
                {

                    $index_records = $this->makeColumns($columns,"index-records");
                    $content       = str_replace(['$index_records'], [$index_records], $content);

                    $index_columns = $this->makeColumns($columns,"index-columns");
                    $content       = str_replace(['$index_columns'], [$index_columns], $content);
                }
                else    
                {
                    $inputs = $this->makeInputs($columns,$view);
                    $content = str_replace(['$inputs'], [$inputs], $content);
                }
                    

                $this->createFile("views/admin/".$name,$view.".blade.php.rename",$content);
                
            }
        }

        
    }




    protected function makeColumns($columns,$view)
    {

        $content = "";

        foreach ($columns as $column) {

            $input_template = File::get($this->getPath("commands/templates/views/".$view.".crud"));
        

                $search  = array(
                    '$name',
                );

                $replace = array(
                  $column->name,
                );

                $content.= str_replace($search, $replace, $input_template);
            
        }

        return $content;
    }



    protected function getInput($column)
    {
        $input = $this->inputs[$column->input];

        $search  = array(
            '$placeholder',
            '$name',
            '$input'
        );
        $replace = array(
          $column->label,
          $column->name,
          $column->input,
        );


        return str_replace($search, $replace, $input);

    }



    protected function makeInputs($columns,$view)
    {

        $content = "";

        foreach ($columns as $column) {

            $is_primary = $column->is_primary;

            if($view == "show")
            {
                $is_primary = 0;
            }
                

            $input_template = File::get($this->getPath("commands/templates/views/".$view."-input.crud"));

            if(!$is_primary)
            {

                $is_label_primary_key  = "";
                $is_record_primary_key = "";

                if($column->is_primary)
                {
                    $is_label_primary_key  = "bg-primary h4";
                    $is_record_primary_key = "h4";
                }
        

                $search  = array(
                    '$name',
                    '$kind',
                    '$label',
                    '$input',
                    '$is_label_primary_key',
                    '$is_record_primary_key',
                );

                $input = "";

                if($view == "create" || $view == "edit" )
                    $input = $this->getInput($column);



                $replace = array(
                  $column->name,
                  $column->input,
                  $column->label,
                  $input,
                  $is_label_primary_key,
                  $is_record_primary_key
                );

                $content.= str_replace($search, $replace, $input_template);
            }
        }

        return $content;
    }


    protected function createFile($folder,$file,$content)
    {
        $path = $this->getPath($folder) ."/". ($file);

        File::delete($path);

        File::put($path, $content);
        return true;
    }


    protected function getPath($path)
    {
        return app_path($path);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('models', InputArgument::OPTIONAL, 'set your mock models e.g. crud:generate user,company,category'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['tables', 't', InputOption::VALUE_OPTIONAL, 'Generate models and views for all tables'],
        ];
    }



    protected function getTables()
    {

        $tables = $this->schema->listTables();
        $return = [];


        foreach ($tables as $table) {

           $path = $this->getPath("models") ."/". ucwords(camel_case($table->getName())).".php";

           if($table->getName() !="migrations" and File::exists($path))
                $return[] = $table->getName(); 
        }

        return $return;
    }
}
