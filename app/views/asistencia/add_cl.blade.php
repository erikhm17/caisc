@extends('layouts.base_admin')
@section('title')
Registro Asistencia: <small> CURSOS LIBRES </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('asistencia/add_cl','cursosLibres')}} </li>
<li>Registrar</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'asistencia/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div>
		<h1>Bienvenido:</h1><small>Ing. User</small>
	</div>
	<div>
		Seleccione su curso:
		<select>
	  		<option value="CL001">MS Word I</option>
	  		<option value="CL002">MS Excel I</option>
			  <option value="CL003">MS PowerPoint I</option>
			  <option value="CL004">LAboratorio I</option><button class="btn btn-primary btn-block" type="submit">Registrar Docente</button>
		</select>

	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<button class="btn btn-primary btn-block" type="submit">Registrar Docente</button>
	</div>
	<br>
	<br>
	<div>
		<br>
		<table border='1 solid'>
			<tr>
				<th>N°</th>
				<th>Apellidos y Nombres</th>
				<th>Presente</th>
			</tr>
			<tr>
				<td>1</td>
				<td>vargas soto joel</td>
				<td align='center'>
					<input type="checkbox" name="presente">
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>santacruz carrion cristian</td>
				<td align='center'>
					<input type="checkbox" name="presente">
				</td>
			</tr>
		</table>
	</div>
	<br>
	<br>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Registrar Asistencia Alumnos</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop

