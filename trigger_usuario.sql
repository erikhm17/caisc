CREATE TRIGGER agregar_usuario_docente 
AFTER INSERT ON docente
FOR EACH ROW
INSERT INTO users(email,password,tipoUsuario,nroId,estado,created_at) 
values (NEW.email,NEW.password,'docente',NEW.id,NEW.estado,NOW());

CREATE TRIGGER agregar_usuario_personal 
AFTER INSERT ON personal
FOR EACH ROW
INSERT INTO users(email,password,tipoUsuario,nroId,estado,created_at) 
values (NEW.email,NEW.password,'personal',NEW.id,NEW.estado,NOW());


