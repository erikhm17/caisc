<?php

class Docente extends Eloquent {

	protected $table = 'docente';
	protected $fillable = array('nombre','apellidos','dni','direccion','telefono','email','password');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','alpha','min:3'),
			'apellidos'=>array('required','alpha','min:3'),
			'dni'=>array('required','numeric','digits:8','unique:docente'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email','unique:docente'),
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
			$docente = static::create($input);
			$respuesta['mensaje'] = 'Docente Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $docente;
		}
		return $respuesta;
	}


	public static function editar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','alpha','min:3'),
			'apellidos'=>array('required','alpha','min:3'),
			'dni'=>array('required','numeric','digits:8','unique:docente'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric')
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

