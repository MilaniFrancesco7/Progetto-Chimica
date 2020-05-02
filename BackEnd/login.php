<?php

    $email = $_POST["email"];
    $password = $_POST["password"];

    $connect = mysqli_connect("localhost", "root", "Marco0424", "Progetto_Chimica");

    $query = "SELECT * FROM utente WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($connect, $query);
	
	$count = mysqli_num_rows($result);

    if($count == 0)
	{
		header("location: ../FrontEnd/Inventario/SignIn.html");
	}
	else
	{
		header("location: ../FrontEnd/Inventario/index.html");
	}

?>