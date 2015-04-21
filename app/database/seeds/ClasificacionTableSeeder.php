<?php

class ClasificacionTableSeeder extends Seeder {

	public function run()
	{
		DB::table('clasificaciones')->delete();

		Clasificacion::create(array(
			'nombre' => 'Original',
		));

		Clasificacion::create(array(
			'nombre' => 'Fotocopia',
		));
	}
}