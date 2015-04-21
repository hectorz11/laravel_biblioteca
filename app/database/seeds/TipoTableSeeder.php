<?php

class TipoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tipos')->delete();

		Tipo::create(array(
			'nombre' => 'Diario',
		));

		Tipo::create(array(
			'nombre' => 'Semanario',
		));

		Tipo::create(array(
			'nombre' => 'Quincenario',
		));

		Tipo::create(array(
			'nombre' => 'Mensuario',
		));

		Tipo::create(array(
			'nombre' => 'Anuario',
		));
	}
}