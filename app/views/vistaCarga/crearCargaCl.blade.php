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
        <h2>Tipo Curso libre</h2>
    </header>
    <section id="formularioCarga" role="form">
        {{ Form::open(array('url' => '/recogerDatosCl')) }}
            
            <div>{{Form::label('titulo','Tipo Curso libre')}}</div>

            <p class="lbls">{{Form::label('lblCodCurso','Curso')}}</p>
            <div class="inputs">{{ Form::select('cmbCodCursos', $varElementosComboCursos)}}</div>

            <p class="lbls">{{Form::label('lblIdDocente','Docente:')}}</p>
            <div class="inputs">{{ Form::select('cmbIdDocentes', $varElementosComboIdDocentes) }}</div>
            
            <p class="lbls">{{Form::label('lblTurno','Turno:')}}</p>
            <div class="inputs">{{ Form::select('cmbTurnos', $varElementosComboTurnos) }}</div>
            
            <p class="lbls">{{Form::label('lblGrupo','Grupo:')}}</p>
            <div class="inputs">{{ Form::select('cmbGrupos', $varElementosComboGrupos)}}</div>

            <p class="lbls">{{Form::label('lblSemestre','Semestre:')}}</p>
            <div class="inputs">{{ Form::select('cmbSemestres', $varElementosComboSemestres) }}</div>
            
            <p class="lbls">{{Form::label('lblAula','Aula:')}}</p>
            <div class="inputs">{{ Form::select('cmbAulas', $varElementosComboCodAula)}}</div>

            <p class="lbls">{{Form::label('lblFechaInicio','Fecha Inicio:')}}</p>
            <p class="lbls">{{Form::label('lblDiaInicio','Dia:')}}</p>
            <div class="inputs">{{Form::select('cmbDiasInicio', array('1' => '1', '2' => '2','3' => '3', '4' => '4','5'=>'5',
                                                                '6' => '6', '7' => '7','8' => '8', '9' => '9','10'=>'10',
                                                                '11' => '11', '12' => '12','13' => '13', '14' => '14','15'=>'15',
                                                                '16' => '16', '17' => '17','18' => '18', '19' => '19','20'=>'20',
                                                                '21' => '21', '22' => '22','23' => '23', '24' => '24','25'=>'25',
                                                                '26' => '26', '27' => '27','28' => '28', '29' => '29','30'=>'30','31'=>'31'))}}</div>
            <p class="lbls">{{Form::label('lblMesInicio','Mes:')}}</p>
            <div class="inputs">{{Form::select('cmbMesesInicio', array('1' => '1', '2' => '2','3' => '3', '4' => '4','5'=>'5',
                                                                '6' => '6', '7' => '7','8' => '8', '9' => '9','10'=>'10',
                                                                '11' => '11', '12'=>'12'))}}</div>
            <p class="lbls">{{Form::label('lblAnioInicio','Año:')}}</p>
            <div class="inputs">{{Form::select('cmbAniosInicio', array('2014' => '2014', '2015' => '2015','2016' => '2016', '2017' => '2017','2018' => '2018', '2019' => '2019','2020' => '2020', '2021' => '2021'))}}</div>


            <p class="lbls">{{Form::label('lblFechaFin','Fecha Fin:')}}</p>
            <p class="lbls">{{Form::label('lblDiaFin','Dia:')}}</p>
            <div class="inputs">{{Form::select('cmbDiasFin', array('1' => '1', '2' => '2','3' => '3', '4' => '4','5'=>'5',
                                                                '6' => '6', '7' => '7','8' => '8', '9' => '9','10'=>'10',
                                                                '11' => '11', '12' => '12','13' => '13', '14' => '14','15'=>'15',
                                                                '16' => '16', '17' => '17','18' => '18', '19' => '19','20'=>'20',
                                                                '21' => '21', '22' => '22','23' => '23', '24' => '24','25'=>'25',
                                                                '26' => '26', '27' => '27','28' => '28', '29' => '29','30'=>'30','31'=>'31'))}}</div>
            <p class="lbls">{{Form::label('lblMesFin','Mes:')}}</p>
            <div class="inputs">{{Form::select('cmbMesesFin', array('1' => '1', '2' => '2','3' => '3', '4' => '4','5'=>'5',
                                                                '6' => '6', '7' => '7','8' => '8', '9' => '9','10'=>'10',
                                                                '11' => '11', '12'=>'12'))}}</div>
            <p class="lbls">{{Form::label('lblAnioFin','Año:')}}</p>
            <div class="inputs">{{Form::select('cmbAniosFin', array('2014' => '2014', '2015' => '2015','2016' => '2016', '2017' => '2017','2018' => '2018', '2019' => '2019','2020' => '2020', '2021' => '2021'))}}</div>

            <p class="lbls">{{Form::label('lblEstado','Estado:')}}</p>
            <div class="inputs">{{Form::select('cmbEstado', array('0' => '0', '1' => '1'))}}</div>

            <p class="lbls">{{Form::label('lblMinimo','Minimo:')}}</p>
            <p class="inputs">{{Form::text('txtMinimo')}}</p>     

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
                        </td    >
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

