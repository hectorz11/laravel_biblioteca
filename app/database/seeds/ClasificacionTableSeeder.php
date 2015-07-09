<?php

class ClasificacionTableSeeder extends Seeder {

	public function run()
	{
		DB::table('clasificaciones')->delete();

		Clasificacion::create(array(
			'nombre' => 'Original',
			'status' => 1
		));
		Clasificacion::create(array(
			'nombre' => 'Fotocopia',
			'status' => 1
		));
	}
}