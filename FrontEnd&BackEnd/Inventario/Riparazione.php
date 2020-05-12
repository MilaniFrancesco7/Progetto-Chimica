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

    <!-- <hr id="divisorio"> -->
    <!-- Sezione con le relative parti del programma-->
    
    <!--SEZIONE PER LA RICERCA DI UN OGGETTO IN RIPARAZIONE-->
    <div class="col-lg-7" id="SezioneRicerca">
      <div class="dark flex">
        <h3>Ricerca Oggetto in Riparazione</h3>
        <hr id="SpaziaturaLarga">
        <form method="post">
          <div class="form-group">
            <br>
            <label for="inputNomeStrumentazione">Inserisci Parola Chiave</label>
            <input type="text" name="ricerca" class="form-control" id="inputNome" placeholder="Parola Chiave...">
          </div>
          <hr>
          <input type="submit" name="ricercastrumenti" class="btn btn-primary" value="Cerca Oggetto">
        </form>
      </div>
    </div>

<!--SEZIONE RELATIVA ALLA MESSA IN RIPARAZIONE DI UN OGGETTO-->
    <div class="col-md-10" id="SezioneInserimento">
      <div class="dark">
        <h3>Manda Oggetto in Riparazione</h3>
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
          <button type="submit" class="btn btn-primary">Manda</button>
        </form>
      </div>
    </div>
    
    <section id="boxes">
        <div class="row">
          <div class="col-sm-6" id="AttrezzaturaMain">
              <ul id="services_man">
                <li>
				<table>
				<h3>Attrezzo</h3>
				<tr><td>
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
                </td>
                <td valign="top">
                  <p>Data di uscita: </p>
                  <p>Data di rientro: </p>
                  <p>Motivo riparazione: </p>
                </td>
                </tr>
                </table>
                </li>
                
                <li>
				<table>
				<h3>Attrezzo</h3>
				<tr><td>
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
                </td>
                <td valign="top">
                  <p>Data di uscita: </p>
                  <p>Data di rientro: </p>
                  <p>Motivo riparazione: </p>
                </td>
                </tr>
                </table>
                </li>
                
                <li>
				<table>
				<h3>Attrezzo</h3>
				<tr><td>
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
                </td>
                <td valign="top">
                  <p>Data di uscita: </p>
                  <p>Data di rientro: </p>
                  <p>Motivo riparazione: </p>
                </td>
                </tr>
                </table>
                </li>
              </ul>
          </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
