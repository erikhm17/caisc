<?php

class SilaboCarreraLibreController extends BaseController {

	public function nuevo()
	{
		$codSilabo = SilabusCL::lists('codCargaAcademica_cl','id');
		return View::make('Cursos_Carrera_Libre.SilaboCL.create',array('codSilabo'=>$codSilabo));
	}
	public function insertar()
	{	
		$respuesta = SilaboCursoLibre::agregar(Input::all());

		if($respuesta['error']==true)
		{
			return Redirect::to('SilaboCarreraLibre/create.html')->with('mensaje',$respuesta['mensaje'])->withInput();
		} 
		else 
		{
			return Redirect::to('SilaboCarreraLibre/index.html')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function ActualizarBuscandoNombre()
	{
		return View::make('Cursos_Carrera_Libre.SilaboCL.edit');
	}
	public function ActualizarConID($id)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoLibre::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Libre.SilaboCL.edit',array('silabocurso_cl'=>$silabo));
		}
	}
	public function post_actualizar()
	{
		$cod=Input::get('id');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoLibre::where('id','=',$cod)->firstOrFail();
			if(is_object($silabo))
			{
				///falta
				$silabo->titulo = Input::get('titulo');
				$silabo->descripcion = Input::get('descripcion');
				$silabo->orden = Input::get('orden');
				$silabo->updated_at = time();
				$silabo->save();
				return Redirect::to('SilaboCarreraLibre/index.html');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}

	public function get_eliminar()
	{
		$datos = SilaboCursoLibre::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$curso_cl = SilaboCursoLibre::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('Cursos_Carrera_Libre.SilaboCL.delete',compact("datos"),array('id'=>$curso_cl));

	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoLibre::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Libre.SilaboCL.post_eliminar',array('silabocurso_cl'=>$silabo));
			
		}
	}
	public function eliminando()
	{
		$cod=Input::get('id');
		
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoLibre::find($cod);
			if(is_object($silabo))
			{
				$silabo->estado = 0;
				$silabo->save();
				return Redirect::to('SilaboCarreraLibre/index.html');
			} 
			else 
			{
				return Redirect::to('500.html');
				
			}

		}
	}
	public function listar()
	{
		$datos = SilaboCursoLibre::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$silabocurso_cl = SilaboCursoLibre::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('Cursos_Carrera_Libre.SilaboCL.index',compact("datos"),array('id'=>$silabocurso_cl));
	}
}
