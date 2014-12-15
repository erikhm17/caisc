<?php

class MatriculaCTController extends BaseController
{
	public function index(){
		$matriculas = MatriculaCT::all();
		return View::make('matriculaCT.index',array('matriculas'=>$matriculas));
	}
	public function lista(){
		$matriculas = MatriculaCT::all();
		return View::make('matriculaCT.lista',array('matriculas'=>$matriculas));
	}
	public function listacursos(){
		$mod='2';
		$cursos = CargaAcademicaCT::where('semestre','=',$mod)->get();
		return View::make('matriculaCT.listaCursos',array('cursos'=>$cursos));
	}
	public function listacursosnuevos(){
		$cod = Input::get('codAlumno');
		$mayor = DB::table('matricula_ct')
							->where('codAlumno','=',$cod)
							->max('modulo');
		$mod=(int)($mayor)+1;
		$cursos = CargaAcademicaCT::where('semestre','=',$mod)->get();
		return View::make('matriculaCT.listaCursos',array('cursos'=>$cursos));
	}

	public function listaMatri($cod){
		$matriculas = MatriculaCT::where('codAlumno','=',$cod)->get();
		return View::make('matriculaCT.lista',array('matriculas'=>$matriculas));
	}
	public function listaMatricula(){
		$cod = Input::get('codAlumno');
		$matriculas = MatriculaCT::where('codAlumno','=',$cod)->get();
		$mayor = DB::table('matricula_ct')
							->where('codAlumno','=',$cod)
							->max('modulo');
		return View::make('matriculaCT.lista',array('matriculas'=>$matriculas));
	}
	public function edit($cod)
	{
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$matricula = MatriculaCT::where('id','=',$cod)->firstOrFail();
			return View::make('matriculaCT.edit',array('matricula'=>$matricula));
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
			$matricula = MatriculaCT::where('id','=',$cod)->firstOrFail();
			if(is_object($matricula))
			{
				$matricula->codAlumno = Input::get('CodAlumno');
				$matricula->codCargaAcademica_ct = Input::get('CodCargaAcad');
				$matricula->modulo = Input::get('mod');
				$matricula->save();
				return Redirect::to('/matriculas');
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
			$matricula = MatriculaCT::where('id','=',$cod)->delete();
			return Redirect::to('matriculas');
		}
	}
	public function add()
	{
		$modulos = Modulo::lists('id','nombre');
		return View::make('matriculaCT.add',array('modulos'=>$modulos));
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