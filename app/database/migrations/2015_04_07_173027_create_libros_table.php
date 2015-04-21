<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('libros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo');
			$table->string('autores')->nullable();
			$table->string('titulo')->nullable();
			$table->string('edicion')->nullable();
			$table->string('anio')->nullable();
			$table->string('contenido')->nullable();
			$table->string('foto')->nullable();
			$table->integer('ubicacion_id')->unsigned();
			$table->integer('estado_id')->unsigned();
			$table->integer('clasificacion_id')->unsigned();
			$table->string('descripcion')->nullable();
			$table->string('observaciones')->nullable();
			$table->timestamps();

			$table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
			$table->foreign('estado_id')->references('id')->on('estados');
			$table->foreign('clasificacion_id')->references('id')->on('clasificaciones');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('libros');
	}

}
