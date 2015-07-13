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
		if (Sentry::getUser()->hasAnyAccess(['ubicacion.create'])) {
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
					$respuesta['mensaje'] = 'Creado con exito!';
					$respuesta['error'] = false;	
				} else {
					$respuesta['mensaje'] = 'Error, team noob!';
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
		if (Sentry::getUser()->hasAnyAccess(['ubicacion.update'])) {
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