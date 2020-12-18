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
            <h1 class="title">Usuwanie Reżysera</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieReżyserami.html';" value="Powrót" />
			<br><br>
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_rezyser = $_POST["ID_rezyser"];

if ($ID_rezyser != "") 
{
  $sql = "DELETE FROM Rezyser WHERE ID_rezyser='$ID_rezyser'";
    
    if (mysqli_query($link, $sql)) 
	{
		echo "Reżyser został poprawnie usunięty.";
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
