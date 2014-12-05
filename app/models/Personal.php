<?php

class Personal extends Eloquent {

	protected $table = 'personal';
	protected $fillable = array('nombre','apellidos','dni','direccion','email','password','telefono');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','alpha','min:3'),
			'apellidos'=>array('required','alpha','min:3'),
			'dni'=>array('required','numeric','digits:8','unique:personal'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email','unique:personal'),
			'cargo_id'=>array('required','exists:cargo,id'),
			'password'=>array('required','min:6','confirmed')
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

