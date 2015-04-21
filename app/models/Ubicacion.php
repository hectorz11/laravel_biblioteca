<?php

class Ubicacion extends Eloquent {

	protected $table = 'ubicaciones';

	protected $fillable = array('nombre');

	public function libros()
	{
		return $this->hasMany('Libro','ubicacion_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','ubicacion_id');
	}
}