<?php

class ClasificacionController extends BaseController {

	public function getAdminClasificaciones()
	{
		if (Sentry::getUser()->hasAnyAccess(['clasificacion'])) {
			$clasificaciones_1 = Clasificacion::whereStatus(1)->get();
			$clasificaciones_0 = Clasificacion::whereStatus(0)->get();

			return View::make('admin.clasificacion.clasificaciones')
			->with('clasificaciones_1', $clasificaciones_1)
			->with('clasificaciones_0', $clasificaciones_0);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getAdminClasificacionCreate()
	{
		return View::make('admin.clasificacion.clasificacion_create');
	}

	public function postAdminClasificacionCreate()
	{
		$respuesta = Clasificacion::createClasificacion(Input::all());
		if($respuesta['error'] == true) {
			return Redirect::route('admin_clasificacion_create')
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_clasificacion_create')
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}

	public function getAdminClasificacionUpdate($id)
	{
		$clasificacion = Clasificacion::find($id);
		return View::make('admin.clasificacion.clasificacion_update')
		->with('clasificacion', $clasificacion);
	}

	public function postAdminClasificacionUpdate($id)
	{
		$respuesta = Clasificacion::updateClasificacion(Input::all(), $id);
		if($respuesta['error'] == true) {
			return Redirect::route('admin_clasificacion_update', $id)
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_clasificacion_update', $id)
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}
}