<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBecasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('becas', function(Blueprint $table)
		{
			$table->bigInteger('id_becas', true);
			$table->boolean('lugar_estudio');
			$table->bigInteger('id_paises');
			$table->bigInteger('id_estados');
			$table->bigInteger('id_ciudades')->nullable();
			$table->string('nombre', 180);
			$table->string('apellidos', 180);
			$table->string('email', 180);
			$table->string('telefono', 12);
			$table->integer('nacimiento');
			$table->string('sexo', 50);
			$table->string('escuela', 180);
			$table->string('turno', 25);
			$table->string('promedio', 25);
			$table->text('motivo');
			$table->boolean('terminos')->default(1);
			$table->boolean('otorgada')->default(0);
			$table->boolean('rechazada')->default(0);
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
		Schema::drop('becas');
	}

}
