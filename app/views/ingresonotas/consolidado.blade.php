@extends('layouts.base_admin')
@section('content')

<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
    <thead>
        <tr role="row">
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                CodAlumno
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;">
                Nombre y Apellidos
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                Nota1
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                Nota2
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 20px;">
                Nota3
            </th>
        </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
    	<?php $i=1 ?>
		@foreach($alumnos as $alumno)
		<tr class="odd">
            <td class="">{{ $alumno->idAlumno }}</td>
            <td class="">{{ $alumno->NombreCpt }}</td>
            <td class="">{{$alumno->Nota1}}</td>
            <td class="">{{$alumno->Nota2}}</td>
            <td class="">{{$alumno->Nota3}}</td>
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
</table>
<input type="number" value="{{$i}}" name="i">
@stop