<?php

class PlanillaController extends BaseController
{
	public function index($registros=5)
	{
		$datos = Docente::paginate($registros);
		$docentes = Docente::all();
		return View::make('Planilla.index',compact("datos"),array('docentes'=>$docentes));
	}

	public function detalle_Planilla($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if (is_object($docente))
			{
				return View::make('Planilla.detalle_Planilla',array('docente'=>$docente));
			} else {
				return Redirect::to('404.html');
			}
		}
	}


}