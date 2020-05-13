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
    <title>Riparazione</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <!-- Barra Navigazione-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <img src="./img/MiniIconaNavbar.png" alt="#" id="IconaNavbar">
        <img src="./img/LogoItisBianco.png" alt="#" id="LogoItis">
        <a class="navbar-brand" href="index.php" id="BrandTitle">Riparazione</a>
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
        <h1>Sezione Riparazione</h1>
      </div>
    </section>
    <div class="row">
    
    <!-- Stampa di tutti gli oggetti -->
    <div class="col-lg-3" id="SezioneRicerca">
      <div class="dark flex" id="DivStampaTutto">
        <h3>Mostra Storico Generale Riparazioni</h3>
        <img src="./img/Reagenti.png" alt="" id="LogoReagenti">
        <form method="post">
          <input type="submit" name="showall" class="btn btn-primary" value="Mostra Storico">
        </form>
      </div>
    </div>

    <!-- Elimina un oggetto -->
    <div class="col-lg-3" id="SezioneRicerca">
      <div class="dark flex" id="DivStampaTutto">
        <h3>Elimina una riparazione</h3>
        <img src="./img/NoReagenti.png" alt="" id="LogoReagenti">
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" name="id_riparazione" class="form-control" id="IDRiparazione" placeholder="ID Riparazione">
            </div>
              <div class="form-group col-md-6">
                <input type="submit" name="delete" class="btn btn-primary" value="Elimina">
            </div>
          </div>
        </form>
      </div>
    </div>

    <!--Ricerca di un oggetto-->
    <div class="col-lg-4" id="SezioneRicerca">
      <div class="dark flex">
        <h3>Ricerca Storico Strumento</h3>
        <hr id="SpaziaturaLarga">
        <form method="post">
          <div class="form-group">
            <br>
            <label for="inputNomeStrumentazione">Inserisci Parola Chiave</label>
            <input type="text" name="id_strumento" class="form-control" id="IDStrumento" placeholder="ID Strumento">
          </div>
          <hr>
          <input type="submit" name="ricercariparazione" class="btn btn-primary" value="Cerca Storico">
        </form>
      </div>
    </div>

<!--Uscita in riparazione-->
    <div class="col-md-10" id="SezioneInserimento">
      <div class="dark">
        <h3>Registra un'uscita per riparazione</h3>
        <hr>
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label>ID Strumento</label>
              <input type="text" class="form-control" name="id_strumento" id="IDStrumento" placeholder="ID Strumento">
            </div>
            <div class="form-group col-md-4">
              <label>Motivo</label>
              <input type="text" class="form-control" name="motivo" id="Motivo" placeholder="Motivo">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label>Data Uscita</label>
              <input type="date" class="form-control" name="data_uscita" id="DataUscita" placeholder="Data Uscita">
            </div>
            <div class="form-group col-md-4">
              <label>Ditta Riparatrice</label>
              <input type="text" class="form-control" name="ditta_riparatrice" id="DittaRiparatrice" placeholder="Ditta Riparatrice">
            </div>
          </div>
          <input type="submit" name="uscita" class="btn btn-primary" value="Registra l'uscita">
        </form>
      </div>
    </div>

<!-- Rientro dalla riparazione -->
    <div class="col-md-10" id="SezioneInserimento">
      <div class="dark">
        <h3>Registra un rientro da riparazione</h3>
        <hr>
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label>ID Strumento</label>
              <input type="text" class="form-control" name="id_strumento" id="IDStrumento" placeholder="ID Strumento">
            </div>
            <div class="form-group col-md-2">
              <label>Data Uscita</label>
              <input type="date" class="form-control" name="data_rientro" id="DataRientro" placeholder="Data Rientro">
            </div>
          </div>
          <input type="submit" name="rientro" class="btn btn-primary" value="Registra l'uscita">
        </form>
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

        $query = "SELECT id_riparazione, motivo, data_uscita, data_rientro, ditta_riparatrice, tipo 
                  FROM riparazione, strumentazione_apparecchiatura 
                  WHERE riparazione.id_strumento=strumentazione_apparecchiatura.id_strumento";
        
        $result = mysqli_query($connect, $query);

        $count = mysqli_num_rows($result);

        if($count != 0)
        {
          echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
          echo "<ul id='services'>";

          while($search = mysqli_fetch_array($result))
          {
            $controllo = $search["data_rientro"];

            if($controllo == NULL)
            {
              echo "<li>";
              echo "<h3>$search[id_riparazione] $search[tipo]</h3>";
              echo "<p>Motivo: $search[motivo]</p>";
              echo "<p>Data Uscita: $search[data_uscita]</p>";
              echo "<p>Ditta Riparatrice: $search[ditta_riparatrice]</p>";
              echo "<p style='color:red;'> Ancora in riparazione</p>";
              echo "</li>";
            }
            else
            {
              echo "<li>";
              echo "<h3>$search[id_riparazione] $search[tipo]</h3>";
              echo "<p>Motivo: $search[motivo]</p>";
              echo "<p>Data Uscita: $search[data_uscita]</p>";
              echo "<p>Data Rientro: $search[data_rientro]</p>";
              echo "<p>Ditta Riparatrice: $search[ditta_riparatrice]</p>";
              echo "</li>";
            }
          }

          echo "</ul>";
          echo "</div>";

        }
        mysqli_free_result($result);
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
        $id_riparazione = $_POST["id_riparazione"];

        $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

        $query = "DELETE FROM riparazione WHERE riparazione.id_riparazione = $id_riparazione";

        if(mysqli_query($connect, $query))
        {
          $message = "Riparazione eliminata con successo!";
          echo "<script>alert('$message');</script>";
        }
        else
        {
          $message = "Riparazione non eliminata";
          echo "<script>alert('$message');</script>";
        }
        mysqli_close($connect); 
      }
    ?>   
<!-- Ricerca una manutenzione -->
    <?php
      if(array_key_exists('ricercariparazione', $_POST))
      {
        ricerca();
      }
      function ricerca()
      { 
        $id_strumento = $_POST["id_strumento"];

        $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

        $query = "SELECT id_riparazione, data_uscita, data_rientro, tipo, ditta_riparatrice, motivo 
                  FROM riparazione, strumentazione_apparecchiatura 
                  WHERE riparazione.id_strumento=$id_strumento
                  AND strumentazione_apparecchiatura.id_strumento=$id_strumento";
        
        $result = mysqli_query($connect, $query);

        $count = mysqli_num_rows($result);

        if($count != 0)
        {
          echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
          echo "<ul id='services'>";

          while($search = mysqli_fetch_array($result))
          {
            $controllo = $search["data_rientro"];

            if($controllo == NULL)
            {
              echo "<li>";
              echo "<h3>$search[id_riparazione] $search[tipo]</h3>";
              echo "<p>Motivo: $search[motivo]</p>";
              echo "<p>Data Uscita: $search[data_uscita]</p>";
              echo "<p>Ditta Riparatrice: $search[ditta_riparatrice]</p>";
              echo "<p style='color:red;'> Ancora in riparazione</p>";
              echo "</li>";
            }
            else
            {
              echo "<li>";
              echo "<h3>$search[id_riparazione] $search[tipo]</h3>";
              echo "<p>Motivo: $search[motivo]</p>";
              echo "<p>Data Uscita: $search[data_uscita]</p>";
              echo "<p>Data Rientro: $search[data_rientro]</p>";
              echo "<p>Ditta Riparatrice: $search[ditta_riparatrice]</p>";
              echo "</li>";
            }
          }

          echo "</ul>";
          echo "</div>";
        }
        mysqli_close($connect);
      }
    ?>

<!--- Registrazione uscita in riparazione -->
    <?php
      if(array_key_exists('uscita', $_POST))
      {
        ripara();
      }
      function ripara()
      {
        $id_strumento = $_POST["id_strumento"];
        $motivo = $_POST["motivo"];
        $data_uscita = $_POST["data_uscita"];
        $ditta_riparatrice = $_POST["ditta_riparatrice"];

        $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

        $query = "INSERT INTO riparazione(id_strumento, motivo, data_uscita, ditta_riparatrice)
                  VALUES ('$id_strumento','$motivo','$data_uscita','$ditta_riparatrice')";

        if(mysqli_query($connect, $query))
        {
          $message = "Uscita in riparazione registrata con successo!";
          echo "<script>alert('$message');</script>";
        }
        else
        {
          $message = "Uscita in riparazione non registrata";
          echo "<script>alert('$message');</script>";
        }
      }
    ?>   

<!--- Registrazione rientro da riparazione -->
    <?php
      if(array_key_exists('rientro', $_POST))
      {
        rientra();
      }
      function rientra()
      {
        $id_strumento = $_POST["id_strumento"];
        $data_rientro = $_POST["data_rientro"];

        $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

        $query = "UPDATE riparazione
                  SET data_rientro = '$data_rientro'
                  WHERE riparazione.id_strumento = $id_strumento";

        if(mysqli_query($connect, $query))
        {
          $message = "Rientro da riparazione registrato con successo!";
          echo "<script>alert('$message');</script>";
        }
        else
        {
          $message = "Rientro da riparazione non registrato";
          echo "<script>alert('$message');</script>";
        }
      }
    ?>   

  </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
