DROP DATABASE if exists obj_pj_sena;
CREATE DATABASE obj_pj_sena;
USE obj_pj_sena;

DROP TABLE if exists obj_cargo;
CREATE TABLE  obj_cargo(
	id_cargo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cargo VARCHAR(100) NOT NULL
);
INSERT INTO obj_cargo(cargo) VALUES('Psicologa'),('Coordinación académica'),('Bienestar al aprendiz'),('Trabajo social'),('Instructor');

DROP TABLE if exists obj_registro_sena;
CREATE TABLE obj_registro_sena(
	id_obj_registro_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
	tel BIGINT NOT NULL,
	correo VARCHAR(100) NOT NULL,
    contrasena VARCHAR(150) NOT NULL,
	cargo INT NOT NULL,
    CONSTRAINT fk_cargo FOREIGN KEY(cargo)
    REFERENCES obj_cargo(id_cargo)
);

DROP TABLE if exists obj_doc_sena;
CREATE TABLE obj_doc_sena(
	id_obj_doc_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_doc VARCHAR(100) NOT NULL
);
INSERT INTO obj_doc_sena(nombre_doc) VALUES('RI'),('TI'),('CC'),('CF');

DROP TABLE if exists obj_nivel_forma_sena;
CREATE TABLE obj_nivel_forma_sena(
	id_obj_nivel_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_nivel VARCHAR(100) NOT NULL
);
INSERT INTO obj_nivel_forma_sena(nombre_nivel) VALUES('Técnico'),('Tecnologo'),('Especialización Técnica'),('Especialización Tecnológica');

DROP TABLE if exists obj_jornada_sena;
CREATE TABLE obj_jornada_sena(
	id_obj_jornada_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_jornada VARCHAR(100) NOT NULL
);
INSERT INTO obj_jornada_sena(nombre_jornada) VALUES('Mañana'),('Tarde'),('Noche');

DROP TABLE if exists obj_sede_sena;
CREATE TABLE obj_sede_sena(
	id_obj_sede_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_sede VARCHAR(100) NOT NULL
);
INSERT INTO obj_sede_sena(nombre_sede) VALUES('Modelo'),('Centro'),('Finca KM11');

DROP TABLE if exists obj_per_reporte_sena;
CREATE TABLE obj_per_reporte_sena(
	id_obj_per_reporte_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_reporte VARCHAR(100) NOT NULL
);
INSERT INTO obj_per_reporte_sena(nombre_reporte) VALUES('Psicologa');
##('Coordinación académica'),('Bienestar al aprendiz'),('Psicologa'),('Trabajo social');

DROP TABLE if exists obj_mot_reporte_sena;
CREATE TABLE obj_mot_reporte_sena(
	id_obj_mot_reporte_sena INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_mot_reporte VARCHAR(200) NOT NULL
);
INSERT INTO obj_mot_reporte_sena(nombre_mot_reporte) VALUES('Faltas académicas (Incumplimiento en actividades de aprendizaje, no aprobación de planes de mejoramiento, etc.,)'),('Faltas disciplinarias (Mal porte del uniforme, agresiones verbales o físicas, Inasistencia a la formación, llegadas tarde, etc.,)'),('Otras situaciones que atentan con buen desarrollo del proceso formativo (Deficiencias cognitivas, alteraciones psicológicas y emocionales, entre otras)'),('0');

DROP TABLE if exists obj_alerta;
CREATE TABLE obj_alerta(
	id_obj_alerta INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(200) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    doc INT NOT NULL,
    num_doc BIGINT NOT NULL,
    telefono BIGINT NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    nivel INT NOT NULL,
    programa VARCHAR(100) NOT NULL,
    ficha VARCHAR(100) NOT NULL,
   jornada INT NOT NULL,
   sede INT NOT NULL,
   correo_aprendiz VARCHAR(100) NOT NULL,
   cusa_reporte INT NOT NULL,
   causa_reporte_aprendiz VARCHAR(100),
   reporte_diri INT NOT NULL,
   accion VARCHAR(200) NOT NULL,
   documento_soporte VARCHAR(100) NOT NULL,
   nombre_ins VARCHAR(100) NOT NULL,
   apellido_ins VARCHAR(100) NOT NULL,
   telefono_ins BIGINT NOT NULL,
   correo_ins VARCHAR(100) NOT NULL,
   responsable VARCHAR(100) NOT NULL,
   fecha_registro DATE,
   estado VARCHAR(50) NOT NULL,
   CONSTRAINT fk_tipo_doc FOREIGN KEY(doc)
   REFERENCES obj_doc_sena(id_obj_doc_sena),
   CONSTRAINT fk_nvl_formacion FOREIGN KEY(nivel)
   REFERENCES obj_nivel_forma_sena(id_obj_nivel_sena),
   CONSTRAINT fk_jornada FOREIGN KEY(jornada)
   REFERENCES obj_jornada_sena(id_obj_jornada_sena),
   CONSTRAINT fk_sede FOREIGN KEY(sede)
   REFERENCES obj_sede_sena(id_obj_sede_sena),
   CONSTRAINT fk_motivo FOREIGN KEY(cusa_reporte)
   REFERENCES obj_mot_reporte_sena(id_obj_mot_reporte_sena),
   CONSTRAINT fk_reporte FOREIGN KEY(reporte_diri)
   REFERENCES obj_per_reporte_sena(id_obj_per_reporte_sena)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);

#SELECT t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_alerta AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7 WHERE t1.reporte_diri = 2 AND t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena;

#SELECT t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_alerta AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7 WHERE t1.responsable = 'michaell' AND t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena;

#SELECT t1.nombre, t1.apellido, t2.nombre_doc, t1.num_doc, t1.telefono, t1.direccion, t5.nombre_nivel, t1.programa, t1.ficha, t3.nombre_jornada, t7.nombre_sede, t4.nombre_mot_reporte, t6.nombre_reporte, t1.accion, t1.documento_soporte, t1.nombre_ins, t1.apellido_ins, t1.telefono_ins, t1.correo_ins FROM obj_alerta AS t1, obj_doc_sena AS t2, obj_jornada_sena AS t3, obj_mot_reporte_sena AS t4, obj_nivel_forma_sena AS t5, obj_per_reporte_sena AS t6, obj_sede_sena AS  t7, obj_registro_sena AS t8 WHERE t2.id_obj_doc_sena = t1.doc AND t5.id_obj_nivel_sena = t1.nivel AND t1.jornada = t3.id_obj_jornada_sena AND t1.sede = t7.id_obj_sede_sena AND t1.cusa_reporte = t4.id_obj_mot_reporte_sena AND t1.reporte_diri = t6.id_obj_per_reporte_sena AND t1.reporte_diri = t8.cargo AND t8.id_obj_registro_sena = 2;