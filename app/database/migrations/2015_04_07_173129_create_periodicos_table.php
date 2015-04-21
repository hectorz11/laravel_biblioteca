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
			$table->timestamps();

			$table->foreign('estado_id')->references('id')->on('estados');
			$table->foreign('clasificacion_id')->references('id')->on('clasificaciones');
			$table->foreign('tipo_id')->references('id')->on('tipos');
			$table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
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
