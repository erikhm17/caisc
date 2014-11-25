<?php

class ModalidadPagoController extends BaseController
{
	public function index()
	{
		$ModalidadPagos = ModalidadPago::all();
		return View::make('modalidad_pago.index',array('ModalidadPagos'=>$ModalidadPagos));
	}
	public function nuevo()
	{
		return View::make('modalidad_pago.nuevo');
	}
	public function crear()
	{
		$respuesta = ModalidadPago::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('modalidad_pago/nuevo')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else 
		{
			return Redirect::to('modalidad_pago')->with('mensaje',$respuesta['mensaje']);

		}
	}
	public function actualizar()
	{
		return View::make('blank');
	}

}
