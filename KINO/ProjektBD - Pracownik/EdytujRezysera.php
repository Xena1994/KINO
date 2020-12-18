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
            <h1 class="title">Edycja Re≈ºysera</h1>
            <br><br>
             <input type="button" onclick="location.href='zarzƒÖdzanieRe≈ºyserami.html';" value="Powr√≥ƒá" />	
     <br><br>
			
			
            
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_rezyser= $_POST["ID_rezyser"];
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];

if ( $ID_rezyser != "" AND $imie != "" AND $nazwisko != "") 
{
    $sql = "UPDATE Rezyser SET imie = '$imie', nazwisko = '$nazwisko' WHERE ID_rezyser= '$ID_rezyser'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Reøyser zosta≥Ç poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $ID_rezyser != "" AND $imie != "") 
{
    $sql = "UPDATE Rezyser SET imie = '$imie' WHERE ID_rezyser= '$ID_rezyser'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Reøyser zosta≥Ç poprawnie edytowany.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}
	
	if ( $ID_rezyser != "" AND $nazwisko != "") 
{
    $sql = "UPDATE Rezyser SET nazwisko = '$nazwisko' WHERE ID_rezyser= '$ID_rezyser'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Reøyser zosta≥Ç poprawnie edytowany.";
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