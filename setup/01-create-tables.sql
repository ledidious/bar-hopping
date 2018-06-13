-- HOW TO EXECUTE WITH INTELLIJ
-- Right click on this file in file tree. Then select "Run" and select
-- the database (schema) on which you want to execute this migration script.
-- To see the databases, you need to configure the data sources in IntelliJ
-- in right sidebar "Databases".

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportiere Struktur von Tabelle bar-hopping.MARKER
CREATE TABLE IF NOT EXISTS `MARKER` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `lat` double(15,0) NOT NULL,
  `lng` double(15,0) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle bar-hopping.TOUR
CREATE TABLE IF NOT EXISTS `TOUR` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `fk_userID` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `imagePath` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `comment` text COLLATE utf8_bin,
  `rating` int(1) DEFAULT NULL,
  `tourDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_userID` (`fk_userID`),
  CONSTRAINT `fk_userID` FOREIGN KEY (`fk_userID`) REFERENCES `USER` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle bar-hopping.TOUR2MARKER
CREATE TABLE IF NOT EXISTS `TOUR2MARKER` (
  `fk_tourID` int(20) NOT NULL,
  `fk_markerID` int(20) NOT NULL,
  `description` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `imagePath` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  KEY `fk_markerID01` (`fk_markerID`),
  KEY `fk_tourID01` (`fk_tourID`),
  CONSTRAINT `fk_markerID01` FOREIGN KEY (`fk_markerID`) REFERENCES `MARKER` (`id`),
  CONSTRAINT `fk_tourID01` FOREIGN KEY (`fk_tourID`) REFERENCES `TOUR` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle bar-hopping.USER
CREATE TABLE IF NOT EXISTS `USER` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `yearOfBirth` date DEFAULT NULL,
  `joinedSince` date NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `sex` char(10) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `profileImage` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Daten Export vom Benutzer nicht ausgewählt
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
