@extends('layouts.base_admin')
@section('title')
Mantenimiento alumno
@stop
@section('content')

	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li >{{ HTML::link('/alumno','Todos') }}</li>
        			<li>{{ HTML::link('/alumno/create','Nuevo') }}</li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista alumno pago</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table" width="1000px">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Monto</th>
						<th width="200">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($alumnos as $mod)
						<tr>
							<td>{{ $mod->id }}</td>
							<td>{{ $mod->nombre }}</td>
							<td>{{ $mod->apellidos }}</td>
							<td>
								<a href="alumno/show/{{ $mod->id}}"><span class="label label-success">Mostrar</span></a>
								<a href="alumno/edit/{{ $mod->id}}"><span class="label label-info">Editar</span></a>
								<a href="{{ url('alumno/destroy',$mod->id) }}"><span class="label label-danger">Borrar</span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
  		</div>
  	</div>

  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop
