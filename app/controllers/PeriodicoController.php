<?php

class PeriodicoController extends BaseController {

	public function getAdminHemeroteca()
	{
		if (Sentry::getUser()->hasAnyAccess(['periodico'])) {
			return View::make('hemeroteca.hemeroteca');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getAdminHemerotecaNo()
	{
		if (Sentry::getUser()->hasAnyAccess(['periodico'])) {
			return View::make('hemeroteca.hemeroteca_no');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getAdminDatatablePeriodico()
	{
		$result = DB::table('periodicos')
		->select(array(
			'periodicos.id',
			'periodicos.volumen as volumen',
			'periodicos.nombre as nombre',
			'periodicos.fecha_inicio as fecha_inicio',
			'periodicos.fecha_final as fecha_final',
			'estados.nombre as estado'))
		->join('estados', 'periodicos.estado_id','=','estados.id')
		->where('periodicos.status','=',1);

		return Datatable::query($result)
		->searchColumns('periodicos.volumen','periodicos.nombre')
		->orderColumns('id','periodicos.volumen','periodicos.fecha_inicio')
		->showColumns('id','volumen','nombre','fecha_inicio','fecha_final','estado')
		->addColumn('Operaciones', function($model)
		{
			return "<a href='".URL::route('admin_periodico_update', $model->id)."' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a class='edit' href='".URL::to('#Eliminar')."'' id=$model->id data-toggle='modal'>
						<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
					</a>";
		})->make();
	}

	public function getAdminDatatablePeriodicoNo()
	{
		$result = DB::table('periodicos')
		->select(array(
			'periodicos.id',
			'periodicos.volumen as volumen',
			'periodicos.nombre as nombre',
			'periodicos.fecha_inicio as fecha_inicio',
			'periodicos.fecha_final as fecha_final',
			'estados.nombre as estado'))
		->join('estados', 'periodicos.estado_id','=','estados.id')
		->where('periodicos.status','=',0);

		return Datatable::query($result)
		->searchColumns('periodicos.volumen','periodicos.nombre')
		->orderColumns('id','periodicos.volumen','periodicos.fecha_inicio')
		->showColumns('id','volumen','nombre','fecha_inicio','fecha_final','estado')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='".URL::to('#Recuperar')."' id=$model->id data-toggle='modal'>
						<span class='label label-success'>Recuperar</span>
					</a>";
		})->make();
	}

	public function getDatatableGuest()
	{
		$result = DB::table('periodicos')
		->select(array(
			'periodicos.id',
			'periodicos.volumen as volumen',
			'periodicos.nombre as nombre',
			'periodicos.fecha_inicio as fecha_inicio',
			'periodicos.fecha_final as fecha_final',
			'estados.nombre as estado'))
		->join('estados', 'periodicos.estado_id','=','estados.id')
		->where('periodicos.status','=',1);

		return Datatable::query($result)
		->searchColumns('periodicos.volumen','periodicos.nombre')
		->orderColumns('id','periodicos.volumen','periodicos.fecha_inicio')
		->showColumns('id','volumen','nombre','fecha_inicio','fecha_final','estado')
		->make();
	}

	public function getAdminDataPeriodico()
	{
		if (Input::has('periodico')) {
			$periodico_id = Input::get('periodico');
	       	$periodico = Periodico::find($periodico_id);
	        $data = array(
	            'success' => true,// indica que se llevo la peticion acabo
	            'idPeriodico' => $periodico->id,
	            'nombre' => $periodico->nombre
	        );
	        return Response::json($data);
		}
	}

	public function getAdminPeriodicoCreate()
	{
		$user = Sentry::getUser();
		if ($user->hasAnyAccess(['periodico_create'])) {
			$clasificacion 	= Clasificacion::whereStatus(1)->get();
			$estado = Estado::whereStatus(1)->get();
			$ubicacion = Ubicacion::whereStatus(1)->get();
			$tipo = Tipo::whereStatus(1)->get();
			$periodicos = Periodico::orderBy('id','DESC')->take(10)->get();
			return View::make('hemeroteca.periodico_create')
			->with('user', $user)->with('periodicos', $periodicos)
			->with('clasificacion' ,$clasificacion)
			->with('estado', $estado)
			->with('ubicacion', $ubicacion)
			->with('tipo', $tipo);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postAdminPeriodicoCreate()
	{
		$respuesta = Periodico::agregarPeriodico(Input::all());
		if ($respuesta['error'] == true)	{
			return Redirect::route('admin_periodico_create')
			->withErrors($respuesta['mensaje'])->withInput();
		} else {
			return Redirect::route('admin_periodico_create')
			->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
		}
	}

	public function getAdminPeriodicoUpdate($id)
	{
		$user = Sentry::getUser();
		if ($user->hasAnyAccess(['periodico_update'])) {
			$clasificacion = Clasificacion::whereStatus(1)->get();
			$estado = Estado::whereStatus(1)->get();
			$ubicacion = Ubicacion::whereStatus(1)->get();
			$tipo = Tipo::whereStatus(1)->get();
			$periodico = Periodico::find($id);
			$periodicos = Periodico::orderBy('id','DESC')->take(10)->get();
			return View::make('hemeroteca.periodico_update')
			->with('user', $user)->with('periodicos', $periodicos)
			->with('periodico', $periodico)
			->with('clasificacion', $clasificacion)
			->with('estado', $estado)
			->with('ubicacion', $ubicacion)
			->with('tipo', $tipo);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postAdminPeriodicoUpdate($id)
	{
		$respuesta = Periodico::editarPeriodico(Input::all(), $id);
		if ($respuesta['error'] == true) {
			return Redirect::route('admin_periodico_update', $id)
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('admin_periodico_update', $id)
			->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
		}
	}

	public function postAdminPeriodicoDelete()
	{
		$periodico_id = Input::get('idPeriodico');
		$periodico = Periodico::find($periodico_id);
		$periodico->status = 0;
		$periodico->save();
		return Redirect::route('admin_hemeroteca');
	}

	public function getPeriodicoSearch()
	{
		return View::make('hemeroteca.periodico_search');
	}

	public function postAdminPeriodicoRecuperar()
	{
		$periodico_id = Input::get('idPeriodico');
		$periodico = Periodico::find($periodico_id);
		$periodico->status = 1;
		$periodico->save();
		return Redirect::route('admin_hemeroteca_no');
	}

}