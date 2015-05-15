<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		DB::table('groups')->delete();

		Sentry::createGroup(array(
			'name' 			=> 'admin',
			'permissions' 	=> array(
				'read' 	=> 1,
				'write' => 1
			)
		));

		Sentry::createGroup(array(
			'name' 			=> 'user',
			'permissions' 	=> array(
				'read' 	=> 1,
				'write' => 1
			)
		));
	}
}