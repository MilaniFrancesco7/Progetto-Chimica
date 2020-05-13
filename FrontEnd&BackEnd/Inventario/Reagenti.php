<?php

  session_start();

  if(!isset($_SESSION["User"]))
  {
    header("location: SignIn.php");
  }

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
        <div class="col-lg-3" id="SezioneRicerca">
          <div class="dark flex" id="DivStampaTutto">
            <h3>Mostra Reagenti</h3>
            <hr>
            <img src="./img/Reagenti.png" alt="" id="LogoReagenti">
            <form method="post">
              <input type="submit" name="showall" class="btn btn-primary" value="Mostra tutti i Reagenti">
            </form>
          </div>
        </div>

<!-- Elimina un reagente -->
        <div class="col-lg-3" id="SezioneRicerca">
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

<!-- Ricerca di un reagente -->
        <div class="col-lg-4" id="SezioneRicerca">
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
                <div class="form-group col-md-2">
                  <label>Quantita'</label>
                  <input type="text" name="id_quantita" class="form-control" id="Quantita" placeholder="Quantità">
                </div>
                <div class="form-group col-md-4">
                  <label>Ditta Produttrice</label>
                  <input type="text" name="ditta" class="form-control" id="DittaProduttrice" placeholder="Ditta Produttrice">
                </div>
                <div class="form-group col-md-4">
                  <label>Data Scadenza</label>
                  <input type="date" name="data_scadenza" class="form-control" id="DataScadenza" placeholder="Data Scadenza">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Tipo di collocazione</label>
                  <select class="custom-select mr-sm-2" name="tipo_collocazione" id="inlineFormCustomSelect">
                    <option selected>Scegli...</option>
                    <option value="Solido">Consumo</option>
                    <option value="Liquido">Magazzino</option>
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
                  <!--<input type="file" id="Pittogramma" name="pittogramma" placeholder="Pittogramma">-->
                  <br>
                <!-- AREA TESTING PITTOGRAMMI-->
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/comburente.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
            		<div class="col-md-1"><label class="btn btn-primary"><img src="./img/corrosivo.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/esplosivo.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/gas_pressurizzato.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/infiammabile.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/irritante.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/nocivo.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                <div class="col-md-1"><label class="btn btn-primary"><img src="./img/tossico.svg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>

              </div>

              <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Scheda Sicurezza</label>
                  <input type="file" id="SchedaSicurezza" name="id_scheda_sicurezza" placeholder="Scheda Sicurezza">
                </div>
                <div class="form-group col-md-6">
                  <label>Frase Sicurezza</label>
                  <input type="text" class="form-control" name="frase" id="FraseSicurezza" placeholder="Frase Sicurezza">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-2">
                  <label> Testo Esperienza</label>
                  <input type="text" name="testo_esperienza" class="form-control" id="TestoEsperienza" placeholder="Testo Esperienza">
                </div>
                <div class="form-group col-md-2">
                  <label>Nome Insegnante</label>
                  <input type="text" name="nome_insegnante" class="form-control" id="NomeInsegnante" placeholder="Nome Insegnante">
                </div>
              </div>
              <input type="submit" name="inserisci" class="btn btn-primary" value="Aggiungi Reagente">
            </form>
          </div>
        </div>
      </div>

<!-- Funzione per l'inserimento di un reagente -->
      <?php
        if(array_key_exists('inserisci', $_POST))
        {
          inserisci();
        }
        function inserisci()
        {
          $tipo_collocazione = $_POST["tipo_collocazione"];       //Inserimento collocazione
          $stanza = $_POST["stanza"];
          $armadio = $_POST["armadio"];
          $ripiano = $_POST["ripiano"];

          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $query = "INSERT INTO collocazione(tipo_collocazione, armadio, stanza, ripiano)
                    VALUES ('$tipo_collocazione', '$stanza', '$armadio', '$ripiano')";

          if(mysqli_query($connect,$query))
          {
            $id_collocazione = mysqli_insert_id($connect);
          }

          mysqli_close($connect);

          $nome_insegnante = $_POST["nome_insegnante"];        //Inserimento esperienza
          $testo_esperienza = $_POST["testo_esperienza"];

          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $query = "INSERT INTO esperienza(nome_insegnante, testo_esperienza)
                    VALUES ('$nome_insegnante', '$testo_esperienza')";

          if(mysqli_query($connect,$query))
          {
            $id_esperienza = mysqli_insert_id($connect);
          }

          mysqli_close($connect);

          $nome = $_POST["nome"];             //Inserimento reagente
          $formula = $_POST["formula"];
          $stato = $_POST["stato"];
          $ditta = $_POST["ditta"];
          $pittogramma = "1";
          $frase = $_POST["frase"];
          $id_scheda_sicurezza = "3";
          $id_quantita = $_POST["id_quantita"];
          $data_scadenza = $_POST["data_scadenza"];

          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $query = "INSERT INTO reagente (nome, formula, stato, ditta, pittogramma, frase, id_scheda_sicurezza, id_quantita, data_scadenza, id_collocazione)
                    VALUES ('$nome', '$formula', '$stato', '$ditta', '$pittogramma', '$frase', '$id_scheda_sicurezza', '$id_quantita', '$data_scadenza', '$id_collocazione')";

          if (mysqli_query($connect, $query))
          {
            $id_reagente = mysqli_insert_id($connect);
          }

          mysqli_close($connect);

          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");     //Inserimento Esperienza + Reagente

          $query = "INSERT INTO reagente_esperienza(id_reagente, id_esperienza)
                    VALUES ('$id_reagente', '$id_esperienza')";

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

          mysqli_close($connect);

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
          $id_reagente = $_POST["id_reagente"];

          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $query = "DELETE FROM reagente WHERE reagente.id_reagente = $id_reagente";

          if(mysqli_query($connect, $query))
          {
            $message = "Elemento eliminato con successo!";
            echo "<script>alert('$message');</script>";
          }
          else
          {
            $message = "Elemento non eliminato";
            echo "<script>alert('$message');</script>";
          }
          mysqli_close($connect);
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
          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $query = "SELECT * FROM reagente";

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
              echo "<p>Quantità: $search[id_quantita]</p>";
              echo "<p>Stato: $search[stato]</p>";
              echo "<p>Ditta: $search[ditta]</p>";
              echo "<p>Frase: $search[frase]</p>";
              echo "<p>Data Scadenza: $search[data_scadenza]</p>";
              echo "<p>Collocazione: $search[id_collocazione]</p>";
              echo "</li>";
            }

            echo "</ul>";
            echo "</div>";

          }
          mysqli_free_result($result);
          mysqli_close($connect);
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
          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $ricerca = $_POST['ricerca'];

          $ricerca .="%";

          $ricerca = $connect -> real_escape_string($ricerca);

          $query =  "SELECT * FROM reagente WHERE
                      nome LIKE '".$ricerca."' OR
                      formula LIKE '".$ricerca."' OR
                      stato LIKE '".$ricerca."'  OR
                      ditta LIKE '".$ricerca."'  OR
                      frase LIKE '".$ricerca."' ";

          $result = mysqli_query($connect, $query);

          $count = mysqli_num_rows($result);

          if($count != 0)
          {
            echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
            echo "<ul id='services'>";

            while($search = mysqli_fetch_array($result))
            {
              echo "<li>";
              echo "<h3>$search[nome]</h3>";
              echo "<p>Formula: $search[formula]</p>";
              echo "<p>Quantità: $search[id_quantita]</p>";
              echo "<p>Stato: $search[stato]</p>";
              echo "<p>Ditta: $search[ditta]</p>";
              echo "<p>Frase: $search[frase]</p>";
              echo "<p>Data Scadenza: $search[data_scadenza]</p>";
              echo "<p>Collocazione: $search[id_collocazione]</p>";
              echo "</li>";
            }

            echo "</ul>";
            echo "</div>";
          }

          mysqli_free_result($result);
          mysqli_close($connect);
        }
      ?>
    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
