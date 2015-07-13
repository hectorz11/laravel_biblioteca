<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		DB::table('groups')->delete();
		DB::table('users_groups')->delete();

		Sentry::createGroup(array(
			'name' => 'admin',
			'permissions' => array(
				'admin' => 1,
				'libro' => 1,
				'libro.create' => 1,
				'libro.update' => 1,
				'libro.delete' => 1,
				'periodico' => 1,
				'periodico.create' => 1,
				'periodico.update' => 1,
				'periodico.delete' => 1,
				'clasificacion' => 1,
				'clasificacion.create' => 1,
				'clasificacion.update' => 1,
				'clasificacion.delete' => 1,
				'estado' => 1,
				'estado.create' => 1,
				'estado.update' => 1,
				'estado.delete' => 1,
				'tipo' => 1,
				'tipo.create' => 1,
				'tipo.update' => 1,
				'tipo.delete' => 1,
				'ubicacion' => 1,
				'ubicacion.create' => 1,
				'ubicacion.update' => 1,
				'ubicacion.delete' => 1,
				'comentario' => 1,
				'comentario.create' => 1,
				'comentario.update' => 1,
				'comentario.delete' => 1,
				'usuario' => 1,
				'usuario.create' => 1,
				'usuario.update' => 1,
				'usuario.delete' => 1,
				'grupo' => 1,
				'grupo.create' => 1,
				'grupo.update' => 1,
				'grupo.delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper',
			'permissions' => array(
				'admin' => 1,
				'libro' => 1,
				'libro.create' => 1,
				'libro.update' => 1,
				'libro.delete' => 1,
				'periodico' => 1,
				'periodico.create' => 1,
				'periodico.update' => 1,
				'periodico.delete' => 1,
				'clasificacion' => 1,
				'clasificacion.create' => 1,
				'clasificacion.update' => 1,
				'clasificacion.delete' => 1,
				'estado' => 1,
				'estado.create' => 1,
				'estado.update' => 1,
				'estado.delete' => 1,
				'tipo' => 1,
				'tipo.create' => 1,
				'tipo.update' => 1,
				'tipo.delete' => 1,
				'ubicacion' => 1,
				'ubicacion.create' => 1,
				'ubicacion.update' => 1,
				'ubicacion.delete' => 1,
				'comentario' => 1,
				'comentario.delete' => 1,
				'usuario' => 1,
				'usuario.create' => 1,
				'usuario.update' => 1,
				'usuario.delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_libro',
			'permissions' => array(
				'admin' => 1,
				'helper_libro' => 1,
				'libro' => 1,
				'libro.create' => 1,
				'libro.update' => 1,
				'libro.delete' => 1,
				'clasificacion' => 1,
				'clasificacion.create' => 1,
				'clasificacion.update' => 1,
				'clasificacion.delete' => 1,
				'estado' => 1,
				'estado.create' => 1,
				'estado.update' => 1,
				'estado.delete' => 1,
				'tipo' => 1,
				'ubicacion' => 1,
				'ubicacion.create' => 1,
				'ubicacion.update' => 1,
				'ubicacion.delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_periodico',
			'permissions' => array(
				'admin' => 1,
				'periodico' => 1,
				'periodico.create' => 1,
				'periodico.update' => 1,
				'periodico.delete' => 1,
				'clasificacion' => 1,
				'clasificacion.create' => 1,
				'clasificacion.update' => 1,
				'clasificacion.delete' => 1,
				'estado' => 1,
				'estado.create' => 1,
				'estado.update' => 1,
				'estado.delete' => 1,
				'tipo' => 1,
				'tipo.create' => 1,
				'tipo.update' => 1,
				'tipo.delete' => 1,
				'ubicacion' => 1,
				'ubicacion.create' => 1,
				'ubicacion.update' => 1,
				'ubicacion.delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'user',
			'permissions' => array(
				'user' => 1,
				'comentario' => 1,
				'comentario.create' => 1,
				'comentario.update' => 1,
				'comentario.delete' => 1,
			)
		));
	}
}