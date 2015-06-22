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

		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('ClasificacionTableSeeder');
		$this->call('EstadoTableSeeder');
		$this->call('TipoTableSeeder');
		$this->call('UbicacionTableSeeder');
		$this->call('LibroTableSeeder');
		$this->call('PeriodicoTableSeeder');
		$this->call('ComentarioTableSeeder');
	}

}
