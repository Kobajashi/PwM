-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 05. Okt 2016 um 18:20
-- Server-Version: 5.6.28
-- PHP-Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `PwM`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cont1`
--

CREATE TABLE IF NOT EXISTS `cont1` (
  `id` int(11) NOT NULL,
  `nameOfPlattform` varchar(64) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `pw` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cont1`
--

INSERT INTO `cont1` (`id`, `nameOfPlattform`, `username`, `pw`, `email`, `name`) VALUES
(1, 'Twidda', 'Test', '8Ù_¿\03H|Ž×æ', 'Test', NULL),
(2, 'DuRÃ¶hre', 'Pedda', 'C„¹iC‰Aµöìm~YÎ', 'derSuperMenasch@web.de', ''),
(3, 'hbdgd', 'gdhcdg', 'ùÓÕr)”¬h¦ŸAæ´', 'hrghsgdrsr', ''),
(4, 'Pimmel 13', 'Pimmel', '§YŸx\0fP€1óˆ^ŠÜ', 'Pimmel', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cont2`
--

CREATE TABLE IF NOT EXISTS `cont2` (
  `id` int(11) NOT NULL,
  `nameOfPlattform` varchar(64) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `pw` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cont2`
--

INSERT INTO `cont2` (`id`, `nameOfPlattform`, `username`, `pw`, `email`, `name`) VALUES
(1, 'Pr0', 'MrFibunacci', 'ŽdÆ‘õmAjlˆºí.`äÞ', 'mrfibunacci@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `unsername` varchar(64) NOT NULL,
  `pw` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `unsername`, `pw`) VALUES
(1, 'TestUser01', 'ü›»ðUšÅÁÙ}x'),
(2, 'MrFibunacci', '‘}ißšÇÄD“Ôv–');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cont1`
--
ALTER TABLE `cont1`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `cont2`
--
ALTER TABLE `cont2`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cont1`
--
ALTER TABLE `cont1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `cont2`
--
ALTER TABLE `cont2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
