<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donadores', function(Blueprint $table)
		{
			$table->integer('id_donadores', true);
			$table->string('nombre', 100)->nullable();
			$table->string('apellidos', 100)->nullable();
			$table->string('username', 80)->nullable();
			$table->text('avatar')->nullable();
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
		Schema::drop('donadores');
	}

}
