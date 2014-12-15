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
        <div class="well carousel-search hidden-sm">
        <div class="form-inline">
            <p>
            <div class="col-xs-3">
              <input type="text" class="form-control" placeholder="" value="N° 0001" >
            </div>

          <div class="col-xs-3">
            <input  name="nro_serie" type="text" class="form-control" placeholder="" value="001">
          </div>

            <div class="col-xs-3">
              <input name="fecha" type="text" class="form-control" placeholder="" value="2014-12-13">         
            </div>

            </p>
        </div>
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

         <input name="id_alumno" type="text" class="form-control" placeholder="100512" value="100512">
        </p>
        <p>
        <label>Nombres:</label>
        <input type="text" name="nombres" value="{{ $alumno->nombre}}" class="form-control" required>
        </p>
        <p>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="{{ $alumno->apellidos}}" class="form-control" required>
        </p>
        @else
        <p>
          No existe información para ésta modalidad.
        </p>
        @endif
        </div>
        <div class="form-group">
      {{ Form::label('modalidad_id','Modalidad de Pago :',array('class'=>'col-sm-5 control-label')) }}
      <div class="col-sm-6 col-md-4">
      {{ Form::select('modalidad_id',$modalidad,null,array('class'=>'form-control'))}}
      </div>
      <script type="text/javascript">
      function agregar_detalle()
      {

        var num="1";
        var inp = document.getElementById("modalidad_id").value;
        var concpt= "pago certificado";
        //var concpt= document.getElementById("modalidad_id");
        //var con = <?php echo "hola"; ?>
        nro.innerHTML=num;
        concepto.innerHTML=concpt;
        inport.innerHTML=inp;
        total_pago.value=inp;
        mostrar.innerHTML="Mostrar";
        editar.innerHTML="Editar";
        eliminar.innerHTML="Eliminar";

      }
    </script>
    <script type="text/javascript">
      function eliminar_detalle()
      {
        nro.innerHTML="";
        concepto.innerHTML="";
        inport.innerHTML="";
        total_pago.value="";
        mostrar.innerHTML="";
        editar.innerHTML="";
        eliminar.innerHTML="";
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
                <a href=""><span id="mostrar" class="label label-success"></span></a>
                <a href=""><span id="editar" class="label label-info"></span></a>
                <a onclick="eliminar_detalle()"><span id="eliminar" class="label label-danger"></span></a>
              </td>
            </tr>
        </tbody>
    </table>
     <p>
        <label>TOTAL:</label>
        <input type="text" name="total" class="form-control" id="total_pago">
        <br>
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
