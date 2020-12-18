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
            <h1 class="title">Usuwanie Rezerwacji</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieRezerwacjami.html';" value="Powrót" />
<br><br>
<?php
 $link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_rezerwacja = $_POST["ID_rezerwacja"];
	$ID_klient = $_POST["ID_klient"];

if ($ID_rezerwacja != "") 
{
  $sql = "DELETE FROM Rezerwacja WHERE ID_rezerwacja='$ID_rezerwacja'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Rezerwacja została poprawnie usunięta.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_klient != "") 
{
  $sql = "DELETE FROM Rezerwacja WHERE ID_klient='$ID_klient'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Rezerwacja została poprawnie usunięta.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_rezerwacja != "" AND $ID_klient != "") 
{
  $sql = "DELETE FROM Rezerwacja WHERE ID_rezerwacja='$ID_rezerwacja' AND ID_klient='$ID_klient'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Rezerwacja została poprawnie usunięta.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

mysqli_close($link);

?>
         <br> <br>			

               
        </div>
    </body>
</html>
