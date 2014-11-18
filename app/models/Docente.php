<?php

class Docente extends Eloquent {

	protected $table = 'docente';
	protected $fillable = array('codDocente','nombre','apellidos','dni','direccion','email','password','telefono');
	
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
			$docente = static::create($input);
			$respuesta['mensaje'] = 'Docente Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $docente;
		}
		return $respuesta;
	}
}

