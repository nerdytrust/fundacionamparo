<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembresiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('membresias', function(Blueprint $table)
		{
			$table->integer('id_membresias', true);
			$table->string('nombre', 150);
			$table->text('resena');
			$table->text('url');
			$table->bigInteger('me_gusta')->nullable();
			$table->text('logo')->nullable();
			$table->boolean('orden')->nullable();
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
		Schema::drop('membresias');
	}

}
