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
              <input type="text" class="form-control" placeholder="" value="N° 0001" disabled>
            </div>

          <div class="col-xs-3">
            <input type="text" class="form-control" placeholder="" value="Serie: 0001" disabled>
          </div>

            <div class="col-xs-3">
              <input type="text" class="form-control" placeholder="" value="Fecha: 1-12-2014" disabled>         
            </div>

            </p>
        </div>
      </div>
      <br>
      <p>
        <div class="form-inline">         
        </div>
        <div>
        </p>
       @if (!empty($alumno))
        <p>
        <label>Codigo:</label>
        <input type="text" name="id" value="{{ $alumno->id}}" class="form-control" required>
        </p>
        <p>
        <label>Nombres:</label>
        <input type="text" name="id" value="{{ $alumno->nombre}}" class="form-control" required>
        </p>
        <p>
        <label>Apellidos:</label>
        <input type="text" name="id" value="{{ $alumno->apellidos}}" class="form-control" required>
        </p>
        @else
        <p>
          No existe información para ésta modalidad.
        </p>
        @endif
        </div>
        <div class="form-group">
      {{ Form::label('modalidad_id','Modalidad de Pago :',array('class'=>'col-sm-2 control-label')) }}
      <div class="col-sm-6 col-md-4">
      {{ Form::select('modalidad_id',$modalidad,null,array('class'=>'form-control'))}}
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
        <input type="submit" value="guardar" class="btn btn-success">
        </p>  
      </table>

      </form>
    </div>
    @if(Session::has('message'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
  </div>
@stop
