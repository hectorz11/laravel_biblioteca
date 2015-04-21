<?php

class Clasificacion extends Eloquent {

	protected $table = 'clasificaciones';

	protected $fillable = array('nombre');

	public function libros()
	{
		return $this->hasMany('Libro','clasificacion_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','clasificacions_id');
	}
}