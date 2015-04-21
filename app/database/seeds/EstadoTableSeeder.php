<?php

class EstadoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('estados')->delete();

		Estado::create(array(
			'nombre' => 'Nuevo',
		));

		Estado::create(array(
			'nombre' => 'Excelente',
		));

		Estado::create(array(
			'nombre' => 'En Buen Estado',
		));

		Estado::create(array(
			'nombre' => 'En Regular Estado',
		));

		Estado::create(array(
			'nombre' => 'En Mal Estado',
		));

		Estado::create(array(
			'nombre' => 'En Deterioro',
		));

		Estado::create(array(
			'nombre' => 'Dañado',
		));
	}
}