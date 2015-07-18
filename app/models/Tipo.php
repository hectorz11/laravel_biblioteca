<?php

class Tipo extends Eloquent {

	protected $table = 'tipos';

	protected $fillable = ['nombre','status'];

	public function periodicos()
	{
		return $this->hasMany('Periodico','tipo_id');
	}

	public function valor($id)
	{
		$tipo = Tipo::find($id);
		if ($tipo->status == 1) return true;
		else return false;
	}

	public static function createTipo($input)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['tipo_create'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$tipo = new Tipo;
				$tipo->nombre = Input::get('nombre');
				$tipo->status = 1;
				if ($tipo->save()) {
					$respuesta['mensaje'] = 'Creado con exito!';
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

	public static function updateTipo($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['tipo_update'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$tipo = Tipo::find($id);
				$tipo->nombre = Input::get('nombre');
				if (Input::has('status')) $tipo->status = 1;
				else $tipo->status = 0;
				
				if ($tipo->save()) {
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