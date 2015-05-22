<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMuroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('muro', function(Blueprint $table)
		{
			$table->integer('id_momento', true);
			$table->integer('anio');
			$table->string('titulo', 150);
			$table->text('descripcion');
			$table->integer('id_categoria');
			$table->integer('parent')->default(0);
			$table->text('imagen');
			$table->boolean('orden');
			$table->bigInteger('me_gusta_interno');
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
		Schema::drop('muro');
	}

}
