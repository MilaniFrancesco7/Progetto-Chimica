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