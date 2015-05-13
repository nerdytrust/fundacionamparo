<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCausasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('causas', function(Blueprint $table)
		{
			$table->foreign('id_categoria', 'causas_ibfk_1')->references('id_categoria')->on('categorias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('causas', function(Blueprint $table)
		{
			$table->dropForeign('causas_ibfk_1');
		});
	}

}
