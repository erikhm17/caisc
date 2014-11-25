<?php
class CargaAcademicaController extends BaseController
{
	public function MostrarCargaAcademica()
	{
		return View::make('formularioCarga');
	}
	public function MostrarCrearCarga()
	{
		return View::make('cargaAcademica/create');
	}


}

