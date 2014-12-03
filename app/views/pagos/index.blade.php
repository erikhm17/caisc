@extends('layouts.base_admin')
@section('title')
@stop
@section('content')
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li >{{ HTML::link('/detalles','Todos') }}</li>
        			<li>{{ HTML::link('/detalles/create','Nuevo') }}</li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>MODULO CAJA Y FACTURACION</h4>
  		</div>
  		<div class="panel-body">
  			    <p>
					<input type="text" name="codigo" placeholder="Codigo Alumno" class="form-control" required>
				</p>
				<p>
					<input type="text" name="nombre" placeholder="Apellidos y Nombres" class="form-control" required>
				</p>
				<p>
					<input type="text" name="carrera" placeholder="Carrera " class="form-control" required>
				</p>
				<p>
					<input type="submit" value="Agregar" class="btn btn-success">
				</p>
  		</div>
  		<div class="panel-body">
    		<table class="table">
				<thead>
					<tr>
						<th>Nro</th>
						<th>Modalidad</th>
						<th>Descripcion</th>
						<th>Importe</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>1</td>
							<td>Curso Libre</td>
							<td>Oficce</td>
							<td>180.00</td>
							<td>
								<a href="detalles/edit/{{ $user->id}}"><span class="label label-info">Editar</span></a>
								<a href="{{ url('destroy',$user->id) }}"><span class="label label-danger">Borrar</span></a>							
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
  		</div>
  		<div class="panel-body">
  				<p>
					TOTAL :<input type="text" name="total" class="form-control" required>
				</p>
				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
				<p>
					<input type="submit" value="Imprimir" class="btn btn-success">
				</p>
  		</div>
  	</div>

  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop
t