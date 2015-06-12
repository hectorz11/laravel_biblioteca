<?php

class PeriodicoController extends BaseController {

	public function getHemeroteca()
	{
		if(Sentry::check()) {
			return View::make('hemeroteca.hemeroteca');
		} else {
			return Redirect::route('/')
			->with(array('mensaje' => 'ahorita no joven!', 'class' => 'danger'));
		}
	}

	public function getHemerotecaNo()
	{
		if(Sentry::check()) {
			return View::make('hemeroteca.hemeroteca_no');
		} else {
			return Redirect::route('/')
			->with(array('mensaje' => 'ahorita no joven!', 'class' => 'danger'));
		}
	}

	public function getDatatableAdmin()
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
			return "<a href='".URL::route('periodico_update', $model->id)."' id=$model->id data-toggle='modal'>
        				<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
        			</a>
        			<a class='edit' href='".URL::to('#Eliminar')."'' id=$model->id data-toggle='modal'>
        				<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
        			</a>";
		})->make();
	}

	public function getDatatableAdminNo()
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

	public function getDataPeriodico()
	{
		if(Input::has('periodico'))
		{
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

	public function getPeriodicoCreate()
	{
		if(Sentry::check()) {
			$user = Sentry::getUser();
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
			->with(array('mensaje' => 'ahorita no joven', 'class' => 'danger'));
		}
	}

	public function postPeriodicoCreate()
	{
		if(Sentry::check()) {
			$respuesta = Periodico::agregarPeriodico(Input::all());
			if($respuesta['error'] == true)	{
				return Redirect::route('periodico_create')
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('periodico_create')
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/')
			->with(array('mensaje' => 'ahorita no joven', 'class' => 'danger'));
		}
	}

	public function getPeriodicoUpdate($id)
	{
		if(Sentry::check()) {
			$user = Sentry::getUser();
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
			->with(array('mensaje' => 'ahorita no joven', 'class' => 'danger'));
		}
	}

	public function postPeriodicoUpdate($id)
	{
		$respuesta 	= Periodico::editarPeriodico(Input::all(), $id);
		if($respuesta['error'] == true) {
			return Redirect::route('periodico_update', $periodico->id)
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('periodico_update', $periodico->id)
			->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
		}
	}

	public function getPeriodicoDelete($id)
	{
		if(Sentry::check()) {
			$periodico = Periodico::find($id);
			return View::make('hemeroteca.periodico_delete')
			->with('periodico', $periodico); 
		} else {
			return Redirect::route('/')
			->with(array('mensaje' => 'ahorita no joven', 'class' => 'danger'));
		}
	}

	public function postPeriodicoDelete()
	{
		$periodico_id = Input::get('idPeriodico');
		$periodico = Periodico::find($periodico_id);
		$periodico->status = 0;
		$periodico->save();

		return Redirect::route('hemeroteca');
	}

	public function getPeriodicoSearch()
	{
		return View::make('hemeroteca.periodico_search');
	}

	public function postPeriodicoRecuperar()
	{
		$periodico_id = Input::get('idPeriodico');
		$periodico = Periodico::find($periodico_id);
		$periodico->status = 1;
		$periodico->save();

		return Redirect::route('hemeroteca_no');
	}

}