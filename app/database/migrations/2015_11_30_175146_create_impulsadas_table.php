<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImpulsadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('impulsadas', function(Blueprint $table)
		{
			$table->bigInteger('id_impulsadas', true);
			$table->bigInteger('id_causas');
			$table->string('email', 180)->unique('email');
			$table->boolean('mostrar_perfil')->default(1);
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
		Schema::drop('impulsadas');
	}

}
