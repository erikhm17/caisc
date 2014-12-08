
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnosXCurso`(IN `codcargaAcademica` VARCHAR(20))
BEGIN
    select N.id as idNota, A.codAlumno as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt", N.notaa as "Nota1", N.notab as "Nota2", N.notac as "Nota3"
	from (alumno A inner join matricula_ct M on A.codAlumno = M.codAlumno) inner join nota_ct N on N.codMatricula_ct = M.id
    where M.codCargaAcademica_ct = codcargaAcademica
    ORDER BY A.apellidos;
END

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CursosXDocente`(IN `id_docente` INT)
BEGIN
    select cg.codCargaAcademica_ct as "id", cu.nombre as "nombre"

	from carga_academica_ct cg inner join curso_ct cu on cg.codCurso_ct = cu.id 
    where cg.docente_id = id_docente;
END

