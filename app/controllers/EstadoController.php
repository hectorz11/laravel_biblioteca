<?php

class EstadoController extends BaseController
{
	public function getEstados()
	{
		if (Sentry::getUser()->hasAnyAccess(['estado'])) {
			$estados_1 = Estado::whereStatus(1)->get();
			$estados_0 = Estado::whereStatus(0)->get();

			return View::make('admin.estado.estados')
			->with('estados_1', $estados_1)
			->with('estados_0', $estados_0);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getEstadoCreate()
	{
		return View::make('admin.estado.estado_create');
	}

	public function postEstadoCreate()
	{
		$respuesta = Estado::createEstado(Input::all());
		if($respuesta['error'] == true) {
			return Redirect::route('admin_estado_create')
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_estado_create')
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}

	public function getEstadoUpdate($id)
	{
		$estado = Estado::find($id);
		return View::make('admin.estado.estado_update')
		->with('estado', $estado);
	}

	public function postEstadoUpdate($id)
	{
		$respuesta = Estado::updateEstado(Input::all(), $id);
		if($respuesta['error'] == true) {
			return Redirect::route('admin_estado_update', $id)
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('admin_estado_update', $id)
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}
}