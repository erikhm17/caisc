<?php

class ModalidadPago extends Eloquent {

	protected $table = 'modalidad_pago';
	protected $fillable = array('id','nombre','descripcion', 'monto');
	
	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'id'=>array('required','max:10'),
			'nombre'=>array('required','max:50'),	
			'descripcion'=>array('required','max:50'),
			'monto'=>array('required','max:50')		
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails())
		{
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else
		{
			$modulo = static::create($input);
			$respuesta['mensaje'] = 'Modalidad de Pago Creado';
			$respuesta['error'] = false;
			$respuesta['data'] = $modulo;
		}
		return $respuesta;
	}
}

