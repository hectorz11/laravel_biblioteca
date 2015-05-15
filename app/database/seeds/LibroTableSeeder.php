<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LibroTableSeeder extends Seeder {

	public function run()
	{
		DB::table('libros')->delete();
		$faker = Faker::create('en_US');

		for($i = 0; $i<25; $i++) {

			$libro = new Libro;
			$libro->codigo = $faker->unique()->randomNumber($nbDigits = 8);
			$libro->autores = $faker->firstName.' '.$faker->lastName;
			$libro->titulo = $faker->sentence($nbWords = 6);
			$libro->edicion = $faker->randomNumber($nbDigits = 3);
			$libro->anio = $faker->year($max = 'now');
			$libro->contenido = $faker->text;
			$libro->foto = $faker->image;
			$libro->ubicacion_id = 2;
			$libro->estado_id = $faker->randomElement($array = array('1','2','3','4','5','6','7'));
			$libro->clasificacion_id = $faker->randomElement($array = array('1','2'));
			$libro->descripcion = implode($faker->paragraphs(3));
			$libro->observaciones = implode($faker->paragraphs(2));
			$libro->save();
		}
	}
}