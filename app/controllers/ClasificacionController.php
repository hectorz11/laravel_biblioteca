<?php

class ClasificacionController extends BaseController {

	public function getClasificaciones()
	{
		if(Sentry::check()) {
			$clasificaciones_1 = Clasificacion::whereStatus(1)->get();
			$clasificaciones_0 = Clasificacion::whereStatus(0)->get();

			return View::make('admin.clasificacion.clasificaciones')
			->with('clasificaciones_1', $clasificaciones_1)
			->with('clasificaciones_0', $clasificaciones_0);
		} else {
			return Redirect::route('/');
		}
	}

	public function getClasificacionCreate()
	{
		if(Sentry::check()) {
			return View::make('admin.clasificacion.clasificacion_create');
		} else {
			return Redirect::route('/');
		}
	}

	public function postClasificacionCreate()
	{
		if(Sentry::check()) {
			$respuesta = Clasificacion::createClasificacion(Input::all());
			if($respuesta['error'] == true) {
				return Redirect::route('admin_clasificacion_create')
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_clasificacion_create')
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}

	public function getClasificacionUpdate($id)
	{
		if(Sentry::check()) {
			$clasificacion = Clasificacion::find($id);
			return View::make('admin.clasificacion.clasificacion_update')
			->with('clasificacion', $clasificacion);
		} else {
			return Redirect::route('/');
		}
	}

	public function postClasificacionUpdate($id)
	{
		if(Sentry::check()) {
			$respuesta = Clasificacion::updateClasificacion(Input::all(), $id);
			if($respuesta['error'] == true) {
				return Redierct::route('admin_clasificacion_update', $id)
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_clasificacion_update', $id)
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}
}