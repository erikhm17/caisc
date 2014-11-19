@extends('layouts.base_admin')
@section('title')
Mantenimiento Modalidad
@stop
@section('content')

	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li ><a href="/caisc/public/modalidad/index">Todos</a></li>
        			<li><a href="/caisc/public/modalidad/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista modalidad pago</h4>
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
					@foreach($modalidad as $mod)
						<tr>
							<td>{{ $mod->id }}</td>
							<td>{{ $mod->descripcion }}</td>
							<td>{{ $mod->monto }}</td>
							<td>
								<a href="/caisc/public/modalidad/show/{{ $mod->id}}"><span class="label label-success">Mostrar</span></a>
								<a href="/caisc/public/modalidad/edit/{{ $mod->id}}"><span class="label label-info">Editar</span></a>
								<a href="{{ url('/caisc/public/modalidad/destroy',$mod->id) }}"><span class="label label-danger">Borrar</span></a>
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
