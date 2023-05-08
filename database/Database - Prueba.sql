DROP DATABASE IF EXISTS carstore;

CREATE DATABASE carstore;

USE carstore;

CREATE TABLE automoviles
(
	idautomovil		INT AUTO_INCREMENT PRIMARY KEY,
	marca 			VARCHAR(30) 	NOT NULL,
	modelo 			VARCHAR(30) 	NOT NULL,
	precio			DECIMAL(7,2)	NOT NULL,
	tipocombustible		VARCHAR(20)	NOT NULL,
	color			VARCHAR(30)	NOT NULL,
	create_at		DATETIME 	NOT NULL DEFAULT NOW(),
	update_at		DATETIME 	NULL,
	CONSTRAINT uk_automovil_aut UNIQUE (marca, modelo)
)ENGINE = INNODB;

-- Registros de prueba
INSERT INTO automoviles(marca, modelo, precio, tipocombustible, color) VALUES 
	('Toyota', 'Etios', 58600, 'Gasolina Premium', 'Gris'),
	('Suzuki', 'Alto 800', 39461, 'GLP', 'Rojo'),
	('Changan', 'New Alsvin', 46739, 'GNV', 'Azul'),
	('Renault', 'New Kwid', 46162, 'Gasolina Regular', 'Negro');

-- Procedimientos almacenados
DELIMITER $$
CREATE PROCEDURE spu_automoviles_listar()
BEGIN
	SELECT	idautomovil, marca, 
		modelo, precio, 
		tipocombustible, color
		FROM automoviles
		ORDER BY idautomovil DESC;
END $$

DELIMITER $$
CREATE PROCEDURE spu_automoviles_registrar
(
	IN _marca		VARCHAR(30),
	IN _modelo		VARCHAR(30),
	IN _precio		DECIMAL(7,2),
	IN _tipocombustible	VARCHAR(20),
	IN _color		VARCHAR(30)
)
BEGIN
	INSERT INTO automoviles(marca, modelo, precio, tipocombustible, color) VALUES 
		(_marca, _modelo, _precio, _tipocombustible, _color);
END $$

DELIMITER $$
CREATE PROCEDURE spu_automoviles_actualizar
(
	IN _idautomovil		INT,
	IN _marca		VARCHAR(30),
	IN _modelo		VARCHAR(30),
	IN _precio		DECIMAL(7,2),
	IN _tipocombustible	VARCHAR(20),
	IN _color		VARCHAR(30)
)
BEGIN
	UPDATE automoviles SET
		marca = _marca,
		modelo = _modelo,
		precio = _precio,
		tipocombustible = _tipocombustible,
		color = _color,
		update_at = NOW()
	WHERE idautomovil = _idautomovil;
END $$

DELIMITER $$
CREATE PROCEDURE spu_automoviles_obtener
(
	IN _idautomovil	INT
)
BEGIN
	SELECT * FROM automoviles
		WHERE idautomovil = _idautomovil;
END $$

DELIMITER $$
CREATE PROCEDURE spu_automoviles_eliminar
(
	IN _idautomovil	INT
)
BEGIN
	DELETE FROM automoviles
		WHERE idautomovil = _idautomovil;
END $$

CALL spu_automoviles_listar();