-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         11.6.2-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para test_alpha
CREATE DATABASE IF NOT EXISTS `test_alpha` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `test_alpha`;

-- Volcando estructura para tabla test_alpha.clase
CREATE TABLE IF NOT EXISTS `clase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `points` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Volcando datos para la tabla test_alpha.clase: ~10 rows (aproximadamente)
INSERT INTO `clase` (`id`, `name`, `points`) VALUES
	(1, 'Inglés Escrito #2', 5),
	(2, 'Francés Escrito', 4),
	(3, 'Italiano Escrito', 2),
	(4, 'Alemán Escrito', 3),
	(5, 'Portugues Escrito', 1),
	(6, 'Inglés Oral', 5),
	(7, 'Francés Oral', 3),
	(8, 'Italiano Oral', 2),
	(9, 'Alemán Oral', 0),
	(10, 'Portugues Oral', 1);

-- Volcando estructura para tabla test_alpha.examen
CREATE TABLE IF NOT EXISTS `examen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Volcando datos para la tabla test_alpha.examen: ~24 rows (aproximadamente)
INSERT INTO `examen` (`id`, `name`, `type`) VALUES
	(1, 'Exámen Inglés  Escrito', 'Selección'),
	(2, 'Exámen Francés  Escrito', 'Pregunta y respuesta'),
	(3, 'Exámen Italiano  Escrito', 'Selección'),
	(4, 'Exámen Alemán  Escrito', 'Completación'),
	(5, 'Exámen Portugues  Escrito', 'Selección'),
	(6, 'Exámen Inglés  Oral', 'Pregunta y respuesta'),
	(7, 'Exámen Francés  Oral', 'Pregunta y respuesta'),
	(8, 'Exámen Italiano  Oral', 'Completación'),
	(9, 'Exámen Alemán  Oral', 'Completación'),
	(10, 'Exámen Portugues  Oral', 'Completación'),
	(11, 'Exámen Inglés  Escrito #2', 'Completación'),
	(12, 'Exámen Francés  Escrito #2', 'Selección'),
	(13, 'Exámen Italiano  Escrito #2', 'Completación'),
	(14, 'Exámen Alemán  Escrito #2', 'Preguntas y Respuestas'),
	(15, 'Exámen Portugues  Escrito #2', 'Completación'),
	(16, 'Exámen Inglés  Oral', 'Selección'),
	(17, 'Exámen Francés  Oral', 'Selección'),
	(18, 'Exámen Italiano  Oral', 'Completación'),
	(19, 'Exámen Alemán  Oral', 'Preguntas y Respuestas'),
	(20, 'Exámen Portugues  Oral', 'Completación'),
	(21, 'Gramática Alemán  Escrito', 'Completación'),
	(22, 'Gramática Ingles ', 'Completación'),
	(23, 'Gramática Francés', 'Completación'),
	(24, 'Gramática Portugues  Escrito', 'Completación');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
