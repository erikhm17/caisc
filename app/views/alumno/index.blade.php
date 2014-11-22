@extends('layouts.base_admin')
@section('title')
Lista de Alumno
@stop
@section('content')
	<form>
		<div class="input-group input-group-sm">
			<input class="form-control" type="text"></input>
			<span class="input-group-btn">
				<button class="btn btn-info btn-flat" type="button" >Buscar</button>
			</span>
		</div>
	</form>
	<ul>
	<table border="1">
	@foreach( $alumnos as $alumno)
	<tr>
	<td><a href="alumno/{{$alumno->id}}">{{ $alumno->id }} {{ $alumno->nombre }}</a></td>
	<td><a href="alumno/{{$alumno->id}}/edit">Modificar</a></td>
	<td><a href="#actualizar"></a></td>
	</tr>
	@endforeach
	</table>
	</ul>
@stop