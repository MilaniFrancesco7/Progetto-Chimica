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
    <title>Strumentazione</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Barra Menù-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <img src="./img/MiniIconaNavbar.png" alt="#" id="IconaNavbar">
        <img src="./img/LogoItisBianco.png" alt="#" id="LogoItis">
        <a class="navbar-brand" href="index.php" id="BrandTitle">Strumentazione</a>
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

<!--SEZIONE PER LA RICERCA DI UNO STRUMENTO-->
        <section id="main">
          <div class="row">
            <div class="col-sm-5" id="SezioneRicerca">
              <div class="dark flex">
                <h3>Ricerca Strumentazione</h3>
                <hr>
                <form method="post">
                  <div class="form-group">
                    <label for="inputNomeStrumentazione">Inserisci Parola Chiave</label>
                    <input type="text" name="ricerca" class="form-control" id="inputNome" placeholder="Parola Chiave...">
                  </div>

                  <hr>
                  <input type="submit" name="ricercastrumenti" class="btn btn-primary" value="Cerca Strumentazione">
                </form>
              </div>
            </div>
<!-- SEZIONE PER LA STAMPA DI TUTTI GLI OGGETTI -->
        <div class="col-sm-5" id="SezioneRicerca">
          <div class="dark flex">
            <h3>Mostra Strumentazione</h3>
            <hr id="SpaziaturaLarga">
            <form method="post">
              <input type="submit" name="showall" class="btn btn-primary" value="Mostra tutti i Reagenti">
            </form>
          </div>
        </div>
<!--SEZIONE RELATIVA ALL'INSERIMENTO DI NUOVI STRUMENTI-->
        <div class="col-sm-10" id="SezioneInserimento">
          <div class="dark">
            <h3>Inserisci Nuova Strumentazione</h3>
            <hr>
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nome Strumentazione</label>
                  <input type="text" class="form-control"  id="NomeStrumentazione" placeholder="NomeStrumentazione">
                </div>
                <div class="form-group col-md-4">
                  <label>Tipo Strumentazione</label>
                  <input type="text" class="form-control" id="TipoStrumentazione" placeholder="TipoStrumentazione">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Numero Inventario</label>
                  <input type="text" class="form-control" id="NumStrumentazione" placeholder="NumStrumentazione">
                </div>
                <div class="form-group col-md-4">
                  <label>Quantita'</label>
                  <input type="text" class="form-control" id="QuantitaStrumentazione" placeholder="QuantitaStrumentazione">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Manuale</label>
                  <input type="file" id="pdfManuale" placeholder="pdfManuale">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Collocazione</label>
                  <input type="text" class="form-control" id="Collocazione" placeholder="Collocazione">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Aggiungi Strumentazione</button>
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

            $query = "SELECT * FROM strumentazione_apparecchiatura";

            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            if($count != 0)
            {
              echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
              echo "<ul id='services'>";

              while($search = mysqli_fetch_array($result))
              {
                echo "<li>";
                echo "<h3>$search[tipo]</h3>";
                echo "<p>Caratteristiche tecniche: $search[caratteristiche_tecniche]</p>";
                echo "<p>Quantità: $search[id_quantita]</p>";
                echo "<p>Manuale: $search[id_manuale]</p>";
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
          if(array_key_exists('ricercastrumenti', $_POST))
          {
            ricerca();
          }
          function ricerca()
          {
            $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

            $ricerca = $_POST['ricerca'];

            $ricerca .="%";

            $ricerca = $connect -> real_escape_string($ricerca);

            $query =   "SELECT * FROM strumentazione_apparecchiatura WHERE 
            id_strumento LIKE '".$ricerca."' OR 
            tipo LIKE '".$ricerca."' OR
            caratteristiche_tecniche LIKE '".$ricerca."'  OR
            id_quantita LIKE '".$ricerca."'  OR
            id_manuale LIKE '".$ricerca."'  OR
            id_collocazione LIKE '".$ricerca."' ";

            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            if($count != 0)
            {
              echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
              echo "<ul id='services'>";

              while($search = mysqli_fetch_array($result))
              {
                echo "<li>";
                echo "<h3>$search[tipo]</h3>";
                echo "<p>Caratteristiche tecniche: $search[caratteristiche_tecniche]</p>";
                echo "<p>Quantità: $search[id_quantita]</p>";
                echo "<p>Manuale: $search[id_manuale]</p>";
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
