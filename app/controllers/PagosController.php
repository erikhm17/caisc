<?php

class PagosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$pagos = Pagos::orderBy('id','DESC')->get();

		return View::make('pagos.index')->with('pagos',$pagos);
	}

	public function index()
	{
		$pagos = Pagos::orderBy('id','DESC')->get();

		return View::make('pagos.index')->with('pagos',$pagos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('pagos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pagos = new Pagos;

		$pagos->id = Input::get('id');
		$pagos->nro_serie = Input::get('nro_serie');
		$pagos->id_alumno = Input::get('id_alumno');
		$pagos->fecha = Input::get('fecha');
		$pagos->total_pago = Input::get('total_pago');

		if ($pagos->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('pagos/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  String  $nombre
	 * @return Response
	 */
	public function getShow($id = null)
	{
		$pagos = Pagos::find($id);
		//$pagos = Pagos::getAttribute($id)
		//$pagos = Pagos::table('pagos_pago')-->where('nombre','=',$nombre)-->get();
		return View::make('pagos.show')->with('pagos',$pagos);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  String $id
	 * @return Response
	 */
	public function getEdit($id = null)
	{
		$pagos = Pagos::find($id);

		return View::make('pagos.edit')->with('pagos',$pagos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$pagos = Pagos::find($id);

		$pagos->id = Input::get('id');
		$pagos->nro_serie = Input::get('nro_serie');
		$pagos->id_alumno = Input::get('id_alumno');
		$pagos->fecha = Input::get('fecha');
		$pagos->total_pago = Input::get('total_pago');

		if ($pagos->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
		return Redirect::to('pagos/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pagos = Pagos::find($id);

		if ($pagos->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('pagos');
	}

}