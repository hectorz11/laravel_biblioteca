<?php

class Tipo extends Eloquent {

	protected $table = 'tipos';

	protected $fillable = array('nombre');

	public function periodicos()
	{
		return $this->hasMany('Periodico','tipo_id');
	}
}