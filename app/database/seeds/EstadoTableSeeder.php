<?php

class EstadoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('estados')->delete();

		Estado::create(array(
			'nombre' => 'Nuevo',
			'status' => 1
		));
		Estado::create(array(
			'nombre' => 'Excelente',
			'status' => 1
		));
		Estado::create(array(
			'nombre' => 'En Buen Estado',
			'status' => 1
		));
		Estado::create(array(
			'nombre' => 'En Regular Estado',
			'status' => 1
		));
		Estado::create(array(
			'nombre' => 'En Mal Estado',
			'status' => 1
		));
		Estado::create(array(
			'nombre' => 'En Deterioro',
			'status' => 1
		));
		Estado::create(array(
			'nombre' => 'Dañado',
			'status' => 1
		));
	}
}