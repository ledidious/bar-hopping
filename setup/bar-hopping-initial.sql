-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 25. Apr 2018 um 15:15
-- Server Version: 5.5.59-0+deb8u1
-- PHP-Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `bar-hopping`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `MARKER`
--

CREATE TABLE IF NOT EXISTS `MARKER` (
`id` int(20) NOT NULL,
  `lat` double(15,0) NOT NULL,
  `lng` double(15,0) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `RATING`
--

CREATE TABLE IF NOT EXISTS `RATING` (
`id` int(20) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `value` int(1) NOT NULL,
  `fk_tourID` int(20) NOT NULL,
  `fk_markerID` int(20) NOT NULL,
  `imagePath` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `TOUR`
--

CREATE TABLE IF NOT EXISTS `TOUR` (
`id` int(20) NOT NULL,
  `fk_userID` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `TOUR2MARKER`
--

CREATE TABLE IF NOT EXISTS `TOUR2MARKER` (
  `fk_tourID` int(20) NOT NULL,
  `fk_markerID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
`id` int(20) NOT NULL,
  `yearOfBirth` date DEFAULT NULL,
  `joinedSince` date NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `sex` char(10) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `profileImage` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `MARKER`
--
ALTER TABLE `MARKER`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `RATING`
--
ALTER TABLE `RATING`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `TOUR`
--
ALTER TABLE `TOUR`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `USER`
--
ALTER TABLE `USER`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `MARKER`
--
ALTER TABLE `MARKER`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `RATING`
--
ALTER TABLE `RATING`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `TOUR`
--
ALTER TABLE `TOUR`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `USER`
--
ALTER TABLE `USER`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
