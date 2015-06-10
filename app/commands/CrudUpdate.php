<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudUpdate extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:update';
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

            $name     = strtolower($name);
            $camel   = ucwords(camel_case(($name)));

            if($this->createMigration($name))
                $this->line("$name migration was created");

        }


    }


    protected function createMigration($name)
    {
        $name     = strtolower($name);
        //$plural   = str_plural($name);

        $path = $this->getPath("database/migrations/");
        $files = File::files($path);

        $hora = date('His');
        $date = date('Y_m_d_');
        $file = $date.$hora."_update_".$name."_".$hora."_table.php";


        $controller = File::get($this->getPath("commands/templates/update.crud"));

        $search  = array(
            '{{Controller}}',
            '{{primaryKey}}',
            '{{table}}',
        );

        $replace = array(
          ucwords(camel_case($name)).$hora,   
          'id_'.$name,
          $name
        );

        $content = str_replace($search, $replace, $controller);

        return $this->createFile("database/migrations",$file,$content); 

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
