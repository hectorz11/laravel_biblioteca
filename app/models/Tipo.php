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
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_periodico'])) {
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

	public static function updateTipo($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$tipo = Tipo::find($id);
				$tipo->nombre = Input::get('nombre');
				$tipo->status = Input::get('status');
				if ($tipo->save()) {
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