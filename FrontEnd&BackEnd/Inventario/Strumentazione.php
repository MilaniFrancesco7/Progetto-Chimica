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

    <!--SEZIONE PER LA RICERCA DI UN REAGENTE-->
        <section id="main">
          <div class="row">
            <div class="col-sm-10" id="SezioneRicerca">
              <div class="dark flex">
                <h3>Ricerca Strumentazione</h3>
                <hr>
                <form>
                  <div class="form-group">
                    <label for="inputNomeStrumentazione">Inserisci Parola Chiave</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Parola Chiave...">
                  </div>

                  <hr>
                  <button type="submit" class="btn btn-primary">Cerca Strumentazione</button>
                </form>
              </div>
            </div>
    <!--SEZIONE RELATIVA ALL'INSERIMENTO DI NUOVI REAGENTI-->
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


          <!--/*Lista dei reagenti*/-->
            <div class="col-sm-6" id="AttrezzaturaMain">
                <ul id="services">
                  <li>
                    <h3>Strumentazione:</h3>
                    <p>Tipo:</p>
                    <p>N° Inventario:</p>
                    <p>Quantità:</p>
                    <p>Manuale:</p>
                    <p>Collocazione:</p>
                  </li>
                  <li>
                    <h3>Strumentazione:</h3>
                    <p>Tipo:</p>
                    <p>N° Inventario:</p>
                    <p>Quantità:</p>
                    <p>Manuale:</p>
                    <p>Collocazione:</p>
                  </li>
                  <li>
                    <h3>Strumentazione:</h3>
                    <p>Tipo:</p>
                    <p>N° Inventario:</p>
                    <p>Quantità:</p>
                    <p>Manuale:</p>
                    <p>Collocazione:</p>
                  </li>
                  <li>
                    <h3>Strumentazione:</h3>
                    <p>Tipo:</p>
                    <p>N° Inventario:</p>
                    <p>Quantità:</p>
                    <p>Manuale:</p>
                    <p>Collocazione:</p>
                  </li>
                </ul>
            </div>
        </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
