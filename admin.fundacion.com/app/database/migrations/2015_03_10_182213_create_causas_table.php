<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCausasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('causas', function(Blueprint $table)
		{
			$table->integer('id_causas', true);
			$table->string('titulo', 100);
			$table->date('fecha');
			$table->text('descripcion')->nullable();
			$table->integer('meta');
			$table->boolean('orden')->nullable()->default(0);
			$table->integer('recaudado')->nullable();
			$table->integer('facebook')->nullable();
			$table->integer('twitter')->nullable();
			$table->integer('me_gustas_interno')->nullable();
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
		Schema::drop('causas');
	}

}
