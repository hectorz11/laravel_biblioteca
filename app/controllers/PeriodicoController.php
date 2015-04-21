<?php

class PeriodicoController extends BaseController {

	public function getHemeroteca()
	{
		$periodicos = Periodico::paginate(15);
		return View::make('hemeroteca.hemeroteca')
		->with('periodicos', $periodicos);
	}

	public function getPeriodicoCreate()
	{
		$clasificacion 	= Clasificacion::all();
		$estado 		= Estado::all();
		$ubicacion 		= Ubicacion::all();
		$tipo 			= Tipo::all();
		return View::make('hemeroteca.periodico_create')
		->with('clasificacion' ,$clasificacion)
		->with('estado', $estado)
		->with('ubicacion', $ubicacion)
		->with('tipo', $tipo);
	}

	public function postPeriodicoCreate()
	{
		$respuesta = Periodico::agregarPeriodico(Input::all());

		if($respuesta['error'] == true)	{
			return Redirect::route('periodico_create')
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('periodico_create')
			->with('mensaje', $respuesta['mensaje']);
		}
	}

	public function getPeriodicoUpdate($id)
	{
		$clasificacion 	= Clasificacion::all();
		$estado 		= Estado::all();
		$ubicacion 		= Ubicacion::all();
		$tipo 			= Tipo::all();
		$periodico 		= Periodico::find($id);
		return View::make('hemeroteca.periodico_update')
		->with('periodico', $periodico)
		->with('clasificacion', $clasificacion)
		->with('estado', $estado)
		->with('ubicacion', $ubicacion)
		->with('tipo', $tipo);
	}

	public function postPeriodicoUpdate($id)
	{
		$periodico 	= Periodico::find($id);
		$respuesta 	= Periodico::editarPeriodico(Input::all(), $id);

		if($respuesta['error'] == true) {
			return Redirect::route('periodico_update', $periodico->id)
			->withErrors($respuesta['mensaje'])
			->withInput();
		} else {
			return Redirect::route('periodico_update', $periodico->id)
			->with('mensaje', $respuesta['mensaje']);
		}
	} 

}