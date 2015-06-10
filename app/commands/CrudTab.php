<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudTab extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:tab';
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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {

        /*
            Route
        */
        $route_path  = $this->getPath("routes.php");

        $routes     = File::get($route_path);
        $new_routes = "";

        /*
            Filters and permissions
        */
        $filter_path  = $this->getPath("filters.php");

        $filter     = File::get($filter_path);
        $new_filter = "";

        $models     = explode(",", $this->argument("models"));


        foreach ($models as $name) {

            $name     = strtolower($name);
            $camel   = ucwords(camel_case(($name)));

            if($this->createModel($name))
                $this->line("$name Model was created");

            if($this->createController($name))
                $this->line("$name Controller was created");

            $this->createViews($name);

            if($this->createMigration($name))
                $this->line("$name migration was created");

            if($this->createSeed($name))
                $this->line("$name seeder was created");



            if(!str_contains($name.'Controller', $routes))
            {
                $new_routes.= "\nRoute::resource('".($name)."', '".$camel."Controller');";
            }
            
            if(!str_contains(($name)."/index", $filter))
            {
                // $new_filter.= "\n";
                // $new_filter.= "\n/*";
                // $new_filter.= "\n|--------------------------------------------------------------------------";
                // $new_filter.= "\n| ".$name."Controller Permissions";
                // $new_filter.= "\n|--------------------------------------------------------------------------";
                // $new_filter.= "\n*/";

                // $new_filter.= "\nEntrust::routeNeedsPermission('".($name)."', '".($name)."/index');";
                // $new_filter.= "\nEntrust::routeNeedsPermission('".($name)."/create', '".($name)."/create');";
                // $new_filter.= "\nEntrust::routeNeedsPermission('".($name)."/*', '".($name)."/show');";
                // $new_filter.= "\nEntrust::routeNeedsPermission('".($name)."/*/edit', '".($name)."/edit');";
                // $new_filter.= "\nEntrust::routeNeedsPermission('".($name)."/*/destroy', '".($name)."/destroy');";
                // $new_filter.= "\n";
            
                // $permissions = new Permissions;

                // // index
                // $permissions->name = $name;
                // $permissions->display_name = $name;
                // $permissions->save();

                // // create
                // $permissions->name = strtolower($name)."/create";
                // $permissions->display_name = "Create";
                // $permissions->save();

                // // show
                // $permissions->name = strtolower($name)."/show";
                // $permissions->display_name = "Show";
                // $permissions->save();

                // // edit
                // $permissions->name = strtolower($name)."/edit";
                // $permissions->display_name = "Edit";
                // $permissions->save();

                // // destroy
                // $permissions->name = strtolower($name)."/destroy";
                // $permissions->display_name = "Destroy";
                // $permissions->save();
            }


        }

        /*
            Route
        */
        $new_routes = $routes.$new_routes;
        File::put($route_path, $new_routes);

        /*
            Filters and permissions
        */
        $new_filter = $filter.$new_filter;
        File::put($filter_path, $new_filter);

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

        $controller = File::get($this->getPath("commands/templates/migration.crud"));

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

        $controller = File::get($this->getPath("commands/templates/seed.crud"));
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

        if (!File::isDirectory($this->getPath("views/".$name))) {
            File::makeDirectory($this->getPath("views/".$name), $mode = 0777, true, true);
        }

        if (!File::isDirectory($this->getPath("views/".$name."/tabs"))) {
            File::makeDirectory($this->getPath("views/".$name."/tabs"), $mode = 0777, true, true);
        }

        $views = ["create","edit","index","show"];

        // $this->line("***** VIEWS *****");
        foreach ($views as $view) {
            $content = File::get($this->getPath("views/crud/".$view.".blade.php"));
            $this->createFile("views/".$name,$view.".blade.php.rename","");
            
        }
        



    }

    protected function createModel($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);


        $controller = File::get($this->getPath("commands/templates/model.crud"));
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

        $controller = File::get($this->getPath("commands/templates/controller.crud"));
        $search  = array(
            '{{Controller}}'
        );

        $replace = array(
          ucwords(camel_case($name))
        );
        $content = str_replace($search, $replace, $controller);

        return $this->createFile("controllers",ucwords(camel_case($name)."Controller.php"),$content);
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
