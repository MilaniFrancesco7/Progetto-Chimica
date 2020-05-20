-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2020 alle 13:03
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
-- Struttura della tabella `collocazione`
--

CREATE TABLE `collocazione` (
  `id_collocazione` int(10) NOT NULL,
  `tipo_collocazione` varchar(20) DEFAULT NULL,
  `armadio` varchar(10) DEFAULT NULL,
  `stanza` varchar(10) DEFAULT NULL,
  `ripiano` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `collocazione`
--

INSERT INTO `collocazione` (`id_collocazione`, `tipo_collocazione`, `armadio`, `stanza`, `ripiano`) VALUES
(1, 'Consumo', '1', '1', '3'),
(2, 'Magazzino', '2', '5', '2'),
(3, 'Magazzino', '3', '2', '6'),
(4, 'Consumo', '4', '3', '4'),
(5, 'Magazzino', '4', '1', '5'),
(6, 'Consumo', '5', '3', '7'),
(7, 'Magazzino', '2', '5', '9'),
(8, 'Magazzino', '6', '2', '8'),
(9, 'Consumo', '3', '3', '2'),
(10, 'Magazzino', '1', '4', '5');

-- --------------------------------------------------------

--
-- Struttura della tabella `collocazione_scheda_manuale`
--

CREATE TABLE `collocazione_scheda_manuale` (
  `id_collocazione_scheda` int(10) NOT NULL,
  `armadio_scheda` varchar(10) DEFAULT NULL,
  `stanza_scheda` varchar(10) DEFAULT NULL,
  `ripiano_scheda` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `collocazione_scheda_manuale`
--

INSERT INTO `collocazione_scheda_manuale` (`id_collocazione_scheda`, `armadio_scheda`, `stanza_scheda`, `ripiano_scheda`) VALUES
(0, '1', '4', '2'),
(1, '1', '1', '4'),
(2, '2', '5', '3'),
(3, '3', '2', '5'),
(4, '4', '3', '6'),
(5, '4', '1', '1'),
(6, '5', '3', '7'),
(7, '2', '5', '8'),
(8, '6', '2', '9'),
(9, '3', '3', '2'),
(10, '1', '4', '7'),
(11, '1', '4', '4');

-- --------------------------------------------------------

--
-- Struttura della tabella `esperienza`
--

CREATE TABLE `esperienza` (
  `id_esperienza` int(10) NOT NULL,
  `nome_insegnante` varchar(20) NOT NULL,
  `testo_esperienza` text NOT NULL,
  `classe_esperienza` varchar(20) DEFAULT NULL,
  `data_esperienza` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `esperienza`
--

INSERT INTO `esperienza` (`id_esperienza`, `nome_insegnante`, `testo_esperienza`, `classe_esperienza`, `data_esperienza`) VALUES
(1, 'Milani', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula.', '5 AI', '2020-05-21'),
(2, 'Zen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula.', '5 AI', '2020-05-21'),
(3, 'Rigoni', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula.', '5 AI', '2020-05-21'),
(4, 'De Nadai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula.', '5 AI', '2020-05-21');

-- --------------------------------------------------------

--
-- Struttura della tabella `manuale`
--

CREATE TABLE `manuale` (
  `id_manuale` int(10) NOT NULL,
  `id_collocazione_manuale` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `manuale`
--

INSERT INTO `manuale` (`id_manuale`, `id_collocazione_manuale`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `manutenzione`
--

CREATE TABLE `manutenzione` (
  `id_manutenzione` int(10) NOT NULL,
  `id_strumento` int(10) NOT NULL,
  `data_manutenzione` date NOT NULL,
  `tipo_manutenzione` varchar(20) NOT NULL,
  `cognome_tecnico` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `manutenzione`
--

INSERT INTO `manutenzione` (`id_manutenzione`, `id_strumento`, `data_manutenzione`, `tipo_manutenzione`, `cognome_tecnico`) VALUES
(1, 1, '2020-03-21', 'Ordinaria', 'Milani'),
(2, 2, '2020-02-11', 'Straordinaria', 'Zen');

-- --------------------------------------------------------

--
-- Struttura della tabella `quantita`
--

CREATE TABLE `quantita` (
  `id_quantita` int(10) NOT NULL,
  `quantita_presente` int(10) DEFAULT NULL,
  `quantita_totale` int(10) DEFAULT NULL,
  `data_aggiornamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `quantita`
--

INSERT INTO `quantita` (`id_quantita`, `quantita_presente`, `quantita_totale`, `data_aggiornamento`) VALUES
(1, 10, 1, '2020-05-18'),
(2, 20, 30, '2019-05-09'),
(3, 10, 40, '2020-02-04'),
(4, 29, 70, '2020-01-10'),
(5, 26, 34, '2020-05-18'),
(6, 20, 70, '2020-05-18'),
(7, 19, 60, '2020-05-18'),
(8, 20, 70, '2020-05-22'),
(9, 35, 90, '2020-03-08');

-- --------------------------------------------------------

--
-- Struttura della tabella `reagente`
--

CREATE TABLE `reagente` (
  `id_reagente` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `formula` varchar(30) DEFAULT NULL,
  `stato` varchar(10) DEFAULT NULL,
  `ditta` varchar(20) DEFAULT NULL,
  `pittogramma` varchar(100) DEFAULT NULL,
  `frase` varchar(50) DEFAULT NULL,
  `id_scheda_sicurezza` int(10) NOT NULL,
  `id_quantita` int(10) NOT NULL,
  `data_scadenza` date DEFAULT NULL,
  `id_collocazione` int(10) NOT NULL,
  `conservazione` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `reagente`
--

INSERT INTO `reagente` (`id_reagente`, `nome`, `formula`, `stato`, `ditta`, `pittogramma`, `frase`, `id_scheda_sicurezza`, `id_quantita`, `data_scadenza`, `id_collocazione`, `conservazione`) VALUES
(1, 'Acido cloridrico', 'HCl', 'Liquido', 'Milani srl', 'comburente', 'Contiene liquido sotto pressione', 1, 6, '2020-04-21', 7, 'Temperatura Ambiente'),
(2, 'Acido fluoridrico', 'HF', 'Solido', 'Rigoni srl', 'corrosivo', 'Contiene solido sotto pressione', 2, 7, '2020-02-21', 8, 'Temperatura Refrigerata');

-- --------------------------------------------------------

--
-- Struttura della tabella `reagente_esperienza`
--

CREATE TABLE `reagente_esperienza` (
  `id_reagente` int(10) NOT NULL,
  `id_esperienza` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `reagente_esperienza`
--

INSERT INTO `reagente_esperienza` (`id_reagente`, `id_esperienza`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `riparazione`
--

CREATE TABLE `riparazione` (
  `id_riparazione` int(10) NOT NULL,
  `id_strumento` int(10) NOT NULL,
  `motivo` tinytext NOT NULL,
  `data_uscita` date DEFAULT NULL,
  `ditta_riparatrice` varchar(20) NOT NULL,
  `data_rientro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `riparazione`
--

INSERT INTO `riparazione` (`id_riparazione`, `id_strumento`, `motivo`, `data_uscita`, `ditta_riparatrice`, `data_rientro`) VALUES
(1, 1, 'Mauris molestie vulputate sapi', '2020-03-21', 'Milani src', '2020-03-23'),
(2, 2, 'Mauris vulputate sapi', '2020-04-21', 'Milani src', '2020-04-24');

-- --------------------------------------------------------

--
-- Struttura della tabella `ruolo`
--

CREATE TABLE `ruolo` (
  `id` int(2) NOT NULL,
  `descrizione` varchar(250) DEFAULT NULL,
  `alias` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ruolo`
--

INSERT INTO `ruolo` (`id`, `descrizione`, `alias`) VALUES
(1, 'Solo consultazione', 'Livello Base'),
(2, 'Aggiornamento', 'Livello Intermedio'),
(3, 'Aggiunta record', 'Livello Elevato');

-- --------------------------------------------------------

--
-- Struttura della tabella `scheda_sicurezza`
--

CREATE TABLE `scheda_sicurezza` (
  `id_scheda` int(10) NOT NULL,
  `data_rilascio` date NOT NULL,
  `id_collocazione_scheda` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scheda_sicurezza`
--

INSERT INTO `scheda_sicurezza` (`id_scheda`, `data_rilascio`, `id_collocazione_scheda`) VALUES
(1, '2020-01-10', 5),
(2, '2020-03-05', 6),
(3, '2020-02-17', 7),
(4, '2020-04-09', 8),
(5, '2020-05-19', 4),
(6, '2020-05-17', 9),
(7, '2020-05-31', 10),
(8, '2020-05-31', 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `strumentazione_apparecchiatura`
--

CREATE TABLE `strumentazione_apparecchiatura` (
  `id_strumento` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `caratteristiche_tecniche` tinytext NOT NULL,
  `numero_inventario` int(10) NOT NULL,
  `id_quantita` int(10) NOT NULL,
  `id_manuale` int(10) NOT NULL,
  `id_collocazione` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `strumentazione_apparecchiatura`
--

INSERT INTO `strumentazione_apparecchiatura` (`id_strumento`, `tipo`, `caratteristiche_tecniche`, `numero_inventario`, `id_quantita`, `id_manuale`, `id_collocazione`) VALUES
(1, 'Cilindro graduato', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 1, 5, 1, 5),
(2, 'Cuvetta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 2, 6, 2, 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password_utente` varchar(20) NOT NULL,
  `ruolo` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `email`, `password_utente`, `ruolo`) VALUES
(1, 'milaniwork@gmail.com', 'francescomilani', 2),
(2, 'marcozen00@gmail.com', 'marcozen', 1),
(3, 'superfrancy@gmail.com', 'francescorigoni', 3);

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
-- Indici per le tabelle `collocazione`
--
ALTER TABLE `collocazione`
  ADD PRIMARY KEY (`id_collocazione`);

--
-- Indici per le tabelle `collocazione_scheda_manuale`
--
ALTER TABLE `collocazione_scheda_manuale`
  ADD PRIMARY KEY (`id_collocazione_scheda`);

--
-- Indici per le tabelle `esperienza`
--
ALTER TABLE `esperienza`
  ADD PRIMARY KEY (`id_esperienza`);

--
-- Indici per le tabelle `manuale`
--
ALTER TABLE `manuale`
  ADD PRIMARY KEY (`id_manuale`),
  ADD KEY `id_collocazione_manuale` (`id_collocazione_manuale`);

--
-- Indici per le tabelle `manutenzione`
--
ALTER TABLE `manutenzione`
  ADD PRIMARY KEY (`id_manutenzione`),
  ADD KEY `id_strumento` (`id_strumento`);

--
-- Indici per le tabelle `quantita`
--
ALTER TABLE `quantita`
  ADD PRIMARY KEY (`id_quantita`);

--
-- Indici per le tabelle `reagente`
--
ALTER TABLE `reagente`
  ADD PRIMARY KEY (`id_reagente`),
  ADD KEY `reagente_ibfk_1` (`id_scheda_sicurezza`),
  ADD KEY `reagente_ibfk_2` (`id_collocazione`),
  ADD KEY `reagente_ibfk_3` (`id_quantita`);

--
-- Indici per le tabelle `reagente_esperienza`
--
ALTER TABLE `reagente_esperienza`
  ADD PRIMARY KEY (`id_reagente`,`id_esperienza`),
  ADD KEY `reagente_esperienza_ibfk_2` (`id_esperienza`);

--
-- Indici per le tabelle `riparazione`
--
ALTER TABLE `riparazione`
  ADD PRIMARY KEY (`id_riparazione`),
  ADD KEY `id_strumento` (`id_strumento`);

--
-- Indici per le tabelle `ruolo`
--
ALTER TABLE `ruolo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `scheda_sicurezza`
--
ALTER TABLE `scheda_sicurezza`
  ADD PRIMARY KEY (`id_scheda`),
  ADD KEY `id_collocazione_scheda` (`id_collocazione_scheda`);

--
-- Indici per le tabelle `strumentazione_apparecchiatura`
--
ALTER TABLE `strumentazione_apparecchiatura`
  ADD PRIMARY KEY (`id_strumento`),
  ADD KEY `id_quantita` (`id_quantita`),
  ADD KEY `id_manuale` (`id_manuale`),
  ADD KEY `id_collocazione` (`id_collocazione`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruolo` (`ruolo`);

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
-- AUTO_INCREMENT per la tabella `collocazione`
--
ALTER TABLE `collocazione`
  MODIFY `id_collocazione` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT per la tabella `collocazione_scheda_manuale`
--
ALTER TABLE `collocazione_scheda_manuale`
  MODIFY `id_collocazione_scheda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `esperienza`
--
ALTER TABLE `esperienza`
  MODIFY `id_esperienza` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la tabella `manuale`
--
ALTER TABLE `manuale`
  MODIFY `id_manuale` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `manutenzione`
--
ALTER TABLE `manutenzione`
  MODIFY `id_manutenzione` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `quantita`
--
ALTER TABLE `quantita`
  MODIFY `id_quantita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `reagente`
--
ALTER TABLE `reagente`
  MODIFY `id_reagente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT per la tabella `riparazione`
--
ALTER TABLE `riparazione`
  MODIFY `id_riparazione` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `scheda_sicurezza`
--
ALTER TABLE `scheda_sicurezza`
  MODIFY `id_scheda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `strumentazione_apparecchiatura`
--
ALTER TABLE `strumentazione_apparecchiatura`
  MODIFY `id_strumento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `vetreria_attrezzatura`
--
ALTER TABLE `vetreria_attrezzatura`
  MODIFY `id_attrezzo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `manuale`
--
ALTER TABLE `manuale`
  ADD CONSTRAINT `manuale_ibfk_1` FOREIGN KEY (`id_collocazione_manuale`) REFERENCES `collocazione_scheda_manuale` (`id_collocazione_scheda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `reagente`
--
ALTER TABLE `reagente`
  ADD CONSTRAINT `reagente_ibfk_1` FOREIGN KEY (`id_scheda_sicurezza`) REFERENCES `scheda_sicurezza` (`id_scheda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reagente_ibfk_2` FOREIGN KEY (`id_collocazione`) REFERENCES `collocazione` (`id_collocazione`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reagente_ibfk_3` FOREIGN KEY (`id_quantita`) REFERENCES `quantita` (`id_quantita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `reagente_esperienza`
--
ALTER TABLE `reagente_esperienza`
  ADD CONSTRAINT `reagente_esperienza_ibfk_1` FOREIGN KEY (`id_reagente`) REFERENCES `reagente` (`id_reagente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reagente_esperienza_ibfk_2` FOREIGN KEY (`id_esperienza`) REFERENCES `esperienza` (`id_esperienza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `scheda_sicurezza`
--
ALTER TABLE `scheda_sicurezza`
  ADD CONSTRAINT `scheda_sicurezza` FOREIGN KEY (`id_collocazione_scheda`) REFERENCES `collocazione_scheda_manuale` (`id_collocazione_scheda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `strumentazione_apparecchiatura`
--
ALTER TABLE `strumentazione_apparecchiatura`
  ADD CONSTRAINT `strumentazione_apparecchiatura_ibfk_1` FOREIGN KEY (`id_quantita`) REFERENCES `quantita` (`id_quantita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `strumentazione_apparecchiatura_ibfk_2` FOREIGN KEY (`id_manuale`) REFERENCES `manuale` (`id_manuale`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `strumentazione_apparecchiatura_ibfk_3` FOREIGN KEY (`id_collocazione`) REFERENCES `collocazione` (`id_collocazione`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`ruolo`) REFERENCES `ruolo` (`id`);

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
