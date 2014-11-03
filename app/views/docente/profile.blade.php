@extends('layouts.base_admin')
@section('title')
Perfil <small>Docente</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Docentes') }}</li>
<li>{{$docente->nombre}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		{{ HTML::image('assets/img/avatar4.png','User Image',array('class'=>'')) }}
		<p align="center"><b>código:</b>{{ $docente->codDocente }}</p>
	</div>
	<div class="col-lg-7">
		<p>{{ HTML::link('docente/edit/'.$docente->codDocente,'Editar') }} {{ HTML::link('docente/delete/'.$docente->codDocente,'Eliminar') }}</p>
		<p><b>DNI:</b>{{ $docente->dni }}</p>
		<p><b>Nombre:</b> {{ $docente->nombre }}</p>
		<p><b>Apellidos:</b> {{ $docente->apellidos }}</p>
		<p><b>Dirección:</b> {{ $docente->direccion }}</p>
		<p><b>Teléfono:</b> {{ $docente->telefono}}</p>
		<p><b>E-mail:</b> {{ $docente->email }}</p>
	</div>
</div>
@stop