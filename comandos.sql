CREATE DATABASE academiaAcevedo;

CREATE TABLE alumno(
    alum_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    alum_nombres VARCHAR(50) NOT NULL,
    alum_apellidos VARCHAR(60) NOT NULL,
    alum_dni CHAR(8) UNIQUE NOT NULL,
    alum_email VARCHAR(60) NOT NULL,
    alum_fnac DATE NOT NULL
);

INSERT INTO alumno(alum_nombres, alum_apellidos, alum_dni, alum_email, alum_fnac) VALUES 
    ('Robert', 'Acevedo Rodriguez','12345678','racevedo@gmail.com','1999-04-22'),
    ('Jorge Luis', 'Acevedo Rodriguez','23456789','jacevedoo@gmail.com','2001-01-11'),
    ('Suli', 'Castañeda Vasi','34567890','suly@gmail.com','1995-01-15'),
    ('Silvana', 'Herrera Matos','45678901','silvana@gmail.com','2000-03-30'),
    ('María del Pilar', 'Del Castillo Hernandez','56789012','maria@gmail.com','2002-07-20'),
    ('Miguel André', 'Casimiro Castillo','67890123','andre@gmail.com','2003-05-28'),
    ('Jorge Carlos', 'Obeso Cerna','78901234','jorge@gmail.com','2003-07-19'),
    ('Digmar', 'Flores Zavaleta','89012345','digmar@gmail.com','2003-04-09'),
    ('Jose Carlos', 'Miranda Guevara','90123456','jorge@gmail.com','2002-01-10'),
    ('David', 'Castro Terrones','01234567','david@gmail.com','2003-07-19');

SELECT alum_id, CONCAT(alum_nombres,' ', alum_apellidos) AS Alumno, alum_dni, alum_email, alum_fnac FROM alumno;



CREATE TABLE notas(
    nota_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nota_dni CHAR(8)NOT NULL,
    nota_nom_curso VARCHAR(100) NOT NULL,
    nota_calificacion INT NOT NULL
);

INSERT INTO notas(nota_dni,nota_nom_curso,nota_calificacion) VALUES 
('12345678','MATEMATICAS', 15),
('23456789','MATEMATICAS', 19),
('34567890','MATEMATICAS', 12),
('45678901','MATEMATICAS', 10),
('56789012','MATEMATICAS', 20),
('67890123','MATEMATICAS', 16),
('78901234','MATEMATICAS', 14),
('89012345','MATEMATICAS', 11),
('90123456','MATEMATICAS', 17),
('01234567','MATEMATICAS', 16),
('12345678','FÍSICA', 16),
('23456789','FÍSICA', 13),
('34567890','FÍSICA', 13),
('45678901','FÍSICA', 12),
('56789012','FÍSICA', 17),
('67890123','FÍSICA', 15),
('78901234','FÍSICA', 13),
('89012345','FÍSICA', 14),
('90123456','FÍSICA', 14),
('01234567','FÍSICA', 18),
('12345678','QUÍMICA', 11),
('23456789','QUÍMICA', 15),
('34567890','QUÍMICA', 16),
('45678901','QUÍMICA', 18),
('56789012','QUÍMICA', 15),
('67890123','QUÍMICA', 13),
('78901234','QUÍMICA', 12),
('89012345','QUÍMICA', 16),
('90123456','QUÍMICA', 15),
('01234567','QUÍMICA', 19),
('12345678','ALGEBRA', 12),
('23456789','ALGEBRA', 14),
('34567890','ALGEBRA', 15),
('45678901','ALGEBRA', 16),
('56789012','ALGEBRA', 12),
('67890123','ALGEBRA', 14),
('78901234','ALGEBRA', 17),
('89012345','ALGEBRA', 15),
('90123456','ALGEBRA', 18),
('01234567','ALGEBRA', 11);

SELECT * FROM notas WHERE nota_dni='12345678';