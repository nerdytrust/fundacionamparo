<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCausasDonadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('causas_donadores', function(Blueprint $table)
		{
			$table->integer('id_donadores')->nullable();
			$table->integer('id_causas')->nullable();
			$table->integer('donacion')->nullable()->default(0);
			$table->enum('impulsor', array('Si','No'))->nullable()->default('No');
			$table->enum('volundario', array('Si','No'))->nullable()->default('No');
			$table->enum('donador', array('Si','No'))->nullable()->default('No');
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
		Schema::drop('causas_donadores');
	}

}
