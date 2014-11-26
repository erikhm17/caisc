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
	  		<option value="CL001">Operador de computadoras</option>
	  		<option value="CL002">Ensamblaje y mantenimiento de computadoras</option>
			  <option value="CL003"> Desarrollo de aplicaciones .NET</option>
			  <option value="CL004">Desarrollo de aplicaciones WEB</option>
			  <option value="CL004">Programas contables </option>
			  <option value="CL004">ARCGIS, AutoCAD </option>
			  <button class="btn btn-primary btn-block" type="submit">Registrar Docente</button>
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
				<th>Codigo</th>
				<th>Apellidos y Nombres</th>
				<th>Presente</th>
			</tr>
			<tr>
				<td>1</td>
				<td>AL00000001</td>
				<td>VARGAS SOTO-JOEL YURI</td>
				<td align='center'>
					<input type="checkbox" name="presente">
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>AL00000002</td>
				<td>RAYME CHAMBI-ERWIN MIULLER</td>
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

