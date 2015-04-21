<?php

class Libro extends Eloquent {

	protected $table = 'libros';

	protected $fillable = array('codigo','autores','titulo','edicion','anio','contenido','foto',
								'ubicacion_id','estado_id','clasificacion_id','descripcion','observaciones');

	public function ubicaciones() {	
		return $this->belongsTo('Ubicacion','ubicacion_id');
	}

	public function estados() {	
		return $this->belongsTo('Estado','estado_id');	
	}

	public function clasificaciones() {	
		return $this->belongsTo('Clasificacion','clasificacion_id');
	}

	public static function agregarLibro($input)
	{
		$respuesta 	= array();
		$reglas 	= array(
			'autores' 	=> 'required',
			'titulo'	=> 'required'
		);

		$validacion = Validator::make($input, $reglas);
		if($validacion->fails()) {
			$respuesta['mensaje'] 	= $validacion;
			$respuesta['error'] 	= true;
		} else {
			$file = Input::file('foto');

			if(isset($file)) {
				$destino 		= 'public/fotos/';
				$random_name 	= Str::random(6); 
				$extension 		= $file->getClientOriginalExtension();
				$filename 		= $random_name.'_libro.'.$extension;
				$upload 		= Input::file('foto')->move($destino,$filename);
			} else {
				$filename = "";
			}

			$libro = new Libro();

			$libro->codigo 				= Input::get('codigo');
			$libro->autores 			= Input::get('autores');
			$libro->titulo 				= Input::get('titulo');
			$libro->edicion 			= Input::get('edicion');
			$libro->anio 				= Input::get('anio');
			$libro->contenido 			= Input::get('contenido');
			$libro->foto 				= $filename;
			$libro->ubicacion_id 		= Input::get('ubicacion_id');
			$libro->estado_id 			= Input::get('estado_id');
			$libro->clasificacion_id 	= Input::get('clasificacion_id');
			$libro->descripcion 		= Input::get('descripcion');
			$libro->observaciones 		= Input::get('observaciones');

			if($libro->save()) {
				$respuesta['mensaje'] 	= 'Libro agregado!';
				$respuesta['error'] 	= false;
				$respuesta['data']		= $libro;
			}
		}
		return $respuesta;
	}

	public static function editarLibro($input, $id)
	{
		$respuesta 	= array();
		$libro 		= Libro::find($id);
		$reglas 	= array(
			'autores' 	=> 'required',
			'titulo'	=> 'required');

		$validacion = Validator::make($input, $reglas);
		if($validacion->fails()) {
			$respuesta['mensaje']	= $validacion;
			$respuesta['error']		= true;
		} else {
			$file = Input::file('foto');

			if(isset($file)) {
				$destino 		= 'public/fotos/';
				$random_name 	= Str::random(6); 
				$extension 		= $file->getClientOriginalExtension();
				$filename 		= $random_name.'_libro.'.$extension;
				$upload 		= Input::file('foto')->move($destino,$filename);
			} else {
				$filename = $libro->foto;
			}

			$data_libro = array(
				'codigo'			=> Input::get('codigo'),
				'autores' 			=> Input::get('autores'),
				'titulo'			=> Input::get('titulo'),
				'edicion' 			=> Input::get('edicion'),
				'anio' 				=> Input::get('anio'),
				'contenido' 		=> Input::get('contenido'),
				'foto' 				=> $filename,
				'ubicacion_id' 		=> Input::get('ubicacion_id'),
				'estado_id' 		=> Input::get('estado_id'),
				'clasificacion_id' 	=> Input::get('clasificacion_id'),
				'descripcion' 		=> Input::get('descripcion'),
				'observaciones' 	=> Input::get('observaciones')
			);

			if($libro->update($data_libro)) {
				$respuesta['mensaje']	= 'Libro editado!';
				$respuesta['error'] 	= false;
				$respuesta['data'] 		= $libro;
			}
		}
		return $respuesta;
	}

}