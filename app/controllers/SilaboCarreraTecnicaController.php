<?php

class SilaboCarreraTecnicaController extends BaseController {

	public function nuevo()
	{
		$codSilabo = SilabusCT::lists('codCargaAcademica_ct','id');
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.create',array('codSilabo'=>$codSilabo));
	}
	public function insertar()
	{	
		$respuesta = SilaboCursoTecnico::agregar(Input::all());

		if($respuesta['error']==true)
		{
			return Redirect::to('SilaboCarreraTecnica/create.html')->with('mensaje',$respuesta['mensaje']);
		} 
		else 
		{
			return Redirect::to('SilaboCarreraTecnica/index.html')->with('mensaje',$respuesta['mensaje']);
		}
	}

	public function ActualizarBuscandoNombre()
	{
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.edit');
	}
	public function ActualizarConID($id)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoTecnico::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Tecnica.SilaboCT.edit',array('silabocurso_ct'=>$silabo));
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
			$silabo = SilaboCursoTecnico::where('id','=',$cod)->firstOrFail();
			if(is_object($silabo))
			{
				///falta
				$silabo->titulo = Input::get('titulo');
				$silabo->descripcion = Input::get('descripcion');
				$silabo->orden = Input::get('orden');
				$silabo->updated_at = time();
				$silabo->save();
				return Redirect::to('SilaboCarreraTecnica/index.html');
			} 
			else 
			{
				Redirect::to('500.html');
			}
		}
	}

	public function get_eliminar()
	{
		$datos = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$curso_cl = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.delete',compact("datos"),array('id'=>$curso_cl));

	}
	public function post_eliminar($id=null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} 
		else 
		{
			$silabo = SilaboCursoTecnico::where('id','=',$id)->firstOrFail();
			return View::make('Cursos_Carrera_Tecnica.SilaboCT.post_eliminar',array('silabocurso_ct'=>$silabo));
			
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
			$silabo = SilaboCursoTecnico::find($cod);
			if(is_object($silabo))
			{
				$silabo->estado = 0;
				$silabo->save();
				return Redirect::to('SilaboCarreraTecnica/index.html');
			} 
			else 
			{
				return Redirect::to('500.html');
				
			}

		}
	}
	public function listar()
	{
		$datos = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','DESC')->paginate(10);
		$silabocurso_ct = SilaboCursoTecnico::where('estado','=','1')->orderBy('id','DESC')->get();
		return View::make('Cursos_Carrera_Tecnica.SilaboCT.index',compact("datos"),array('id'=>$silabocurso_ct));
	}
}
