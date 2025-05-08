-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mai 2025 um 12:42
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `projekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `Benutzer_ID` int(11) NOT NULL,
  `Benutzername` varchar(25) DEFAULT NULL,
  `EMail` varchar(255) DEFAULT NULL,
  `Passwort` varchar(30) DEFAULT NULL,
  `Registrierungsdatum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`Benutzer_ID`, `Benutzername`, `EMail`, `Passwort`, `Registrierungsdatum`) VALUES
(1, 'test', 'test@test.de', '$2y$10$Ao9kJSifs6O9Z3dokxqJMeK', NULL),
(2, 'test', 'test2@test.de', '$2y$10$S4zzu/oheEYM.vV2FJhC5O2', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `Bestellung_ID` int(11) NOT NULL,
  `Benutzer_ID` int(11) NOT NULL,
  `Bestelldatum` datetime NOT NULL,
  `Gesamtpreis` decimal(10,2) NOT NULL,
  `Menge` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
  `Bewertung_ID` int(11) NOT NULL,
  `Benutzer_ID` int(11) NOT NULL,
  `Spiel_ID` int(11) NOT NULL,
  `Bewertung` tinyint(5) NOT NULL,
  `Kommentar` text NOT NULL,
  `Erstelldatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE `kategorien` (
  `Kategorie_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`Kategorie_ID`, `Name`) VALUES
(1, 'Sandbox'),
(2, 'Endloses Rennspiel'),
(3, ' Battle Royale'),
(4, 'Ego-Shooter'),
(5, 'Multiplayer Online Battle Arena'),
(6, 'Kampfspiel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentare`
--

CREATE TABLE `kommentare` (
  `Kommentare_ID` int(11) NOT NULL,
  `Nutzername` varchar(100) NOT NULL,
  `Nachricht` text NOT NULL,
  `Erstellungsdatum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiele`
--

CREATE TABLE `spiele` (
  `Spiel_ID` int(11) NOT NULL,
  `Titel` varchar(150) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Preis` decimal(10,2) NOT NULL,
  `Kategorie_ID` int(11) NOT NULL,
  `Veröffentlichungsdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `spiele`
--

INSERT INTO `spiele` (`Spiel_ID`, `Titel`, `Beschreibung`, `Preis`, `Kategorie_ID`, `Veröffentlichungsdatum`) VALUES
(1, 'Subway Surfers', 'Subway Surfers ist ein klassisches Endlos-Laufspiel. Du spielst Jake, der durch die U-Bahn surft und versucht, dem Inspektor und seinem Hund zu entkommen. Weiche Zügen, Straßenbahnen, Hindernissen und vielem mehr aus, um in diesem Endlos-Laufspiel so weit wie möglich zu kommen.', '0.00', 2, '2012-05-26'),
(2, 'Call of Duty: Mobile', '', '0.00', 3, '2019-10-01'),
(3, 'Doom', '', '0.00', 4, '1993-12-10'),
(4, 'Clash Royale', '', '0.00', 5, '2016-03-02'),
(5, 'Minecraft', '', '29.99', 1, '2009-05-17'),
(6, 'PUBG', '', '0.00', 3, '2017-03-23'),
(7, 'Fortnite', '', '0.00', 3, '2017-07-21'),
(8, 'Marvel Contest of Champions\r\n', '', '0.00', 6, '2014-12-10');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`Benutzer_ID`),
  ADD UNIQUE KEY `EMail` (`EMail`);

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`Bestellung_ID`),
  ADD KEY `Benutzer_ID` (`Benutzer_ID`);

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`Bewertung_ID`),
  ADD KEY `Benutzer_ID` (`Benutzer_ID`),
  ADD KEY `Spiel_ID` (`Spiel_ID`);

--
-- Indizes für die Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`Kategorie_ID`);

--
-- Indizes für die Tabelle `kommentare`
--
ALTER TABLE `kommentare`
  ADD PRIMARY KEY (`Kommentare_ID`);

--
-- Indizes für die Tabelle `spiele`
--
ALTER TABLE `spiele`
  ADD PRIMARY KEY (`Spiel_ID`),
  ADD KEY `Kategorie_ID` (`Kategorie_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `Benutzer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `Bestellung_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  MODIFY `Bewertung_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `Kategorie_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `kommentare`
--
ALTER TABLE `kommentare`
  MODIFY `Kommentare_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `spiele`
--
ALTER TABLE `spiele`
  MODIFY `Spiel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `bestellungen_ibfk_1` FOREIGN KEY (`Benutzer_ID`) REFERENCES `benutzer` (`Benutzer_ID`);

--
-- Constraints der Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD CONSTRAINT `bewertung_ibfk_1` FOREIGN KEY (`Benutzer_ID`) REFERENCES `benutzer` (`Benutzer_ID`),
  ADD CONSTRAINT `bewertung_ibfk_2` FOREIGN KEY (`Spiel_ID`) REFERENCES `spiele` (`Spiel_ID`);

--
-- Constraints der Tabelle `spiele`
--
ALTER TABLE `spiele`
  ADD CONSTRAINT `spiele_ibfk_1` FOREIGN KEY (`Kategorie_ID`) REFERENCES `kategorien` (`Kategorie_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
