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
			$table->string('nombre', 100)->nullable();
			$table->string('telefono', 30)->nullable();
			$table->string('correo', 80)->nullable();
			$table->text('mensaje')->nullable();
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
