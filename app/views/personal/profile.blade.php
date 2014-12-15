@extends('layouts.base_admin')
@section('title')
Perfil <small>PERSONAL</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('personal','Personal') }}</li>
<li>{{$personal->nombre}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		{{ HTML::image('assets/foto/'.$personal->foto,'User Image',array('class'=>'')) }}
		<p align="center"><b>código:</b>{{ $personal->id }}</p>
		<p align="center">{{ HTML::link('personal/imagen/'.$personal->id,'Cambiar Imagen') }} </p>
	</div>
	<div class="col-lg-7">
		<p>{{ HTML::link('personal/edit/'.$personal->id,'Editar') }} {{ HTML::link('personal/delete/'.$personal->id,'Eliminar') }}</p>
		<p><b>DNI:</b>{{ $personal->dni }}</p>
		<p><b>Nombre:</b> {{ $personal->nombre }}</p>
		<p><b>Apellidos:</b> {{ $personal->apellidos }}</p>
		<p><b>Dirección:</b> {{ $personal->direccion }}</p>
		<p><b>Teléfono:</b> {{ $personal->telefono}}</p>
		<p><b>E-mail:</b> {{ $personal->email }}</p>
		<p><b>Estado:</b> {{ $personal->estado }}</p>
		<p><b>Cargo:</b> {{ $personal->cargo }}</p>
	</div>
</div>
@stop
