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
					$groupAdmin = Sentry::findGroupByName('admin');
					$groupHelper = Sentry::findGroupByName('helper');
					$groupHelperLibro = Sentry::findGroupByName('helper_libro');
					$groupHelperPeriodico = Sentry::findGroupByName('helper_periodico');
					$groupUser = Sentry::findGroupByName('user');

					if($sentry->inGroup($groupAdmin)) {
						return Redirect::route('/')->with('mensaje', 'bienvenido administrador')->with('class', 'info');
					} else if($sentry->inGroup($groupHelper)) {
						return Redirect::route('/')->with('mensaje', 'bienvenido colaborador')->with('class', 'info');
					} else if($sentry->inGroup($groupHelperLibro)) {
						return Redirect::route('/')->with('mensaje', 'bienvenido colaborador de libro')->with('class', 'info');
					} else if($sentry->inGroup($groupHelperPeriodico)) {
						return Redirect::route('/')->with('mensaje', 'bienvenido colaborador de periodico')->with('class', 'info');
					} else if($sentry->inGroup($groupUser)) {
						return Redirect::route('/')->with('mensaje', 'bienvenido usuario')->with('class', 'info');
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

	public function postUsuarioUpdate($id)
	{
		if(Sentry::check()) {
			$respuesta = User::editarUsuario(Input::all(), $id);
			if($respuesta['error'] == true) {
				return Redirect::route('/')->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('/')->with('mensaje', $respuesta['mensaje'])->with('class', 'success');
			}
		} else {
			return Rdirect::route('/')
			->with(array('mensaje' => 'ingrese como usuario', 'class' => 'danger'));
		}
	}


}