use isc_test8;
-- Insertando cargos
INSERT INTO cargo (nombre,privilegios,descripcion) VALUES("Administrador","General","Facultad de Crear y Deshacer usuarios");
-- Insertando personal
INSERT INTO personal (nombre,apellidos,dni,direccion,telefono,email,password,cargo_id) VALUES("NameAdmin","ApellidoAdmin","12345678","UNSAAC","123456","admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u",1);
-- Insertando Usuario Administrador
INSERT INTO users (email,password,tipoUsuario,nroId) VALUES("admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u","Personal",214);
