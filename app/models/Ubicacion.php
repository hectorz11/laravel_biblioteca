<?php

class Ubicacion extends Eloquent {

	protected $table = 'ubicaciones';

	protected $fillable = ['nombre','status'];

	public function libros()
	{
		return $this->hasMany('Libro','ubicacion_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','ubicacion_id');
	}

	public function valor($id)
	{
		$ubicacion = Ubicacion::find($id);
		if ($ubicacion->status == 1) return true;
		else return false;
	}

	public static function createUbicacion($input)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_libro','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$ubicacion = new Ubicacion;
				$ubicacion->nombre = Input::get('nombre');
				$ubicacion->status = 1;
				if ($ubicacion->save()) {
					$respuesta['mensaje'] = 'creado con exito!';
					$respuesta['error'] = false;	
				} else {
					$respuesta['mensaje'] = 'error, team noob!';
					$respuesta['error'] = false;
				}		
			}
		} else {
			$respuesta['mensaje'] = 'Error, sorry do not have access';
		}
		return $respuesta;
	}

	public static function updateUbicacion($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_libro','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$ubicacion = Ubicacion::find($id);
				$ubicacion->nombre = Input::get('nombre');
				$ubicacion->status = Input::get('status');
				if ($ubicacion->save()) {
					$respuesta['mensaje'] = 'editado con exito!';
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