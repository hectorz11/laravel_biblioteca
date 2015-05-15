<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		
		$adminGroup = Sentry::findGroupByName('admin');
		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'hector.rz11@gmail.com',
			'first_name' => 'Hector Raul',
			'last_name' => 'Zapana Condori',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($adminGroup);
		$sentry->GetActivationCode();

		$adminGroup = Sentry::findGroupByName('user');
		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'norberto.lanchipa@gmail.com',
			'first_name' => 'Norberto',
			'last_name' => 'Lanchipa Palza',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($adminGroup);
		$sentry->GetActivationCode();
	}
}