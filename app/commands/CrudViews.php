<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudViews extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:views';
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

        Artisan::call('crud:view',["--tables"=>"--tables"]);
    }

 


}
