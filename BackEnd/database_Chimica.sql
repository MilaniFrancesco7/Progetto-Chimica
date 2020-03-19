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
    quantita int(10) NOT NULL,
    id_collocazione int(10) NOT NULL,
    PRIMARY KEY (id_attrezzo), /*Chiave primaria*/
    FOREIGN KEY (quantita) REFERENCES quantita(id_quantita), /*Chiave esterna per quantità*/
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
    caratteritsiche_tecniche tinytext NOT NULL, /*testo del docente*/
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