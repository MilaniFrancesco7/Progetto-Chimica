<?php

  session_start();

  if(!isset($_SESSION["User"]))
  {
    header("location: SignIn.php");
  }

  include "db/connection.php";

?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reagenti</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Barra Menù-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <img src="./img/MiniIconaNavbar.png" alt="#" id="IconaNavbar">
        <img src="./img/LogoItisBianco.png" alt="#" id="LogoItis">
        <a class="navbar-brand" href="index.php" id="BrandTitle">Reagenti</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" id="NavbarList">

            <!--Item dropdown - Menù a tendina-->
            <li class="nav-item dropdown">
              <a class="nav-link" href="index.php">Menù principale</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lista Inventario
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Reagenti.php">Lista Reagenti</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Strumentazione.php">Lista Strumentazione</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Vetreria.php">Lista Vetreria</a>
              </div>
            </li>
            <!-- Link Sezione manutenzione-->
            <li class="nav-item">
              <a class="nav-link" href="Manutenzione.php">Sezione Manutenzione</a>
            </li>

            <!-- Link Sezione Riparazioni-->
            <li class="nav-item">
              <a class="nav-link" href="Riparazione.php">Sezione Riparazioni</a>
            </li>

            <!-- Link Creazione Utente-->
            <li class="nav-item">
              <a class="nav-link" href="Crea_Utente.php">Creazione Utente</a>
            </li>
          </ul>

          <!-- Link per l'accesso -->
          <?php

            //Se non loggato mostra il comando per entrare
            if(!isset($_SESSION["User"]))
            {
              echo "<form class='form-inline' action='SignIn.php' id='FormBottoneAccesso'>";
              echo "<button class='btn btn-outline-success' type='submit' id='BottoneAccesso'>Accedi</button>";
              echo "</form>";
            }
            else
            {
              echo "<form class='form-inline' action='Logout.php' id='FormBottoneAccesso'>";
              echo "<button class='btn btn-outline-success' type='submit' id='BottoneAccesso'>Logout</button>";
              echo "</form>";
            }


          ?>
        </div>
      </div>
    </nav>

<!--Fine barra dei menù-->

<!-- SEZIONE PRINCIPALE -->
<section id="main">
  <div class="row" id="MainPage">

<!-- Stampa di tutti gli oggetti ##-->
        <div class="col-md-3" id="SezioneRicerca">
          <div class="dark flex" id="DivStampaTutto">
            <h3>Mostra Reagenti</h3>
            <hr>
            <img src="./img/Reagenti.png" alt="" id="LogoReagenti">
            <form method="post">
              <input type="submit" name="showall" class="btn btn-primary" value="Mostra tutti i Reagenti">
            </form>
          </div>
        </div>

<!-- Ricerca di un reagente -->
        <div class="col-md-4" id="SezioneRicerca">
          <div class="dark flex">
            <h3>Ricerca Reagente</h3>
            <hr id="SpaziaturaLarga">
            <form method="post">
              <div class="form-group">
                <label for="inputNomeReagente">Inserisci Parola Chiave</label>
                <input type="text" name="ricerca" class="form-control" id="inputNome" placeholder="Parola Chiave...">
              </div>
               <hr>
              <input type="submit" name="ricercareagente" class="btn btn-primary" value="Cerca reagente">
            </form>
          </div>
        </div>

<!-- Elimina un reagente -->
        <div class="col-md-3" id="SezioneRicerca">
          <div class="dark flex" id="DivStampaTutto">
            <center>
            <h3>Elimina un Reagente</h3>
            <img src="./img/NoReagenti.png" alt="" id="LogoReagenti">
            <form method="post">
              <div class="form-row" id="EliminaElemento">
                <div class="form-group col-lg-8" id="FormEliminazione">
                  <label for="inputIdReagente">Inserisci Id Reagente</label>
                  <input type="text" name="id_reagente" class="form-control" id="IdReagente" placeholder="ID Reagente">
                </div>
                <div class="form-group col-lg-2"id="FormEliminazione">
                  <br id="SpazioLarghetto">
                  <input type="submit" name="delete" class="btn btn-primary" value="Elimina">
                </div>
              </div>
            </form>
          </center>
          </div>
        </div>



<!-- Inserimento di un nuovo reagente -->
        <div class="col-lg-10" id="SezioneInserimento">
          <div class="dark">
            <h3>Inserisci Nuovo Reagente</h3>
            <hr>
            <form method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nome Reagente</label>
                  <input type="text" name="nome" class="form-control"  id="NomeReagente" placeholder="Nome Reagente">
                </div>
                <div class="form-group col-md-6">
                  <label>Formula</label>
                  <input type="text" name="formula" class="form-control" id="Formula" placeholder="Formula">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Stato</label>
                  <select class="custom-select mr-sm-2" name="stato" id="inlineFormCustomSelect">
                    <option selected>Scegli...</option>
                    <option value="Solido">Solido</option>
                    <option value="Liquido">Liquido</option>
                    <option value="Aeriforme">Aeriforme</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Metodologia di conservazione</label>
                  <select class="custom-select mr-sm-2" name="conservazione" id="inlineFormCustomSelect">
                    <option selected>Scegli...</option>
                    <option value="Temperatura Ambiente">Temperatura Ambiente</option>
                    <option value="Temperatura Refrigerata">Temperatura Refrigerata</option>
                    <option value="In Congelatore">In Congelatore</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Quantita' Presente</label>
                  <input type="text" name="quantita_presente" class="form-control" id="QuantitaPresente" placeholder="Quantità Presente">
                </div>
                <div class="form-group col-md-2">
                  <label>Quantita' Totale</label>
                  <input type="text" name="quantita_totale" class="form-control" id="QuantitaTotale" placeholder="Quantità Totale">
                </div>
                <div class="form-group col-md-2">
                  <label>Ditta Produttrice</label>
                  <input type="text" name="ditta" class="form-control" id="DittaProduttrice" placeholder="Ditta Produttrice">
                </div>
                <div class="form-group col-md-2">
                  <label>Data Scadenza</label>
                  <input type="date" name="data_scadenza" class="form-control" id="DataScadenza" placeholder="Data Scadenza">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Tipo di collocazione</label>
                  <select class="custom-select mr-sm-2" name="tipo_collocazione" id="inlineFormCustomSelect">
                    <option selected>Scegli...</option>
                    <option value="Consumo">Consumo</option>
                    <option value="Magazzino">Magazzino</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Stanza</label>
                  <input type="text" name="stanza" class="form-control" id="Stanza" placeholder="Stanza">
                </div>
                <div class="form-group col-md-3">
                  <label>Armadio</label>
                  <input type="text" name="armadio" class="form-control" id="Armadio" placeholder="Armadio">
                </div>
                <div class="form-group col-md-3">
                  <label>Ripiano</label>
                  <input type="text" name="ripiano" class="form-control" id="Ripiano" placeholder="Ripiano">
                </div>
              </div>

              <div class="form-row">
                  <legend style="font-size:12px">Pittogramma</legend>
                  <br>
                <!-- AREA PITTOGRAMMI-->
                <?php
                  $array_pittogrammi = array("comburente","corrosivo","esplosivo","gas_pressurizzato","infiammabile","irritante","nocivo","tossico");

                  foreach($array_pittogrammi as $pittogramma)
                  {
                    $immagine = $pittogramma;
                    $immagine .=".svg";
                    echo '<div class="col-md-1"><label class="btn btn-primary"><img src="./img/'.$immagine.'" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="pittogramma[]" id="pittogramma" value="'.$pittogramma.'" class="hidden" autocomplete="off"></label></div>';
                  }
                ?>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Frase/i di Rischio</label>
                  <input type="text" class="form-control" name="frase" id="FraseSicurezza" placeholder="Frase Sicurezza">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Stanza Scheda di Sicurezza</label>
                  <input type="text" id="StanzaScheda" class="form-control" name="stanza_scheda" placeholder="Stanza">
                </div>
                <div class="form-group col-md-2">
                  <label>Armadio Scheda di Sicurezza</label>
                  <input type="text" id="ArmadioScheda" class="form-control" name="armadio_scheda" placeholder="Armadio">
                </div>
                <div class="form-group col-md-2">
                  <label>Ripiano Scheda di Sicurezza</label>
                  <input type="text" id="RipianoScheda" class="form-control" name="ripiano_scheda" placeholder="Ripiano">
                </div>
                <div class="form-group col-md-2">
                  <label>Data Rilascio Scheda di Sicurezza</label>
                  <input type="date" name="data_rilascio" class="form-control" id="DataRilascio" placeholder="Data Rilascio">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-2">
                  <label> Testo Esperienza</label>
                  <input type="text" name="testo_esperienza" class="form-control" id="TestoEsperienza" placeholder="Testo Esperienza">
                </div>
                <div class="form-group col-md-2">
                  <label>Docente</label>
                  <input type="text" name="nome_insegnante" class="form-control" id="NomeInsegnante" placeholder="Nome Insegnante">
                </div>
                <div class="form-group col-md-2">
                  <label>Docente</label>
                  <input type="text" name="nome_insegnante" class="form-control" id="NomeInsegnante" placeholder="Nome Insegnante">
                </div>
              </div>
              <input type="submit" name="inserisci" class="btn btn-primary" value="Aggiungi Reagente">
            </form>
          </div>
        </div>

<!-- Inserimento di un'esperienza -->
      <div class="col-lg-6" id="SezioneRicerca">
        <div class="dark flex">
          <h3>Inserisci un'esperienza</h3>
          <hr id="SpaziaturaLarga">
          <form method="post">
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="inputNomeReagente">Docente</label>
                <input type="text" name="nome_insegnante" class="form-control" id="Docente" placeholder="Docente">
              </div>
              <div class="form-group col-md-2">
                <label for="inputNomeReagente">Classe</label>
                <input type="text" name="classe_esperienza" class="form-control" id="classe_esperienza" placeholder="Classe">
              </div>
              <div class="form-group col-md-2">
                <label for="inputNomeReagente">ID Reagente</label>
                <input type="text" name="id_reagente" class="form-control" id="IDReagente" placeholder="ID Reagente">
              </div>
              <div class="form-group col-md-3">
                  <label for="inputNomeReagente">Data</label>
                  <input type="date" name="data_esperienza" class="form-control" id="data_esperienza" placeholder="Data">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputNomeReagente">Testo Esperienza</label>
                <input type="text" name="testo_esperienza" class="form-control" id="TestoEsperienza" placeholder="Testo Esperienza">
              </div>
            </div>
            <input type="submit" name="inserisciesperienza" class="btn btn-primary" value="Inserisci esperienza">
          </form>
        </div>
      </div>

<!-- Stampa di tutti gli oggetti ##-->
<div class="col-lg-3" id="SezioneRicerca">
          <div class="dark flex" id="DivStampaTutto">
            <h3>Stampa Esperienze</h3>
            <hr>
            <img src="./img/Reagenti.png" alt="" id="LogoReagenti">
            <form method="post">
              <input type="submit" name="showallexperiences" class="btn btn-primary" value="Mostra tutti le Esperienze">
            </form>
          </div>
        </div>
      </div>


<!-- Stampa di tutte le esperienze -->
      <?php
        if(array_key_exists('showallexperiences', $_POST))
        {
          showallexperiences();
        }
        function showallexperiences()
        {
          include "db/connection.php";

          $query = "SELECT esperienza.*, reagente.nome
                    FROM esperienza INNER JOIN reagente_esperienza
                    ON esperienza.id_esperienza = reagente_esperienza.id_esperienza
                    INNER JOIN reagente
                    ON reagente_esperienza.id_reagente = reagente.id_reagente ";

          $result = mysqli_query($connect, $query);

          $count = mysqli_num_rows($result);

          if($count != 0)
          {
            echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
            echo "<ul id='services'>";

            while($search = mysqli_fetch_array($result))
            {
              echo "<li>";
              echo "<h3>$search[id_esperienza] $search[nome]</h3>";
              echo "<p>Docente: $search[nome_insegnante]</p>";
              echo "<p>Classe: $search[classe_esperienza]</p>";
              echo "<p>Data: $search[data_esperienza]</p>";
              echo "<p>$search[testo_esperienza]</p>";
            }
            echo "</ul>";
            echo "</div>";
          }
        }
      ?>

<!-- Inserimento di un'esperienza -->
      <?php
        if(array_key_exists('inserisciesperienza', $_POST))
        {
          inserisciesperienza();
        }
        function inserisciesperienza()
        {
          include "db/connection.php";

          $id_reagente = $_POST["id_reagente"];
          $nome_insegnante = $_POST["nome_insegnante"];
          $testo_esperienza = $_POST["testo_esperienza"];
          $data_esperienza = $_POST["data_esperienza"];
          $classe_esperienza = $_POST["classe_esperienza"];

          $query = "INSERT INTO esperienza(nome_insegnante, testo_esperienza, classe_esperienza, data_esperienza)
                    VALUES ('$nome_insegnante', '$testo_esperienza', '$classe_esperienza', '$data_esperienza')";

          if(mysqli_query($connect,$query))
          {
            $id_esperienza = mysqli_insert_id($connect);
          }

          $query = "INSERT INTO reagente_esperienza(id_reagente,id_esperienza)
                    VALUES ('$id_reagente','$id_esperienza')";

          if (mysqli_query($connect, $query))
          {
            $message = "Esperienza inserita con successo!";
            echo "<script>alert('$message');</script>";
          }
          else
          {
            $message = "Esperienza non inserita";
            echo "<script>alert('$message');</script>";
          }
        }
      ?>


<!-- Funzione per l'inserimento di un reagente -->
      <?php

        if(array_key_exists('inserisci', $_POST))
        {
          inserisci();
        }
        function inserisci()
        {
          include "db/connection.php";

          $stanza_scheda = $_POST["stanza_scheda"];         //Inserimento collocazione della scheda di sicurezza
          $armadio_scheda = $_POST["armadio_scheda"];
          $ripiano_scheda = $_POST["ripiano_scheda"];

          $query = "INSERT INTO collocazione_scheda_manuale(armadio_scheda, stanza_scheda, ripiano_scheda)
                    VALUES ('$armadio_scheda', '$stanza_scheda', '$ripiano_scheda')";

          if(mysqli_query($connect,$query))
          {
            $id_collocazione_scheda = mysqli_insert_id($connect);
          }

          $data_rilascio = $_POST["data_rilascio"];       //Inserimento scheda di sicurezza

          $query = "INSERT INTO scheda_sicurezza(data_rilascio, id_collocazione_scheda)
                    VALUES ('$data_rilascio','$id_collocazione_scheda')";

          if(mysqli_query($connect,$query))
          {
            $id_scheda_sicurezza = mysqli_insert_id($connect);
          }

          $tipo_collocazione = $_POST["tipo_collocazione"];       //Inserimento collocazione
          $stanza = $_POST["stanza"];
          $armadio = $_POST["armadio"];
          $ripiano = $_POST["ripiano"];

          $query = "INSERT INTO collocazione(tipo_collocazione, armadio, stanza, ripiano)
                    VALUES ('$tipo_collocazione', '$stanza', '$armadio', '$ripiano')";

          if(mysqli_query($connect,$query))
          {
            $id_collocazione = mysqli_insert_id($connect);
          }

          $nome_insegnante = $_POST["nome_insegnante"];        //Inserimento esperienza
          $testo_esperienza = $_POST["testo_esperienza"];

          $query = "INSERT INTO esperienza(nome_insegnante, testo_esperienza)
                    VALUES ('$nome_insegnante', '$testo_esperienza')";

          if(mysqli_query($connect,$query))
          {
            $id_esperienza = mysqli_insert_id($connect);
          }

          $quantita_presente = $_POST["quantita_presente"];   //Inserimento quantità
          $quantita_totale = $_POST["quantita_totale"];
          $data_aggiornamento = date("Y-m-d");

          $query = "INSERT INTO quantita(quantita_presente, quantita_totale, data_aggiornamento)
                    VALUES ('$quantita_presente', '$quantita_totale', '$data_aggiornamento')";

          if (mysqli_query($connect, $query))
          {
            $id_quantita = mysqli_insert_id($connect);
          }

          $nome = $_POST["nome"];             //Inserimento reagente
          $formula = $_POST["formula"];
          $stato = $_POST["stato"];
          $ditta = $_POST["ditta"];
          $frase = $_POST["frase"];
          $data_scadenza = $_POST["data_scadenza"];
          $conservazione = $_POST["conservazione"];

          echo "$stato";

          if(!empty($_POST['pittogramma']))       // Inserimento dei pittogrammi
          {
            $pittogramma = implode(",",$_POST['pittogramma']);
          }

          $query = "INSERT INTO reagente (nome, formula, stato, ditta, pittogramma, frase, id_scheda_sicurezza, id_quantita, data_scadenza, id_collocazione, conservazione)
                    VALUES ('$nome', '$formula', '$stato', '$ditta', '$pittogramma', '$frase', '$id_scheda_sicurezza', '$id_quantita', '$data_scadenza', '$id_collocazione', '$conservazione')";

          if (mysqli_query($connect, $query))
          {
            $id_reagente = mysqli_insert_id($connect);
          }

          $query = "INSERT INTO reagente_esperienza(id_reagente, id_esperienza)
                    VALUES ('$id_reagente', '$id_esperienza')";     //Inserimento Esperienza + Reagente

          if (mysqli_query($connect, $query))
          {
            $message = "Elemento inserito con successo!";
            echo "<script>alert('$message');</script>";
          }
          else
          {
            $message = "Elemento non inserito";
            echo "<script>alert('$message');</script>";
          }
        }
     ?>

<!-- Funzione per l'eliminazione di un oggetto -->
      <?php
        if(array_key_exists('delete', $_POST))
        {
          delete();
        }
        function delete()
        {
          include "db/connection.php";

          $id_reagente = $_POST["id_reagente"];

          $query1 = "DELETE esperienza.* FROM esperienza INNER JOIN reagente_esperienza ON esperienza.id_esperienza = reagente_esperienza.id_esperienza WHERE id_reagente = $id_reagente";

          $query2 = "DELETE FROM reagente WHERE reagente.id_reagente = $id_reagente";

          if(mysqli_query($connect, $query1) AND mysqli_query($connect, $query2))
          {
            $message = "Elemento eliminato con successo!";
            echo "<script>alert('$message');</script>";
          }
          else
          {
            $message = "Elemento non eliminato";
            echo "<script>alert('$message');</script>";
          }
        }
      ?>

<!-- Funzione per la stampa di tutti gli oggetti -->
      <?php
        if(array_key_exists('showall', $_POST))
        {
          showall();
        }
        function showall()
        {
          include "db/connection.php";

          $query = "SELECT reagente.*,quantita.*,collocazione.*,collocazione_scheda_manuale.*, scheda_sicurezza.*
                    FROM reagente INNER JOIN quantita
                    ON reagente.id_quantita = quantita.id_quantita
                    INNER JOIN collocazione
                    ON reagente.id_collocazione = collocazione.id_collocazione
                    INNER JOIN scheda_sicurezza
                    ON reagente.id_scheda_sicurezza = scheda_sicurezza.id_scheda
                    INNER JOIN collocazione_scheda_manuale
                    ON scheda_sicurezza.id_collocazione_scheda = collocazione_scheda_manuale.id_collocazione_scheda";

          $result = mysqli_query($connect, $query);

          $count = mysqli_num_rows($result);

          if($count != 0)
          {
            echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
            echo "<ul id='services'>";

            while($search = mysqli_fetch_array($result))
            {
              echo "<li>";
              echo "<h3>$search[id_reagente] $search[nome]</h3>";
              echo "<p>Formula: $search[formula]</p>";
              echo "<p>Quantità: $search[quantita_presente]  /  $search[quantita_totale]  - Data Aggiornamento: $search[data_aggiornamento]</p>";
              echo "<p>Data Scadenza: $search[data_scadenza]</p>";
              echo "<p>Stato: $search[stato]</p>";
              echo "<p>Conservazione: $search[conservazione]</p>";

              $pittogrammi = explode (",",$search["pittogramma"]);    // Stampa dei pittogrammi

              echo "<p>Pittogramma/i:";
              foreach($pittogrammi as $pittogramma)
              {
                $immagine = $pittogramma;
                $immagine .=".svg";

                 echo '<img src="./img/'.$immagine.'" alt="..." height="100" width="100">';
              }
              echo "</p>";
              echo "<p>Frase/i di rischio: $search[frase]</p>";
              echo "<p>Ditta: $search[ditta]</p>";
              echo "<p>Collocazione Reagente: $search[tipo_collocazione], Stanza $search[stanza], Armadio $search[armadio], Ripiano $search[ripiano]</p>";
              echo "<p>Collocazione Scheda di Sicurezza: Stanza $search[stanza_scheda], Armadio $search[armadio_scheda], Ripiano $search[ripiano_scheda]";
              echo "<p>Data di Rilascio Scheda di Sicurezza: $search[data_rilascio]";
              echo "</li>";
            }

            echo "</ul>";
            echo "</div>";

          }
          else
          {
            $message = "Non sono presenti reagenti";
            echo "<script>alert('$message');</script>";
          }
        }
      ?>

<!-- Funzione per la ricerca -->
      <?php
        if(array_key_exists('ricercareagente', $_POST))
        {
          ricerca();
        }
        function ricerca()
        {
          include "db/connection.php";

          $ricerca = $_POST['ricerca'];

          $ricerca .="%";

          $ricerca = $connect -> real_escape_string($ricerca);

          $query = "SELECT reagente.*,quantita.*,collocazione.*,collocazione_scheda_manuale.*, scheda_sicurezza.*
                    FROM reagente
                    INNER JOIN quantita
                    ON reagente.id_quantita = quantita.id_quantita
                    INNER JOIN collocazione
                    ON reagente.id_collocazione = collocazione.id_collocazione
                    INNER JOIN scheda_sicurezza
                    ON reagente.id_scheda_sicurezza = scheda_sicurezza.id_scheda
                    INNER JOIN collocazione_scheda_manuale
                    ON scheda_sicurezza.id_collocazione_scheda = collocazione_scheda_manuale.id_collocazione_scheda
                    WHERE
                    nome LIKE '".$ricerca."' OR
                    formula LIKE '".$ricerca."' OR
                    stato LIKE '".$ricerca."'  OR
                    conservazione LIKE '".$ricerca."' OR
                    pittogramma LIKE '".$ricerca."' OR
                    ditta LIKE '".$ricerca."'  OR
                    frase LIKE '".$ricerca."'";

          $result = mysqli_query($connect, $query);

          $count = mysqli_num_rows($result);

          if($count != 0)
          {
            echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
            echo "<ul id='services'>";

            while($search = mysqli_fetch_array($result))
            {
              echo "<li>";
              echo "<h3>$search[id_reagente] $search[nome]</h3>";
              echo "<p>Formula: $search[formula]</p>";
              echo "<p>Quantità: $search[quantita_presente]  /  $search[quantita_totale]</p>";
              echo "<p>Stato: $search[stato]</p>";
              echo "<p>Data Scadenza: $search[data_scadenza]</p>";
              echo "<p>Conservazione: $search[conservazione]</p>";

              $pittogrammi = explode (",",$search["pittogramma"]);    // Stampa dei pittogrammi

              echo "<p>Pittogramma/i:";
              foreach($pittogrammi as $pittogramma)
              {
                $immagine = $pittogramma;
                $immagine .=".svg";

                 echo '<img src="./img/'.$immagine.'" alt="..." height="100" width="100">';
              }
              echo "</p>";
              echo "<p>Frase/i di rischio: $search[frase]</p>";
              echo "<p>Ditta: $search[ditta]</p>";
              echo "<p>Collocazione Reagente: $search[tipo_collocazione], Stanza $search[stanza], Armadio $search[armadio], Ripiano $search[ripiano]</p>";
              echo "<p>Collocazione Scheda di Sicurezza: Stanza $search[stanza_scheda], Armadio $search[armadio_scheda], Ripiano $search[ripiano_scheda]";
              echo "<p>Data di Rilascio Scheda di Sicurezza: $search[data_rilascio]";
              echo "</li>";
            }

            echo "</ul>";
            echo "</div>";
          }
          else
          {
            $message = "Elemento non trovato";
            echo "<script>alert('$message');</script>";
          }
        }
      ?>
    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
