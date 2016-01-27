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
			$table->bigInteger('id_apoyamos_causa', true);
			$table->string('nombre', 150);
			$table->string('telefono', 12);
			$table->string('email', 150);
			$table->integer('id_categorias');
			$table->text('descripcion');
			$table->boolean('aprobacion')->default(0);
			$table->string('ip', 140)->nullable();
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
