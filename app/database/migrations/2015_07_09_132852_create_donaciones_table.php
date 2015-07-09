<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donaciones', function(Blueprint $table)
		{
			$table->bigInteger('id_donaciones', true);
			$table->string('email', 150)->nullable();
			$table->integer('id_causas');
			$table->bigInteger('monto_donacion');
			$table->text('reference_id');
			$table->string('transaction_id', 150)->nullable();
			$table->string('transaction_brand', 25)->nullable();
			$table->string('transaction_type', 50)->nullable();
			$table->boolean('status')->default(0);
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
		Schema::drop('donaciones');
	}

}
