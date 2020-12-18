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
$url        = "rezerwacjaBiletów.html";
$site_title = "Przejdź do rezerwacji.";


$query2 = "SELECT ID_klient FROM Klient WHERE email = '$email' AND haslo = '$haslo';";
$result2 = mysqli_query($link, $query2) or die('Blad zapytania SQL');

$line = mysqli_fetch_assoc($result2);
$id = $line["ID_klient"];

if ($id !== null) 
{
    
    echo "Zalogowałeś się! Twoje ID to: ";
    
    
    
	echo "<td>" . $id . ".</td>";
    
	echo "<a href=$url> $site_title</a>.";
} 
else 
{
   echo "Niepoprawne dane, spróbuj ponownie!";
}

mysqli_close($link);
?>		
<br>
<br>
<input type="button" onclick="location.href='index.html';" value="Powrót do strony głównej" />
               
        </div>
    </body>
</html>