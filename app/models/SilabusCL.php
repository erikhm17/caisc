<?php

class SilabusCL extends Eloquent {

	protected $table = 'silabus_cl';
	protected $fillable = array('id','codCargaAcademica_cl');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'codCargaAcademica_cl'=>array('required','max:20'),
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'DATOS INGRESADOS INCORRECTAMENTE';
			$respuesta['error'] = true;
		} 
		else
		{
			$silabo = new SilabusCL;
			$silabo->id = Input::get('id');
			$silabo->codCargaAcademica_cl = Input::get('codCargaAcademica_cl');
			//$curso->save();
			if ($silabo->save()) 
			{
				$respuesta['mensaje'] = 'Silabo Creado';
				$respuesta['error'] = false;
				$respuesta['data'] = $silabo;
			}
			else 
			{
				$respuesta['mensaje'] = 'DATOS INCORRECTOS';
				$respuesta['error'] = true;
				$respuesta['data'] = $silabo;
			}
			
			
		}
		return $respuesta;
	}
}
