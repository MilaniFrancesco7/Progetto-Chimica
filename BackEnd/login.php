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