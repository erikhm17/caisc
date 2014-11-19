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
  		<div class="panel-body" weith = "50px" >
  			<form method="post" action="store">
				<p>
					<input type="text" name="id" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<input type="text" name="descripcion" placeholder="Descripcion" class="form-control" required>
				</p>
				<p>
					<input type="text" name="monto" placeholder="Monto" class="form-control" required>
				</p>
				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
			</form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop
