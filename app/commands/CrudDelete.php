<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudDelete extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:delete';
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
            Filters and permissions
        */
        $models     = explode(",", $this->argument("models"));

        foreach ($models as $name) {

            $name   = strtolower($name);
            $camel  = ucwords(camel_case(($name)));

            $controller = ucwords(camel_case($name))."Controller.php";
            $model      = ucwords(camel_case($name)).".php";    
            $seeder     = ucwords(camel_case($name))."TableSeeder.php";

            $success = File::deleteDirectory(app_path("views/".$name));

            $files = [
                        app_path("controllers")."/".$controller,
                        app_path("models")."/".$model,
                        app_path("database/seeds")."/".$seeder
                     ];

            File::delete($files);
            Schema::dropIfExists($name);
            
            if($success)
                $this->line("$name deleted successfully");


            // delete migrations files
            $path  = $this->getPath("database/migrations/");
            $files = File::files($path);

            $regex = "/_(create|update)_".($name)."_table.php/";

            $migrations        = _in_array_match($regex, $files);
            $migrations_delete = [];
            dd($migrations);
            foreach ($migrations as $migration) 
                $migrations_delete[] = $path.$migration;
            
            File::delete($migrations_delete);

        }


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
