<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions_users', function(Blueprint $table)
		{
			$table->increments('id_permissions_users');
			$table->integer('id_permissions')->unsigned();
			$table->integer('id_users')->unsigned();
			$table->enum('deny', array('True','False'))->default('True');
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions_users');
	}

}
