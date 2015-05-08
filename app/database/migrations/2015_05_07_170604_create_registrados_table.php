<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistradosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrados', function(Blueprint $table)
		{
			$table->bigInteger('id_registrados', true);
			$table->string('email', 150);
			$table->string('password', 150);
			$table->string('nombre', 200);
			$table->date('fecha_nacimiento');
			$table->text('id_fb');
			$table->text('avatar');
			$table->text('access_token_fb');
			$table->text('remember_token');
			$table->integer('ciudad');
			$table->integer('estado');
			$table->boolean('terminos')->default(0);
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
		Schema::drop('registrados');
	}

}
