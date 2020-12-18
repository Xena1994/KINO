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

$ID_pracownik     = $_POST["ID_pracownik"];
$haslo = $_POST["haslo"];
$url = "index.html";
$site_title = "Przejdź dalej";

$dane =  "SELECT imie, nazwisko FROM Pracownik WHERE ID_pracownik = '$ID_pracownik' AND haslo = '$haslo'";
$d = mysqli_query($link, $dane) or die('Blad zapytania SQL');
$l = mysqli_fetch_assoc($d);
$imie = $l["imie"];
$nazwisko = $l["nazwisko"];

if ($imie !== null) 
{
echo "Witaj";
	echo "<td> ".$imie." </td>";
	echo "<td> ".$nazwisko."! </td>";
echo "Zalogowałeś się! <a href=$url> $site_title</a>.";
}

	else 
	{
        echo "Niepoprawne dane! Spróbuj jeszcze raz.";	
    }

mysqli_close($link);

?>		

               
        </div>
    </body>
</html>