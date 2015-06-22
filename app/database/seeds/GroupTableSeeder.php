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
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper',
			'permissions' => array(
				'helper' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_libro',
			'permissions' => array(
				'helper_libro' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'helper_periodico',
			'permissions' => array(
				'helper_periodico' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'user',
			'permissions' => array(
				'user' => 1,
			)
		));
	}
}