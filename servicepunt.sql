-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 sep 2017 om 12:56
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicepunt`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `product` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `reservering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `inventaris`
--

INSERT INTO `inventaris` (`product`, `aantal`, `reservering`) VALUES
(1, 10, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `leerlingnummer` int(11) NOT NULL,
  `borg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `leerlingnummer`, `borg`) VALUES
(1, 'Maurice Schipper', 400023167, 'Bush Did 9/11');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `barcode` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `isActive` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `type`, `barcode`, `categorie`, `status`, `aantal`, `isActive`) VALUES
(1, 'Cliffchat, mocking', 2147483647, 4, 1, 5, 1),
(2, 'Cat, toddy', 2147483647, 2, 1, 5, 1),
(3, 'Mississippi alligator', 2147483647, 1, 1, 5, 1),
(4, 'White-throated monitor', 2147483647, 4, 1, 4, 1),
(5, 'Flicker, field', 2147483647, 3, 1, 2, 1),
(6, 'Great horned owl', 2147483647, 2, 1, 5, 1),
(7, 'Meerkat', 955202507, 3, 1, 2, 1),
(8, 'Hornbill, leadbeateri\'s ground', 2147483647, 4, 1, 2, 1),
(9, 'Hottentot teal', 2147483647, 3, 1, 4, 1),
(10, 'Blue and gold macaw', 2147483647, 2, 1, 3, 1),
(11, 'Gila monster', 2147483647, 4, 1, 1, 1),
(12, 'Jackal, asiatic', 2147483647, 4, 1, 1, 1),
(13, 'Arctic lemming', 2147483647, 4, 1, 1, 1),
(14, 'Savannah deer', 3466493, 3, 1, 3, 1),
(15, 'Striped skunk', 2147483647, 2, 1, 1, 1),
(16, 'Sidewinder', 2147483647, 3, 1, 3, 1),
(17, 'Screamer, southern', 2147483647, 1, 1, 1, 1),
(18, 'Deer, red', 2147483647, 1, 1, 4, 1),
(19, 'Mexican wolf', 1948062941, 4, 1, 4, 1),
(20, 'Crested screamer', 2147483647, 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `id` int(11) NOT NULL,
  `product_reservering` int(11) NOT NULL,
  `werknemer` int(11) NOT NULL,
  `klant` int(11) NOT NULL,
  `inleverDatum` date NOT NULL,
  `afhaalDatum` date NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`id`, `product_reservering`, `werknemer`, `klant`, `inleverDatum`, `afhaalDatum`, `isActive`) VALUES
(1, 1, 1, 1, '2017-09-29', '2017-09-22', 1),
(2, 2, 1, 1, '2017-09-29', '2017-09-22', 1),
(3, 3, 1, 1, '2017-09-29', '2017-09-22', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `werknemer`
--

CREATE TABLE `werknemer` (
  `id` int(11) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `gebruikersnaam` varchar(45) NOT NULL,
  `beheerder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `werknemer`
--

INSERT INTO `werknemer` (`id`, `wachtwoord`, `gebruikersnaam`, `beheerder`) VALUES
(1, 'admin', 'admin', 0),
(2, 'beheerder', 'beheerder', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`product`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `werknemer`
--
ALTER TABLE `werknemer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `werknemer`
--
ALTER TABLE `werknemer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
