<?php

class TipoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tipos')->delete();

		Tipo::create(array(
			'nombre' => 'Diario',
			'status' => 1
		));
		Tipo::create(array(
			'nombre' => 'Semanario',
			'status' => 1
		));
		Tipo::create(array(
			'nombre' => 'Quincenario',
			'status' => 1
		));
		Tipo::create(array(
			'nombre' => 'Mensuario',
			'status' => 1
		));
		Tipo::create(array(
			'nombre' => 'Anuario',
			'status' => 1
		));
	}
}