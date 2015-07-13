<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoluntariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voluntarios', function(Blueprint $table)
		{
			$table->bigInteger('id_voluntarios', true);
			$table->bigInteger('id_estados')->nullable();
			$table->bigInteger('id_ciudades')->nullable();
			$table->bigInteger('id_causas');
			$table->string('nombre', 180);
			$table->string('apellidos', 180);
			$table->string('email', 180);
			$table->string('telefono', 12);
			$table->integer('nacimiento')->nullable();
			$table->boolean('id_sexos')->nullable();
			$table->boolean('id_disponibilidades')->nullable();
			$table->boolean('id_horarios')->nullable();
			$table->boolean('id_estudiantes')->nullable();
			$table->boolean('id_tipo_ayudas')->nullable();
			$table->boolean('terminos')->default(1);
			$table->string('ip', 140);
			$table->text('browser');
			$table->boolean('aprobacion')->default(0);
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
		Schema::drop('voluntarios');
	}

}
