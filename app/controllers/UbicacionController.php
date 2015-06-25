<?php

class UbicacionController extends BaseController {

	public function getUbicaciones()
	{
		$ubicaciones_1 = Ubicacion::whereStatus(1)->get();
		$ubicaciones_0 = Ubicacion::whereStatus(0)->get();

		return View::make('admin.ubicacion.ubicaciones')
		->with('ubicaciones_1', $ubicaciones_1)
		->with('ubicaciones_0', $ubicaciones_0);
	}

	public function getUbicacionCreate()
	{
		return View::make('admin.ubicacion.ubicacion_create');
	}

	public function postUbicacionCreate()
	{
		$respuesta = Ubicacion::createUbicacion(Input::all());
		if($respuesta['error'] == true) {
			return Redirect::route('admin_ubicacion_create')
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_ubicacion_create')
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}

	public function getUbicacionUpdate($id)
	{
		$ubicacion = Ubicacion::find($id);
		return View::make('admin.ubicacion.ubicacion_update')
		->with('ubicacion', $ubicacion);
	}

	public function postUbicacionUpdate($id)
	{
		$respuesta = Ubicacion::updateUbicacion(Input::all(), $id);
		if($respuesta['error'] == true) {
			return Redirect::route('admin_ubicacion_update', $id)
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_ubicacion_update', $id)
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}
}