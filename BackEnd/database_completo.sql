-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2020 alle 17:14
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto_chimica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `vetreria_attrezzatura`
--

CREATE TABLE `vetreria_attrezzatura` (
  `id_attrezzo` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_quantita` int(10) NOT NULL,
  `id_collocazione` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `vetreria_attrezzatura`
--

INSERT INTO `vetreria_attrezzatura` (`id_attrezzo`, `tipo`, `id_quantita`, `id_collocazione`) VALUES
(1, 'Beuta', 1, 1),
(2, 'Becher', 2, 2),
(3, 'Matraccio', 3, 3),
(4, 'Vetrino', 4, 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `vetreria_attrezzatura`
--
ALTER TABLE `vetreria_attrezzatura`
  ADD PRIMARY KEY (`id_attrezzo`),
  ADD KEY `id_quantita` (`id_quantita`),
  ADD KEY `id_collocazione` (`id_collocazione`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `vetreria_attrezzatura`
--
ALTER TABLE `vetreria_attrezzatura`
  MODIFY `id_attrezzo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `vetreria_attrezzatura`
--
ALTER TABLE `vetreria_attrezzatura`
  ADD CONSTRAINT `vetreria_attrezzatura_ibfk_1` FOREIGN KEY (`id_quantita`) REFERENCES `quantita` (`id_quantita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vetreria_attrezzatura_ibfk_2` FOREIGN KEY (`id_collocazione`) REFERENCES `collocazione` (`id_collocazione`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
