<?php

class Tipo extends Eloquent {

	protected $table = 'tipos';

	protected $fillable = array('nombre');

	public function periodicos()
	{
		return $this->hasMany('Periodico','tipo_id');
	}

	public static function createTipo($input)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$tipo = new Tipo;
			$tipo->nombre = Input::get('nombre');
			$tipo->status = 1;
			$tipo->save();

			$respuesta['mensaje'] = 'creado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}

	public static function updateTipo($input, $id)
	{
		$respuesta = array();
		$rules = array('nombre' => 'required');
		$validacion = Validator::make($input, $rules);
		if($validacion->fails()) {
			$respuesta['mensaje'] = $validacion;
			$respuesta['error'] = true;
		} else {
			$tipo = Tipo::find($id);
			$tipo->nombre = Input::get('nombre');
			$tipo->status = Input::get('status');
			$tipo->save();

			$respuesta['mensaje'] = 'editado con exito';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}