<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacto', function(Blueprint $table)
		{
			$table->integer('id_contacto', true);
			$table->string('nombre', 100);
			$table->string('telefono', 30);
			$table->string('correo', 80);
			$table->text('mensaje');
			$table->string('ip', 140)->nullable();
			$table->text('browser');
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
		Schema::drop('contacto');
	}

}
