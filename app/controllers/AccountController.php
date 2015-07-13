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

					if($sentry->hasAnyAccess(['admin'])) {
						return Redirect::route('/');
					} else if($sentry->hasAnyAccess(['user'])) {
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
			return Redirect::route('/')
			->withErrors($respuesta['mensaje'])->withInput();
		} else {
			$user = $respuesta['data'];
			$data['activationCode'] = $user->GetActivationCode();
			$data['email'] = Input::get('email');
			$data['userId'] = $user->getId();
			$data['password'] = Input::get('password');

			Mail::send('emails.auth.registro_confirmado', $data, function($m) use ($data) {
				$m->to($data['email'])->subject('Gracias por registrarse - Support Team ART');
			});

			return Redirect::route('/')
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}

	public function postUsuarioUpdate($id)
	{
		if(Sentry::check()) {
			$respuesta = User::editarUsuario(Input::all(), $id);
			if($respuesta['error'] == true) {
				return Redirect::route('/')->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('/')
				->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
			}
		} else {
			return Rdirect::route('/')
			->with(['mensaje' => 'ingrese como usuario', 'class' => 'danger']);
		}
	}

	public function getRegistroActivated($userId, $activationCode)
	{
		$user = Sentry::findUserById($userId);
		if($user->attemptActivation($activationCode)) {
			return Redirect::route('/')
			->with('mensaje', 'La activación de usuario fue un éxito, porfavor ingresa arriba.')
			->with('class', 'success');
		} else {
			return Redirect::route('/')
			->with('mensaje', 'No se puede activar el usuario inténtalo de nuevo más tarde o póngase en contacto con equipo de apoyo.')
			->with('class', 'danger');
		}
	}

}