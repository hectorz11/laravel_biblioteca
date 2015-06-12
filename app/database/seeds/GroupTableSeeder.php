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
				'system' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper',
			'permissions' => array(
				'system.libro' => 1,
				'system.periodico' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_libro',
			'permissions' => array(
				'system.libro.create' => 1,
				'system.libro.update' => 1,
				'system.libro.delete' => 1,
				'system.libro.search' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_periodico',
			'permissions' => array(
				'system.periodico.create' => 1,
				'system.periodico.update' => 1,
				'system.periodico.delete' => 1,
				'system.periodico.search' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'user',
			'permissions' => array(
				'system.libro.search' => 1,
				'system.periodico.search' => 1,
			)
		));
	}
}