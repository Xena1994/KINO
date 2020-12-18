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
            <h1 class="title">Usuwanie Seansu</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieSeansami.html';" value="Powrót" />
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_seans = $_POST["ID_seans"];
	$ID_film = $_POST["ID_film"];

if ($ID_seans != "") 
{
  $sql = "DELETE FROM Seans WHERE ID_seans='$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Seans został poprawnie usunięty.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_film != "") 
{
  $sql = "DELETE FROM Seans WHERE ID_film='$ID_film'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Seans został poprawnie usunięty.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_film != "" AND $ID_seans != "") 
{
  $sql = "DELETE FROM Seans WHERE ID_film='$ID_film', ID_seans='$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Seans został poprawnie usunięty.";
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
