<?php

class LibroController extends BaseController {

	public function getBiblioteca()
	{
		if (Sentry::getUser()->hasAnyAccess(['libro'])) {
			return View::make('biblioteca.biblioteca');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getBibliotecaNo()
	{
		if (Sentry::getUser()->hasAnyAccess(['libro'])) {
			return View::make('biblioteca.biblioteca_no');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getDatatableAdmin()
	{
		$result = DB::table('libros')
		->select(array(
			'libros.id',
			'libros.codigo as codigo',
			'libros.autores as autores',
			'libros.titulo as titulo',
			'libros.edicion as edicion',
			'estados.nombre as estado'))
		->join('estados', 'libros.estado_id','=','estados.id')
		->where('libros.status','=',1);

		return Datatable::query($result)
		->searchColumns('libros.codigo','libros.autores','libros.titulo')
		->orderColumns('id','libros.codigo','libros.titulo')
		->showColumns('id','codigo','autores','titulo','edicion','estado')
		->addColumn('Operaciones', function($model)
		{
			return "<a href='".URL::route('libro_update', $model->id)."' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a class='edit' href='".URL::to('#Eliminar')."' id=$model->id data-toggle='modal'>
						<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
					</a>";
		})->make();
	}

	public function getDatatableAdminNo()
	{
		$result = DB::table('libros')
		->select(array(
			'libros.id',
			'libros.codigo as codigo',
			'libros.autores as autores',
			'libros.titulo as titulo',
			'libros.edicion as edicion',
			'estados.nombre as estado'))
		->join('estados', 'libros.estado_id','=','estados.id')
		->where('libros.status','=',0);

		return Datatable::query($result)
		->searchColumns('libros.codigo','libros.autores','libros.titulo')
		->orderColumns('id','libros.codigo','libros.titulo')
		->showColumns('id','codigo','autores','titulo','edicion','estado')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='".URL::to('#Recuperar')."' id=$model->id data-toggle='modal'>
						<span class='label label-success'>Recuperar</span>
					</a>";
		})->make();
	}

	public function getDatatableGuest()
	{
		$result = DB::table('libros')
		->select(array(
			'libros.id',
			'libros.codigo as codigo',
			'libros.autores as autores',
			'libros.titulo as titulo',
			'libros.edicion as edicion',
			'estados.nombre as estado'))
		->join('estados', 'libros.estado_id','=','estados.id')
		->where('libros.status','=',1);

		return Datatable::query($result)
		->searchColumns('libros.codigo','libros.autores','libros.titulo')
		->orderColumns('id','libros.codigo','libros.titulo')
		->showColumns('id','codigo','autores','titulo','edicion','estado')
		->make();
	}

	public function getDataLibro()
	{
		if (Input::has('libro'))
		{
			$libro_id = Input::get('libro');
	       	$libro = Libro::find($libro_id);
	        $data = array(
	            'success' => true,// indica que se llevo la peticion acabo
	            'idLibro' => $libro->id,
	            'titulo' => $libro->titulo
	        );
	        return Response::json($data);
		}
	}

	public function getLibroCreate()
	{
		$user = Sentry::getUser();
		if ($user->hasAnyAccess(['libro.create'])) {
			$clasificacion 	= Clasificacion::whereStatus(1)->get();
			$estado = Estado::whereStatus(1)->get();
			$ubicacion = Ubicacion::whereStatus(1)->get();
			$libros = Libro::orderBy('id', 'DESC')->take(10)->get();
			return View::make('biblioteca.libro_create')
			->with('user', $user)->with('libros', $libros)
			->with('clasificacion', $clasificacion)
			->with('estado', $estado)
			->with('ubicacion', $ubicacion);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postLibroCreate()
	{
		$respuesta = Libro::agregarLibro(Input::all());
		if ($respuesta['error'] == true)	{
			return Redirect::route('libro_create')
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('libro_create')
			->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
		}
	}

	public function getLibroUpdate($id)
	{
		$user = Sentry::getUser();
		if ($user->hasAnyAccess(['libro.update'])) {
			$clasificacion 	= Clasificacion::whereStatus(1)->get();
			$estado = Estado::whereStatus(1)->get();
			$ubicacion = Ubicacion::whereStatus(1)->get();
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
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postLibroUpdate($id)
	{
		$respuesta = Libro::editarLibro(Input::all(), $id);
		if ($respuesta['error'] == true) {
			return Redirect::route('libro_update', $libro->id)
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('libro_update', $libro->id)
			->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
		}
	}

	public function getLibroDelete($id)
	{
		if (Sentry::getUser()->hasAnyAccess(['libro.delete'])) {
			$libro = Libro::find($id);
			return View::make('biblioteca.libro_delete')
			->with('libro', $libro);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postLibroDelete()
	{
		$libro_id = Input::get('idLibro');
		$libro = Libro::find($libro_id);
		$libro->status = 0;
		$libro->save();
		return Redirect::route('biblioteca');
	}

	public function getLibroSearch()
	{
		return View::make('biblioteca.libro_search');
	}

	public function postLibroRecuperar()
	{
		$libro_id = Input::get('idLibro');
		$libro = Libro::find($libro_id);
		$libro->status = 1;
		$libro->save();
		return Redirect::route('biblioteca_no');
	}
	
}