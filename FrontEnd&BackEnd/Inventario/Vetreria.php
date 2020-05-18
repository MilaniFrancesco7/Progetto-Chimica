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
        <a class="navbar-brand" href="" id="BrandTitle">Vetreria</a>
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
          <h3>Mostra Vetreria</h3>
          <img src="./img/Vetreria2.png" alt="" id="LogoVetreria">
          <form method="post">
            <input type="submit" name="showall" class="btn btn-primary" value="Mostra tutti gli attrezzi">
          </form>
        </div>
      </div>
<!-- ELIMINA ELEMENTO VETRERIA -->

    <?php
      if ($_SESSION['Ruolo'] > 2)
      {
        echo "<div class='col-lg-3' id='SezioneRicerca'>
                <div class='dark flex' id='DivStampaTutto'>
                  <h3>Elimina un Attrezzo</h3>
                  <img src='./img/NoVetreria.png' alt='' id='LogoVetreria'>
                  <form method='post'>
                    <div class='form-row' id='EliminaElemento'>
                      <div class='form-group col-lg-8' id='FormEliminazione'>
                        <label>Inserisci ID Attrezzo</label>
                        <input type='text' name='id_attrezzo' class='form-control' id='IdAttrezzo' placeholder='ID Attrezzo'>
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
<!--Ricerca di un elemento di vetreria-->

        <div class="col-lg-4" id="SezioneRicerca">
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

<?php
      if ($_SESSION['Ruolo'] > 2)
      {
        echo "<div class='col-md-10' id='SezioneInserimento'>
                  <div class='dark'>
                    <h3>Inserisci Nuova Vetreria</h3>
                    <hr>
                    <form method='post'>
                    <div class='form-row'>
                      <div class='form-group col-md-6'>
                        <label>Tipo Vetreria</label>
                        <input type='text' class='form-control' name='tipo' id='TipoVetreria' placeholder='Tipo Vetreria'>
                      </div>
                    </div>
                    <div class='form-row'>
                      <div class='form-group col-md-2'>
                        <label>Quantita'</label>
                        <input type='text' class='form-control' name='quantita' id='QuantiàVetreria' placeholder='Quantità'>
                      </div>
                    </div>
                    <div class='form-row'>
                    <div class='form-group col-md-2'>
                      <label>Tipo di collocazione</label>
                      <select class='custom-select mr-sm-2' name='tipo_collocazione' id='inlineFormCustomSelect'>
                        <option selected>Scegli...</option>
                        <option value='Solido'>Consumo</option>
                        <option value='Liquido'>Magazzino</option>
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
                      <div class='form-group col-md-2'>
                        <label>Ripiano</label>
                        <input type='text' name='ripiano' class='form-control' id='Ripiano' placeholder='Ripiano'>
                      </div>
                    </div>
                    <input type='submit' name='inserisci' class='btn btn-primary' value='Aggiungi Vetreria'>
                    </form>
                  </div>
                </div>";

      }
    ?>
<!-- SEZIONE RELATIVA ALL'AGGIORNAMENTO DI UNA QUANTITA' -->
    <?php
        if ($_SESSION['Ruolo'] > 1)
        {
          echo "<div class='col-md-6' id='SezioneInserimento'>
                  <div class='dark flex'>
                    <h3>Aggiorna una quantità</h3>
                    <hr id='SpaziaturaLarga'>
                    <form method='post'>
                      <div class='form-row'>
                        <div class='form-group col-md-5'>
                          <label for='inputNomeReagente'>ID Attrezzo</label>
                          <input type='text' name='id_attrezzo' class='form-control' id='id_attrezzo' placeholder='ID Attrezzo'>
                        </div>
                        <div class='form-group col-md-3'>
                          <label for='inputNomeReagente'>Quantità</label>
                          <input type='text' name='quantita_totale' class='form-control' id='quantita_totale' placeholder='Quantita'>
                        </div>
                      </div>
                      <input type='submit' name='updatequantita' class='btn btn-primary' value='Aggiorna Quantità'>
                    </form>
                  </div>
                </div>";
        }
      ?>
    </div>



<!-- Funzione per l'inserimento di un attrezzo di vetreria -->

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
          $ripiano = $_POST["ripiano"];

          $query = "INSERT INTO collocazione(tipo_collocazione, armadio, stanza, ripiano)
                    VALUES ('$tipo_collocazione', '$stanza', '$armadio', '$ripiano')";

          if(mysqli_query($connect,$query))
          {
            $id_collocazione = mysqli_insert_id($connect);
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
<!-- Funzione per l'eliminazione di un oggetto -->

      <?php
        if(array_key_exists('delete', $_POST))
        {
          delete();
        }
        function delete()
        {
          include "db/connection.php";

          $id_attrezzo = $_POST["id_attrezzo"];

          $query = "DELETE FROM vetreria_attrezzatura WHERE vetreria_attrezzatura.id_attrezzo = $id_attrezzo";

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

            $query = "SELECT vetreria_attrezzatura.*, quantita.*
                      FROM vetreria_attrezzatura
                      INNER JOIN quantita
                      ON vetreria_attrezzatura.id_quantita = quantita.id_quantita";

            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            if($count != 0)
            {
              echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
              echo "<ul id='services'>";

              while($search = mysqli_fetch_array($result))
              {
                echo "<li>";
                echo "<h3>$search[id_attrezzo] $search[tipo]</h3>";
                echo "<p>Quantità: $search[quantita_totale]  -  Data Aggiornamento: $search[data_aggiornamento]</p>";
                echo "<p>Collocazione: $search[id_collocazione]</p>";
                echo "</li>";
              }

              echo "</ul>";
              echo "</div>";

            }
            else
            {
              $message = "Non sono presenti elementi";
              echo "<script>alert('$message');</script>";
            }
          }
        ?>

<!-- Funzione per aggiornare la quantità -->
        <?php
            if(array_key_exists('updatequantita', $_POST))
            {
              update();
            }
            function update()
            {
              include "db/connection.php";

              $id_attrezzo = $_POST["id_attrezzo"];
              $quantita_totale = $_POST["quantita_totale"];
              $data_aggiornamento = date("Y-m-d");

              $query = "SELECT * FROM vetreria_attrezzatura WHERE id_attrezzo = $id_attrezzo";

              $result = mysqli_query($connect, $query);

              if(mysqli_num_rows($result) > 0)
              {

                $query = "SELECT id_quantita FROM vetreria_attrezzatura WHERE id_attrezzo = $id_attrezzo";

                $result = mysqli_query($connect, $query);

                while($search = mysqli_fetch_array($result))
                {
                  $id_quantita = $search["id_quantita"];
                }

                $query = "UPDATE quantita SET quantita_totale = '$quantita_totale', data_aggiornamento = '$data_aggiornamento' WHERE quantita.id_quantita = '$id_quantita'";

                if(mysqli_query($connect, $query))
                {
                  $message = "Quantità aggiornata correttamente";
                  echo "<script>alert('$message');</script>";
                }
              }
              else
              {
                $message = "Quantità non aggiornata";
                echo "<script>alert('$message');</script>";
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
            include "db/connection.php";

            $ricerca = $_POST['ricerca'];

            $ricerca .="%";

            $ricerca = $connect -> real_escape_string($ricerca);

            $query =   "SELECT vetreria_attrezzatura.*, quantita.*
                        FROM vetreria_attrezzatura
                        INNER JOIN quantita
                        ON vetreria_attrezzatura.id_quantita = quantita.id_quantita
                        WHERE
                        tipo LIKE '".$ricerca."'";

            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result))
            {
                echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
                echo "<ul id='services'>";

                while($search = mysqli_fetch_array($result))
                {
                echo "<li>";
                echo "<h3>$search[tipo]</h3>";
                echo "<p>Quantità: $search[quantita_totale]  -  Data Aggiornamento: $search[data_aggiornamento]</p>";
                echo "<p>Collocazione: $search[id_collocazione]</p>";
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
