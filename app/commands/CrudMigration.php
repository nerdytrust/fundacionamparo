<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudMigration extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:migration';
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

        $this->removeModels();

        $this->addDefaultColumns();

        File::deleteDirectory(app_path("database/migrations"),true);

        $ignore = $this->getExcludedTables();    
        if(count($ignore) > 1)
            Artisan::call('migrate:generate',["--ignore"=> implode(",", $ignore)]); // create tables
        else
            Artisan::call('migrate:generate'); // create tables


        Artisan::call('crud:create',["--tables"=>"--tables"]);
        Artisan::call('crud:view',["--tables"=>"--tables"]);


        // File::deleteDirectory(app_path("storage/dumps"),true);
        // Artisan::call('db:backup');
    }


    protected function removeModels()
    {

        $directory = app_path("models");
        $files = File::allFiles($directory);

        $tables   = $this->getTables();
        $tables[] = "crud";
        $tables[] = "base_model";
        $tables[] = "currency";
        $tables[] = "profiles";

        $to_delete = [];
        foreach ($files as $file) {
            $pathinfo = pathinfo($file);
            $model    = $pathinfo['filename'];
            $table    = strtolower(snake_case($model));

            if(!in_array($table, $tables))
            {
                //echo $model."\n";
                // $to_delete[] = $file;
            }
                
        }
        File::delete($to_delete);


    }

    protected function addDefaultColumns()
    {
        $tables  = $this->getTables();
        $columns = [
                        "created_by" => "integer",
                        "updated_by" => "integer",

                        "created_at" => "datetime",
                        "updated_at" => "datetime",
                        
                    ];

        $default = [];

        $this->line("added default columns");

        foreach ($tables as $table) {
            $add_columns = [];

            foreach ($columns as $column => $type) {
                if (!Schema::hasColumn($table, $column))
                    $add_columns[$column] = $type;
            }

            if(count($add_columns) > 0)
                $this->line("$table");
            

            Schema::table($table, function($object_table) use($add_columns)
            {
                foreach ($add_columns as $column => $type)
                    $object_table->{$type}($column)->nullable();
                
            });
            
        }
        
    }

    protected function getTables()
    {
        $tables = $this->schema->listTables();

        $return = [];

        foreach ($tables as $table) 
        {
            if($table->getName() != "migrations")
                $return[] = $table->getName(); 
        }

        return $return;
    }

    protected function getExcludedTables()
    {
        $excludes = ['migrations'];
        $ignore = $this->option('ignore');
        if ( ! empty($ignore)) {
            return array_merge($excludes, explode(',', $ignore));
        }

        return $excludes;
    }

    protected function getOptions()
    {
        return [
            ['ignore', 'i', InputOption::VALUE_OPTIONAL, 'A list of Tables you wish to ignore, separated by a comma: users,posts,comments' ]
        ];
    }

}
