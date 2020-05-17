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
            <?php
              if ($_SESSION["Ruolo"] > 2)
              {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='Crea_Utente.php'>Creazione Utente</a>";
                echo "</li>";
              }
            ?>
          </ul>

          <!-- Link Per l'accesso-->

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

<!-- SEZIONE PRINCIPALE -->
<section id="main">
  <div class="row" id="MainPage">

<!-- Stampa di tutti gli oggetti -->
    <div class="col-lg-3" id="SezioneRicerca">
      <div class="dark flex" id="DivStampaTutto">
        <h3>Mostra Strumentazione</h3>
        <img src="./img/Strumentazione.png" alt="" id="LogoStrumentazione">
        <hr>
        <form method="post">
          <input type="submit" name="showall" class="btn btn-primary" value="Mostra la Strumentazione">
        </form>
      </div>
    </div>

    <!-- Elimina uno strumento -->
<?php
  if ($_SESSION['Ruolo'] > 2)
  {
    echo "<div class='col-lg-3' id='SezioneRicerca'>
            <div class='dark flex' id='DivStampaTutto'>
              <h3>Elimina uno Strumento</h3>
              <img src='./img/NoStrumentazione.png' alt='' id='LogoStrumentazione'>
              <form method='post'>
                <div class='form-row' id='EliminaElemento'>
                  <div class='form-group col-lg-8' id='FormEliminazione'>
                    <label> Inserisci Id Strumento</label>
                    <input type='text' name='id_strumento' class='form-control' id='IdStrumento' placeholder='ID Strumento'>
                  </div>
                  <div class='form-group col-lg-2' id='FormEliminazione'>
                    <br id='SpazioLarghetto'>
                    <input type='submit' name='delete' class='btn btn-primary' value='Elimina'>
                  </div>
                </div>
              </form>
            </div>
          </div>";
  }
?>

<!-- Ricerca di uno strumento -->
    <div class="col-lg-3" id="SezioneRicerca">
      <div class="dark flex">
        <h3>Ricerca Strumentazione</h3>
        <hr id="SpaziaturaLarga">
        <form method="post">
          <div class="form-group">
            <br>
            <label for="inputNomeStrumentazione">Inserisci Parola Chiave</label>
            <input type="text" name="ricerca" class="form-control" id="inputNome" placeholder="Parola Chiave...">
          </div>
          <hr>
          <input type="submit" name="ricercastrumenti" class="btn btn-primary" value="Cerca Strumentazione">
        </form>
      </div>
    </div>

<!-- Inserimento di nuovi strumenti -->
<?php
  if ($_SESSION['Ruolo'] > 2)
  {
    echo "<div class='col-md-10' id='SezioneInserimento'>
            <div class='dark'>
              <h3>Inserisci Nuova Strumentazione</h3>
              <hr>
              <form method='post'>
                <div class='form-row'>
                  <div class='form-group col-md-4'>
                    <label>Tipo Strumentazione</label>
                    <input type='text' class='form-control' name='tipo' id='TipoStrumentazione' placeholder='Tipo Strumentazione'>
                  </div>
                  <div class='form-group col-md-4'>
                    <label>Caratteristiche Tecniche</label>
                    <input type='text' class='form-control' name='caratteristiche_tecniche' id='CaratteristicheTecniche' placeholder='Caratteristiche Tecniche'>
                  </div>
                </div>
                <div class='form-row'>
                  <div class='form-group col-md-2'>
                    <label>Numero Inventario</label>
                    <input type='text' class='form-control' name='numero_inventario' id='NumeroInventario' placeholder='Numero Inventario'>
                  </div>
                  <div class='form-group col-md-2'>
                    <label>Quantita'</label>
                    <input type='text' class='form-control' name='quantita' id='QuantitaStrumentazione' placeholder='Quantità'>
                  </div>
                  <div class='form-group col-md-2'>
                    <label>Stanza Manuale</label>
                    <input type='text' name='stanzamanuale' class='form-control' id='Stanza' placeholder='Stanza'>
                  </div>
                  <div class='form-group col-md-2'>
                    <label>Armadio Manuale</label>
                    <input type='text' name='armadiomanuale' class='form-control' id='Armadio' placeholder='Armadio'>
                  </div>
                </div>
                <div class='form-row'>
                  <div class='form-group col-md-2'>
                    <label>Tipo di collocazione</label>
                    <select class='custom-select mr-sm-2' name='tipo_collocazione' id='inlineFormCustomSelect'>
                      <option selected>Scegli...</option>
                      <option value='Consumo'>Consumo</option>
                      <option value='Magazzino'>Magazzino</option>
                    </select>
                  </div>
                  <div class='form-group col-md-2'>
                    <label>Stanza</label>
                    <input type='text' name='stanza' class='form-control' id='Stanza' placeholder='Stanza'>
                  </div>
                  <div class='form-group col-md-2'>
                    <label>Armadio</label>
                    <input type='text' name='armadio' class='form-control' id='Armadio' placeholder='Armadio'>
                  </div>
                </div>
                <input type='submit' name='inserisci' class='btn btn-primary' value='Aggiungi Strumentazione'>
              </form>
            </div>
          </div>
          </div>";
  }
?>

<!-- Funzione per l'inserimento di un'apparecchiatura -->
        <?php

            if(array_key_exists('inserisci', $_POST))
            {
              inserisci();
            }
            function inserisci()
            {
              include "db/connection.php";

              $tipo_collocazione = $_POST["tipo_collocazione"]; 
              $stanza = $_POST["stanza"];
              $armadio = $_POST["armadio"];

              $query = "INSERT INTO collocazione(tipo_collocazione, armadio, stanza)
                        VALUES ('$tipo_collocazione', '$stanza', '$armadio')";

              if(mysqli_query($connect,$query))
              {
                $id_collocazione = mysqli_insert_id($connect);
              }

              $stanzamanuale = $_POST["stanzamanuale"];     
              $armadiomanuale = $_POST["armadiomanuale"];

              $query = "INSERT INTO collocazione_scheda_manuale(armadio_scheda, stanza_scheda)
                        VALUES ('$stanzamanuale', '$armadiomanuale')";

              if(mysqli_query($connect,$query))
              {
                $id_collocazione_manuale = mysqli_insert_id($connect);
              }

              $query = "INSERT INTO manuale(id_collocazione_manuale)
                        VALUES ('$id_collocazione_manuale')";

              if(mysqli_query($connect,$query))
              {
                $id_manuale = mysqli_insert_id($connect);
              }

              $quantita = $_POST["quantita"];
              $data_aggiornamento = date("Y-m-d");

              $query = "INSERT INTO quantita (quantita_totale, data_aggiornamento)
                        VALUES ('$quantita', '$data_aggiornamento')";

              if (mysqli_query($connect, $query))
              {
                $id_quantita = mysqli_insert_id($connect);
              }

              $tipo = $_POST["tipo"];
              $caratteristiche_tecniche = $_POST["caratteristiche_tecniche"];
              $numero_inventario = $_POST["numero_inventario"];

              $query = "INSERT INTO strumentazione_apparecchiatura (tipo, caratteristiche_tecniche, numero_inventario, id_quantita, id_manuale, id_collocazione)
                        VALUES ('$tipo', '$caratteristiche_tecniche', '$numero_inventario', '$id_quantita', '$id_manuale', '$id_collocazione')";

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

          $id_strumento = $_POST["id_strumento"];

          $query = "DELETE FROM strumentazione_apparecchiatura WHERE strumentazione_apparecchiatura.id_strumento = $id_strumento";

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

            $query = "SELECT strumentazione_apparecchiatura.*, quantita.*, collocazione.*, manuale.*, collocazione_scheda_manuale.*
                      FROM strumentazione_apparecchiatura
                      INNER JOIN quantita
                      ON strumentazione_apparecchiatura.id_quantita = quantita.id_quantita
                      INNER JOIN collocazione
                      ON strumentazione_apparecchiatura.id_collocazione = collocazione.id_collocazione
                      INNER JOIN manuale
                      ON strumentazione_apparecchiatura.id_manuale = manuale.id_manuale
                      INNER JOIN collocazione_scheda_manuale
                      ON manuale.id_collocazione_manuale = collocazione_scheda_manuale.id_collocazione_scheda";

            $result = mysqli_query($connect, $query);

            if($count = mysqli_num_rows($result))
            {
              echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
              echo "<ul id='services'>";

              while($search = mysqli_fetch_array($result))
              {
                echo "<li>";
                echo "<h3>$search[id_strumento] $search[tipo]</h3>";
                echo "<p>Caratteristiche tecniche: $search[caratteristiche_tecniche]</p>";
                echo "<p>Numero inventario: $search[numero_inventario]</p>";
                echo "<p>Quantità: $search[quantita_totale]  -  Data Aggiornamento: $search[data_aggiornamento] </p>";
                echo "<p>Collocazione Manuale: Stanza $search[stanza_scheda], Armadio $search[armadio_scheda]</p>";
                echo "<p>Collocazione: Stanza $search[stanza], Armadio $search[armadio]</p>";
                echo "</li>";
              }

              echo "</ul>";
              echo "</div>";

            }
            else
            {
              $message = "Non sono presenti strumenti";
              echo "<script>alert('$message');</script>";
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
            include "db/connection.php";

            $ricerca = $_POST['ricerca'];

            $ricerca .="%";

            $ricerca = $connect -> real_escape_string($ricerca);

            $query =   "SELECT strumentazione_apparecchiatura.*, quantita.*
                        FROM strumentazione_apparecchiatura
                        INNER JOIN quantita
                        ON strumentazione_apparecchiatura.id_quantita = quantita.id_quantita
                        WHERE
                        tipo LIKE '".$ricerca."' OR
                        caratteristiche_tecniche LIKE '".$ricerca."'";

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
                echo "<p>Numero inventario: $search[numero_inventario]</p>";
                echo "<p>Quantità: $search[quantita_totale]  -  Data Aggiornamento: $search[data_aggiornamento] </p>";
                echo "<p>Manuale: $search[id_manuale]</p>";
                echo "<p>Collocazione: $search[id_collocazione]</p>";
                echo "</li>";
              }

              echo "</ul>";
              echo "</div>";
            }
            else
            {
              $message = "Strumento non trovato";
              echo "<script>alert('$message');</script>";
            }
          }
        ?>
      </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
