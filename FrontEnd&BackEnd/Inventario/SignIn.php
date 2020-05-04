<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Accesso a Programma</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="text-center" id="bodyLogin">
    <div class="container border rounded" id="loginmaindiv">
      <br>
      <form class="form-signin" method="post" action="../../BackEnd/login.php">

        <div class="container">
          <img src="./img/IconaLogin.png" alt="">
        </div>

        <div class="container border rounded border-info" id="PillBox">
          <h1 class="h3 mb-3 font-weight-normal">Accedi all'inventario</h1>
        </div>

        <?php

          if(isset($_SESSION["Error"]))
          {
            echo "<br> <h4 style='color:red;'>";
            echo $_SESSION["Error"];
            echo "</h4>";
          }

        ?>

        <hr>

        <div class="container">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="container">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>

      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
