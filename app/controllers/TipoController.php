<?php

class TipoController extends BaseController {

	public function getAdminTipos()
	{
		if (Sentry::getUser()->hasAnyAccess(['tipo'])) {
			$tipos_1 = Tipo::whereStatus(1)->get();
			$tipos_0 = Tipo::whereStatus(0)->get();

			return View::make('admin.tipo.tipos')
			->with('tipos_1', $tipos_1)
			->with('tipos_0', $tipos_0);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getAdminTipoCreate()
	{
		return View::make('admin.tipo.tipo_create');
	}

	public function postAdminTipoCreate()
	{
		$respuesta = Tipo::createTipo(Input::all());
		if($respuesta['error'] == true) {
			return Redirect::route('admin_tipo_create')
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_tipo_create')
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}

	public function getAdminTipoUpdate($id)
	{
		$tipo = Tipo::find($id);
		return View::make('admin.tipo.tipo_update')->with('tipo', $tipo);
	}

	public function postAdminTipoUpdate($id)
	{
		$respuesta = Tipo::updateTipo(Input::all(), $id);
		if($respuesta['error'] == true) {
			return Redirect::route('admin_tipo_update', $id)
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_tipo_update', $id)
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}
}