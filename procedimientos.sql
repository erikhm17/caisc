
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

