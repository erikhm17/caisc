<?php

class SilaboCursoTecnico extends Eloquent {

	protected $table = 'detalle_silabus_ct';
	protected $fillable = array('id','codSilabus_ct','titulo','descripcion','orden','estado','updated_at','created_at');
	
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
			$silabo = new SilaboCursoTecnico;
			$silabo->codSilabus_ct = Input::get('codSilabus_ct');
			$silabo->titulo = Input::get('titulo');
			$silabo->descripcion = Input::get('descripcion');
			$silabo->orden = Input::get('orden');
			$silabo->estado = 1;
			$silabo->created_at= time();
			$silabo->updated_at = time();
			//$silabo->save();
			if ($silabo->save()) 
			{
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');
			}
			else 
			{
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
			}
			$respuesta['mensaje'] = 'silabo Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $silabo;
			
		}
		return $respuesta;
	}
}
