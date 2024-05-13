
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yankar`
--

CREATE TABLE `eventoscalendar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento` varchar(250) DEFAULT NULL,
  `instructorId` int DEFAULT NULL,
  `pago` varchar(250) DEFAULT NULL,
  `tipoCurso` varchar(250) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `fecha_prox` varchar(20) DEFAULT NULL,
  `fecha_ult` varchar(20) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL, 
  `cel` varchar(20) DEFAULT NULL, 
  `asistio` varchar(255) DEFAULT NULL,
  `hora_inicio` varchar(20) DEFAULT NULL,
  `hora_fin` varchar(20) DEFAULT NULL,  
   PRIMARY KEY (`id`),
   FOREIGN KEY (instructorId) REFERENCES Instructor(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `Instructor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instructor` varchar(250) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `cel` varchar(20) DEFAULT NULL,
  `foto` blob,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


COMMIT;
