<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Simple CRUD Command for laravel
 *
 * @author Vahid Mahdiun
*/

class CrudData extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:data';
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

        Artisan::call('dump-autoload'); // refresh config
        //https://github.com/schickling/laravel-backup
        Artisan::call('db:restore'); // call seeders

    }



}
