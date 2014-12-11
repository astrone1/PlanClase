/* crear Base de datos */
CREATE DATABASE "PlanClase"
WITH ENCODING='UTF8'
CONNECTION LIMIT=-1;

BEGIN TRANSACTION;


/* Crear Tablas */



DROP TABLE IF EXISTS usuarios CASCADE;
CREATE TABLE usuarios (
id serial NOT NULL,
rut int NOT NULL,
nombre varchar(255) NOT NULL,
UNIQUE (rut),
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS accesos CASCADE;
CREATE TABLE accesos (
id bigserial NOT NULL,
usuario_fk int NOT NULL REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE,
fecha timestamp NOT NULL DEFAULT NOW(),
ip inet NOT NULL DEFAULT '127.0.0.1',
PRIMARY KEY (id)
);


DROP TABLE IF EXISTS region CASCADE;
CREATE TABLE region
(
id serial NOT NULL,
nombre varchar(255) NOT NULL UNIQUE,
corfo varchar(255) NOT NULL,
codigo varchar(5) NOT NULL UNIQUE,
numero int NOT NULL UNIQUE,
pais_fk int NOT NULL,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS provincia CASCADE;
CREATE TABLE provincia
(
id serial NOT NULL,
nombre varchar(255) NOT NULL UNIQUE,
region_fk int NOT NULL,
PRIMARY KEY (id)
);


DROP TABLE IF EXISTS facultad CASCADE;
CREATE TABLE facultad
(
id serial NOT NULL,
facultad varchar(255) NOT NULL UNIQUE,
descripcion text,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS asignatura CASCADE;
CREATE TABLE asignatura
(
codigo varchar(8) NOT NULL UNIQUE,
nombre varchar(255) NOT NULL UNIQUE,
descripcion text,
PRIMARY KEY (codigo)
);

DROP TABLE IF EXISTS semana CASCADE;
CREATE TABLE semana
(
id serial NOT NULL UNIQUE,
semana_anual int NOT NULL,
semana_planificada char(15),
PRIMARY KEY (id)
);


DROP TABLE IF EXISTS contenido CASCADE;
CREATE TABLE contenido
(
clasificacion_fk int NOT NULL,
Semana serial NOT NULL,
Objetivo text,
Contenido text,
Evaluacion text,
PRIMARY KEY (clasificacion_fk)
);



DROP TABLE IF EXISTS contenido_Semana CASCADE;
CREATE TABLE contenido_Semana
(
id int NOT NULL,
clasificacion_fk int NOT NULL
);


DROP TABLE IF EXISTS carrera_asignatura CASCADE;
CREATE TABLE carrera_asignatura
(
codigo_carrera int NOT NULL,
codigo_asignatura varchar(8) NOT NULL
);



DROP TABLE IF EXISTS escuela CASCADE;
CREATE TABLE escuela
(
id serial NOT NULL,
departamento_fk int NOT NULL,
escuela varchar(255) NOT NULL,
descripcion text,
PRIMARY KEY (id)
);



DROP TABLE IF EXISTS jefecarrera CASCADE;
CREATE TABLE jefecarrera
(
docente_fk int NOT NULL UNIQUE,
escuela_fk int NOT NULL,
PRIMARY KEY (docente_fk)
);



DROP TABLE IF EXISTS planificacion CASCADE;
CREATE TABLE planificacion
(
Cod_Clasificacion serial NOT NULL UNIQUE,
Rut varchar(12) NOT NULL,
Facultad int NOT NULL,
Departamento int NOT NULL,
Escuela int NOT NULL,
Objetivo text,
Asignatura varchar(8) NOT NULL,
Semestre int,
Fecha date,
Estrategia text,
PRIMARY KEY (Cod_Clasificacion)
);

DROP TABLE IF EXISTS decano CASCADE;
CREATE TABLE decano
(
Rut varchar(12) NOT NULL UNIQUE,
facultad_fk int NOT NULL UNIQUE,
PRIMARY KEY (Rut)
);


DROP TABLE IF EXISTS carrera CASCADE;
CREATE TABLE carrera
(
Codigo int NOT NULL UNIQUE,
nombre varchar(255),
escuela_fk int NOT NULL,
jefeCarrera_fk int NOT NULL UNIQUE,
PRIMARY KEY (Codigo)
);


DROP TABLE IF EXISTS comuna CASCADE;
CREATE TABLE comuna
(
id serial NOT NULL,
nombre varchar(255) NOT NULL UNIQUE,
provincia_fk int NOT NULL,
PRIMARY KEY (id)
);


DROP TABLE IF EXISTS docente CASCADE;
CREATE TABLE docente
(
rut varchar(12) NOT NULL UNIQUE,
nombre varchar(255) NOT NULL,
Apellido varchar(255) NOT NULL,
fecha_nacimiento date,
genero char(1),
direccion varchar(255) NOT NULL,
comuna_fk int NOT NULL,
telefono varchar(15),
celular varchar(15),
email varchar(50) NOT NULL,
departamento_fk int NOT NULL,
jerarquia varchar(255) NOT NULL,
contrato varchar(255) NOT NULL,
jornada varchar(255) NOT NULL,
grado int NOT NULL,
funcion varchar(255) NOT NULL,
eliminado int NOT NULL,
PRIMARY KEY (rut)
);

DROP TABLE IF EXISTS alumno CASCADE;
CREATE TABLE alumno
(
rut varchar (12) NOT NULL,
nombre varchar(255) NOT NULL,
Apellido varchar(255) NOT NULL,
fecha_nacimiento date,
genero char(1),
direccion varchar(255) NOT NULL,
comuna_fk int NOT NULL,
telefono varchar(15),
celular varchar(15),
email varchar(50) NOT NULL,
matricula varchar(255) NOT NULL,
PRIMARY KEY (rut)
);

DROP TABLE IF EXISTS departamento CASCADE;
CREATE TABLE departamento
(
id serial NOT NULL,
facultad_fk int NOT NULL,
departamento varchar(255) NOT NULL UNIQUE,
descripcion text,
PRIMARY KEY (id)
);


DROP TABLE IF EXISTS curso CASCADE;
CREATE TABLE curso
(
id serial NOT NULL,
semestre int NOT NULL UNIQUE,
anio int NOT NULL UNIQUE,
docente_fk int NOT NULL UNIQUE,
seccion int NOT NULL,
codigo varchar(8) NOT NULL UNIQUE,
PRIMARY KEY (id)
);


DROP TABLE IF EXISTS directorDepartamento CASCADE;
CREATE TABLE directorDepartamento
(
Rut varchar(12) NOT NULL UNIQUE,
departamento_fk int NOT NULL UNIQUE,
PRIMARY KEY (Rut)
);


DROP TABLE IF EXISTS pais CASCADE;
CREATE TABLE pais
(
id serial NOT NULL,
cod_num int NOT NULL UNIQUE,
alfa_tres varchar(3) NOT NULL UNIQUE,
alfa_dos varchar(2) NOT NULL UNIQUE,
nombre varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (id)
);


/* Crear llaves foraneas */

ALTER TABLE provincia
ADD FOREIGN KEY (region_fk)
REFERENCES regiones (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE comuna
ADD FOREIGN KEY (provincia_fk)
REFERENCES provincias (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE departamento
ADD FOREIGN KEY (facultad_fk)
REFERENCES facultades (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE Decano
ADD FOREIGN KEY (facultad_fk)
REFERENCES facultades (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE Planificacion
ADD FOREIGN KEY (facultad)
REFERENCES facultades (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE carrera_asignatura
ADD FOREIGN KEY (codigo_asignatura)
REFERENCES asignatura (codigo)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE curso
ADD FOREIGN KEY (codigo)
REFERENCES asignatura (codigo)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE contenido_Semana
ADD FOREIGN KEY (id)
REFERENCES Semana (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE contenido_Semana
ADD FOREIGN KEY (clasificacion_fk)
REFERENCES Contenido (clasificacion_fk)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE planificacion
ADD FOREIGN KEY (Escuela)
REFERENCES escuela (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE jefeCarrera
ADD FOREIGN KEY (escuela_fk)
REFERENCES escuela (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE carrera
ADD FOREIGN KEY (escuela_fk)
REFERENCES escuela (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE carrera
ADD FOREIGN KEY (jefeCarrera_fk)
REFERENCES JefeCarrera (docente_fk)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE Contenido
ADD FOREIGN KEY (clasificacion_fk)
REFERENCES planificacion (Cod_Clasificacion)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE carrera_asignatura
ADD FOREIGN KEY (codigo_carrera)
REFERENCES carrera (Codigo)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE docente
ADD FOREIGN KEY (comuna_fk)
REFERENCES comuna (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE alumno
ADD FOREIGN KEY (comuna_fk)
REFERENCES comuna (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE JefeCarrera
ADD FOREIGN KEY (docente_fk)
REFERENCES docentes (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE decano
ADD FOREIGN KEY (Rut)
REFERENCES docentes (rut)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE curso
ADD FOREIGN KEY (docente_fk)
REFERENCES docentes (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE planificacion
ADD FOREIGN KEY (Rut)
REFERENCES docentes (rut)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE directorDepartamento
ADD FOREIGN KEY (Rut)
REFERENCES docentes (rut)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE escuela
ADD FOREIGN KEY (departamento_fk)
REFERENCES departamentos (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE directorDepartamento
ADD FOREIGN KEY (departamento_fk)
REFERENCES departamentos (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE docente
ADD FOREIGN KEY (departamento_fk)
REFERENCES departamentos (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE planificacion
ADD FOREIGN KEY (Departamento)
REFERENCES departamentos (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE Planificacion
ADD FOREIGN KEY (Asignatura)
REFERENCES cursos (codigo)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;
ALTER TABLE region
ADD FOREIGN KEY (paises_fk)
REFERENCES Paises (id)
ON UPDATE RESTRICT
ON DELETE RESTRICT
;


COMMIT;
