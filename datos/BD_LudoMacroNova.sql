CREATE DATABASE lmndb;
USE lmndb;

CREATE TABLE Usuario ( 
                    id_usuario INT PRIMARY KEY AUTO_INCREMENT, 
                    nombre VARCHAR(20) NOT NULL, apellido VARCHAR(20) NOT NULL, 
                    correo VARCHAR(40) NOT NULL, contrasenia VARCHAR(30) NOT NULL
                    );
CREATE TABLE Tarea (
                    id_tarea INT PRIMARY KEY AUTO_INCREMENT, titulo VARCHAR(20) NOT NULL, 
                    realiza BOOLEAN NOT NULL, fecha_inicio DATE NOT NULL, 
                    fecha_fin DATE, descripcion VARCHAR(255), duracion INT, 
                    fk_id_usuario INT, FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario)
                    );
CREATE TABLE Comparte (
                    id_comparte INT PRIMARY KEY, fk_id_usuario INT, 
                    FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario), 
                    fk_id_tarea INT, FOREIGN KEY (fk_id_tarea) REFERENCES tarea(id_tarea)
                    );