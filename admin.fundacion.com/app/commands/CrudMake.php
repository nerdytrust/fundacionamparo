<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudMake extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:make';
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

        $tables = $this->getTables();

        foreach ($tables as $table)
            Schema::dropIfExists($table);
    
        Artisan::call('dump-autoload'); // refresh config
        Artisan::call('migrate'); // create tables
        // https://github.com/schickling/laravel-backup
        Artisan::call('db:restore'); // restore tables data

    }


    protected function getTables()
    {
        $tables = $this->schema->listTables();

        $return = [];

        foreach ($tables as $table) 
            $return[] = $table->getName(); 

        return $return;
    }


}
