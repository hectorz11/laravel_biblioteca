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
				'libro_create' => 1,
				'libro_update' => 1,
				'libro_delete' => 1,
				'periodico' => 1,
				'periodico_create' => 1,
				'periodico_update' => 1,
				'periodico_delete' => 1,
				'clasificacion' => 1,
				'clasificacion_create' => 1,
				'clasificacion_update' => 1,
				'clasificacion_delete' => 1,
				'estado' => 1,
				'estado_create' => 1,
				'estado_update' => 1,
				'estado_delete' => 1,
				'tipo' => 1,
				'tipo_create' => 1,
				'tipo_update' => 1,
				'tipo_delete' => 1,
				'ubicacion' => 1,
				'ubicacion_create' => 1,
				'ubicacion_update' => 1,
				'ubicacion_delete' => 1,
				'comentario' => 1,
				'comentario_create' => 1,
				'comentario_update' => 1,
				'comentario_delete' => 1,
				'usuario' => 1,
				'usuario_create' => 1,
				'usuario_update' => 1,
				'usuario_delete' => 1,
				'grupo' => 1,
				'grupo_create' => 1,
				'grupo_update' => 1,
				'grupo_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper',
			'permissions' => array(
				'admin' => 1,
				'libro' => 1,
				'libro_create' => 1,
				'libro_update' => 1,
				'libro_delete' => 1,
				'periodico' => 1,
				'periodico_create' => 1,
				'periodico_update' => 1,
				'periodico_delete' => 1,
				'clasificacion' => 1,
				'clasificacion_create' => 1,
				'clasificacion_update' => 1,
				'clasificacion_delete' => 1,
				'estado' => 1,
				'estado_create' => 1,
				'estado_update' => 1,
				'estado_delete' => 1,
				'tipo' => 1,
				'tipo_create' => 1,
				'tipo_update' => 1,
				'tipo_delete' => 1,
				'ubicacion' => 1,
				'ubicacion_create' => 1,
				'ubicacion_update' => 1,
				'ubicacion_delete' => 1,
				'comentario' => 1,
				'comentario_create' => 1,
				'usuario' => 1,
				'usuario_create' => 1,
				'usuario_update' => 1,
				'usuario_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_libro',
			'permissions' => array(
				'admin' => 1,
				'libro' => 1,
				'libro_create' => 1,
				'libro_update' => 1,
				'libro_delete' => 1,
				'clasificacion' => 1,
				'clasificacion_create' => 1,
				'clasificacion_update' => 1,
				'clasificacion_delete' => 1,
				'estado' => 1,
				'estado_create' => 1,
				'estado_update' => 1,
				'estado_delete' => 1,
				'tipo' => 1,
				'ubicacion' => 1,
				'ubicacion_create' => 1,
				'ubicacion_update' => 1,
				'ubicacion_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_periodico',
			'permissions' => array(
				'admin' => 1,
				'periodico' => 1,
				'periodico_create' => 1,
				'periodico_update' => 1,
				'periodico_delete' => 1,
				'clasificacion' => 1,
				'clasificacion_create' => 1,
				'clasificacion_update' => 1,
				'clasificacion_delete' => 1,
				'estado' => 1,
				'estado_create' => 1,
				'estado_update' => 1,
				'estado_delete' => 1,
				'tipo' => 1,
				'tipo_create' => 1,
				'tipo_update' => 1,
				'tipo_delete' => 1,
				'ubicacion' => 1,
				'ubicacion_create' => 1,
				'ubicacion_update' => 1,
				'ubicacion_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'user',
			'permissions' => array(
				'user' => 1,
				'comentario' => 1,
				'comentario_create' => 1,
				'comentario_update' => 1,
				'comentario_delete' => 1,
			)
		));
	}
}