<?php
// Login & Inserimento Reagenti, Apparecchiatura e Vetreria

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