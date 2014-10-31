<?php

class ModuloController extends BaseController
{
	public function index()
	{
		$modulos = Modulo::all();
		return View::make('modulo.index',array('modulos'=>$modulos));
	}
	public function nuevo()
	{
		return View::make('modulo.nuevo');
	}
	public function crear()
	{
		$respuesta = Modulo::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('modulo/nuevo')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else 
		{
			return Redirect::to('modulo')->with('mensaje',$respuesta['mensaje']);

		}
	}
	public function actualizar()
	{
		return View::make('blank');
	}

}
