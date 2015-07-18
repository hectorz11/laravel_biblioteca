<?php

class Periodico extends Eloquent {

	protected $table = 'periodicos';

	protected $fillable = ['volumen','nombre','fecha_inicio','fecha_final','estado_id','clasificacion_id',
		'tipo_id','ubicacion_id','descripcion','observaciones'];

	public function ubicaciones()
	{
		return $this->belongsTo('Ubicacion','ubicacion_id');
	}

	public function estados()
	{
		return $this->belongsTo('Estado','estado_id');
	}

	public function clasificaciones()
	{
		return $this->belongsTo('Clasificacion','clasificacion_id');
	}

	public function tipos()
	{
		return $this->belongsTo('Tipo','tipo_id');
	}

	public static function agregarPeriodico($input)
	{
		$respuesta 	= array();
		if (Sentry::getUser()->hasAnyAccess(['periodico_create'])) {
			$reglas = array(
				'nombre' => 'required',
				'estado_id' => 'required',
				'clasificacion_id' => 'required',
				'tipo_id' => 'required',
				'ubicacion_id' => 'required'
			);
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$periodico = new Periodico();
				$periodico->volumen = Input::get('volumen');
				$periodico->nombre = Input::get('nombre');
				$periodico->fecha_inicio = Input::get('fecha_inicio');
				$periodico->fecha_final = Input::get('fecha_final');
				$periodico->estado_id = Input::get('estado_id');
				$periodico->clasificacion_id = Input::get('clasificacion_id');
				$periodico->tipo_id = Input::get('tipo_id');
				$periodico->ubicacion_id = Input::get('ubicacion_id');
				$periodico->descripcion = Input::get('descripcion');
				$periodico->observaciones = Input::get('observaciones');
				$periodico->status = 1;

				if ($periodico->save()) {
					$respuesta['mensaje'] = 'Periodico agregado!';
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

	public static function editarPeriodico($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['periodico_update'])) {
			$periodico = Periodico::find($id);
			$reglas = array(
				'nombre' => 'required',
				'estado_id' => 'required',
				'clasificacion_id' => 'required',
				'tipo_id' => 'required',
				'ubicacion_id' => 'required'
			);
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$periodico->volumen = Input::get('volumen');
				$periodico->nombre = Input::get('nombre');
				$periodico->fecha_inicio = Input::get('fecha_inicio');
				$periodico->fecha_final = Input::get('fecha_final');
				$periodico->estado_id = Input::get('estado_id');
				$periodico->clasificacion_id = Input::get('clasificacion_id');
				$periodico->tipo_id = Input::get('tipo_id');
				$periodico->ubicacion_id = Input::get('ubicacion_id');
				$periodico->descripcion = Input::get('descripcion');
				$periodico->observaciones = Input::get('observaciones');

				if ($periodico->save()) {
					$respuesta['mensaje'] = 'Periodico editado!';
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

	public static function eliminarPeriodico($id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['periodico_delete'])) {
			$periodico = Periodico::find($id);
			$periodico->status = 0;
			$periodico->save();

			$respuesta['mensaje'] = 'Eliminado con exito!';
			$respuesta['error'] = false;
		} else {
			$respuesta['mensaje'] = 'Error, sorry do not have access';
			$respuesta['error'] = true;
		}
		return $respuesta;
	}

}