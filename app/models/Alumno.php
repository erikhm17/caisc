<?php
	class Alumno extends Eloquent{
		
	protected $table = 'alumno';
	public $timestamps = false;
	protected $fillable = array('codAlumno','nombre','apellidos','dni','direccion','telefono','email','pasword','modulo', 'estado', 'codCarrera');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','alpha_num','min:4'),
			'apellidos'=>array('required','alpha_num','min:4'),
			'dni'=>array('required','size:8','digits:8','unique:docente'),
			'direccion'=>array('required','min:10'),
			'telefono'=>array('required','numeric'),
			'email'=>array('required','min:10','email','unique:docente')
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$alumno = static::create($input);
			$respuesta['mensaje'] = 'Alumno Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $alumno;
		}
		return $respuesta;
	}

}
?>