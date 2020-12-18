<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Cinema Poland</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/style.css">

        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body class="animated bounceInDown">
        <div class="avatar">
            <img src="img/avatar.png" alt="Avatar">
        </div>

        <div class="content">
            <h1 class="title">Logowanie</h1>
	<br> <br>	

<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$email      = $_POST["email"];
$haslo      = $_POST["haslo"];
$imie		= $_POST["imie"];
$nazwisko 	= $_POST["nazwisko"];
$url        = "rezerwacjaBiletów.html";
$site_title = "Przejdź do rezerwacji.";


if ($email != "" AND $haslo != "") 
{
    $query = "INSERT INTO klient (email, haslo, imie, nazwisko) VALUES ('$email', '$haslo', '$imie', '$nazwisko')";
    $result = mysqli_query($link, $query) or die('Blad zapytania SQL');
	$id = mysqli_insert_id($link);
	echo "Zarejestrowałeś się! Twoje ID to: $id";

    $query2 = "SELECT ID_klient FROM klient WHERE email = '$email' AND haslo = '$haslo';";
    $result2 = mysqli_query($link, $query2) or die('Blad zapytania SQL');
	while ($line = mysqli_fetch_assoc($result2)) echo "<td>" . $line["ID_klient"] . ".</td>";
	echo "<a href=$url> $site_title</a>.";
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
?>		

               
        </div>
    </body>
</html>