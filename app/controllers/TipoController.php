<?php

class TipoController extends BaseController {

	public function getTipos()
	{
		if(Sentry::check()) {
			$tipos_1 = Tipo::whereStatus(1)->get();
			$tipos_0 = Tipo::whereStatus(0)->get();

			return View::make('admin.tipo.tipos')
			->with('tipos_1', $tipos_1)
			->with('tipos_0', $tipos_0);
		} else {
			return Redirect::route('/');
		}
	}

	public function getTipoCreate()
	{
		if(Sentry::check()) {
			return View::make('admin.tipo.tipo_create');
		} else {
			return Redirect::route('/');
		}
	}

	public function postTipoCreate()
	{
		if(Sentry::check()) {
			$respuesta = Tipo::createTipo(Input::all());
			if($respuesta['error'] == true) {
				return Redirect::route('admin_tipo_create')
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_tipo_create')
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}

	public function getTipoUpdate($id)
	{
		if(Sentry::check()) {
			$tipo = Tipo::find($id);
			return View::make('admin.tipo.tipo_update')
			->with('tipo', $tipo);
		} else {
			return Redirect::route('/');
		}
	}

	public function postTipoUpdate($id)
	{
		if(Sentry::check()) {
			$respuesta = Tipo::updateTipo(Input::all(), $id);
			if($respuesta['error'] == true) {
				return Redierct::route('admin_tipo_update', $id)
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_tipo_update', $id)
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}
}