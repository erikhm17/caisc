<?php

class Personal extends Eloquent {

	protected $table = 'personal';
	protected $fillable = array('nombre','apellidos','dni','direccion','email','password','telefono');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','max:50'),
			'apellidos'=>array('required','max:100'),
			'dni'=>array('required','max:10')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$personal = static::create($input);
			$respuesta['mensaje'] = 'Personal Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $personal;
		}
		return $respuesta;
	}
}

