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
			$table->text('contenido')->nullable();
			$table->string('foto')->nullable();
			$table->integer('ubicacion_id')->unsigned();
			$table->integer('estado_id')->unsigned();
			$table->integer('clasificacion_id')->unsigned();
			$table->text('descripcion')->nullable();
			$table->text('observaciones')->nullable();
			$table->integer('status')->unsigned();
			$table->timestamps();

			$table->foreign('ubicacion_id')->references('id')->on('ubicaciones')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('estado_id')->references('id')->on('estados')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('clasificacion_id')->references('id')->on('clasificaciones')
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
		Schema::drop('libros');
	}

}
