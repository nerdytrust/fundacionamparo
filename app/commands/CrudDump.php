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
    protected $name = 'crud:dump';
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

        File::deleteDirectory(app_path("storage/dumps"),true);
        Artisan::call('db:backup');
    }

 

    protected function getOptions()
    {
        return [
            ['ignore', 'i', InputOption::VALUE_OPTIONAL, 'A list of Tables you wish to ignore, separated by a comma: users,posts,comments' ]
        ];
    }

}
