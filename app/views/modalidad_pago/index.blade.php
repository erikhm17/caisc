@extends('layouts.base_admin')
@section('title')
Lista de Modulos
@stop
@section('content')
	{{ HTML::link('modulo/nuevo.html','Agregar Nuevo Modulo') }}
	<form>
		<div class="input-group input-group-sm">
			<input class="form-control" type="text"></input>
			<span class="input-group-btn">
				<button class="btn btn-info btn-flat" type="button" >Buscar</button>
			</span>
		</div>
	</form>
	<ul>
	@foreach( $modulos as $modulo)
	<li><a href="#">{{ $modulo->id }} {{ $modulo->nombre }} </a> <a href="#">Eliminar</a> | <a href="#actualizar">Actualizar</a></li>
	@endforeach
	</ul>
@stop
