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
            <h1 class="title">Dodawanie Seansu</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieSeansami.html';" value="Powrót" />
			<br><br>
<?php
  $link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

   $ID_film = $_POST["ID_film"];
	$ID_sala = $_POST["ID_sala"];
	$dzien_tygodnia = $_POST["dzien_tygodnia"];
	$godzina = $_POST["godzina"];

if ($ID_film != "" AND $ID_sala != "" AND $dzien_tygodnia != "" AND $godzina != "") 
{
    $sql = "INSERT into Seans(ID_film, ID_sala, dzien_tygodnia, godzina) VALUES('$ID_film', '$ID_sala', '$dzien_tygodnia', '$godzina')";
    
    if (mysqli_query($link, $sql)) 
	{
		$ID = $link->insert_id;
        echo "Seans został pomyślnie utworzony!  \nJego ID to: ";
		echo $ID; 
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}
else
{
	echo "Wymagane są wszystkie pola!";
}
mysqli_close($link);

?>
         <br> <br>			

               
        </div>
    </body>
</html>
