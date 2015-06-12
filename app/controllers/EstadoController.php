<?php

class EstadoController extends BaseController
{
	public function getEstados()
	{
		if(Sentry::check()) {
			$estados_1 = Estado::whereStatus(1)->get();
			$estados_0 = Estado::whereStatus(0)->get();

			return View::make('admin.estado.estados')
			->with('estados_1', $estados_1)
			->with('estados_0', $estados_0);
		} else {
			return Redirect::route('/');
		}
	}

	public function getEstadoCreate()
	{
		if(Sentry::check()) {
			return View::make('admin.estado.estado_create');
		} else {
			return Redirect::route('/');
		}
	}

	public function postEstadoCreate()
	{
		if(Sentry::check()) {
			$respuesta = Estado::createEstado(Input::all());
			if($respuesta['error'] == true) {
				return Redirect::route('admin_estado_create')
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_estado_create')
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}

	public function getEstadoUpdate($id)
	{
		if(Sentry::check()) {
			$estado = Estado::find($id);
			return View::make('admin.estado.estado_update')
			->with('estado', $estado);
		} else {
			return Redirect::route('/');
		}
	}

	public function postEstadoUpdate($id)
	{
		if(Sentry::check()) {
			$respuesta = Estado::updateEstado(Input::all(), $id);
			if($respuesta['error'] == true) {
				return Redierct::route('admin_estado_update', $id)
				->withErrors($respuesta['mensaje'])->withInput();
			} else {
				return Redirect::route('admin_estado_update', $id)
				->with(array('mensaje' => $respuesta['mensaje'], 'class' => 'success'));
			}
		} else {
			return Redirect::route('/');
		}
	}
}