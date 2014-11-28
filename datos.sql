
-- Insertando cargos
INSERT INTO cargo (nombre,privilegios,descripcion) VALUES("Administrador","General","Facultad de Crear y Deshacer usuarios");
-- Insertando personal
INSERT INTO personal (nombre,apellidos,dni,direccion,telefono,email,password,cargo_id) VALUES("NameAdmin","ApellidoAdmin","12345678","UNSAAC","123456","admin@gmail.com","$2y$10$MIl0DIvIIw6avBY66m9xIO8wn3bKouBcmUVG3E1WPvKAGm.9ZPPma",1);
-- Insertando Usuario Administrador
INSERT INTO users (email,password,tipoUsuario,nroId) VALUES("admin@gmail.com","$2y$10$eSZHh16KXufZdAw8n.pUruk1ohezl9fDjAgamLGuwv4/iZnbgxJj.","Personal",214);
