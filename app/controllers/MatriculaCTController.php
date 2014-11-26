<?php

class MatriculaCTController extends BaseController
{
	public function index(){
		$matriculas = MatriculaCT::all();
		return View::make('matriculaCT.index',array('matriculas'=>$matriculas));
	}
	public function edit($cod)
	{
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$matricula = MatriculaCT::where('codMatricula_ct','=',$cod)->firstOrFail();
			return View::make('matriculaCT.edit',array('matricula'=>$matricula));
		}
	}
	public function update()
	{
		//$input=Input::get('codDocente');
		$cod=Input::get('CodMatricula');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$matricula = MatriculaCT::where('codMatricula_ct','=',$cod)->firstOrFail();
			if(is_object($matricula))
			{
				$matricula->codAlumno = Input::get('CodAlumno');
				$matricula->codCargaAcademica_ct = Input::get('CodCargaAcad');
				$matricula->modulo = Input::get('mod');
				$matricula->save();
				return Redirect::to('matriculas');
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
			$matricula = MatriculaCT::where('codMatricula_ct','=',$cod)->delete();
			return Redirect::to('matriculas');
		}
	}
	public function add()
	{
		return View::make('matriculaCT.add');
	}
	public function insert()
	{
		$respuesta = MatriculaCT::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('matriculas/add')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('matriculas')->with('mensaje',$respuesta['mensaje']);
		}
	}
}