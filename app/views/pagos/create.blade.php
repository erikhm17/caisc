@extends('layouts.base_admin')
@section('title')
Caja y Facturación
@stop
@section('content')

	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li >{{ HTML::link('/pagos','Todos') }}</li>
        			<li>{{ HTML::link('/pagos/create','Nuevo') }}</li>
        		</ul>
        	</div>
        </div>
    </nav>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
  		<div class="panel-body" >
  			<form method="post" action="store">
				<p>
					<label>Número:</label>
					<input type="text" name="id" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<label>Num. Serie:</label>
					<input type="text" name="nro_serie" placeholder="Descripcion" class="form-control" required>
				</p>
				<p>
					<label>Alumno:</label>
					<input type="text" name="id_alumno" placeholder="Monto" class="form-control" required>
				</p>
				<p>
					<label>Fecha:</label>
					<input type="text" name="fecha" placeholder="Monto" class="form-control" required>
				</p>
				<p>
					<label>Total:</label>
					<input type="text" name="total" placeholder="Monto" class="form-control" required>
				</p>
				<div class="form-group">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<button class="btn btn-info btn-block" type="reset">Cancelar</button>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<button class="btn btn-primary btn-block" type="submit">Guardar</button>
					</div>
				</div>				
			</form>
		</div>
		@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
	</div>
@stop
