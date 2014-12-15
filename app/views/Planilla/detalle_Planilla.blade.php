@extends('layouts.base_admin')
@section('title')
Detalle de pago de Planilla <small>Docente</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Docentes') }}</li>
<li>{{$docente->nombre}}</li>
@stop
@section('content')
<div class="row">
	<div class="col-lg-3">
		
		<p align="center"><b>código:</b>{{ $docente->id }}</p>
	</div>
	<div class="col-lg-7">

		<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                    	   <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Total de Horas</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Asistidas </th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Faltantes</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Descuento(%) </th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Monto de Pago (S/.)</th>
                      </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
		<tr class="odd">
			
		<p><b>DNI:</b>{{ $docente->dni }}</p>
		<p><b>Nombre:</b> {{ $docente->nombre }}</p>
		<p><b>Apellidos:</b> {{ $docente->apellidos }}</p>
		<h1>Detalle de Carrera Técnica</h1>	
			<td><p>30</p></td>
			<td><p>5</p></td>
			<td><p>25</p></td>
			<td><p>30%</p></td>
			<td><p>100</p></td>
		
			
		</tr>
	</tbody>
</table>
<table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                       <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Total de Horas</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Asistidas </th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Horas Faltantes</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Descuento(%) </th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Monto de Pago (S/.)</th>
                    </tr>
                </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
		<tr class="odd">

		<h1>Detalle de Cursos Libres</h1>	
			<td><p>0</p></td>
			<td><p>0</p></td>
			<td><p>0</p></td>
			<td><p>0</p></td>
			<td><p>0</p></td>

			
		</tr>
	</tbody>
</table>

	</div>
</div>
@stop
