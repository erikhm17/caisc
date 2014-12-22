<?php

class ErrorController extends BaseController
{
	public function mostrar404()
	{
		return View::make('error.404');
	}
	public function mostrar500()
	{
		return View::make('error.500');
	}
	public function blank()
	{
		return View::make('blank');
	}

}
