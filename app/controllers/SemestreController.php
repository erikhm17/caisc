<?php

class SemestreController extends \BaseController {

	public function index()
	{
		//MUESTRA TODOS LOS SEMESTRES
		$semestres = Semestre::all();
		return View::make('semestre.index')->with('semestres', $semestres);
	}

	public function create()
	{
		//MUESTRA EL FORMULARIO PARA INSERTAR UN NUEVO SEMESTRE
		return View::make('semestre.create');
	}

	public function store()
	{
		//RECUPERAR LOS DATOS  DE CREATE Y GUARDAR LOS DATOS EN LA BASE DE DATOS
 		$nombre = Input::get('nombre');
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Semestre::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El semestre ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
 		}
 		else{
 			$semestre = new Semestre;
			$semestre->nombre = Input::get('nombre');
			$semestre->save();
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
 		}
 		return Redirect::to('semestre/create');
	}

	public function show($id)
	{
		//RECUPERAMOS LOS DATOS DE ID QUE LE PASEMOS Y MOSTRAMOS TODO EL REGISTRO DEL ID
		$semestre = Semestre::find($id);
		return View::make('semestre.show')->with('semestre', $semestre);
	}

	public function edit($id)
	{
		//RECUPERAMOS LOS DATOS DEL ID QUE LE PASEMOS
		$semestre = Semestre::find($id);
		return View::make('semestre.edit')->with('semestre', $semestre);
	}

	public function update($id)
	{
		//RECIBE EL CONTENIDO DEL TEX
		$input = Input::all();
		$semestre = Semestre::find($id);
		$semestre->nombre = $input['nombre'];
		$nombre = $input['nombre'];
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Semestre::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El semestre ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
			return Redirect::to('semestre/'.$id.'/edit');
 		}
 		else{
			$semestre->save();
			Session::flash('message','Modificado correctamente!');
			Session::flash('class','success');
			return Redirect::to('semestre/'.$id);
 		};
		//if()
		//$semestre->save();
		//return Redirect::to('semestre/'.$id);
	}

	public function destroy($id)
	{
		$semestre = Semestre::find($id);
		$semestre->delete();
		Session::flash('message',"El semestre Eliminado Correctamente...!");
		Session::flash('class','success');;
		return Redirect::to('semestre');
	}

}
