@extends('layouts.base_admin')
@section('title')
Agregar Alumno
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('url'=>'alumno')) }}

<div class="form-group">codAlumno             :
{{Form::text('codAlumno')}}
</div>
<div class="form-group"> nombre           : 
{{Form::text('nombre')}}
</div>
<div class="form-group"> Apellidos     : 
{{Form::text('apellidos')}}
</div>
<div class="form-group"> DNI                      : 
{{Form::text('dni')}}
</div>
<div class="form-group"> Dirección         : 
{{Form::text('direccion')}}
</div>
<div class="form-group"> Teléfono         : 
{{Form::text('telefono')}}
</div>
<div class="form-group"> E-mail            :
{{Form::email('email')}}
</div>
<div class="form-group"> Password    : 
{{Form::text('password')}}
</div>
<div class="form-group"> Modulo      : 
{{Form::text('modulo')}}
</div>
<div class="form-group"> Estado      : 
{{Form::text('estado')}}
</div>
<div class="form-group"> codCarrera  : 
{{Form::text('codCarrera')}}
</div>
<div class="form-group">
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="reset">Nuevo</button>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="reset">
		{{ HTML::linkAction('AlumnoController@index', 'Listar') }}
		</button>
	</div>
</div>
{{Form::close()}}
</div>
@stop
