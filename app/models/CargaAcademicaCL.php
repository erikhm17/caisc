<?php

class CargaAcademicaCL extends Eloquent {

	protected $table = 'carga_academica_cl';
	protected $fillable = array('codCurso_cl','docente_id','turno','grupo','semestre','fecha_inicio','fecha_fin','estado','minimo');
}