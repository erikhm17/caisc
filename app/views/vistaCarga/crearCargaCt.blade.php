@extends('layouts.base_admin')
@section('title')
Agregar Personal <small> NUEVO PERSONAL </small>
@stop
@section('breadcrumb')
<li>Agregar</li>
@stop
@section('content')
<html>
<head>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
{{HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}
{{HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css')}}
{{HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js')}}
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
            <div class="inputs">{{ Form::select('cmbSemestre', $varElementosComboSemestre)}}</div>

            <p class="lbls">{{Form::label('lblCurso','Curso:')}}</p>
            <div class="inputs">{{ Form::select('cmbCursos', $varElementosComboCodCurso_ct) }}</div>
            
            <p class="lbls">{{Form::label('lblDocente','Docente:')}}</p>
            <div class="inputs">{{ Form::select('cmbDocentes', $varElementosComboCodDocente) }}</div>
            
            <p class="lbls">{{Form::label('lblAula','Aula:')}}</p>
            <div class="inputs">{{ Form::select('cmbAulas', $varElementosComboCodAula)}}</div>

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
                            7:00-8:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '7:00-8:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '7:00-8:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '7:00-8:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '7:00-8:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '7:00-8:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '7:00-8:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            8:30-10:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '8:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '8:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '8:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '8:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '8:30-10:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '8:30-10:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                       10:00-11:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '10:00-11:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '10:00-11:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            11:30-13:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '11:30-13:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '11:30-13:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            13:00-14:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '13:00-14:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '13:00-14:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            14:30-16:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '14:30-16:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '14:30-16:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            16:00-17:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '16:00-17:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '16:00-17:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            17:30-19:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '17:30-19:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '17:30-19:00', false);}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            19:00-20:30
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '19:00-20:30', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '19:00-20:30', false);}}
                        </td>
                    </tr>
                    <tr class="success">
                        <td>
                            20:30-22:00
                        </td>
                        <td>
                            {{Form::radio('rbHorariosLunes', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMartes', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosMiercoles', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosJueves', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosViernes', '20:30-22:00', false);}}
                        </td>
                        <td>
                            {{Form::radio('rbHorariosSabado', '20:30-22:00', false);}}
                        </td>
                    </tr>
                </table>
            </div>
        <p>{{Form::submit('Registrar')}}</p>
        {{ Form::close() }}
        
        <td>{{ HTML::link(URL::to('/MostrarOpciones'), 'Verificar Horarios') }}</td>
        
    </section>
</body>
</html>

@stop

