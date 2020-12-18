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
            <h1 class="title">Usuwanie Gatunku</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieGatunkami.html';" value="Powrót" />
			<br><br>
<?php  
  $link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_gatunek = $_POST["ID_gatunek"];
    $nazwa_gatunek = $_POST["nazwa_gatunek"];

if ( $ID_gatunek != "") 
{
  $sql = "DELETE FROM Gatunek WHERE ID_gatunek='$ID_gatunek'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Gatunek został poprawnie usunięty.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $nazwa_gatunek != "") 
{
  $sql = "DELETE FROM Gatunek WHERE nazwa_gatunek='$nazwa_gatunek'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Gatunek został poprawnie usunięty.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $nazwa_gatunek != "") 
{
  $sql = "DELETE FROM Gatunek WHERE nazwa_gatunek='$nazwa_gatunek' AND ID_gatunek='$ID_gatunek'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Gatunek został poprawnie usunięty.";
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
