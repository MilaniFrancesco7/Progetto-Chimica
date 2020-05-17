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
    <title>Index</title>
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

            <!-- Link Creazione Utente-->
            <?php
              if ($_SESSION["Ruolo"] > 1)
              {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='Crea_Utente.php'>Creazione Utente</a>";
                echo "</li>";
              }
            ?>
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

    <section id="showcase">
      <div class="container">
        <h1>Gestione Dell'Inventario</h1>
        <p>Benvenuto nel Programma Inventario, qui potrai gestire e tenere d'occhio ogni tipo di risporsa disponibile nei nostri laboratori di chimica e biologia, inoltre potrai tenere d'occhio le manutenzione e riparazioni di tutti questi oggetti</P>
      </div>
    </section>

    <hr id="divisorio">
    <!-- Sezione con le relative parti del programma-->
    <section id="boxes">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <img src="./img/Reagenti.png" alt="Reagenti" id="ImgReagenti">
            <a href="Reagenti.php"><h3>REAGENTI</h3></a>
            <p>Sezione in cui si potranno vedere tutti i reagenti presenti nei vari laboratori con annessa qualità</p>
          </div>
          <hr>
          <div class="col-md-4 ">
            <img src="./img/Vetreria.png" alt="Vetreria" id ="ImgVetreria">
            <a href="Vetreria.php"><h3>VETRERIA</h3></a>
            <p>Sezione in cui potrà essere consultato l'inventario della vetreria</p>
          </div>
          <hr>
          <div class="col-md-4  ">
            <img src="./img/Strumentazione.png" alt="Strumentazione" id="ImgStrumentazione">
            <a href="Strumentazione.php"><h3>STRUMENTAZIONE</h3></a>
            <p>Sezione in cui potrà essere consultato l'inventario della strumentazione</p>
          </div>
          <hr>
        </div>
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
