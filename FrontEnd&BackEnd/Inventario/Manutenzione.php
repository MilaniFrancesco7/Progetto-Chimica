<?php

  session_start();

  if(!isset($_SESSION["User"]))
  {
    header("location: SignIn.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manutenzione</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <!-- Barra Navigazione-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <img src="./img/MiniIconaNavbar.png" alt="#" id="IconaNavbar">
        <img src="./img/LogoItisBianco.png" alt="#" id="LogoItis">
        <a class="navbar-brand" href="#" id="BrandTitle">Programma Inventario</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" id="NavbarList">

            <!--Item dropdown - Menù a tendina-->
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

          <hr>

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


    <!-- Main Body-->

    <section id="showcase_man">
      <div class="container">
        <h1>Sezione Manutenzione</h1>
      </div>
    </section>
      <div class="row">

<!-- Stampa di tutti gli oggetti -->
          <div class="col-lg-3" id="SezioneRicerca">
            <div class="dark flex" id="DivStampaTutto">
              <h3>Mostra Storico Generale Manutenzione</h3>
              <img src="./img/Reagenti.png" alt="" id="LogoReagenti">
              <form method="post">
                <input type="submit" name="showall" class="btn btn-primary" value="Mostra Storico">
              </form>
            </div>
          </div>

<!-- Ricerca di un oggetto -->
          <div class="col-lg-4" id="SezioneRicerca">
            <div class="dark flex">
              <h3>Ricerca Storico Strumento</h3>
              <hr id="SpaziaturaLarga">
              <form method="post">
                <div class="form-group">
                  <label for="inputStrumento">Inserisci ID Strumento</label>
                  <input type="text" name="id_strumento" class="form-control" id="IDStrumento" placeholder="ID Strumento">
                </div>
                <hr>
                <input type="submit" name="ricercamanutenzione" class="btn btn-primary" value="Cerca Storico">
              </form>
            </div>
          </div>
      </div>

<!-- Registrazione di una manutenzione -->
          <div class="col-lg-7" id="SezioneInserimento">
          <div class="dark">
            <h3>Registra la manutenzione di uno strumento</h3>
              <hr>
              <form method="post">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>ID Strumento</label>
                    <input type="text" name="id_strumento" class="form-control" id="IDStrumento" placeholder="ID Strumento">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Data Manutenzione</label>
                    <input type="date" name="data_manutenzione" class="form-control" id="DataManutenzione" placeholder="Data Manutenzione">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Tipo di manutenzione</label>
                    <select class="custom-select mr-sm-2" name="tipo_manutenzione" id="inlineFormCustomSelect">
                      <option selected>Scegli...</option>
                      <option value="Ordinaria">Ordinaria</option>
                      <option value="Straordinaria">Straordinaria</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Cognome Tecnico</label>
                    <input type="text" name="cognome_tecnico" class="form-control" id="cognometecnico" placeholder="Cognome Tecnico">
                  </div>
                </div>
                <input type="submit" class="btn btn-primary" name="manutenziona" value="Registra la manutenzione">
              </form>
            </div>
          </aside>

<!-- Funzione per la registrazione di una manutenzione -->
          <?php
            if(array_key_exists('manutenziona', $_POST))
            {
              manutenziona();
            }
            function manutenziona()
            {
              $id_strumento = $_POST["id_strumento"];
              $data_manutenzione = $_POST["data_manutenzione"];
              $tipo_manutenzione = $_POST["tipo_manutenzione"];
              $cognome_tecnico = $_POST["cognome_tecnico"];

              $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

              $query = "INSERT INTO manutenzione(id_strumento, data_manutenzione, tipo_manutenzione, cognome_tecnico)
                        VALUES ('$id_strumento', '$data_manutenzione', '$tipo_manutenzione', '$cognome_tecnico')";
              
              if (mysqli_query($connect, $query))
              {
                $message = "Manutenzione registrata con successo!";
                echo "<script>alert('$message');</script>";
              }
              else
              {
                $message = "Manutenzione non registrata";
                echo "<script>alert('$message');</script>";
              }
                }
          ?>

          <?php
            if(array_key_exists('ricercamanutenzione', $_POST))
            {
              ricerca();
            }
            function ricerca()
            { 
              $id_strumento = $_POST["id_strumento"];

              $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

              $query = "SELECT id_manutenzione, data_manutenzione, tipo_manutenzione, cognome_tecnico, tipo 
                        FROM manutenzione, strumentazione_apparecchiatura 
                        WHERE manutenzione.id_strumento=$id_strumento
                        AND strumentazione_apparecchiatura.id_strumento=$id_strumento";
              
              $result = mysqli_query($connect, $query);

              $count = mysqli_num_rows($result);

              if($count != 0)
              {
                echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
                echo "<ul id='services'>";
    
                while($search = mysqli_fetch_array($result))
                {
                  echo "<li>";
                  echo "<h3>$search[id_manutenzione] $search[tipo]</h3>";
                  echo "<p>Data Manutenzione: $search[data_manutenzione]</p>";
                  echo "<p>Tipo Manutenzione: $search[tipo_manutenzione]</p>";
                  echo "<p>Cognome Tecnico: $search[cognome_tecnico]</p>";
                  echo "</li>";
                }
    
                echo "</ul>";
                echo "</div>";
              }
              else
              {
                $message ="Non esistono manutenzioni registrate per questo oggetto";
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

              $query = "SELECT id_manutenzione, data_manutenzione, tipo_manutenzione, cognome_tecnico, tipo 
                        FROM manutenzione, strumentazione_apparecchiatura 
                        WHERE manutenzione.id_strumento=strumentazione_apparecchiatura.id_strumento";
              
              $result = mysqli_query($connect, $query);

              $count = mysqli_num_rows($result);

              if($count != 0)
              {
                echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
                echo "<ul id='services'>";
    
                while($search = mysqli_fetch_array($result))
                {
                  echo "<li>";
                  echo "<h3>$search[id_manutenzione] $search[tipo]</h3>";
                  echo "<p>Data Manutenzione: $search[data_manutenzione]</p>";
                  echo "<p>Tipo Manutenzione: $search[tipo_manutenzione]</p>";
                  echo "<p>Cognome Tecnico: $search[cognome_tecnico]</p>";
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
