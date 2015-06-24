<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComentarioTableSeeder extends Seeder {

	public function run()
	{
		DB::table('comentarios')->delete();
		$faker = Faker::create('en_US');

		for($i = 0; $i<10; $i++) {

			$comentario = new Comentario;
			$comentario->descripcion = implode($faker->paragraphs(7));
			$comentario->user_id = $faker->randomElement($array = array('5','6'));
			$comentario->status = 1;
			$comentario->save();
		}
	}
}