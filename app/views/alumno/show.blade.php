@extends('layouts.base_admin')
@section('title')
Alumno
@stop
@section('content')
<h1>Perfil Alumno</h1>
<p><b>código:</b>{{$alumno->id}}</p>
<p><b>DNI:</b>{{$alumno->dni}}</p>
<p><b>Nombre:</b> {{$alumno->nombre}}</p>
<p><b>Apellidos:</b> {{$alumno->apellidos}} </p>
<p><b>Dirección:</b> {{$alumno->direccion}}</p>
<p><b>Teléfono:</b>{{$alumno->telefono}}</p>
<p><b>E-mail:</b> {{$alumno->email}}</p>
<p><b>Password:</b> {{$alumno->pasword}}</p>
<p><b>Modulo:</b> {{$alumno->modulo}}</p>
<p><b>Estado:</b> {{$alumno->estado}}</p>
<p><b>codCarrera:</b> {{$alumno->codCarrera}}</p>
@stop