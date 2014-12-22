<?php

class Personal extends Eloquent {

	protected $table = 'personal';
	protected $fillable = array('nombre','apellidos','dni','direccion','email','password','telefono','cargo_id');

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
			'password'=>array('required','min:6','confirmed')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$input['password'] = Hash::make($input['password']);
			$personal = static::create($input);
			$respuesta['mensaje'] = 'Personal Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $personal;
		}
		return $respuesta;
	}
	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','alpha','min:3'),
			'apellidos'=>array('required','alpha','min:3'),
			'dni'=>array('required','numeric','digits:8'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$respuesta['mensaje'] = 'Personal Actualizado';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
}

