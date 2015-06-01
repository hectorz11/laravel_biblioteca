<?php

class AccountController extends BaseController {

	public function postLogin()
	{
		$validation = Validator::make(Input::all(), User::$login_rules);
		if($validation->fails()) {
			return Redirect::route('/')->withInput();
		} else {
			try {
				$credenciales = array(
					'email' => Input::get('email'),
					'password' => Input::get('password')
				);
				$sentry = Sentry::authenticate($credenciales, false);
				if(Sentry::check()) {
					$admin = Sentry::findGroupByName('admin');
					$user = Sentry::findGroupByName('user');

					if($sentry->inGroup($admin)) {
						return Redirect::route('/');
					} else if($sentry->inGroup($user)) {
						return Redirect::route('/');
					}
				} else {
					return Redirect::route('/')->withInput();
				}
			} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
		     	return Redirect::route('/')->withInput();
		    } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
		    	return Redirect::route('/')->withInput();
		    }
		}
	}

	public function getLogout()
	{
		Sentry::logout();
		return Redirect::route('/');
	}

	public function postRegister()
	{
		$respuesta = User::registers(Input::all());
		if($respuesta['error'] == true) {
			return Redirect::route('/')->withErrors($respuesta['mensaje'])->withInput();
		} else {
			$credenciales = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			$login = Sentry::authenticate($credenciales, false);
			if(Sentry::check()) {
				$user = Sentry::findGroupByName('user');
				if($login->inGroup($user)) {
					return Redirect::route('/')->with('mensaje', $respuesta['mensaje'])->with('class', 'success');
				} else {
					return Redirect::route('/')->with('mensaje', 'no existe el grupo user')->with('class', 'danger');
				}
			} else {
				return Redirect::route('/')->with('mensaje', 'no se pudo autenticar')->with('class', 'warning');
			}
		}
	}


}