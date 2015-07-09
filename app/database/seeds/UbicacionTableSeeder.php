<?php

class UbicacionTableSeeder extends Seeder {

	public function run()
	{
		DB::table('ubicaciones')->delete();

		Ubicacion::create(array(
			'nombre' => 'Hemeroteca',
			'status' => 1
		));
		Ubicacion::create(array(
			'nombre' => 'Biblioteca',
			'status' => 1
		));
	}
}