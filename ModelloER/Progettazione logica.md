

# Progettazione logica

## Diagramma E-R

<a href="https://ibb.co/Fq3W4zw"><img src="https://i.ibb.co/XkL4xts/MODELLOERPROGEGTTO.png" alt="MODELLOERPROGEGTTO" border="0"></a>

## Schema logico

***Reagente***(<ins>ID_Reagente (PK)</ins>, Nome, Formula, Stato, Ditta, Pittogramma, Frase, ID_Scheda_Sicurezza (FK), ID_Collocazione (FK), ID_Quantita (FK), Data_Scadenza)

***Collocazione***(<ins>ID_Collocazione (PK)</ins>, Tipo, Armadio, Stanza)

***Quantita***(<ins>ID_Quantita</ins>, Quantita_presente, Quantita_totale, Data_aggiornamento)

***Esperienza***(<ins>ID_Esperienza</ins>, Nome_Insegnante, Testo_docente)

***Vetreria_Attrezzatura***(<ins>ID_Attrezzo (PK)</ins>, Tipo, ID_Quantita (FK), ID_Collocazione (FK))

***S
<!--stackedit_data:
eyJoaXN0b3J5IjpbLTY2MDU3MDkxM119
-->