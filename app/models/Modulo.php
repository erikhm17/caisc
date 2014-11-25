<?php

class Modulo extends Eloquent {

	protected $table = 'modulo';
	protected $fillable = array('id','nombre');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'id'=>array('required','max:10'),
			'nombre'=>array('required','max:50')			
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$modulo = static::create($input);
			$respuesta['mensaje'] = 'Modulo Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $modulo;
		}
		return $respuesta;
	}
}

