<?php

use Illuminate\Console\Command;
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
        parent::__construct();
    }

    protected $inputs = [
        'password'        => '{{ Form::password("$name",["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        'remotecombo'     => '{{ Form::remotecombo("$name",$record->$name,["model"=>"$model","class" => "form-control","placeholder"=>"$placeholder"] ); }}',
        'text'            => '{{ Form::text("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        'email'           => '{{ Form::email("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"]); }}',
        'number'          => '{{ Form::number("$name",$record->$name,["placeholder"=>"$placeholder"]); }}',
        'textarea'        => '{{ Form::textarea("$name", $record->$name,["placeholder"=>"$placeholder"]) }}',
        'select'          => '{{ Form::combo("$name",$record->$name,["class" => "form-control","placeholder"=>"$placeholder"],$column->$name); }}',
        'date'            => '{{ Form::date("$name",$record->name,["class"=>"form-control","placeholder"=>$placeholder]) }}',
        'datetime'        => '{{ Form::datetime("$name",$record->name,["class"=>"form-control","placeholder"=>"$placeholder"]) }}',
        'time'            => '{{ Form::time("$name",$record->name,["class"=>"form-control","placeholder"=>"$placeholder"]) }}',

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

        $views = ["create"/*,"edit","index","show"*/];
        $camel   = ucwords(camel_case(($name)));
        $class = new  $camel;

        // $this->line("***** VIEWS *****");
        foreach ($views as $view) {

            $columns  = $class->getColumnsByView($view);

            $inputs = $this->makeInputs($columns);

            $content = File::get($this->getPath("commands/crud/template/".$view.".crud"));
            $content = str_replace(['$inputs'], [$inputs], $content);

            $this->createFile("views/admin/".$name,$view.".blade.php.rename",$content);
            
        }
        
    }

    protected function getInput($column)
    {
        $input = $this->inputs[$column->input];

        $search  = array(
            '$placeholder',
            '$name',
            '$data',
            '$model'
        );
        $replace = array(
          $column->label,
          $column->name,
          "[]",
          $column->model,
        );


        return str_replace($search, $replace, $input);

    }

    protected function makeInputs($columns)
    {

        $content = "";

        foreach ($columns as $column) {

            $input_template = File::get($this->getPath("commands/crud/template/input.crud"));

            if(!$column->is_primary)
            {
                $search  = array(
                    '$name',
                    '$kind',
                    '$label',
                    '$input',
                    '$data',
                    '$model'
                );

                if($column->is_foreign_key)
                  $column->input = "remotecombo";

                $replace = array(
                  $column->name,
                  $column->input,
                  $column->label,
                  $this->getInput($column),
                  "[]",
                  $column->model,
                );

                $content.= str_replace($search, $replace, $input_template);
            }
        }

        return $content;
    }


    protected function createFile($folder,$file,$content)
    {
        $path = $this->getPath($folder) ."/". ($file);
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
            array('models', InputArgument::REQUIRED, 'set your mock models e.g. crud:generate user,company,category'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }
}
