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
            <h1 class="title">Dodawanie Gatunku</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieGatunkami.html';" value="Powrót" />
			<br><br>
<?php
  $link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

   $nazwa_gatunek = $_POST["nazwa_gatunek"];

if ($nazwa_gatunek != "") 
{
    $sql = "INSERT into Gatunek(nazwa_gatunek) VALUES('$nazwa_gatunek')";
    
    if (mysqli_query($link, $sql)) 
	{
		$ID = $link->insert_id;
        echo "Gatunek został pomyślnie utworzony!  \nJego ID to: ";
		echo $ID; 
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
