CREATE DATABASE usuarios;

USE usuarios;

CREATE TABLE IF NOT EXISTS  rol(
    idRol INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (idRol),
    rol VARCHAR (45)
);

CREATE TABLE IF NOT EXISTS usuario(

    idUsuario INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (idUsuario),
    nombreUsuario VARCHAR(45),
    apellidoUsuario VARCHAR(45),
    edadUsuario INT,
    fotoUsuario VARCHAR(150),
    tipoDocumentoUsuario VARCHAR(30),
    numeroDocumentoUsuario VARCHAR(30),
    userId_rol INT NOT NULL, 
    FOREIGN KEY (userId_rol)
    REFERENCES rol(idRol)

);

INSERT INTO rol SET rol = 'administrador' ;
