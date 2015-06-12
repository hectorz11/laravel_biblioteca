<?php

class Clasificacion extends Eloquent {

	protected $table = 'clasificaciones';

	protected $fillable = array('nombre');

	public function libros()
	{
		return $this->hasMany('Libro','clasificacion_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','clasificacions_id');
	}

	public static function createClasificacion($input)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$clasificacion = new Clasificacion;
			$clasificacion->nombre = Input::get('nombre');
			$clasificacion->status = 1;
			$clasificacion->save();

			$respuesta['mensaje'] = 'creado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function updateClasificacion($input, $id)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$clasificacion = Clasificacion::find($id);
			$clasificacion->nombre = Input::get('nombre');
			$clasificacion->status = Input::get('status');
			$clasificacion->save();

			$respuesta['mensaje'] = 'editado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}