@extends('layouts.base_admin')
@section('title')
Lista de Docentes
@stop
@section('content')
	{{ HTML::link('docente/nuevo.html','Agregar Nuevo Docente') }}
	<form>
		<div class="input-group input-group-sm">
			<input class="form-control" type="text"></input>
			<span class="input-group-btn">
				<button class="btn btn-info btn-flat" type="button" >Buscar</button>
			</span>
		</div>
	</form>
	<ul>
	@foreach( $docentes as $docente)
	<li><a href="#">{{ $docente->nombre }} {{ $docente->apellidos }} </a> <a href="#">Eliminar</a> | <a href="#actualizar">Actualizar</a></li>
	@endforeach
	</ul>
@stop
