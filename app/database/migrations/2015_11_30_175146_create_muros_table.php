<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMurosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('muros', function(Blueprint $table)
		{
			$table->bigInteger('id_muros', true);
			$table->string('year', 140);
			$table->string('titulo', 150);
			$table->text('descripcion')->nullable();
			$table->integer('id_categorias');
			$table->bigInteger('parent')->nullable()->default(0);
			$table->text('imagen');
			$table->boolean('orden')->nullable()->default(0);
			$table->bigInteger('me_gusta')->default(0);
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
		Schema::drop('muros');
	}

}
