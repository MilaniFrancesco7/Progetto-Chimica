<?php

	session_start();

	include "../FrontEnd&BackEnd/Inventario/db/connection.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

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
		$query = "SELECT ruolo FROM utente WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($connect, $query);

		$_SESSION["Ruolo"] = $row['ruolo'];
		$_SESSION["User"] = "$email";
		header("location: ../FrontEnd&BackEnd/Inventario/index.php");
	}

?>