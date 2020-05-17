<!-- Funzione per il login -->
<?php
	session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

    $query = "SELECT * FROM utente WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($connect, $query);
	
	$count = mysqli_num_rows($result);

    if($count == 0)
	{
		$_SESSION["Error"] = "Email o Password errate !";
		header("location: ../FrontEnd&BackEnd/Inventario/SignIn.php");
	}
	else
	{
		$_SESSION["User"] = "$email";
		header("location: ../FrontEnd&BackEnd/Inventario/index.php");
	}

?>


<!-- Funzione per l'inserimento di un reagente -->
<?php
  if(array_key_exists('inserisci', $_POST))
  {
    inserisci_reagente();
  }
  function inserisci_reagente()
  {
    $tipo_collocazione = $_POST["tipo_collocazione"];
    $stanza = $_POST["stanza"];
    $armadio = $_POST["armadio"];

    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

    $query = "INSERT INTO collocazione(tipo_collocazione, armadio, stanza)
              VALUES ('$tipo_collocazione', '$stanza', '$armadio')";
    
    if(mysqli_query($connect,$query))
    {
      $id_collocazione = mysqli_insert_id($connect);
    }

    mysqli_close($connect);

    $nome = $_POST["nome"];
    $formula = $_POST["formula"];
    $stato = $_POST["stato"];
    $ditta = $_POST["ditta"];
    $pittogramma = "1";
    $frase = $_POST["frase"];
    $id_scheda_sicurezza = "3";
    $id_quantita = $_POST["id_quantita"];
    $data_scadenza = $_POST["data_scadenza"];

    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

    $query = "INSERT INTO reagente (nome, formula, stato, ditta, pittogramma, frase, id_scheda_sicurezza, id_quantita, data_scadenza, id_collocazione)
              VALUES ('$nome', '$formula', '$stato', '$ditta', '$pittogramma', '$frase', '$id_scheda_sicurezza', '$id_quantita', '$data_scadenza', '$id_collocazione')";

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

    mysqli_close($connect);
  }
?>

<!-- Funzione per l'inserimento di un'apparecchiatura -->
<?php
  if(array_key_exists('inserisci', $_POST))
  {
    inserisci_apparecchiatura();
  }
  function inserisci_apparecchiatura()
  {
    $tipo = $_POST["tipo"];
    $caratteristiche_tecniche = $_POST["caratteristiche_tecniche"];
    $numero_inventario = $_POST["numero_inventario"];
    $id_quantita = $_POST["id_quantita"];
    $id_manuale = "1";
    $id_collocazione = $_POST["id_collocazione"];

    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

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

<!-- Funzione per l'inserimento di un attrezzo di vetreria -->      
<?php
  if(array_key_exists('inserisci', $_POST))
  {
    inserisci_vetreria();
  }
  function inserisci_vetreria()
  {
    $tipo = $_POST["tipo"];
    $id_quantita = $_POST["id_quantita"];
    $id_collocazione = $_POST["id_collocazione"];

    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

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
 mysqli_close($connect);
?>

<!-- Funzione per la ricerca di reagenti -->

<?php
  if(array_key_exists('ricercareagente', $_POST))
  {
    ricerca_reagente();
  }
  function ricerca_reagente()
  {
    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

    $ricerca = $_POST['ricerca'];

    $ricerca .="%";

    $ricerca = $connect -> real_escape_string($ricerca);

    $query =  "SELECT * FROM reagente WHERE 
                nome LIKE '".$ricerca."' OR 
                formula LIKE '".$ricerca."' OR
                stato LIKE '".$ricerca."'  OR
                ditta LIKE '".$ricerca."'  OR
                frase LIKE '".$ricerca."' ";

    $result = mysqli_query($connect, $query);

    $count = mysqli_num_rows($result);

    if($count != 0)
    {
      echo "<div class='col-sm-6' id='AttrezzaturaMain'>";
      echo "<ul id='services'>";

      while($search = mysqli_fetch_array($result))
      {
        echo "<li>";
        echo "<h3>$search[nome]</h3>";
        echo "<p>Formula: $search[formula]</p>";
        echo "<p>Quantità: $search[id_quantita]</p>";
        echo "<p>Stato: $search[stato]</p>";
        echo "<p>Ditta: $search[ditta]</p>";
        echo "<p>Frase: $search[frase]</p>";
        echo "<p>Data Scadenza: $search[data_scadenza]</p>";
        echo "<p>Collocazione: $search[id_collocazione]</p>";
        echo "</li>";
      }
      
      echo "</ul>";
      echo "</div>";
    }

    mysqli_free_result($result);
    mysqli_close($connect);
  }
?>

<!-- Funzione per la ricerca di strumentazione -->

<?php
  if(array_key_exists('ricercastrumenti', $_POST))
  {
    ricerca_strumentazione();
  }
  function ricerca_strumentazione()
  {
    $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

    $ricerca = $_POST['ricerca'];

    $ricerca .="%";

    $ricerca = $connect -> real_escape_string($ricerca);

    $query =   "SELECT * FROM strumentazione_apparecchiatura WHERE 
    id_strumento LIKE '".$ricerca."' OR 
    tipo LIKE '".$ricerca."' OR
    caratteristiche_tecniche LIKE '".$ricerca."'  OR
    id_quantita LIKE '".$ricerca."'  OR
    id_manuale LIKE '".$ricerca."'  OR
    id_collocazione LIKE '".$ricerca."' ";

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
        echo "<p>Quantità: $search[id_quantita]</p>";
        echo "<p>Manuale: $search[id_manuale]</p>";
        echo "<p>Collocazione: $search[id_collocazione]</p>";
        echo "</li>";
      }
      
      echo "</ul>";
      echo "</div>";
    }
      
    mysqli_free_result($result);
    mysqli_close($connect);

  }
?>

<!-- Funzione per la ricerca di vetreria -->

<?php
  if(array_key_exists('ricercavetreria', $_POST))
  {
  ricerca();
  }
  function ricerca()
  {
      $connect = mysqli_connect("localhost", "root", "", "Progetto_Chimica");

      $ricerca = $_POST['ricerca'];

      $ricerca .="%";

      $ricerca = $connect -> real_escape_string($ricerca);

      $query =   "SELECT * FROM vetreria_attrezzatura WHERE 
      id_attrezzo LIKE '".$ricerca."' OR 
      tipo LIKE '".$ricerca."' OR
      id_quantita LIKE '".$ricerca."'  OR
      id_collocazione LIKE '".$ricerca."' ";

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
          echo "<p>Quantità: $search[id_quantita]</p>";
          echo "<p>Collocazione: $search[id_collocazione]</p>";
          echo "</li>";
          }
          
          echo "</ul>";
          echo "</div>";
      }

      mysqli_free_result($result);
  mysqli_close($connect);
  }
?>