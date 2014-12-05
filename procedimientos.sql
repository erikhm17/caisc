
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


-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` FUNCTION `validarCarga`(codAulaBuscar varchar(10),horarioBuscar varchar(10),diaBuscar varchar(10)) RETURNS varchar(50) CHARSET latin1
BEGIN
    Declare Devolver varchar(50);
    select CONCAT(codAula,'-',horario,'-',dia,' ERROR') into Devolver
    from horario_aula
    where codAula=codAulaBuscar and horario=horarioBuscar and dia=diaBuscar;
    set Devolver=ifnull(Devolver,"Disponible");
RETURN Devolver;
END

-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCargaAcademica_cl`(codCurso_clI varchar(10),
docente_idI int,turnoI varchar(10),grupoI int,semestreI varchar(10),fecha_inicioI date,fecha_finI date,estadoI bit,minimoI int,codAulaI varchar(10),horarioI varchar(10),diaI varchar(10))
BEGIN
    Declare codCargaAcademica_clI varchar(10);
    select Date_format(now(),'%m%d%H%i%s') into codCargaAcademica_clI;
    INSERT INTO `carga_academica_cl`(`codCargaAcademica_cl`, `codCurso_cl`, `docente_id`, `turno`, `grupo`, `semestre`, `fecha_inicio`, `fecha_fin`, `estado`, `minimo`) VALUES (codCargaAcademica_clI,codCurso_clI,docente_idI,turnoI,grupoI,semestreI,fecha_inicioI,fecha_finI,estadoI,minimoI);
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioI,diaI,null,codCargaAcademica_clI);
END

-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCargaAcademica_ct`(codCurso_ctI varchar(10),docente_idI int,semestreI varchar(10),turnoI varchar(10),grupoI int,codAulaI varchar(10),horarioI varchar(10),diaI varchar(10))
BEGIN
    Declare codCargaAcademica_ctI varchar(10);
    select Date_format(now(),'%m%d%H%i%s') into codCargaAcademica_ctI;
    INSERT INTO `carga_academica_ct`(`codCargaAcademica_ct`, `codCurso_ct`, `docente_id`, `semestre`, `turno`, `grupo`) VALUES (codCargaAcademica_ctI,codCurso_ctI,docente_idI,semestreI,turnoI,grupoI);
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioI,diaI,codCargaAcademica_ctI,null);
END

