<?php

class Docente extends Eloquent {

	protected $table = 'docente';
	protected $fillable = array('nombre','apellidos','dni','direccion','telefono','email','password');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','alpha_num','min:4'),
			'apellidos'=>array('required','alpha_num','min:4'),
			'dni'=>array('required','size:8','digits:8','unique:docente'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','min:10','email','unique:docente'),
			'password'=>array('required','min:6','confirmed')
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

