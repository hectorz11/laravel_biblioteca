<?php

class LibroController extends BaseController {

	public function getBiblioteca()
	{
		$libros = Libro::paginate(15);
		return View::make('biblioteca.biblioteca')
		->with('libros', $libros);
	}

	public function getDataTable()
	{
		$result = DB::table('libros')
		->select(array(
			'libros.id',
			'libros.codigo as codigo',
			'libros.autores as autores',
			'libros.titulo as titulo',
			'libros.edicion as edicion',
			'estados.nombre as estado'))
		->join('estados', 'libros.estado_id','=','estados.id');

		return Datatable::query($result)
		->searchColumns('libros.codigo','libros.autores','libros.titulo')
		->orderColumns('id','libros.codigo','libros.titulo')
		->showColumns('id','codigo','autores','titulo','edicion','estado')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='".URL::route('libro_update', $model->id)."' id=$model->id data-toggle='modal'>
        			<span class='label label-info'>Editar</span></a>";
		})->make();
	}

	public function getLibroCreate()
	{
		if(Sentry::check()) {
			$user = Sentry::getUser();
			$clasificacion 	= Clasificacion::all();
			$estado = Estado::all();
			$ubicacion = Ubicacion::all();
			$libros = Libro::orderBy('id', 'DESC')->take(10)->get();
			return View::make('biblioteca.libro_create')
			->with('user', $user)->with('libros', $libros)
			->with('clasificacion', $clasificacion)
			->with('estado', $estado)
			->with('ubicacion', $ubicacion);
		} else {
			return Redirect::route('/')
			->with(array('mensaje'=>'ahorita no joven!', 'class'=>'danger'));
		}
	}

	public function postLibroCreate()
	{
		$respuesta = Libro::agregarLibro(Input::all());
		if($respuesta['error'] == true)	{
			return Redirect::route('libro_create')
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('libro_create')
			->with(array('mensaje'=>$respuesta['mensaje'], 'class'=>'success'));
		}
	}

	public function getLibroUpdate($id)
	{
		if(Sentry::check()) {
			$user = Sentry::getUser();
			$clasificacion 	= Clasificacion::all();
			$estado = Estado::all();
			$ubicacion = Ubicacion::all();
			$libro = Libro::find($id);
			$libros = Libro::orderBy('id','DESC')->take(10)->get();
			return View::make('biblioteca.libro_update')
			->with('user', $user)->with('libros', $libros)
			->with('libro', $libro)
			->with('clasificacion', $clasificacion)
			->with('estado', $estado)
			->with('ubicacion', $ubicacion);
		} else {
			return Redirect::route('/')
			->with(array('mensaje'=>'ahorita no joven', 'class'=>'danger'));
		}
		
	}

	public function postLibroUpdate($id)
	{
		$libro 		= Libro::find($id);
		$respuesta 	= Libro::editarLibro(Input::all(), $id);

		if($respuesta['error'] == true) {
			return Redirect::route('libro_update', $libro->id)
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('libro_update', $libro->id)
			->with('mensaje', $respuesta['mensaje']);
		}
	} 

	public function getLibroSearch()
	{
		return View::make('biblioteca.libro_search');
	}

	public function postLibroSearch()
	{
		$opcion = Input::get('opcion');
		$buscar = Input::get('buscar');

		if(empty($buscar)) {
			return Redirect::route('biblioteca');
		} else {
			switch($opcion) {
				case 1:
					if(is_string($buscar)) {
						$libros = Libro::where('codigo','like','%'.$buscar.'%')->get();
						return View::make('biblioteca.libro_view')->with('libros', $libros);
					} else {
						return View::make('biblioteca.libro_view');
					}
				break;
				case 2:
					if(is_string($buscar)) {
						$libros = Libro::where('autores','like','%'.$buscar.'%')->get();
						return View::make('biblioteca.libro_view')->with('libros', $libros);
					} else {
						return View::make('biblioteca.libro_view');
					}
				break;
				case 3:
					if(is_string($buscar)) {
						$libros = Libro::where('titulo','like','%'.$buscar.'%')->get();
						return View::make('biblioteca.libro_view')->with('libros', $libros);
					} else {
						return View::make('biblioteca.libro_view');
					}
				break;
			}
		}
	}

}