@extends('layouts.base_admin')
@section('title')
Agregar Personal <small> NUEVO PERSONAL </small>
@stop
@section('breadcrumb')
<li>Agregar</li>
@stop
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>principal</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    table tr td,th {
        text-align: center;
        border: 1px solid;
        border-color: #5882FA;
    }
.inputs,.lbls{
    display: inline;

}
</style>
<body>
    <header id="inicio">
        <h2>Tipo Carrera Tecnica</h2>
    </header>
    <section id="formularioCarga" role="form">
        {{ Form::open(array('url' => '/recogerDatos')) }}
            
            <div>{{Form::label('lblTipo','Tipo: Carrera Tecnica')}}</div>

       <!-- <p class="lbls">{{Form::label('lblCargaCodigo','Carga Codigo')}}</p>
            <p class="inputs">{{Form::text('txtCodCargaAcademica_ct')}}</p>     
        -->
            <p class="lbls">{{Form::label('lblSemestre','Semestre')}}</p>
            <!--<p class="inputs">{{Form::text('txtSemestre')}}</p> --> 
            <div class="inputs">{{ Form::select('cmbSemestre', $varElementosComboSemestre) }}</div>

            <p class="lbls">{{Form::label('lblCurso','Curso:')}}</p>
            <div class="inputs">{{ Form::select('cmbCursos', $varElementosComboCodCurso_ct) }}</div>
            
            <p class="lbls">{{Form::label('lblDocente','Docente:')}}</p>
            <div class="inputs">{{ Form::select('cmbDocentes', $varElementosComboCodDocente) }}</div>
            
            <p class="lbls">{{Form::label('lblAula','Aula:')}}</p>
            <div class="inputs">{{ Form::select('cmbAulas', $varElementosComboCodAula) }}</div>

            <p class="lbls">{{Form::label('lblTurno','Turno:')}}</p>
            <div class="inputs">{{ Form::select('cmbTurnos', $varElementosComboTurno) }}</div>
            
            <p class="lbls">{{Form::label('lblGrupo','Grupo:')}}</p>
            <div class="inputs">{{ Form::select('cmbGrupos', $varElementosComboGrupo) }}</div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="warning">
                            <th>Hora</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sabado</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>
                            7-8
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosLunes', '7-8', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMartes', '7-8', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMiercoles', '7-8', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosJueves', '7-8', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosViernes', '7-8', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosSabado', '7-8', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            8-9
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosLunes', '8-9', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMartes', '8-9', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMiercoles', '8-9', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosJueves', '8-9', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosViernes', '8-9', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosSabado', '8-9', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            9-10
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosLunes', '9-10', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMartes', '9-10', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMiercoles', '9-10', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosJueves', '9-10', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosViernes', '9-10', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosSabado', '9-10', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            10-11
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosLunes', 'D1', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMartes', 'D2', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMiercoles', 'D3', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosJueves', 'D4', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosViernes', 'D5', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosSabado', 'D6', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            20-21
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosLunes', 'M1', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMartes', 'M2', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMiercoles', 'M3', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosJueves', 'M4', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosViernes', 'M5', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosSabado', 'M6', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            21-22
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosLunes', 'A7', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMartes', 'A8', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosMiercoles', 'A9', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosJueves', 'A10', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosViernes', 'A11', false);}}
                        </td>
                        <td>
                            {{Form::checkbox('rbHorariosSabado', 'A12', false);}}
                        </td>
                    </tr>
                </table>
            </div>
        <p>{{Form::submit('Registrar')}}</p>
        {{ Form::close() }}
        
        <td>{{ HTML::link(URL::to('/mostrarDatos'), 'Mostrar Datos') }}</td>
        
    </section>
</body>
</html>

@stop

