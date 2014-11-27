CREATE DATABASE isc_test8;
use isc_test8;

CREATE TABLE IF NOT EXISTS users(
	`id` INT AUTO_INCREMENT NOT NULL,
	`email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL,
    `tipoUsuario` VARCHAR(120) NOT NULL,
    `nroId` INT NOT NULL,
    `estado` INT(2) DEFAULT '1',
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS carrera(
	`codCarrera` VARCHAR(10) NOT NULL,
	`nombre` VARCHAR(50) NOT NULL,
	`descripcion` text NOT NULL,
	PRIMARY KEY (`codCarrera`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS alumno(
	`codAlumno` VARCHAR(10) NOT NULL,
	`nombre` VARCHAR(50) NOT NULL,
	`apellidos` VARCHAR(50) NOT NULL,
	`dni` VARCHAR(8) NOT NULL,
	`direccion` VARCHAR(120) NOT NULL,
	`telefono` VARCHAR(120) NOT NULL,
	`email` VARCHAR(120) NOT NULL,
	`pasword` VARCHAR(120) NOT NULL,
	`modulo` INT(2) DEFAULT null,
	`estado` INT(2) null,
	`codCarrera` VARCHAR(10) DEFAULT null,
	PRIMARY KEY (`codAlumno`),
	FOREIGN KEY (`codCarrera`) REFERENCES carrera(`codCarrera`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS curso_ct(
	`codCurso_ct` VARCHAR(10) NOT NULL,
	`nombre` VARCHAR(30) NOT NULL,
	`modulo` INT(2) DEFAULT null,
	`estado` BIT DEFAULT 1,
	`codCarrera` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codCurso_ct`),
	FOREIGN KEY (`codCarrera`) REFERENCES carrera(`codCarrera`)

) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS docente(
    `id` INT AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `dni` VARCHAR(8) NOT NULL,
    `direccion` VARCHAR(120) NOT NULL,
    `urlImagen` VARCHAR(120) DEFAULT null,
    `telefono` VARCHAR(120) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL,
    `estado` INT(2) DEFAULT '1',
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)  
) CHARSET=utf8 AUTO_INCREMENT=2141 ;

CREATE TABLE IF NOT EXISTS cargo(
    `id` INT AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `privilegios` VARCHAR(50) NOT NULL,
    `descripcion` text DEFAULT NULL,
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS personal(
    `id` INT AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `dni` VARCHAR(8) NOT NULL,
    `direccion` VARCHAR(120) NOT NULL,
    `urlImagen` VARCHAR(120) DEFAULT null,
    `telefono` VARCHAR(120) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL,
    `estado` INT(2) DEFAULT '1',
    `cargo_id` INT NOT NULL,
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
	FOREIGN KEY (`cargo_id`) REFERENCES cargo(`id`)
) CHARSET=utf8 AUTO_INCREMENT=214 ;

CREATE TABLE IF NOT EXISTS carga_academica_ct(
	`codCargaAcademica_ct` VARCHAR(10) NOT NULL,
	`codCurso_ct` VARCHAR(10) NOT NULL,
	`docente_id` INT NOT NULL,
	`semestre` VARCHAR(10) NOT NULL,
	`turno` VARCHAR(10) NOT NULL,
	`grupo` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codCargaAcademica_ct`),
	FOREIGN KEY (`codCurso_ct`) REFERENCES curso_ct(`codCurso_ct`),
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS silabus_ct(
	`codSilabus_ct` VARCHAR(10) NOT NULL,
	`codCargaAcademica_ct` VARCHAR(10) NOT NULL,
	PRIMARY KEY(`codSilabus_ct`),
	FOREIGN KEY (`codCargaAcademica_ct`) REFERENCES carga_academica_ct(`codCargaAcademica_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_silabus_ct(
	`codDetalleSilabus_ct` VARCHAR(10) NOT NULL,
	`codSilabus_ct` VARCHAR(10) NOT NULL,
	`titulo` VARCHAR(120) NOT NULL,
	`descripcion` text NOT NULL,
	`orden` INT NOT NULL,
	`estado` BIT NOT NULL,
	PRIMARY KEY(`codDetalleSilabus_ct`),
	FOREIGN KEY(`codSilabus_ct`) REFERENCES silabus_ct(`codSilabus_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS matricula_ct(
	`codMatricula_ct` VARCHAR(10) NOT NULL,
	`codAlumno` VARCHAR(10) NOT NULL,
	`codCargaAcademica_ct` VARCHAR(10) NOT NULL,
	`modulo` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codMatricula_ct`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`codAlumno`),
	FOREIGN KEY(`codCargaAcademica_ct`) REFERENCES carga_academica_ct(`codCargaAcademica_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS nota_ct(
	`codNota_ct` INT AUTO_INCREMENT,
	`codMatricula_ct` VARCHAR(10) NOT NULL,
	`nota` float(7,4) NOT NULL,
	PRIMARY KEY (`codNota_ct`),
	FOREIGN KEY (`codMatricula_ct`) REFERENCES matricula_ct(`codMatricula_ct`)	
) CHARSET=utf8;

 -- CURSOS LIBRES
CREATE TABLE IF NOT EXISTS curso_cl(
	`codCurso_cl` VARCHAR(10) NOT NULL,
	`nombre` VARCHAR(30) NOT NULL,
	`horas_academicas` VARCHAR(30) DEFAULT null,
	`estado` BIT DEFAULT 1,
	PRIMARY KEY (`codCurso_cl`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS carga_academica_cl(
	`codCargaAcademica_cl` VARCHAR(10) NOT NULL,
	`codCurso_cl` VARCHAR(10) NOT NULL,
	`docente_id` INT NOT NULL,
	`turno` VARCHAR(10) NOT NULL,
	`grupo` VARCHAR(10) NOT NULL,
	`codHorarioAula` VARCHAR(10) NOT NULL,
	`fecha_inicio` DATE NOT NULL,
	`fecha_fin` DATE NOT NULL,
	`estado` BIT DEFAULT 1,
	`minimo` INT NOT NULL,
	PRIMARY KEY (`codCargaAcademica_cl`),
	FOREIGN KEY (`codCurso_cl`) REFERENCES curso_cl(`codCurso_cl`),
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS silabus_cl(
	`codSilabus_cl` VARCHAR(10) NOT NULL,
	`codCargaAcademica_cl` VARCHAR(10) NOT NULL,
	PRIMARY KEY(`codSilabus_cl`),
	FOREIGN KEY (`codCargaAcademica_cl`) REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_silabus_cl(
	`codDetalleSilabus_cl` VARCHAR(10) NOT NULL,
	`codSilabus_cl` VARCHAR(10) NOT NULL,
	`titulo` VARCHAR(120) NOT NULL,
	`descripcion` text NOT NULL,
	`orden` INT NOT NULL,
	`estado` BIT NOT NULL,	
	PRIMARY KEY(`codDetalleSilabus_cl`),
	FOREIGN KEY(`codSilabus_cl`) REFERENCES silabus_cl(`codSilabus_cl`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS matricula_cl(
	`codMatricula_cl` VARCHAR(10) NOT NULL,
	`codAlumno` VARCHAR(10) NOT NULL,
	`codCargaAcademica_cl` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codMatricula_cl`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`codAlumno`),
	FOREIGN KEY(`codCargaAcademica_cl`) REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS nota_cl(
	`codNota_cl` INT AUTO_INCREMENT,
	`codMatricula_cl` VARCHAR(10) NOT NULL,
	`nota` float(7,4) NOT NULL,
	PRIMARY KEY (`codNota_cl`),
	FOREIGN KEY (`codMatricula_cl`) REFERENCES matricula_cl(`codMatricula_cl`)	
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS aula(
	`codAula` VARCHAR(10) NOT NULL,
	`capacidad` INT NOT NULL,
	PRIMARY KEY (`codAula`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS horario_aula(
	`codAula` VARCHAR(10) NOT NULL,
	`horario` VARCHAR(10) NOT NULL,
	`dia` VARCHAR(10) NOT NULL,
	`codCargaAcademica_ct` VARCHAR(10) NULL,
	`codCargaAcademica_cl` VARCHAR(10) NULL,
	PRIMARY KEY(`codAula`,`horario`,`dia`),
	FOREIGN KEY (`codAula`)  REFERENCES aula(`codAula`),
	FOREIGN KEY (`codCargaAcademica_ct`)  REFERENCES carga_academica_ct(`codCargaAcademica_ct`),
	FOREIGN KEY (`codCargaAcademica_cl`)  REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
) CHARSET=utf8;

-- ASISTENCIA ALUMNOS
CREATE TABLE IF NOT EXISTS asistencia_ct(
	`codAsistencia_ct` VARCHAR(10) NOT NULL,
	`fecha` DATE NOT NULL,	
	`codCargaAcademica_ct` VARCHAR(10) NOT NULL,	
	`tema` VARCHAR(10) NOT NULL,
	`docente_id` INT NOT NULL,
	PRIMARY KEY (`codAsistencia_ct`),
	FOREIGN KEY (`codCargaAcademica_ct`) REFERENCES carga_academica_ct(`codCargaAcademica_ct`)
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_asistencia_ct(
	`codAlumno` VARCHAR(10) NOT NULL,
	`codAsistencia_ct` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codAlumno`,`codAsistencia_ct`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`codAlumno`),
	FOREIGN KEY (`codAsistencia_ct`) REFERENCES asistencia_ct(`codAsistencia_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS asistencia_cl(
	`codAsistencia_cl` VARCHAR(10) NOT NULL,
	`fecha` DATE NOT NULL,
	`codCargaAcademica_cl` VARCHAR(10) NOT NULL,
	`tema` VARCHAR(10) NOT NULL,
	`docente_id` INT NOT NULL,
	PRIMARY KEY (`codAsistencia_cl`),
	FOREIGN KEY (`codCargaAcademica_cl`) REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_asistencia_cl(
	`codAlumno` VARCHAR(10) NOT NULL,
	`codAsistencia_cl` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codAlumno`,`codAsistencia_cl`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`codAlumno`),
	FOREIGN KEY (`codAsistencia_cl`) REFERENCES asistencia_cl(`codAsistencia_cl`)
) CHARSET=utf8;

-- PAGOS
CREATE TABLE IF NOT EXISTS modalidad_pago(
	`id` varchar(30) NOT NULL,
	`descripcion` VARCHAR(50),
	`monto` real,
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS pagos(
	`id` int AUTO_INCREMENT NOT NULL,
	`nro_serie` varchar(3),
	`id_alumno` VARCHAR(10),
	`fecha` DATE,
	`total_pago` real,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_alumno`) REFERENCES alumno(`codAlumno`)
) CHARSET=utf8 AUTO_INCREMENT=214;


CREATE TABLE IF NOT EXISTS detalle_pagos(
	`id` int AUTO_INCREMENT not null,
	`nro_boleta` int NOT NULL,
	`descripcion` varchar(20),
	`id_modalidad` VARCHAR(30),
	PRIMARY KEY (`id`),	
	FOREIGN KEY (`id_modalidad`) REFERENCES modalidad_pago(`id`),
	FOREIGN KEY (`nro_boleta`) REFERENCES pagos(`nro_boleta`)
) CHARSET=utf8 AUTO_INCREMENT=214;




-- Flotantes
CREATE TABLE IF NOT EXISTS horario(
	`codHorario` VARCHAR(10) NOT NULL,
	`horaInicio` time,
	`horaFin` time,
	PRIMARY KEY (`codHorario`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS dia(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS semestre(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS modulo(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS turno(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS grupo(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

-- Cambiar definer : 'root por usuario asignado' @ 'localhost por tu servidor o ip del servidor'
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademica_ct`()
BEGIN
    select c.codCargaAcademica_ct,dia,horaInicio,horaFin,d1.nombre as "NombreDocente",d1.apellidos as "ApellidoDocente",codAula,cct1.nombre as "curso",grupo,c.semestre 
	from (((horario_aula h inner join carga_academica_ct c
	on h.codCargaAcademica_ct = c.codCargaAcademica_ct) inner join 
	horario h1 on h.Horario = h1.codHorario) inner join curso_ct cct1 on c.codCurso_ct = cct1.codCurso_ct) inner join docente d1 on c.docente_id= d1.id;
END

-- Cambiar definer : 'root por usuario asignado' @ 'localhost por tu servidor o ip del servidor'
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademica_cl`()
BEGIN
    select c.codCargaAcademica_cl,h.dia,h1.horaInicio,h1.horaFin,ccl_1.nombre as "Nombre Curso",ccl_1.horas_academicas as "Horas Academicas",d.nombre as "Nombre Docente",d.apellidos as "Apellidos Docente",c.grupo,c.turno,c.fecha_inicio,c.fecha_fin,c.estado,c.minimo 
	from (((horario_aula h inner join carga_academica_cl c
	on h.codCargaAcademica_cl = c.codCargaAcademica_cl) inner join 
    curso_cl ccl_1 on c.codcurso_cl=ccl_1.codcurso_cl) inner join
    docente d on c.docente_id=d.id) inner join 
    horario h1 on c.codHorarioAula=h1.codHorario ;
END

