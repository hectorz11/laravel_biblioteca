<?php

class Libro extends Eloquent {

	protected $table = 'libros';

	protected $fillable = ['codigo','autores','titulo','edicion','anio','contenido','foto',
		'ubicacion_id','estado_id','clasificacion_id','descripcion','observaciones'];

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

	public static function agregarLibro($input)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['libro.create'])) {
			$reglas = array(
				'autores' => 'required',
				'titulo' => 'required',
				'ubicacion_id' => 'required',
				'estado_id' => 'required',
				'clasificacion_id' => 'required'
			);
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error'] = true;
			} else {
				$file = Input::file('foto');
				if (isset($file)) {
					$destino = 'public/fotos/';
					$random_name = Str::random(6); 
					$extension = $file->getClientOriginalExtension();
					$filename = $random_name.'_libro.'.$extension;
					$upload = Input::file('foto')->move($destino,$filename);
				} else {
					$filename = "";
				}
				$libro = new Libro();
				$libro->codigo = Input::get('codigo');
				$libro->autores = Input::get('autores');
				$libro->titulo = Input::get('titulo');
				$libro->edicion = Input::get('edicion');
				$libro->anio = Input::get('anio');
				$libro->contenido = Input::get('contenido');
				$libro->foto = $filename;
				$libro->ubicacion_id = Input::get('ubicacion_id');
				$libro->estado_id = Input::get('estado_id');
				$libro->clasificacion_id = Input::get('clasificacion_id');
				$libro->descripcion = Input::get('descripcion');
				$libro->observaciones = Input::get('observaciones');
				$libro->status = 1;

				if ($libro->save()) {
					$respuesta['mensaje'] = 'Libro agregado!';
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

	public static function editarLibro($input, $id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['libro.update'])) {
			$libro = Libro::find($id);
			$reglas = array(
				'autores' => 'required',
				'titulo' => 'required',
				'ubicacion_id' => 'required',
				'estado_id' => 'required',
				'clasificacion_id' => 'required'
			);
			$validacion = Validator::make($input, $reglas);
			if ($validacion->fails()) {
				$respuesta['mensaje'] = $validacion;
				$respuesta['error']	= true;
			} else {
				$file = Input::file('foto');
				if (isset($file)) {
					$destino = 'public/fotos/';
					$random_name = Str::random(6); 
					$extension = $file->getClientOriginalExtension();
					$filename = $random_name.'_libro.'.$extension;
					$upload = Input::file('foto')->move($destino,$filename);
				} else {
					$filename = $libro->foto;
				}
				$libro->codigo = Input::get('codigo');
				$libro->autores = Input::get('autores');
				$libro->titulo = Input::get('titulo');
				$libro->edicion = Input::get('edicion');
				$libro->anio = Input::get('anio');
				$libro->contenido = Input::get('contenido');
				$libro->foto = $filename;
				$libro->ubicacion_id = Input::get('ubicacion_id');
				$libro->estado_id = Input::get('estado_id');
				$libro->clasificacion_id = Input::get('clasificacion_id');
				$libro->descripcion = Input::get('descripcion');
				$libro->observaciones = Input::get('observaciones');
				$libro->status = Input::get('status');

				if ($libro->save()) {
					$respuesta['mensaje'] = 'Libro editado!';
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

	public static function eliminarLibro($id)
	{
		$respuesta = array();
		if (Sentry::getUser()->hasAnyAccess(['libro.delete'])) {
			$libro = Libro::find($id);
			$libro->status = 0;
			$libro->save();

			$respuesta['mensaje'] = 'Eliminado con exito!';
			$respuesta['error'] = false;
		} else {
			$respuesta['mensaje'] = 'Error, sorry do not have access';
			$respuesta['error'] = true;
		}
		return $respuesta;
	}

}