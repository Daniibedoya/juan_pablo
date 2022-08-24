dml-SQL

CREATE DATABASE consultorio;

CREATE TABLE usuario(
	id_usuario CHAR(11),
	nombres VARCHAR(30),
	apellidos VARCHAR(30),
	direccion VARCHAR(30),
	telefono INT,
	correo VARCHAR(30),
	password VARCHAR(30),
	estado VARCHAR(20),
	tipo_usuario VARCHAR(20),
	PRIMARY KEY (id_usuario)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE clientes(
	id_cliente CHAR(11),
	nombres VARCHAR(30),
	apellidos VARCHAR(30),
	direccion VARCHAR(30),
	telefono INT,
	estado VARCHAR(20),
	problema TEXT,
	PRIMARY KEY (id_cliente)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE permisos(
	codigo_permiso INT AUTO_INCREMENT,
	permiso INT,
	usuario VARCHAR(20),
	estado VARCHAR(20),
	PRIMARY KEY (codigo_permiso)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE permisos_tem(
	codigo_permiso_tem INT AUTO_INCREMENT,
	nombre_permiso VARCHAR(30),
	PRIMARY KEY (codigo_permiso_tem)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ddl-SQL