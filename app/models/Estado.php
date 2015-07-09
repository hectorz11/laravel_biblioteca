<?php

class Estado extends Eloquent {

	protected $table = 'estados';

	protected $fillable = ['nombre','status'];

	public function libros()
	{
		return $this->hasMany('Libro','estado_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','estados_id');
	}

	public function valor($id)
	{
		$estado = Estado::find($id);
		if ($estado->status == 1) return true;
		else return false;
	}

	public static function createEstado($input)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_libro','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$estado = new Estado;
				$estado->nombre = Input::get('nombre');
				$estado->status = 1;
				if ($estado->save()) {
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

	public static function updateEstado($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['admin','helper','helper_libro','helper_periodico'])) {
			$reglas = array('nombre' => 'required');
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$estado = Estado::find($id);
				$estado->nombre = Input::get('nombre');
				$estado->status = Input::get('status');
				if ($estado->save()) {
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