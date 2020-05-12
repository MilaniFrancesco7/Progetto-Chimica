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
    <title>Pagina Di Prova</title>
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

    <!-- <hr id="divisorio"> -->
    <!-- Sezione con le relative parti del programma-->
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
                  <p>Tecnici esterni: </p>
                </td>
                </tr>
                </table>
                </li><li>
                  <h3>Attrezzo</h3>
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
                  <br><br>
                  <p>Data di uscita:	Data di rientro:	Tecnici esterni: </p>
                </li><li>
                  <h3>Attrezzo</h3>
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
                  <br><br>
                  <p>Data di uscita:	Data di rientro:	Tecnici esterni: </p>
                </li>
              </ul>
          </div>

          <aside class="sidebar">
            <div class="dark">
              <h3>Manda un oggetto in manutenzione</h3>
              <form>
                <div>
                  <label>Oggetto</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Formula</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Quantita'</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Stato Reagente</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Ditta Produttrice</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Pittogramma</label>
                  <input type="file" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Frase Sicurezza</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Data Scadenza</label>
                  <input type="date" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Scheda Sicurezza</label>
                  <input type="file" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <div>
                  <label>Collocazione</label>
                  <input type="text" id="NomeReagente" placeholder="NomeReagente">
                </div>
                <button type="submit" name="InviaForm">Aggiungi Elemento</button>
              </form>
            </div>
          </aside>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
