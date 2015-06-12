<?php

class Estado extends Eloquent {

	protected $table = 'estados';

	protected $fillable = array('nombre');

	public function libros()
	{
		return $this->hasMany('Libro','estado_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','estados_id');
	}

	public static function createEstado($input)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$estado = new Estado;
			$estado->nombre = Input::get('nombre');
			$estado->status = 1;
			$estado->save();

			$respuesta['mensaje'] = 'creado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function updateEstado($input, $id)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$estado = Estado::find($id);
			$estado->nombre = Input::get('nombre');
			$estado->status = Input::get('status');
			$estado->save();

			$respuesta['mensaje'] = 'editado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}