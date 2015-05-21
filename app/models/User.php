<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User
{
	public static $login_rules = array(
		'email' => 'required|email',
		'password' => 'required'
	);

	public static $register_rules = array(
		'first_name' => 'required|min:2',
		'email' => 'required',
		'password' => 'required|min:6',
	);

	public static function registers($input)
	{
		$respuesta = array();
		$validacion = Validator::make($input, User::$login_rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$userGroup = Sentry::findGroupByName(Input::get('tipo'));

			$sentry = Sentry::getUserProvider()->create(array(
				'email' => Input::get('email'),
				'first_name' => Input::get('first_name'),
				'password' => Input::get('password'),
				'activated' => true 
			));
			$sentry->addGroup($userGroup);

			$respuesta['mensaje'] = 'el registro fue un exito! Bienvenido...';
			$respuesta['error'] = false;
		}
	}
}