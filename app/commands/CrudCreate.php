<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudCreate extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:create';
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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {

        $models     = explode(",", $this->argument("models"));

        if ($this->option('tables')) 
            $models = $this->getTables();


        foreach ($models as $name) {

            $name     = strtolower($name);
            $camel   = ucwords(camel_case(($name)));

            if($this->createModel($name))
                $this->line("$name Model was created");

            $this->createViews($name);

            if($this->createMigration($name))
                $this->line("$name migration was created");

            if($this->createSeed($name))
                $this->line("$name seeder was created");

        }



    }


    protected function createMigration($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);

        $path = $this->getPath("database/migrations/");
        $files = File::files($path);

        $regex = "/_create_".($name)."_table.php/";

        $date    = date('Y_m_d_His');
        $file = $date."_create_".$name."_table.php";


        if(in_array_match($regex, $files))    
        {
            $this->line("$file is already exist");
            return false;
        }

        $controller = File::get($this->getPath("commands/crud/template/migration.crud"));

        $search  = array(
            '{{Controller}}',
            '{{primaryKey}}',
            '{{table}}',
        );

        $replace = array(
          ucwords(camel_case($name)),   
          'id_'.$name,
          $name
        );

        $content = str_replace($search, $replace, $controller);

        return $this->createFile("database/migrations",$file,$content); 

    }

    protected function createSeed($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);

        $controller = File::get($this->getPath("commands/crud/template/seed.crud"));
        $search  = array(
            '{{Controller}}',
            '{{Model}}',
        );

        $replace = array(
          ucwords(camel_case($name)),  
          ucwords(camel_case($name))
        );
        $content = str_replace($search, $replace, $controller);
        
        return $this->createFile("database/seeds",ucwords(camel_case($name)."TableSeeder.php"),$content);
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

        $views = ["create","edit","index","show"];

        // $this->line("***** VIEWS *****");
        foreach ($views as $view) {
            $content = File::get($this->getPath("views/crud/".$view.".blade.php"));
            $this->createFile("views/admin/".$name,$view.".blade.php.rename","");
            
        }
        



    }

    protected function createModel($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);


        $controller = File::get($this->getPath("commands/crud/template/model.crud"));
        $search  = array(
            '{{Model}}',
            '{{primaryKey}}',
            '{{table}}',
        );

        $replace = array(
          ucwords(camel_case($name)),
          'id_'.$name,
          $name
        );
        $content = str_replace($search, $replace, $controller);
        
        return $this->createFile("models",ucwords(camel_case($name).".php"),$content);
    }

    protected function createController($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);

        $controller = File::get($this->getPath("commands/crud/template/controller.crud"));
        $search  = array(
            '{{Controller}}'
        );

        $replace = array(
          ucwords(camel_case($name))
        );
        $content = str_replace($search, $replace, $controller);

        return $this->createFile("controllers","admin/".ucwords(camel_case($name)."Controller.php"),$content);
    }


    protected function createFile($folder,$file,$content)
    {
        $path = $this->getPath($folder) ."/". ($file);
        if (File::exists($path)) {

            $this->line("$file is already exist");
            return false;

        } else {
            
            File::put($path, $content);
        }
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

           if($table->getName() !="migrations" and !File::exists($path))
                $return[] = $table->getName(); 
        }

        return $return;
    }
}
