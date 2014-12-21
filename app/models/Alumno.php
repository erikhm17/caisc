<?php
	class Alumno extends Eloquent{
		
	protected $table = 'alumno';
	public $timestamps = false;
	protected $fillable = array('nombre','apellidos','dni','direccion','telefono','email','password','modulo', 'estado', 'codCarrera');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:4'),
			'apellidos'=>array('required','min:4'),
			'dni'=>array('required','numeric','unique:alumno','digits:8'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email'),
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
			$alumno = static::create($input);
			$respuesta['mensaje'] = 'Alumno Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $alumno;
		}
		return $respuesta;
	}
}
?><?php
	class Alumno extends Eloquent{
		
	protected $table = 'alumno';
	public $timestamps = false;
	protected $fillable = array('nombre','apellidos','dni','direccion','telefono','email','password','modulo', 'estado', 'codCarrera');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','min:4'),
			'apellidos'=>array('required','min:4'),
			'dni'=>array('required','numeric','unique:alumno','digits:8'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','email'),
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
			$alumno = static::create($input);
			$respuesta['mensaje'] = 'Alumno Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $alumno;
		}
		return $respuesta;
	}
}
?>