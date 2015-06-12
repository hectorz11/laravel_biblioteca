<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User
{
	public static $login_rules = array(
		'email' => 'required|email',
		'password' => 'required'
	);

	public static function registers($input)
	{
		$respuesta = array();
		$reglas = array(
			'first_name' => 'required|min:2',
			'last_name' => 'required|min:2',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);
		$validacion = Validator::make($input, $reglas);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$userGroup = Sentry::findGroupByName(Input::get('tipo'));
			$sentry = Sentry::getUserProvider()->create(array(
				'email' => Input::get('email'),
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'password' => Input::get('password'),
				'activated' => true
			));
			$sentry->addGroup($userGroup);

			$respuesta['mensaje'] = 'el registro fue un exito! Bienvenido...';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function editarUsuario($input, $id)
	{
		$respuesta = array();
		$reglas = array(
			'first_name' => 'required|min:2',
			'last_name' => 'required|min:2',
			'email' => 'required|email|unique:users,email,'.$id
		);
		$validacion = Validator::make($input, $reglas);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$user = Sentry::findUserById($id);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');

			if($user->save()) {
				$respuesta['mensaje'] = 'la modificacion fue un exito!';
				$respuesta['error'] = false;
			} else {
				$respuesta['mensaje'] = 'error, team noob!';
				$respuesta['error'] = false;
			}
		}
		return $respuesta;
	}
}