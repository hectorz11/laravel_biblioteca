<?php

class Estado extends Eloquent {

	protected $table = 'estados';

	protected $fillable = array('nombre');

	public function libros()
	{
		return $this->hasMany('Libro','estado_id');
	}

	public function periodicos()
	{
		return $this->hasMany('Periodico','estados_id');
	}
}