<?php

class DiaController extends \BaseController {

	public function index()
	{
		//MUESTRA TODOS LOS SEMESTRES
		$dias = Dia::all();
		return View::make('dia.index')->with('dias', $dias);
	}

	public function create()
	{
		//MUESTRA EL FORMULARIO PARA INSERTAR UN NUEVO SEMESTRE
		return View::make('dia.create');
	}

	public function store()
	{
		//RECUPERAR LOS DATOS  DE CREATE Y GUARDAR LOS DATOS EN LA BASE DE DATOS
 		$nombre = Input::get('nombre');
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Dia::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El dia ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
 		}
 		else{
 			$dia = new Dia;
			$dia->nombre = Input::get('nombre');
			$dia->save();
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
 		}
 		return Redirect::to('dia/create');
	}

	public function show($id)
	{
		//RECUPERAMOS LOS DATOS DE ID QUE LE PASEMOS Y MOSTRAMOS TODO EL REGISTRO DEL ID
		$dia = Dia::find($id);
		return View::make('dia.show')->with('dia', $dia);
	}

	public function edit($id)
	{
		//RECUPERAMOS LOS DATOS DEL ID QUE LE PASEMOS
		$dia = Dia::find($id);
		return View::make('dia.edit')->with('dia', $dia);
	}
	public function update($id)
	{
		//RECIBE EL CONTENIDO DEL TEX
		$input = Input::all();
		$dia = Dia::find($id);
		$dia->nombre = $input['nombre'];
		$nombre = $input['nombre'];
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Dia::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El dia ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
			return Redirect::to('dia/'.$id.'/edit');
 		}
 		else{
			$dia->save();
			Session::flash('message','Modificado correctamente!');
			Session::flash('class','success');
			return Redirect::to('dia/'.$id);
 		};
		//if()
		//$semestre->save();
		//return Redirect::to('semestre/'.$id);
	}

	public function destroy($id)
	{
		$dia = Dia::find($id);
		$dia->delete();
		Session::flash('message',"El Dia Eliminado Correctamente...!");
		Session::flash('class','success');;
		return Redirect::to('dia');
	}

}