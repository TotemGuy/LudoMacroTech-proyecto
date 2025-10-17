USE lmndb;

INSERT INTO Usuario (nombre, apellido, correo, contrasenia) VALUES
('Juan', 'Perez', 'juanpete@gmail.com', '12345'),
('Maria', 'Juana', 'marijuana@gmail.com', 'lalala'),
('Pedro', 'Rodriguez', 'pedorro777@gmail.com', 'kkkk'),
('Laura', 'Milansa', 'lauritaxxs@gmail.com', '123321'),
('Carlos', 'Casan', 'cralossacan@gmail.com', '321123');

INSERT INTO Tarea (fecha, cantidad_jugadores, modo_juego, tablero) VALUES
(2025-08-14 13:57:44, 1, 'Solo', 'Invierno'),
(2025-08-14 14:10:22, 4, 'Multi', 'Verano'),
(2025-08-14 15:05:10, 3, 'Multi', 'Verano'),
(2025-08-14 16:20:30, 2, 'Multi', 'Invierno'),
(2025-08-14 17:45:55, 1, 'Control', 'Verano');

INSERT INTO Jugadores (fk_partida_id, fk_usuario_id) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 5),
(3, 4),
(4, 2),
(4, 3),
(5, 6);