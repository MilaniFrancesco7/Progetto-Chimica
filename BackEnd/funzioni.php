<?php

    // LOGIN FUNCTION
    $username = $_POST["username"];
    $password = $_POST["password"];

    $connect = mysqli_connect("localhost", "root", "XXXX", "Scuola");

    $query = "SELECT * FROM utente WHERE email = '$username' AND password = '$password'";

    $result = mysqli_query($connect, $query);

    if (mysql_num_rows($result) != 0)
    {
        header("location: index.php");
    }
    else
    {
        header("location: login.php"); //Va aggiunto il controllo della variabile di sessione
    }

?>

<?php

    // INSERIMENTO REAGENTE

    $nome = $_POST["nome_reagente"];
    $formula = $_POST["formula"];
    $stato = $_POST["stato"];
    $ditta = $_POST["ditta"];
    $pittogramma = $_POST["pittogramma"];
    $frase = $_POST["frase"];
    $id_scheda_sicurezza = $_POST["scheda"];
    $id_quantita = $_POST["quantita"];
    $data_scadenza = $_POST["data_scadenza"];
    $id_collocazione = $_POST["collocazione"];

    $connect = mysqli_connect("localhost", "root", "XXXX", "Scuola");

    $query = "INSERT INTO reagente (nome, formula, stato, ditta, pittogramma, frase, id_scheda_sicurezza, id_quantita, data_scadenza, id_collocazione)
              VALUES ('$nome', '$formula', '$stato', '$ditta', '$pittogramma', '$frase', '$id_scheda_sicurezza', '$id_quantita', '$data_scadenza', '$id_collocazione')";

    $result = mysqli_query($connect, $query);

    if (mysql_num_rows($result) != 0)
    {
        echo "Elemento inserito con successo !";
        header("location: index.php");
    }

?>

<?php

    // INSERIMENTO APPARECCHIATURA

    $tipo = $_POST["tipo"];
    $caratteristiche = $_POST["caratteristiche"];
    $numero_inventario = $_POST["numero"];
    $quantita = $_POST["quantita"];
    $manuale = $_POST["manuale"];
    $collocazione = $_POST["collocazione"];

    $connect = mysqli_connect("localhost", "root", "XXXX", "Scuola");

    $query = "INSERT INTO strumentaqzione_apparecchiatura (tipo, caratteristiche_tecniche, numero_inventario, id_quantita, id_manuale, id_collocazione)
              VALUES ('$tipo', '$caratteristiche', '$numero_inventario', '$quantita', '$manuale', '$collocazione')";

    $result = mysqli_query($connect, $query);

    if (mysql_num_rows($result) != 0)
    {
        echo "Elemento inserito con successo !";
        header("location: index.php");
    }

?>

<?php

    // INSERIMENTO VETRERIA

    $tipo = $_POST["tipo"];
    $quantita = $_POST["quantita"];
    $collocazione = $_POST["collocazione"];

    $connect = mysqli_connect("localhost", "root", "XXXX", "Scuola");

    $query = "INSERT INTO strumentaqzione_apparecchiatura (tipo, quantita, id_collocazione)
              VALUES ('$tipo', '$quantita', '$collocazione')";

    $result = mysqli_query($connect, $query);

    if (mysql_num_rows($result) != 0)
    {
        echo "Elemento inserito con successo !";
        header("location: index.php");
    }

?>

<?php
        if(array_key_exists('ricercareagente', $_POST))
        {
          ricerca();
        }
        function ricerca()
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



<?php

    //RICERCA STRUMENTAZIONE

        if(array_key_exists('ricercastrumenti', $_POST))
        {
          ricerca();
        }
        function ricerca()
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

<?php

    //RICERCA VETRERIA

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