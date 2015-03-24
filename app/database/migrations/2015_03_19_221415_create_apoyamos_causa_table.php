<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApoyamosCausaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apoyamos_causa', function(Blueprint $table)
		{
			$table->integer('id_apoyamos_causa', true);
			$table->string('nombre', 100)->nullable();
			$table->string('telefono', 30)->nullable();
			$table->string('correo', 100)->nullable();
			$table->enum('tipo_causa', array('Nueva'))->nullable();
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
		Schema::drop('apoyamos_causa');
	}

}
