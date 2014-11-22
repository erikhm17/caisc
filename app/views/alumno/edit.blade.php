
@extends('layouts.base_admin')
@section('title')
Modificar Alumno
@stop
@section('content')
{{ Form::open(array('url'=>'alumno/' . $alumno->id, 'method'=>'put')) }}

<div class="form-group">codAlumno	:
{{Form::text('codAlumno', $alumno->id)}}
</div>
<div class="form-group"> nombre     : 
{{Form::text('nombre', $alumno->nombre)}}
</div>
<div class="form-group"> Apellidos  : 
{{Form::text('apellidos', $alumno->apellidos)}}
</div>
<div class="form-group"> DNI: 
{{Form::text('dni', $alumno->dni)}}
</div>
<div class="form-group"> Dirección: 
{{Form::text('direccion', $alumno->direccion)}}
</div>
<div class="form-group"> Teléfono: 
{{Form::text('telefono', $alumno->telefono)}}
</div>
<div class="form-group"> E-mail:
{{Form::email('email', $alumno->email)}}
</div>
<div class="form-group"> Password: 
{{Form::text('pasword', $alumno->pasword)}}
</div>
<div class="form-group"> Modulo: 
{{Form::text('modulo', $alumno->modulo)}}
</div>
<div class="form-group"> Estado: 
{{Form::text('estado')}}
</div>
<div class="form-group"> codCarrera: 
{{Form::text('codCarrera')}}
</div>
<br>
{{Form::submit('Modificar')}}
@stop