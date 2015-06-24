<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		
		$groupAdmin = Sentry::findGroupByName('admin');
		$groupHelper = Sentry::findGroupByName('helper');
		$groupHelperLibro = Sentry::findGroupByName('helper_libro');
		$groupHelperPeriodico = Sentry::findGroupByName('helper_periodico');
		$groupUser = Sentry::findGroupByName('user');

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'admin@gmail.com',
			'first_name' => 'Archivo',
			'last_name' => 'Regional Tacna',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupAdmin);

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'norberto.lanchipa@gmail.com',
			'first_name' => 'Norberto',
			'last_name' => 'Lanchipa Palza',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupHelper);

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'milagros.liendo@gmail.com',
			'first_name' => 'Milagros',
			'last_name' => 'Liendo',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupHelperLibro);

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'laura.salas@gmail.com',
			'first_name' => 'Laura',
			'last_name' => 'Salas',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupHelperPeriodico);

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'wilton.condori@gmail.com',
			'first_name' => 'Wilton',
			'last_name' => 'Condori Sahua',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupUser);

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'mirella.lanchipa@gmail.com',
			'first_name' => 'Mirella',
			'last_name' => 'Lanchipa Palza',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupUser);
	}
}