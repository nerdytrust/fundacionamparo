<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$roles =[
			[
				"name" => "Guest",
			],
			[
				"name" => "Administrator",
			],

		];

		foreach ($roles as $role) {

            Roles::create([
                'name'    => $role["name"]
			]);
			# code...
		}


	}

}