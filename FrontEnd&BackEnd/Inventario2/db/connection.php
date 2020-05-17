<?php
    //Connessione al database

    include("parameters.php");

    $connect = mysqli_connect($server, $username, $password, $database)
        or die("Connessione non riuscita: " . mysqli_error($connect));;

?>