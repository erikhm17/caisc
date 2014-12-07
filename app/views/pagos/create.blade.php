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

  			<div class="well carousel-search hidden-sm">
			 	<div class="form-inline">
	  				<p>
				  	<div class="col-xs-3">
<<<<<<< HEAD
				    	<input type="text" class="form-control" placeholder="" value="N° 0001" disabled>
				  	</div>

					<div class="col-xs-3">
						<input type="text" class="form-control" placeholder="" value="Serie: 0001" disabled>
					</div>

				  	<div class="col-xs-3">
				  		<input type="text" class="form-control" placeholder="" value="Fecha: 1-12-2014" disabled>		    	
=======
				    	<input type="text" class="form-control" placeholder="" value="N° 0001" >
				  	</div>

					<div class="col-xs-3">
						<input  name="nro_serie" type="text" class="form-control" placeholder="" value="001">
					</div>

				  	<div class="col-xs-3">
				  		<input name="fecha" type="text" class="form-control" placeholder="" value="1-12-2014">		    	
>>>>>>> dd7518767c0ec90232d8815c6abb7b99eb9081c0
				  	</div>

				  	</p>
				</div>
			</div>
<<<<<<< HEAD


  			
			<br>
			<!--<div class="well carousel-search hidden-sm">
			<div class="form-inline">
       				
				    <div class="input-group">
				      <div class="input-group-addon">Numero:</div>
				      <input type="text" class="form-control" placeholder="" value="0001" disabled>
				    </div>
				    <div class="input-group">				    	
				      <div class="input-group-addon">Fecha:</div>
				      <input type="text" class="form-control" placeholder="" value="1-12-2014" disabled>				      	  
				    </div>
				
			</div>				
			</div>-->

			
  			
			<!--<div class="form-horizontal" >
				<div class="form-group">
			    	<label  class="col-sm-2 ">Código:</label>
				    <div class="col-sm-7">
				    	<input type="text" class="form-control" id="" >
				    </div>
			  	</div>
			</div>-->

=======
			<br>
>>>>>>> dd7518767c0ec90232d8815c6abb7b99eb9081c0
			<p>
				<label>Código:</label>
				<div class="form-inline">			  	
				  	<div class="form-group">
<<<<<<< HEAD
				    	<input type="text" class="form-control" id="" placeholder="100504">
				  	</div>
				  	<button type="button" class="btn btn-default btn-sm">
					  	<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
					</button>
=======

				    	<input name="id_alumno" type="text" class="form-control" placeholder="100504" value="100504">
				  	</div>
				  	<a  href="./showAlumno/100504"><span class="glyphicon glyphicon-search" id="buscar" aria-hidden="true"  >Buscar</span></a>

>>>>>>> dd7518767c0ec90232d8815c6abb7b99eb9081c0
					<button type="button" class="btn btn-default btn-sm">
					  	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
					</button>
				</div>

			</p>
<<<<<<< HEAD

			<p>
				<label>Nombres:</label>
				<input type="text" name="id" placeholder="" class="form-control" required>
			</p>
			<p>
				<label>Apellidos:</label>
				<input type="text" name="id" placeholder="" class="form-control" required>
			</p>

			
			<div class="well carousel-search hidden-sm">
			 	<label>Modalidad de Pago:</label>
		        <select  class="form-control">
			  		<option value="CL001">Operador de Sistemas Computarizados</option>
			  		<option value="CL002">Operador de Sistemas Contables</option>
		   		    <option value="CL003">Tecnico en Redes de Computadoras</option>
		   		    <option value="CL004">Programador de Sistemas</option>
		   		    <option value="CL005">Analista de Sistemas</option>
				</select>
		    </div>

		


			<!--<div class="well carousel-search hidden-sm">
			 	<label>Modalidad de Pago:</label>
		        <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#">Modalidades <span class="caret"></span></a>
		            <ul class="dropdown-menu">
		                <li><a href="#">Matricula</a></li>
		                <li><a href="#">Certificado</a></li>                
		            </ul>
		        </div>
			</div>-->




			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Monto</th>
						<th width="200">Acciones</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>  
			</table>

			</form>
=======
		 <p>
        <label>Nombres:</label>

        <input type="text" id="nombres" placeholder="" class="form-control" required value="nombre de alumno">
      	</p>
      	<p>
        <label>Apellidos:</label>
        <input type="text" id="apellidos" placeholder="" class="form-control" required value="apellido de alumno">
      	</p>	
		<div class="well carousel-search hidden-sm">
		<div class="form-group">
			{{ Form::label('modalidad_id','Modalidad de Pago :',array('class'=>'col-sm-2 control-label')) }}
			<div class="col-sm-6 col-md-4">
			{{ Form::select('modalidad_id',$modalidad,null,array('class'=>'form-control'))}}
			</div>
		</div>
		<script type="text/javascript">
			function agregar_detalle()
			{

				var Nro="1";
				var inp = document.getElementById("modalidad_id").value;
				var concpt= "pago certificado";
				nro.innerHTML=Nro;
				concepto.innerHTML=concpt;
				inport.innerHTML=inp;
				total_pago.value=inp;

			}
	

		</script>
		<input name="agrega_detil" type="button" onclick="agregar_detalle()" value="agregar detalle" />
		<input type="submit" value="guardar" class="btn btn-success">
				    </div>
		<table id="detalle_pago" class="table table-striped">
				<thead>
					<tr>
						<th>Nro</th>
						<th>Concepto</th>
						<th>Importe</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
						<tr id="rows">
							<td id="nro"></td>
							<td id="concepto"></td>
							<td id="inport"></td>
							<td>
								<a href=""><span class="label label-success">Mostrar</span></a>
								<a href=""><span class="label label-info">Editar</span></a>
								<a href=""><span class="label label-danger">Borrar</span></a>
							</td>
						</tr>
				</tbody>
		</table>
		 <p>
        <label>TOTAL:</label>
        <input type="text" id="total_pago" class="form-control">
      	</p>
		</form>
>>>>>>> dd7518767c0ec90232d8815c6abb7b99eb9081c0
		</div>
		@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
	</div>
@stop
