use isc_test8;
-- Insertando cargos
INSERT INTO cargo (nombre,privilegios,descripcion) VALUES("Administrador","General","Facultad de Crear y Deshacer usuarios");
-- Insertando personal
INSERT INTO personal (nombre,apellidos,dni,direccion,telefono,email,password,cargo_id) VALUES("NameAdmin","ApellidoAdmin","12345678","UNSAAC","123456","admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u",1);
-- Insertando Usuario Administrador
INSERT INTO users (email,password,tipoUsuario,nroId) VALUES("admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u","Personal",214);

INSERT INTO `docente` (`id`, `nombre`, `apellidos`, `dni`, `direccion`, `urlImagen`, `telefono`, `email`, `password`, `estado`, `updated_at`, `created_at`) VALUES
(1, 'Gerardo', 'Mamani', '45544334', 'Av. Grau', NULL, '234435', 'Correo@gmail.com', '132456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `curso_ct` (`id`, `nombre`, `modulo`, `estado`, `codCarrera`, `updated_at`, `created_at`) VALUES
('C001', 'Programacion', 1, 1, 'IN', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `carga_academica_ct` (`codCargaAcademica_ct`, `codCurso_ct`, `docente_id`, `semestre`, `turno`, `grupo`) VALUES
(1, 'C001', 1, '2012-II', 'Tarde', '2');

INSERT INTO `curso_cl` (`id`, `nombre`, `horas_academicas`, `estado`, `updated_at`, `created_at`) VALUES
('CL002', 'Programacion Android', '35', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `carga_academica_cl` (`codCargaAcademica_cl`, `codCurso_cl`, `docente_id`, `turno`, `grupo`, `semestre`, `fecha_inicio`, `fecha_fin`, `estado`, `minimo`) VALUES
(2, 'CL002', 1, 'Tarde', 'B', '2001-I', '0000-00-00', '0000-00-00', b'1', 20);

INSERT INTO `silabus_cl` (`id`, `codCargaAcademica_cl`) VALUES
(2, 2);

INSERT INTO `silabus_ct` (`id`, `codCargaAcademica_ct`) VALUES
(2, 1);
