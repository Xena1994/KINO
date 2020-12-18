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
            <h1 class="title">Edycja Rezerwacji</h1>
            <br><br>
             <input type="button" onclick="location.href='zarządzanieRezerwacjami.html';" value="Powróć" />	
     <br><br>
			
			
            
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_klient= $_POST["ID_klient"];
    $ID_rezerwacja = $_POST["ID_rezerwacja"];
    $ilosc_biletow = $_POST["ilosc_biletow"];  

if ( $ID_rezerwacja != "" AND $ID_klient != "" AND $ilosc_biletow != "") 
{
    $sql = "UPDATE Rezerwacja SET ID_klient = '$ID_klient', ilosc_biletow = '$ilosc_biletow' WHERE ID_rezerwacja = '$ID_rezerwacja'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $ID_rezerwacja != "" AND $ilosc_biletow != "") 
{
    $sql = "UPDATE Rezerwacja SET ilosc_biletow = '$ilosc_biletow' WHERE ID_rezerwacja = '$ID_rezerwacja'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Bilet został poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}


if ( $ID_klient != "" AND $ilosc_biletow != "") 
{
    $sql = "UPDATE Rezerwacja SET ilosc_biletow = '$ilosc_biletow' WHERE ID_klient = '$ID_klient'";
    
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
