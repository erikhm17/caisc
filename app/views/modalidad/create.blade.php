@extends('layouts.base_admin')
@section('title')
Mantenimiento Modalidad
@stop
@section('content')

	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
      				<li >{{ HTML::link('/modalidad','Todos') }}</li>
        			<li>{{ HTML::link('/modalidad/create','Nuevo') }}</li>        			
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
  		<div class="panel-body">
  			<form method="post" action="store">
				<p>
					<label>Nombre:</label>
					<input type="text" name="id" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<label>Descripción:</label>
					<input type="text" name="descripcion" placeholder="Descripcion" class="form-control" required>
				</p>
				<p>
					<label>Monto:</label>
					<input type="text" name="monto" placeholder="Monto" class="form-control" required>
				</p>
				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
			</form>
		</div>
		@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
	</div>
@stop
