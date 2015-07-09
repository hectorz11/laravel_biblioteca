<?php

class Clasificacion extends Eloquent {

	protected $table = 'clasificaciones';

	protected $fillable = ['nombre','status'];

	public function libros()
	{
		return $this->hasMany('Libro','clasificacion_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','clasificacions_id');
	}

	public function valor($id)
	{
		$clasificacion = Clasificacion::find($id);
		if ($clasificacion->status == 1) return true;
		else return false;
	}

	public static function createClasificacion($input)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_libro','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$clasificacion = new Clasificacion;
				$clasificacion->nombre = Input::get('nombre');
				$clasificacion->status = 1;
				if ($clasificacion->save()) {
					$respuesta['mensaje'] = 'Creado con exito!';
					$respuesta['error'] = false;
				} else {
					$respuesta['mensaje'] = 'Error, team noob!';
					$respuesta['error'] = false;
				}
			}
		} else {
			$respuesta['mensaje'] = 'Error, sorry do not have access';
			$respuesta['eror'] = true;
		}
		return $respuesta;
	}

	public static function updateClasificacion($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_libro','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$clasificacion = Clasificacion::find($id);
				$clasificacion->nombre = Input::get('nombre');
				$clasificacion->status = Input::get('status');
				if ($clasificacion->save()) {
					$respuesta['mensaje'] = 'Editado con exito!';
					$respuesta['error'] = false;
				} else {
					$respuesta['mensaje'] = 'Error, team noob!';
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