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
            <h1 class="title">Dodawanie Klienta</h1>
            <br><br>
     
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$imie     = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$email    = $_POST["email"];
$haslo    = $_POST["haslo"];
if ($imie != "" AND $nazwisko != "" AND $haslo != "" AND $email != "") 
{
    $sql = "INSERT into Klient (imie, nazwisko, email, haslo) VALUES ('$imie', '$nazwisko', '$email', '$haslo')";
    
    if (mysqli_query($link, $sql)) 
	{
		$ID = $link->insert_id;
        echo "Konto klienta zostało pomyślnie utworzone!  \nJego ID to: ";
		echo $ID; 
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($haslo != "" AND $email != "") 
{
    $sql = "INSERT into Klient (email, haslo) VALUES ('$email', '$haslo')";
    
    if (mysqli_query($link, $sql)) 
	{
		$ID = $link->insert_id;
        echo "Konto klienta zostało pomyślnie utworzone!  \nJego ID to: ";
		echo $ID; 
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}
else
{
	echo "Wymagane jest pole \"Hasło\" i \"Email\"!";
}
mysqli_close($link);
?>
<br><br>
            <input type="button" onclick="location.href='zarządzanieKlientami.html';" value="Powrót" />
         <br> <br>			

               
        </div>
    </body>
</html>
