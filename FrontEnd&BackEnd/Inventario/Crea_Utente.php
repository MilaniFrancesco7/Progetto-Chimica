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
    <title>Creazione Utente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Barra Menù-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <img src="./img/MiniIconaNavbar.png" alt="#" id="IconaNavbar">
        <img src="./img/LogoItisBianco.png" alt="#" id="LogoItis">
        <a class="navbar-brand" href="index.php" id="BrandTitle">Creazione Utente</a>
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
<!--Showcase della scritta pagina-->
    <section id="showcase_man">
      <div class="container">
        <h1>Creazione Utente</h1>
      </div>
    </section>

<!--Pagina Principale -->

    <div class="container" id="DivCreaUtente">
      <div class="col-lg-7">
        <div class="dark">
          <h3>Registra un nuovo utente</h3>
          <hr id="SpaziaturaLarga">
          <form method="post">
            <div class="form-row">
              <div class="form-group col-lg-12">
                <label for="inputNomeReagente">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputNomeReagente">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputNomeReagente">Ripeti la Password</label>
                <input type="password" name="passwordcheck" id="passwordcheck" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Ruolo</label>
                  <select class="custom-select mr-sm-2" name="ruolo" id="inlineFormCustomSelect">
                    <option selected>Scegli...</option>
                    <option value="1">Livello Base</option>
                    <option value="2">Livello Medio</option>
                    <option value="3">Livello Elevato</option>
                  </select>
                </div>
            </div>
            <input type="submit" name="registrautente" class="btn btn-primary" value="Registra utente">
          </form>
        </div>
      </div>

    </div>

<!-- Registrare un nuovo utente -->
    <?php
        if(array_key_exists('registrautente', $_POST))
        {
            registra();
        }
        function registra()
        {
            $password = $_POST["password"];
            $passwordcheck = $_POST["passwordcheck"];

            if($password != $passwordcheck)
            {
                $message = "Utente non inserito, errore nella password";
                echo "<script>alert('$message');</script>";
            }
            else
            {
                include "db/connection.php";

                $email = $_POST["email"];

                $ruolo = $_POST["ruolo"];

                $query = "INSERT INTO utente(email, password_utente, ruolo)
                    VALUES ('$email','$passwordcheck', '$ruolo')";

                if (mysqli_query($connect, $query))
                {
                    $message = "Utente inserito con successo!";
                    echo "<script>alert('$message');</script>";
                }
                else
                {
                    $message = "Utente non inserito";
                    echo "<script>alert('$message');</script>";
                }
            }
        }
    ?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
