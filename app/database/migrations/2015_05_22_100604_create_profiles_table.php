<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_registrados');
			$table->string('provider');
			$table->string('identifier');
			$table->string('webSiteURL')->nullable();
			$table->string('profileURL')->nullable();
			$table->string('photoURL')->nullable();
			$table->string('displayName')->nullable();
			$table->text('description')->nullable();
			$table->string('firstName')->nullable();
			$table->string('lastName')->nullable();
			$table->string('gender')->nullable();
			$table->string('language')->nullable();
			$table->string('age')->nullable();
			$table->string('birthDay')->nullable();
			$table->string('birthMonth')->nullable();
			$table->string('birthYear')->nullable();
			$table->string('email')->nullable();
			$table->string('emailVerified')->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('country')->nullable();
			$table->string('region')->nullable();
			$table->string('city')->nullable();
			$table->string('zip')->nullable();
			$table->string('username')->nullable();
			$table->string('coverInfoURL')->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
