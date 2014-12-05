<?php

class MatriculaCLController extends BaseController
{
	public function index(){
		$matriculas = MatriculaCL::all();
		return View::make('matriculaCL.index',array('matriculascl'=>$matriculas));
	}
	public function edit($cod)
	{
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$matricula = MatriculaCL::where('id','=',$cod)->firstOrFail();
			return View::make('matriculaCL.edit',array('matricula'=>$matricula));
		}
	}
	public function update()
	{
		//$input=Input::get('codDocente');
		$cod=Input::get('idt');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCL::where('id','=',$cod)->firstOrFail();
			if(is_object($matricula))
			{
				$matricula->codAlumno = Input::get('CodAlumno');
				$matricula->codCargaAcademica_cl = Input::get('CodCargaAcad');
				$matricula->save();
				return Redirect::to('/matriculascl');
			} else {
				Redirect::to('500.html');
			}
		}
	}
	public function delete($cod)
	{
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCL::where('id','=',$cod)->delete();
			return Redirect::to('matriculascl');
		}
	}
	public function add()
	{
		return View::make('matriculaCL.add');
	}
	public function insert()
	{
		$respuesta = MatriculaCL::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('matriculascl/add')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('matriculascl')->with('mensaje',$respuesta['mensaje']);
		}
	}
}