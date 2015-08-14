<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logfile', function(Blueprint $table)
		{
			$table->increments('id_logfile');
			$table->integer('primary_key');
			$table->string('table', 30);
			$table->string('action', 80);
			$table->string('ip', 20);
			$table->integer('created_by');
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
		Schema::drop('logfile');
	}

}
