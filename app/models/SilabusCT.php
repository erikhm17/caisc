<?php

class SilabusCT extends Eloquent {

	protected $table = 'silabus_ct';
	protected $fillable = array('id','codCargaAcademica_ct');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
				'codCargaAcademica_ct'=>array('required','max:20'),
			);

		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = 'DATOS INGRESADOS INCORRECTAMENTE';
			$respuesta['error'] = true;
		} 
		else
		{
			$silabo = new SilabusCT;
			$silabo->id = Input::get('id');
			$silabo->codCargaAcademica_ct = Input::get('codCargaAcademica_ct');
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
