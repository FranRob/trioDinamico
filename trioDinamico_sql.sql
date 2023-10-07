-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_asistencias
CREATE DATABASE IF NOT EXISTS `sistema_asistencias` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistema_asistencias`;

-- Volcando estructura para tabla sistema_asistencias.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `dni` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`dni`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistema_asistencias.alumno: ~4 rows (aproximadamente)
INSERT INTO `alumno` (`dni`, `nombre`, `apellido`, `fecha_nacimiento`) VALUES
	(38570361, 'Marcos', 'Reynoso', '2023-10-07'),
	(39255959, 'Franco Antonio', 'Robles', '2023-10-07'),
	(40018598, 'Kevin Gustavo', 'Quiroga', '2023-10-07'),
	(40790201, 'Esteban ', 'Copello', '2023-10-07'),
	(40790545, 'Daian Exequiel', 'Fernandez', '2023-10-07'),
	(41872676, 'Facundo Ariel', 'Janusa', '2023-10-07'),
	(42069298, 'Marcos Damián', 'Godoy', '2023-10-07'),
	(42070085, 'Maria Pia', 'Melgarejo', '2023-10-07'),
	(42850626, 'Lucas', 'Barreiro', '2023-10-07'),
	(43149316, 'Franco Agustin', 'Chappe', '2023-10-07'),
	(43414566, 'Maximiliano', 'Weyler', '2023-10-07'),
	(43631710, 'Thiago Jeremías', 'Meseguer', '2023-10-07'),
	(43631803, 'Bruno', 'Godoy', '2023-10-07'),
	(43632750, 'Roman', 'Coletti', '2023-10-07'),
	(44282007, 'Bianca Ariana', 'Quiroga', '2023-10-07'),
	(44623314, 'Facundo Gerónimo', 'Figún', '2023-10-07'),
	(44644523, 'Ignacio Agustin', 'Piter', '2023-10-07'),
	(44980999, 'Nicolas Osvaldo', 'Fernandez', '2023-10-07'),
	(44981059, 'Federico José', 'Martinolich', '2023-10-07'),
	(45048325, 'Felipe', 'Franco', '2023-10-07'),
	(45048950, 'Facundo Martin ', 'Jara', '2023-10-07'),
	(45385675, 'Teo', 'Hildt', '2023-10-07'),
	(45387761, 'Santiago Nicolas', 'Martinez Bender', '2023-10-07'),
	(45389325, 'Lucas Jeremias', 'Fiorotto', '2023-10-07'),
	(45741185, 'Pablo Federico', 'Martinez', '2023-10-07'),
	(45847922, 'Franco', 'Cabrera', '2023-10-07');

-- Volcando estructura para tabla sistema_asistencias.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id_asistencia` int NOT NULL AUTO_INCREMENT,
  `dni_alumno` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`) USING BTREE,
  KEY `DNI_alumno` (`dni_alumno`) USING BTREE,
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`dni_alumno`) REFERENCES `alumno` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistema_asistencias.asistencias: ~2 rows (aproximadamente)

-- Volcando estructura para tabla sistema_asistencias.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `dias_de_clases` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistema_asistencias.parametros: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_asistencias.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dni_profesor` int NOT NULL,
  PRIMARY KEY (`dni_profesor`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistema_asistencias.profesores: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
