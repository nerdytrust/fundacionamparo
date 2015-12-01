<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistradosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrados', function(Blueprint $table)
		{
			$table->bigInteger('id_registrados', true);
			$table->string('email', 150);
			$table->string('password');
			$table->text('remember_token')->nullable();
			$table->boolean('terminos')->nullable()->default(0);
			$table->bigInteger('me_gusta')->default(0);
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registrados');
	}

}
