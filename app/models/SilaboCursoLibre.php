<?php

class SilaboCursoLibre extends Eloquent {

	protected $table = 'detalle_silabus_cl';
	protected $fillable = array('id','codSilabus_cl','capitulo','titulo','objetivos','descripcion','numeroclases','orden','estado','updated_at','created_at');

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'titulo'=>array('required','max:20'),
				'orden'=>array('required','max:11')
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'DATOS INGRESADOS INCORRECTAMENTE';
			$respuesta['error'] = true;
		} 
		else
		{
			$silabo = new SilaboCursoLibre;
			$silabo->codSilabus_cl = $input::get('id');
			$silabo->capitulo = Input::get('capitulo');
			$silabo->titulo = Input::get('titulo');
			$silabo->objetivos = Input::get('objetivos');			
			$silabo->descripcion = Input::get('descripcion');
			$silabo->numeroclases = Input::get('numeroclases');
			$silabo->orden = Input::get('orden');
			$silabo->estado = 1;
			$silabo->created_at= time();
			$silabo->updated_at = time();
			//$curso->save();
			if ($silabo->save()) 
			{
							$respuesta['mensaje'] = 'Silabo Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $silabo;
			}
			else 
			{
							$respuesta['mensaje'] = 'Silabo mal Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $silabo;
			}

			
		}
		return $respuesta;
	}
}
