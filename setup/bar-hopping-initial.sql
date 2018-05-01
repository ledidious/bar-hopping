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


-- Exportiere Datenbank Struktur für bar-hopping
CREATE DATABASE IF NOT EXISTS `bar-hopping` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `bar-hopping`;

-- Exportiere Struktur von Tabelle bar-hopping.MARKER
CREATE TABLE IF NOT EXISTS `MARKER` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `lat` double(15,0) NOT NULL,
  `lng` double(15,0) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportiere Daten aus Tabelle bar-hopping.MARKER: ~0 rows (ungefähr)
DELETE FROM `MARKER`;
/*!40000 ALTER TABLE `MARKER` DISABLE KEYS */;
/*!40000 ALTER TABLE `MARKER` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle bar-hopping.RATING
CREATE TABLE IF NOT EXISTS `RATING` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `imagePath` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `comment` text COLLATE utf8_bin,
  `value` int(1) NOT NULL,
  `fk_TOURID` int(20) NOT NULL,
  `fk_MARKERID` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_MARKERID02` (`fk_MARKERID`),
  KEY `fk_TOURID02` (`fk_TOURID`),
  CONSTRAINT `fk_MARKERID02` FOREIGN KEY (`fk_MARKERID`) REFERENCES `MARKER` (`id`),
  CONSTRAINT `fk_TOURID02` FOREIGN KEY (`fk_TOURID`) REFERENCES `TOUR` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportiere Daten aus Tabelle bar-hopping.RATING: ~0 rows (ungefähr)
DELETE FROM `RATING`;
/*!40000 ALTER TABLE `RATING` DISABLE KEYS */;
/*!40000 ALTER TABLE `RATING` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle bar-hopping.TOUR
CREATE TABLE IF NOT EXISTS `TOUR` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `fk_USERID` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_USERID` (`fk_USERID`),
  CONSTRAINT `fk_USERID` FOREIGN KEY (`fk_USERID`) REFERENCES `USER` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportiere Daten aus Tabelle bar-hopping.TOUR: ~0 rows (ungefähr)
DELETE FROM `TOUR`;
/*!40000 ALTER TABLE `TOUR` DISABLE KEYS */;
/*!40000 ALTER TABLE `TOUR` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle bar-hopping.TOUR2MARKER
CREATE TABLE IF NOT EXISTS `TOUR2MARKER` (
  `fk_TOURID` int(20) NOT NULL,
  `fk_MARKERID` int(20) NOT NULL,
  KEY `fk_MARKERID01` (`fk_MARKERID`),
  KEY `fk_TOURID01` (`fk_TOURID`),
  CONSTRAINT `fk_MARKERID01` FOREIGN KEY (`fk_MARKERID`) REFERENCES `MARKER` (`id`),
  CONSTRAINT `fk_TOURID01` FOREIGN KEY (`fk_TOURID`) REFERENCES `TOUR` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportiere Daten aus Tabelle bar-hopping.TOUR2MARKER: ~0 rows (ungefähr)
DELETE FROM `TOUR2MARKER`;
/*!40000 ALTER TABLE `TOUR2MARKER` DISABLE KEYS */;
/*!40000 ALTER TABLE `TOUR2MARKER` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle bar-hopping.USER
CREATE TABLE IF NOT EXISTS `USER` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `yearOfBirth` date DEFAULT NULL,
  `joinedSince` date NOT NULL,
  `USERname` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `sex` char(10) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `profileImage` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Exportiere Daten aus Tabelle bar-hopping.USER: ~0 rows (ungefähr)
DELETE FROM `USER`;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
