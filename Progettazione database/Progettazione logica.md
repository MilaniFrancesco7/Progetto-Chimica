

# Progettazione logica

## Diagramma E-R

<a href="https://ibb.co/KL4Znrq"><img src="https://i.ibb.co/Yyn9gLk/MODELLOERPROGEGTTO-1.png" alt="MODELLOERPROGEGTTO-1" border="0"></a>

## Schema logico

***Reagente***(<ins>ID_Reagente (PK)</ins>, Nome, Formula, Stato, Ditta, Pittogramma, Frase, ID_Scheda_Sicurezza (FK), ID_Quantita (FK), Data_Scadenza)

***Collocazione***(<ins>ID_Collocazione (PK)</ins>, Tipo, Armadio, Stanza, ID_Oggetto (FK))

***Quantita***(<ins>ID_Quantita</ins>, Quantita_presente, Quantita_totale, Data_aggiornamento)

***Esperienza***(<ins>ID_Esperienza</ins>, Nome_Insegnante, Testo_docente)

***Vetreria_Attrezzatura***(<ins>ID_Attrezzo (PK)</ins>, Tipo, ID_Quantita (FK))

***Strumentazione_Apparecchiatura***(<ins>ID_Strumento (PK)</ins>, Tipo, Caratteristiche_Tecniche, Numero_inventario, ID_Quantita (FK), ID_Manuale (FK))

***Scheda_Sicurezza***(<ins>ID_Scheda (PK)</ins>, Data_Rilascio)

***Manutenzione***(<ins>ID_Manutenzione (PK)</ins>, Data, Tipo, Cognome_Tecnico, ID_Strumento (FK))

***Riparazione***(<ins>ID_Riparazione (PK)</ins>, Motivo, Data_uscita, Data_rientro, Ditta_riparatrice, ID_Strumento (FK))

***Reagente_Esperienza***(<ins>ID_Reagente (FK), ID_Esperienza (FK), (PK)</ins>)

***Manuale***(<ins>ID_Manuale</ins>)
<!--stackedit_data:
eyJoaXN0b3J5IjpbLTIwMTA4MTAwODgsMTA5NzI5OTM4MSwxOD
A3NzQ2MTUwXX0=
-->