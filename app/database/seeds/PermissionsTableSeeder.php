<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$permissions =[
			[
				"name" 					=> "User",
				"display_name"  		=> "User",
				"id_parent_permissions" => 0
			],

			[
				"name" 					=> "Roles",
				"display_name"  		=> "Roles",
				"id_parent_permissions" => 0
			],

			[
				"name" 					=> "user/create",
				"display_name"  		=> "Create",
				"id_parent_permissions" => 1
			],
			[
				"name" 					=> "user/show",
				"display_name"  		=> "Show",
				"id_parent_permissions" => 1
			],
			[
				"name" 					=> "user/edit",
				"display_name"  		=> "Edit",
				"id_parent_permissions" => 1
			],

			[
				"name" 					=> "user/destroy",
				"display_name"  		=> "Destroy",
				"id_parent_permissions" => 1
			],


			[
				"name" 					=> "role/create",
				"display_name"  		=> "Create",
				"id_parent_permissions" => 2
			],
			[
				"name" 					=> "role/show",
				"display_name"  		=> "Show",
				"id_parent_permissions" => 2
			],
			[
				"name" 					=> "role/edit",
				"display_name"  		=> "Edit",
				"id_parent_permissions" => 2
			],

			[
				"name" 					=> "role/destroy",
				"display_name"  		=> "Destroy",
				"id_parent_permissions" => 2
			],
		];

		foreach ($permissions as $permission) {

            Permissions::create([
				"name" 					=> $permission["name"],
				"display_name"  		=> $permission["display_name"],
				"id_parent_permissions" => $permission["id_parent_permissions"]
			]);
			# code...
		}


	}

}