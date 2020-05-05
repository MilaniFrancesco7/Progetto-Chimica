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
                <a class="dropdown-item" href="Strumentazione.php">Lista Apparecchiatura</a>
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
              <a class="nav-link" href="#">Sezione Riparazioni</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!--Fine barra dei menù*/-->

<!--SEZIONE PER LA RICERCA DI UN REAGENTE-->
    <section id="main">
      <div class="row">
        <div class="col-sm-5" id="SezioneRicerca1">
          <div class="dark flex">
            <h3>Ricerca Reagente</h3>
            <hr>
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
<!-- SEZIONE PER LA STAMPA DI TUTTI GLI OGGETTI -->
        <div class="col-sm-5" id="SezioneRicerca">
          <div class="dark flex">
            <h3>Mostra Reagenti</h3>
            <hr id="SpaziaturaLarga">
            <form method="post">
              <input type="submit" name="showall" class="btn btn-primary" value="Mostra tutti i Reagenti">
            </form>
          </div>
        </div>
<!--SEZIONE RELATIVA ALL'INSERIMENTO DI NUOVI REAGENTI-->
        <div class="col-sm-10" id="SezioneInserimento">
          <div class="dark">
            <h3>Inserisci Nuovo Reagente</h3>
            <hr>
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nome Reagente</label>
                  <input type="text" class="form-control"  id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div class="form-group col-md-4">
                  <label>Formula</label>
                  <input type="text" class="form-control" id="NomeReagente" placeholder="NomeReagente">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Quantita'</label>
                  <input type="text" class="form-control" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div class="form-group col-md-4">
                  <label>Ditta Produttrice</label>
                  <input type="text" class="form-control" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div class="form-group col-md-4">
                  <label>Data Scadenza</label>
                  <input type="date" class="form-control" id="NomeReagente" placeholder="NomeReagente">
                </div>
              </div>
              <div class="form-group">
                <label>Stato Reagente</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Scegli...</option>
                  <option value="Solido">Solido</option>
                  <option value="Liquido">Liquido</option>
                  <option value="Gassoso">Gassoso</option>
                </select>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Pittogramma</label>
                  <input type="file" id="NomeReagente" placeholder="Nome Reagente">
                </div>
                <div class="form-group col-md-6">
                  <label>Scheda Sicurezza</label>
                  <input type="file" id="SchedaSicurezza" placeholder="Scheda Sicurezza">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Frase Sicurezza</label>
                  <input type="text" class="form-control"id="FraseSicurezza" placeholder="Frase Sicurezza">
                </div>
                <div class="form-group col-md-4">
                  <label>Collocazione</label>
                  <input type="text" class="form-control" id="Collocazione" placeholder="Collocazione">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Aggiungi Reagente</button>
            </form>
          </div>
        </div>
      </div>

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



      <!-- Tabella per reagenti
        <div class="col-sm-6" id="AttrezzaturaMain">
            <ul id="services">
              <li>
                <h3>Reagente</h3>
                <p>Formula:</p>
                <p>Quantità:</p>
                <p>Stato:</p>
                <p>Ditta:</p>
                <p>Pittogramma:</p>
                <p><img src="" alt="">Scheda Sicurezza:</p>
                <p>Frase:</p>
                <p>Data Scadenza:</p>
                <p>Scheda Sicurezza:</p>
                <p>Collocazione:</p>
              </li>
            </ul>
        </div>
        -->


    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
