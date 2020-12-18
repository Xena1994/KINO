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
            <h1 class="title">Edycja Biletu</h1>
            <br><br>
             <input type="button" onclick="location.href='zarządzanieBiletami.html';" value="Powróć" />	
     <br><br>
			
			
            
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

 $ID_bilet = $_POST["ID_bilet"];
    $ID_seans = $_POST["ID_seans"];
    $ID_typ_bilet = $_POST["ID_typ_bilet"];
	$ID_rezerwacja = $_POST["ID_rezerwacja"];  

if ( $ID_rezerwacja != "" AND $ID_typ_bilet != "" AND $ID_seans != "" AND $ID_bilet != "") 
{
    $sql = "UPDATE Bilet SET ID_rezerwacja = '$ID_rezerwacja', ID_typ_bilet = '$ID_typ_bilet', ID_seans = '$ID_seans' WHERE ID_bilet = '$ID_bilet'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_typ_bilet != "" AND $ID_seans != "" AND $ID_bilet != "") 
{
    $sql = "UPDATE Bilet SET ID_typ_bilet = '$ID_typ_bilet', ID_seans = '$ID_seans' WHERE ID_bilet = '$ID_bilet'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_typ_bilet != "" AND $ID_bilet != "") 
{
    $sql = "UPDATE Bilet SET ID_typ_bilet = '$ID_typ_bilet' WHERE ID_bilet = '$ID_bilet'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_seans != "" AND $ID_bilet != "") 
{
    $sql = "UPDATE Bilet SET ID_seans = '$ID_seans' WHERE ID_bilet = '$ID_bilet'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ($ID_seans != "" AND $ID_bilet != "") 
{
    $sql = "UPDATE Bilet SET ID_seans = '$ID_seans' WHERE ID_bilet = '$ID_bilet'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
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
