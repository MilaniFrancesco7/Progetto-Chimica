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

    //RICERCA REAGENTE

    $ricerca = $_POST["ricerca"];

    $connect = mysqli_connect("localhost", "root", "", "progetto-chimica");

    $query =   "SELECT * FROM reagente WHERE 
                nome LIKE $ricerca+\"%\" OR 
                formula LIKE $ricerca+\"%\" OR
                stato LIKE $ricerca+\"%\"  OR
                ditta LIKE $ricerca+\"%\"  OR
                frase LIKE $ricerca+\"%\"";

    $result = mysqli_query($connect, $query) or die ("Errore nella query: ".mysqli_error($conn));

/*<table>
        <tr>
			<th>ID Reagente</th>
			<th>Nome</th>
			<th>Formula</th>
			<th>Stato</th>
            <th>Ditta</th>
            <th>Pittogramma</th>
            <th>Frase</th>
            <th>ID Scheda di sicurezza</th>
            <th>ID Quantità</th>
            <th>Data di scadenza</th>
            <th>ID Collocazione</th>
		</tr>
*/
    while($search = mysqli_fetch_array($result))
    {
        echo "<tr>\n\t\t\t";
        echo "<td>$search[id_reagente]</td>\n\t\t\t";
        echo "<td>$search[nome]</td>\n\t\t\t";
        echo "<td>$search[formula]</td>\n\t\t\t";
        echo "<td>$search[stato]</td>\n\t\t\t";
        echo "<td>$search[ditta]</td>\n\t\t";
        echo "<td>$search[pittogramma]</td>\n\t\t";
        echo "<td>$search[frase]</td>\n\t\t";
        echo "<td>$search[id_scheda_sicurezza]</td>\n\t\t";
        echo "<td>$search[id_quantita]</td>\n\t\t";
        echo "<td>$search[data_scadenza]</td>\n\t\t";
        echo "<td>$search[id_collocazione]</td>\n\t\t";
        echo "</tr>\n\t\t";
    }
    
    mysqli_free_result($risultato);
    mysqli_close($conn);
   
 //</table>
 
 ?>



<?php

    //RICERCA STRUMENTAZIONE

    $ricerca = $_POST["ricerca"];

    $connect = mysqli_connect("localhost", "root", "", "progetto-chimica");

    $query =   "SELECT * FROM strumentazione_apparecchiatura WHERE 
                id_strumento LIKE $ricerca+\"%\" OR 
                tipo LIKE $ricerca+\"%\" OR
                caratteristiche_tecniche LIKE $ricerca+\"%\"  OR
                id_quantita LIKE $ricerca+\"%\"  OR
                id_manuale LIKE $ricerca+\"%\"  OR
                id_collocazione LIKE $ricerca+\"%\"";

    $result = mysqli_query($connect, $query) or die ("Errore nella query: ".mysqli_error($conn));

/*<table>
        <tr>
			<th>ID Strumento</th>
			<th>Tipo</th>
			<th>Caratteristiche tecniche</th>
			<th>ID Quantità</th>
            <th>ID Manuale</th>
            <th>ID Collocazione</th>
		</tr>
*/
    while($search = mysqli_fetch_array($result))
    {
        echo "<tr>\n\t\t\t";
        echo "<td>$search[id_strumento]</td>\n\t\t\t";
        echo "<td>$search[tipo]</td>\n\t\t\t";
        echo "<td>$search[caratteristiche_tecniche]</td>\n\t\t\t";
        echo "<td>$search[numero_inventario]</td>\n\t\t\t";
        echo "<td>$search[id_quantita]</td>\n\t\t";
        echo "<td>$search[id_manuale]</td>\n\t\t";
        echo "<td>$search[id_collocazione]</td>\n\t\t";
        echo "</tr>\n\t\t";
    }
    
    mysqli_free_result($risultato);
    mysqli_close($conn);
   
 //</table>
 
 ?>

<?php

    //RICERCA VETRERIA

    $ricerca = $_POST["ricerca"];

    $connect = mysqli_connect("localhost", "root", "", "progetto-chimica");

    $query =   "SELECT * FROM vetreria_attrezzatora WHERE 
                id_attrezzo LIKE $ricerca+\"%\" OR 
                tipo LIKE $ricerca+\"%\" OR
                id_quantita LIKE $ricerca+\"%\"  OR
                id_collocazione LIKE $ricerca+\"%\"";

    $result = mysqli_query($connect, $query) or die ("Errore nella query: ".mysqli_error($conn));

/*<table>
        <tr>
			<th>ID Attrezzo</th>
			<th>Tipo</th>
			<th>ID Quantità</th>
            <th>ID Collocazione</th>
		</tr>
*/
    while($search = mysqli_fetch_array($result))
    {
        echo "<tr>\n\t\t\t";
        echo "<td>$search[id_attrezzo]</td>\n\t\t\t";
        echo "<td>$search[tipo]</td>\n\t\t\t";
        echo "<td>$search[id_quantita]</td>\n\t\t";
        echo "<td>$search[id_collocazione]</td>\n\t\t";
        echo "</tr>\n\t\t";
    }
    
    mysqli_free_result($risultato);
    mysqli_close($conn);
   
 //</table>
 
 ?>