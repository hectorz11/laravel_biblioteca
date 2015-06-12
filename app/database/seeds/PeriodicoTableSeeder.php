<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeriodicoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('periodicos')->delete();
		$faker = Faker::create('en_US');

		for($i = 0; $i<10; $i++) {

			$periodico = new Periodico;
			$periodico->volumen = $faker->randomNumber($nbDigits = 4);
			$periodico->nombre = $faker->sentence($nbWords = 3);
			$periodico->fecha_inicio = $faker->year($max = 'now');
			$periodico->fecha_final = $faker->year($max = 'now');
			$periodico->estado_id = $faker->randomElement($array = array('1','2','3','4','5','6','7'));
			$periodico->clasificacion_id = $faker->randomElement($array = array('1','2'));
			$periodico->tipo_id = $faker->randomElement($array = array('1','2','3','4','5'));
			$periodico->ubicacion_id = 1;
			$periodico->descripcion = implode($faker->paragraphs(3));
			$periodico->observaciones = implode($faker->paragraphs(2));
			$periodico->status = 1;
			$periodico->save();
		}
	}
}