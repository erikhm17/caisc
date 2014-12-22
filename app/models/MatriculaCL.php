<?php

class MatriculaCL extends Eloquent {

	protected $table = 'matricula_cl';
	protected $fillable = array('id','codAlumno','codCargaAcademica_cl','updated_at','created_up');

	public static function agregar($input) {
		$respuesta = array();
		$reglas = array(
			'codAlumno'=>array('required','max:10'),
			'codCargaAcademica_cl'=>array('required','max:10')
			);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else{
			$matricula_cl = static::create($input);
			$respuesta['mensaje'] = 'Matricula Creada';
			$respuesta['error'] = false;
			$respuesta['data'] = $matricula_cl;
		}
		return $respuesta;
	}
}