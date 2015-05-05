<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$admons =[
			[
				"first_name" => "Carlos",
				"last_name"	=> "Cuellar",
				"email"		=> "ccuellarlira@gmail.com"
			],
			[
				"first_name" => "Erick",
				"last_name"	=> "Vizcaya",
				"email"		=> "erick@vizcaya.pro"
			],
			[
				"first_name" => "Miguel",
				"last_name"	=> "Martinez",
				"email"		=> "natacion@gmail.com"
			],
			[
				"first_name" => "Eric",
				"last_name"	=> "Bravo",
				"email"		=> "eric.bravo.rod@gmail.com"
			],

		];

		foreach ($admons as $user) {

            Users::create([
                'first_name'    => $user["first_name"],
                'last_name'     => $user["last_name"],
                'sex'           => $faker->randomElement(['Male','Female']),
                'email'         => $user["email"],
                'id_roles'		=> 2,
                'password'      => "123456"
			]);
			# code...
		}

	}

}