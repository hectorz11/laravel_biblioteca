<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periodicos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('volumen')->nullable();
			$table->string('nombre')->nullable();
			$table->string('fecha_inicio')->nullable();
			$table->string('fecha_final')->nullable();
			$table->integer('estado_id')->unsigned();
			$table->integer('clasificacion_id')->unsigned();
			$table->integer('tipo_id')->unsigned();
			$table->integer('ubicacion_id')->unsigned();
			$table->string('descripcion')->nullable();
			$table->string('observaciones')->nullable();
			$table->integer('status')->unsigned();
			$table->timestamps();

			$table->foreign('estado_id')->references('id')->on('estados')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('clasificacion_id')->references('id')->on('clasificaciones')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('tipo_id')->references('id')->on('tipos')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('ubicacion_id')->references('id')->on('ubicaciones')
				->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('periodicos');
	}

}
