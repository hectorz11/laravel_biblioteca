<?php

class Comentario extends Eloquent {

	protected $table = 'comentarios';

	protected $filleble = ['descripcion','user_id','status'];

	public function users()
	{
		return $this->belongsTo('User','user_id');
	}

	public static function createComentario($input)
	{
		$respuesta = array();
		$sentry = Sentry::getUser();
		if ($sentry->hasAnyAccess(['user'])) {
			$user = User::find($sentry->id);
			$reglas = array(
				'descripcion' => 'required'
			);
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$comentario = new Comentario;
				$comentario->descripcion = Input::get('descripcion');
				$comentario->user_id = $user->id;
				$comentario->status = 1;
				if ($comentario->save()) {
					$respuesta['mensaje'] = 'creado con exito!';
					$respuesta['error'] = false;
				} else {
					$respuesta['mensaje'] = 'error, team noob!';
					$respuesta['error'] = false;
				}
			}
		} else {
			$respuesta['mensaje'] = 'Error, sorry do not have access';
			$respuesta['error'] = true;
		}
		return $respuesta;
	}
}