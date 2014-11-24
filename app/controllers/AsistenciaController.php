<?php

class AsistenciaController extends BaseController
{
	public function add_ct()
	{
		return View::make('asistencia.add_ct');
	}

	public function add_cl()
	{
		return View::make('asistencia.add_cl');
	}
}