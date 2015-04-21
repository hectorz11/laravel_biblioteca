<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ClasificacionTableSeeder');
		$this->call('EstadoTableSeeder');
		$this->call('TipoTableSeeder');
		$this->call('UbicacionTableSeeder');
	}

}
