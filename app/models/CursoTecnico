<?php

class CursoTecnico extends Eloquent {

	protected $table = 'curso_ct';
	protected $fillable = array('codCurso_ct','nombre','modulo','estado','codCarrera');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'nombre'=>array('required','max:30'),
			'modulo'=>array('required','max:2'),
			'estado'=>array('required','max:1'),
			'codCarrera'=>array('required','max:10'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$curso = new CursoTecnico;
			$curso->codCurso_cl = Input::get('codCurso_ct');
			$curso->nombre = Input::get('nombre');
			$curso->horas_academicas = Input::get('horas_academicas');
			$curso->estado = 1;
			$curso->created_at= time();
			$curso->updated_at = false;
			//$curso->save();
			if ($curso->save()) 
			{
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');
			}
			else 
			{
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}
			$respuesta['mensaje'] = 'Curso Tecnico Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $curso_ct;
		}
		return $respuesta;
	}
}
