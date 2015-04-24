<?php

class LibroController extends BaseController {

	public function getBiblioteca()
	{
		$libros = Libro::paginate(15);
		return View::make('biblioteca.biblioteca')
		->with('libros', $libros);
	}

	public function getLibroCreate()
	{
		$clasificacion 	= Clasificacion::all();
		$estado 		= Estado::all();
		$ubicacion 		= Ubicacion::all();
		return View::make('biblioteca.libro_create')
		->with('clasificacion' ,$clasificacion)
		->with('estado', $estado)
		->with('ubicacion', $ubicacion);
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
			->with('mensaje', $respuesta['mensaje']);
		}
	}

	public function getLibroUpdate($id)
	{
		$clasificacion 	= Clasificacion::all();
		$estado 		= Estado::all();
		$ubicacion 		= Ubicacion::all();
		$libro 			= Libro::find($id);
		return View::make('biblioteca.libro_update')
		->with('libro', $libro)
		->with('clasificacion', $clasificacion)
		->with('estado', $estado)
		->with('ubicacion', $ubicacion);
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