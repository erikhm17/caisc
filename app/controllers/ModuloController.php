<?php

class ModuloController extends \BaseController {

	public function index()
	{
		//MUESTRA TODOS LOS SEMESTRES
		$modulos = Modulo::all();
		return View::make('modulo.index')->with('modulos', $modulos);
	}

	public function create()
	{
		//MUESTRA EL FORMULARIO PARA INSERTAR UN NUEVO SEMESTRE
		return View::make('modulo.create');
	}

	public function store()
	{
		//RECUPERAR LOS DATOS  DE CREATE Y GUARDAR LOS DATOS EN LA BASE DE DATOS
 		$nombre = Input::get('nombre');
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Modulo::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El modulo ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
 		}
 		else{
 			$modulo = new Modulo;
			$modulo->nombre = Input::get('nombre');
			$modulo->save();
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
 		}
 		return Redirect::to('modulo/create');
	}

	public function show($id)
	{
		//RECUPERAMOS LOS DATOS DE ID QUE LE PASEMOS Y MOSTRAMOS TODO EL REGISTRO DEL ID
		$modulo = Modulo::find($id);
		return View::make('modulo.show')->with('modulo', $modulo);
	}

	public function edit($id)
	{
		//RECUPERAMOS LOS DATOS DEL ID QUE LE PASEMOS
		$modulo = Modulo::find($id);
		return View::make('modulo.edit')->with('modulo', $modulo);
	}

	public function update($id)
	{
		//RECIBE EL CONTENIDO DEL TEX
		$input = Input::all();
		$modulo = Modulo::find($id);
		$modulo->nombre = $input['nombre'];
		$nombre = $input['nombre'];
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Modulo::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El modulo ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
			return Redirect::to('modulo/'.$id.'/edit');
 		}
 		else{
			$modulo->save();
			Session::flash('message','Modificado correctamente!');
			Session::flash('class','success');
			return Redirect::to('modulo/'.$id);
 		};
		//if()
		//$semestre->save();
		//return Redirect::to('semestre/'.$id);
	}

	public function destroy($id)
	{
		$modulo = Modulo::find($id);
		$modulo->delete();
		Session::flash('message',"El modulo Eliminado Correctamente...!");
		Session::flash('class','success');;
		return Redirect::to('modulo');
	}

}