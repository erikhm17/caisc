<?php

class DocenteController extends BaseController
{
	public function index()
	{
		$docentes = Docente::all();
		return View::make('docente.index',array('docentes'=>$docentes));
	}
	public function nuevo()
	{
		return View::make('docente.nuevo');
	}
	public function crear()
	{
		$respuesta = Docente::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('docente/nuevo')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else 
		{
			return Redirect::to('docente')->with('mensaje',$respuesta['mensaje']);

		}
	}
	public function actualizar()
	{
		return View::make('blank');
	}

}
