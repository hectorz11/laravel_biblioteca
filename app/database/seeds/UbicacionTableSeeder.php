<?php

class UbicacionTableSeeder extends Seeder {

	public function run()
	{
		DB::table('ubicaciones')->delete();

		Ubicacion::create(array(
			'nombre' => 'Hemeroteca',
		));

		Ubicacion::create(array(
			'nombre' => 'Biblioteca',
		));
	}
}