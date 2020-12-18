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
            <h1 class="title">Edycja Seansu</h1>
            <br><br>
             <input type="button" onclick="location.href='zarządzanieSeansami.html';" value="Powróć" />	
     <br><br>
			
			
            
<?php

$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	 $ID_seans = $_POST["ID_seans"];
    $ID_film = $_POST["ID_film"];
    $ID_sala = $_POST["ID_sala"];
	$dzien_tygodnia = $_POST["dzien_tygodnia"];
    $godzina = $_POST["godzina"];

if ( $ID_seans != "" AND $ID_film != "" AND $ID_sala != "" AND $dzien_tygodnia != ""  AND $godzina != "") 
{
    $sql = "UPDATE Seans SET ID_film = '$ID_film', dzien_tygodnia = '$dzien_tygodnia', 
	godzina='$godzina' WHERE ID_seans = '$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Seans został poprawnie edytowany."
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $ID_seans != "" AND $ID_sala != "" AND $godzina != "" AND  AND $dzien_tygodnia != "") 
{
    $sql = "UPDATE Seans SET godzina='$godzina',  dzien_tygodnia = '$dzien_tygodnia', ID_sala='$ID_sala' 
	WHERE ID_seans = '$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Seans został poprawnie edytowany."
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $ID_seans != "" AND $ID_sala != "" AND $godzina != "") 
{
    $sql = "UPDATE Seans SET godzina='$godzina', ID_sala='$ID_sala',   WHERE ID_seans = '$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Seans został poprawnie edytowany."
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

mysqli_close($link);

?>
         
               
        </div>
    </body>
</html>
