<?php

class UbicacionController extends BaseController {

	public function getUbicaciones()
	{
		if(Sentry::check()) {
			$ubicaciones_1 = Ubicacion::whereStatus(1)->get();
			$ubicaciones_0 = Ubicacion::whereStatus(0)->get();

			return View::make('admin.ubicacion.ubicaciones')
			->with('ubicaciones_1', $ubicaciones_1)
			->with('ubicaciones_0', $ubicaciones_0);
		} else {
			return Redirect::route('/');
		}
	}

	public function getUbicacionCreate()
	{
		if(Sentry::check()) {
			return View::make('admin.ubicacion.ubicacion_create');
		} else {
			return Redirect::route('/');
		}
	}

	public function postUbicacionCreate()
	{
		if(Sentry::check()) {
			$respuesta = Ubicacion::createUbicacion(Input::all());
			if($respuesta['error'] == true) {
				return Redirect::route('admin_ubicacion_create')
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_ubicacion_create')
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}

	public function getUbicacionUpdate($id)
	{
		if(Sentry::check()) {
			$ubicacion = Ubicacion::find($id);
			return View::make('admin.ubicacion.ubicacion_update')
			->with('ubicacion', $ubicacion);
		} else {
			return Redirect::route('/');
		}
	}

	public function postUbicacionUpdate($id)
	{
		if(Sentry::check()) {
			$respuesta = Ubicacion::updateUbicacion(Input::all(), $id);
			if($respuesta['error'] == true) {
				return Redierct::route('admin_ubicacion_update', $id)
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_ubicacion_update', $id)
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}
}