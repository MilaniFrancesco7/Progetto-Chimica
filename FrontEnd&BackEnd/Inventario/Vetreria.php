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
    <title>Vetreria</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Barra Menù-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <img src="./img/MiniIconaNavbar.png" alt="#" id="IconaNavbar">
        <img src="./img/LogoItisBianco.png" alt="#" id="LogoItis">
        <a class="navbar-brand" href="index.php" id="BrandTitle">Vetreria</a>
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
              <a class="nav-link" href="#">Sezione Riparazioni</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- SEZIONE PRINCIPALE -->
    <section id="main">
    <div class="row">

<!-- Stampa di tutti gli oggetti -->
      <div class="col-lg-3" id="SezioneRicerca">
        <div class="dark flex" id="DivStampaTutto">
          <h3>Mostra Vetreria</h3>
          <img src="./img/Vetreria2.png" alt="" id="LogoVetreria">
          <form method="post">
            <input type="submit" name="showall" class="btn btn-primary" value="Mostra tutti i Reagenti">
          </form>
        </div>
      </div>

<!--Ricerca di un elemento di vetreria-->
        <div class="col-sm-7" id="SezioneRicerca">
          <div class="dark flex">
            <h3>Ricerca Vetreria</h3>
            <hr id="SpaziaturaLarga">
            <form method="post">
              <div class="form-group">
                <br>
                <label for="inputNomeVetreria">Inserisci Parola Chiave</label>
                <input type="text" name="ricerca" class="form-control" id="inputNome" placeholder="Parola Chiave...">
              </div>
              <hr>
              <input type="submit" name="ricercavetreria" class="btn btn-primary" value="Cerca Vetreria">
            </form>
          </div>
        </div>


<!--Inserimento di nuovi oggetti di vetreria-->
        <div class="col-md-10" id="SezioneInserimento">
          <div class="dark">
            <h3>Inserisci Nuova Vetreria</h3>
            <hr>
            <form method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Tipo Vetreria</label>
                <input type="text" class="form-control" name="tipo" id="TipoVetreria" placeholder="Tipo Vetreria">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label>Quantita'</label>
                <input type="text" class="form-control" name="id_quantita" id="QuantiàVetreria" placeholder="Quantità Vetreria">
              </div>
              <div class="form-group col-md-6">
                <label>Collocazione</label>
                <input type="text" class="form-control" name="id_collocazione" id="CollocazioneVetreria" placeholder="Collocazione Vetreria">
              </div>
            </div>
            <input type="submit" name="inserisci" class="btn btn-primary" value="Aggiungi Vetreria">
            </form>
          </div>
        </div>
      </div>

<!-- Funzione per l'inserimento di un attrezzo di vetreria -->      
      <?php
        if(array_key_exists('inserisci', $_POST))
        {
          inserisci();
        }
        function inserisci()
        {
          $tipo = $_POST["tipo"];
          $id_quantita = $_POST["id_quantita"];
          $id_collocazione = $_POST["id_collocazione"];

          $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

          $query = "INSERT INTO vetreria_attrezzatura (tipo, id_quantita, id_collocazione)
                    VALUES ('$tipo', '$id_quantita', '$id_collocazione')";

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
      
<!-- Funzione per la stampa di tutti gli oggetti -->
        <?php
          if(array_key_exists('showall', $_POST))
          {
            showall();
          }
          function showall()
          {
            $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

            $query = "SELECT * FROM vetreria_attrezzatura";

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
                echo "<p>Quantità: $search[id_quantita]</p>";
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
          if(array_key_exists('ricercavetreria', $_POST))
          {
          ricerca();
          }
          function ricerca()
          {
              $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

              $ricerca = $_POST['ricerca'];

              $ricerca .="%";

              $ricerca = $connect -> real_escape_string($ricerca);

              $query =   "SELECT * FROM vetreria_attrezzatura WHERE
              id_attrezzo LIKE '".$ricerca."' OR
              tipo LIKE '".$ricerca."' OR
              id_quantita LIKE '".$ricerca."'  OR
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
                  echo "<p>Quantità: $search[id_quantita]</p>";
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
