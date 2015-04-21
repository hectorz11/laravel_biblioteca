<?php

class Periodico extends Eloquent {

	protected $table = 'periodicos';

	protected $fillable = array('volumen','nombre','fecha_inicio','fecha_final','estado_id','clasificacion_id',
								'tipo_id','ubicacion_id','descripcion','observaciones');

	public static $periodicos_reglas = array(
		'estado_id' => 'required',
		'clasificacion_id' => 'required',
		'tipo_id' => 'required',
		'ubicacion_id' => 'required'
	);

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
		$validacion = Validator::make($input, Periodico::$periodicos_reglas);

		if($validacion->fails()) {
			$respuesta['mensaje'] 	= $validacion;
			$respuesta['error'] 	= true;
		} else {
			$periodico = new Periodico();

			$periodico->volumen 		= Input::get('volumen');
			$periodico->nombre 			= Input::get('nombre');
			$periodico->fecha_inicio 	= Input::get('fecha_inicio');
			$periodico->fecha_final 	= Input::get('fecha_final');
			$periodico->estado_id 		= Input::get('estado_id');
			$periodico->clasificacion_id= Input::get('clasificacion_id');
			$periodico->tipo_id 		= Input::get('tipo_id');
			$periodico->ubicacion_id 	= Input::get('ubicacion_id');
			$periodico->descripcion 	= Input::get('descripcion');
			$periodico->observaciones 	= Input::get('observaciones');

			if($periodico->save()) {
				$respuesta['mensaje'] 	= 'Periodico agregado!';
				$respuesta['error'] 	= false;
				$respuesta['data'] 		= $periodico;
			}
		}
		return $respuesta;
	}

	public static function editarPeriodico($input, $id)
	{
		$respuesta 	= array();
		$periodico 	= Periodico::find($id);

		$validacion = Validator::make($input, Periodico::$periodicos_reglas);

		if($validacion->fails()) {
			$respuesta['mensaje'] 	= $validacion;
			$respuesta['error'] 	= true;
		} else {
			$data_periodico = array(
				'volumen'			=> Input::get('volumen'),
				'nombre' 			=> Input::get('nombre'),
				'fecha_inicio' 		=> Input::get('fecha_inicio'),
				'fecha_final' 		=> Input::get('fecha_final'),
				'estado_id' 		=> Input::get('estado_id'),
				'clasificacion_id'	=> Input::get('clasificacion_id'),
				'tipo_id' 			=> Input::get('tipo_id'),
				'ubicacion_id' 		=> Input::get('ubicacion_id'),
				'descripcion' 		=> Input::get('descripcion'),
				'observaciones' 	=> Input::get('observaciones')
			);

			if($periodico->update($data_periodico)) {
				$respuesta['mensaje'] 	= 'Periodico editado!';
				$respuesta['error'] 	= false;
				$respuesta['data'] 		= $periodico;
			}
		}
		return $respuesta;
	}

}