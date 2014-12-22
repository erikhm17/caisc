<?php

class CargaAcademicaCT extends Eloquent {

	protected $table = 'carga_academica_ct';
	protected $fillable = array('codCurso_ct','docente_id','semestre','turno','grupo');
}