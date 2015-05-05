<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		ini_set('memory_limit', '-1');

        // Truncate all tables, except migrations
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {

            $key = key($table);
            if ($table->{$key} !== 'migrations')
                DB::table($table->{$key})->truncate();
        }


        // Find and run all seeders
        $classes = require base_path().'/vendor/composer/autoload_classmap.php';
        foreach ($classes as $class) {
            if (strpos($class, 'TableSeeder') !== false)
            {
                $seederClass = substr(last(explode('/', $class)), 0, -4);
                $this->call($seederClass);
            }
        }

        
	}

}
