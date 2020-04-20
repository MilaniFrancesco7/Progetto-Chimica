CREATE TABLE collocazione(
    id_collocazione int(10) NOT NULL AUTO_INCREMENT,
    tipo varchar(20) NOT NULL, /*Consumo/Magazzino*/
    armadio varchar(10) NOT NULL,
    stanza varchar(10) NOT NULL,
    PRIMARY KEY (id_collocazione) /*Chiave primaria*/
);

CREATE TABLE esperienza(
    id_esperienza int(10) NOT NULL AUTO_INCREMENT,
    nome_insegnante varchar(20) NOT NULL, /* classe?*/
    testo_docente text NOT NULL, /*65,535 characters*/
    PRIMARY KEY (id_esperienza) /*Chiave primaria*/
);

CREATE TABLE quantita(
    id_quantita int(10) NOT NULL AUTO_INCREMENT,
    quantita_presente int(10) NOT NULL,
    quantita_totale int(10) NOT NULL,
    data_aggiornamento date NOT NULL,
    PRIMARY KEY (id_quantita) /*Chiave primaria*/
);

CREATE TABLE vetreria_attrezzatura(
    id_attrezzo int(10) NOT NULL AUTO_INCREMENT,
    tipo varchar(20) NOT NULL, /*descrizione*/
    id_quantita int(10) NOT NULL,
    id_collocazione int(10) NOT NULL,
    PRIMARY KEY (id_attrezzo), /*Chiave primaria*/
    FOREIGN KEY (id_quantita) REFERENCES quantita(id_quantita), /*Chiave esterna per quantità*/
    FOREIGN KEY (id_collocazione) REFERENCES collocazione(id_collocazione) /*Chiave esterna per collocazione*/
);

CREATE TABLE scheda_sicurezza(
    id_scheda int(10) NOT NULL AUTO_INCREMENT,
    data_rilascio date NOT NULL,
    PRIMARY KEY (id_scheda) /*Chiave primaria*/
);

CREATE TABLE manuale(
    id_manuale int(10) NOT NULL AUTO_INCREMENT,
    id_collocazione int(10) NOT NULL,
    PRIMARY KEY (id_manuale), /*Chiave primaria*/
    FOREIGN KEY (id_collocazione) REFERENCES collocazione(id_collocazione) /*Chiave esterna per collocazione*/
);

CREATE TABLE strumentazione_apparecchiatura(
    id_strumento int(10) NOT NULL AUTO_INCREMENT,
    tipo varchar(20) NOT NULL, /*descrizione*/
    caratteristiche_tecniche tinytext NOT NULL, /*testo del docente*/
    numero_inventario int(10) NOT NULL,
    id_quantita int(10) NOT NULL,
    id_manuale int(10) NOT NULL,
    id_collocazione int(10) NOT NULL,
    PRIMARY KEY (id_strumento), /*Chiave primaria*/
    FOREIGN KEY (id_quantita) REFERENCES quantita(id_quantita), /*Chiave esterna per quantità*/
    FOREIGN KEY (id_manuale) REFERENCES manuale(id_manuale), /*Chiave esterna per manuale*/
    FOREIGN KEY (id_collocazione) REFERENCES collocazione(id_collocazione) /*Chiave esterna per collocazione*/
);

CREATE TABLE manutenzione(
    id_manutenzione int(10) NOT NULL AUTO_INCREMENT,
    data_manutenzione date NOT NULL,
    tipo int(2) NOT NULL, /*ordinaria/straordinaria*/
    cognome_tecnico varchar(20) NOT NULL,
    id_strumento int(10) NOT NULL,
    PRIMARY KEY (id_manutenzione), /*Chiave primaria*/
    FOREIGN KEY (id_strumento) REFERENCES strumentazione_apparecchiatura(id_strumento) /*Chiave esterna per strumento*/
);

CREATE TABLE riparazione(
    id_riparazione int(10) NOT NULL AUTO_INCREMENT,
    motivo tinytext NOT NULL, /*testo inserito dal docente*/
    data_uscita date NOT NULL,
    data_rientro date NOT NULL,
    ditta_riparatrice varchar(20) NOT NULL,
    id_strumento int(10) NOT NULL,
    PRIMARY KEY (id_riparazione), /*Chiave primaria*/
    FOREIGN KEY (id_strumento) REFERENCES strumentazione_apparecchiatura(id_strumento) /*Chiave esterna per strumento*/
);

CREATE TABLE reagente(
    id_reagente int(10) NOT NULL AUTO_INCREMENT,
    nome varchar(20) NOT NULL,
    formula varchar(30) NOT NULL,
    stato varchar(3) NOT NULL,
    ditta varchar(20) NOT NULL,
    pittogramma int(10) NOT NULL,
    frase varchar(50) NOT NULL,
    id_scheda_sicurezza int(10) NOT NULL,
    id_quantita int(10) NOT NULL,
    data_scadenza date NOT NULL,
    id_collocazione int(10) NOT NULL,
    PRIMARY KEY (id_reagente), /*Chiave primaria*/
    FOREIGN KEY (id_scheda_sicurezza) REFERENCES scheda_sicurezza(id_scheda), /*Chiave esterna per scheda di sicurezza*/
    FOREIGN KEY (id_collocazione) REFERENCES collocazione(id_collocazione) /*Chiave esterna per collocazione*/
);

CREATE TABLE reagente_esperienza( /* Tabella di relazione NM */
    id_reagente int(10) NOT NULL,
    id_esperienza int(10) NOT NULL,
    PRIMARY KEY (id_reagente,id_esperienza), /*Chiave primaria*/
    FOREIGN KEY (id_reagente) REFERENCES reagente(id_reagente),  /*Chiave esterna per reagente*/
    FOREIGN KEY (id_esperienza) REFERENCES esperienza(id_esperienza) /*Chiave esterna per esperienza*/
);

CREATE TABLE ruolo (
  id int(2) NOT NULL,
  descrizione varchar(250) DEFAULT NULL,
  alias varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE utente (
  id int(10) NOT NULL AUTO_INCREMENT,
  email varchar(40) NOT NULL,
  password varchar(20) NOT NULL,
  ruolo int(2) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (ruolo) REFERENCES ruolo(id)
);



---- INSERT

INSERT INTO collocazione(tipo, armadio, stanza) VALUES
("Consumo", 1, 1),
("Magazzino", 2, 5),
("Magazzino", 3, 2),
("Consumo", 4, 3),
("Magazzino", 4, 1),
("Consumo", 5, 3),
("Magazzino", 2, 5),
("Magazzino", 6, 2),
("Consumo", 3, 3),
("Magazzino", 1, 4);

INSERT INTO esperienza(nome_insegnante,testo_docente) VALUES
("Milani", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula."),
("Zen", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula."),
("Rigoni", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula."),
("De Nadai", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris molestie vulputate sapien, in venenatis tellus pretium a. Nunc rutrum lacinia tincidunt. Donec vulputate fermentum ante, lobortis mattis magna consectetur aliquet. Morbi dapibus libero rhoncus, sodales odio semper, feugiat ligula.");

INSERT INTO quantita(quantita_presente, quantita_totale, data_aggiornamento) VALUES
(10,10,'2020-01-10'),
(20,30,'2019-05-9'),
(10,40,'2020-02-4'),
(29,70,'2020-01-10'),
(26,70,'2020-02-30'),
(25,70,'2020-03-21'),
(24,70,'2020-04-25'),
(20,70,'2020-05-22'),
(35,90,'2020-03-8');

INSERT INTO vetreria_attrezzatura(tipo, quantita, id_collocazione) VALUES
("Beuta",1,1),
("Becher",2,2),
("Matraccio",3,3),
("Vetrino",4,4);

INSERT INTO scheda_sicurezza(data_rilascio) VALUES
('2020-01-10'),
('2020-03-5'),
('2020-02-17'),
('2020-04-9');

INSERT INTO manuale(id_collocazione) VALUES
(1),
(2),
(3);

INSERT INTO strumentazione_apparecchiatura(tipo, caratteristiche_tecniche, numero_inventario, id_quantita, id_manuale, id_collocazione) VALUES
("Cilindro graduato", "Lorem ipsum dolor sit amet, consectetur adipiscing elit", 1, 5, 1, 5),
("Cuvetta", "Lorem ipsum dolor sit amet, consectetur adipiscing elit", 2, 6, 2, 6);

INSERT INTO manutenzione(data_manutenzione, tipo, cognome_tecnico, id_strumento) VALUES
('2020-03-21', "consectetur adipiscing elit", "Milani", 1),
('2020-02-11', "consectetur adipiscing", "Zen", 2);

INSERT INTO riparazione(motivo, data_uscita, data_rientro, ditta_riparatrice, id_strumento) VALUES
("Mauris molestie vulputate sapi", '2020-03-21', '2020-03-23', "Milani src", 1),
("Mauris vulputate sapi", '2020-04-21', '2020-04-24', "Milani src", 2);

INSERT INTO reagente(nome, formula, stato, ditta, pittogramma, frase, id_scheda_sicurezza, id_quantita, data_scadenza, id_collocazione) VALUES
("Acido cloridrico", "HCl", "Liquido", "Milani srl", "Pericolo", "Contiene liquido sotto pressione", 1, 6, '2020-04-21', 7),
("Acido fluoridrico", "HF", "Solido", "Rigoni srl", "Pericolo", "Contiene solido sotto pressione", 2, 7, '2020-02-21', 8);

INSERT INTO reagente_esperienza(id_reagente, id_esperienza) VALUES
(1,1),
(2,2);

INSERT INTO ruolo(id, descrizione, alias) VALUES
(1, "Solo consultazione", "Base"),
(2, "Aggiornamento", "Intermedio"),
(3, "Aggiunta record", "Elevato"),
(4, "Aggiunta utenti", "Admin");

INSERT INTO utente(email, password, ruolo) VALUES
("milaniwork@gmail.com", "francescomilani", 4),
("marcozen00@gmail.com", "marcozen", 1),
("superfrancy@gmail.com", "francescorigoni", 3);