<?php

class Ubicacion extends Eloquent {

	protected $table = 'ubicaciones';

	protected $fillable = array('nombre');

	public function libros()
	{
		return $this->hasMany('Libro','ubicacion_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','ubicacion_id');
	}

	public static function createUbicacion($input)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$ubicacion = new Ubicacion;
			$ubicacion->nombre = Input::get('nombre');
			$ubicacion->status = 1;
			$ubicacion->save();

			$respuesta['mensaje'] = 'creado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function updateUbicacion($input, $id)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$ubicacion = Ubicacion::find($id);
			$ubicacion->nombre = Input::get('nombre');
			$ubicacion->status = Input::get('status');
			$ubicacion->save();

			$respuesta['mensaje'] = 'editado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}