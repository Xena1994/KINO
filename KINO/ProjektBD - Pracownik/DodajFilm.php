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
            <h1 class="title">Dodawanie Filmu</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieFilmami.html';" value="Powrót" />
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

    $ID_ograniczenia = $_POST["ID_ograniczenia"];
    $ID_rezyser = $_POST["ID_rezyser"];
    $ID_gatunek = $_POST["ID_gatunek"];
    $oryginalny_tytul = $_POST["oryginalny_tytul"];
    $tytul = $_POST["tytul"];
    $rok_premiery = $_POST["rok_premiery"];
    $produkcja = $_POST["produkcja"];
    $czas_trwania = $_POST["czas_trwania"];

if ($ID_ograniczenia != "" AND $ID_rezyser != "" AND $ID_gatunek != "" AND $oryginalny_tytul != "" AND $tytul != ""
AND $rok_premiery!="" AND $produkcja!="" AND $czas_trwania!="") 
{
    $sql = "INSERT into Film(ID_ograniczenia, ID_rezyser, ID_gatunek, oryginalny_tytul, tytul, rok_premiery, produkcja, czas_trwania) 
VALUES ('$ID_ograniczenia', '$ID_rezyser', '$ID_gatunek', '$oryginalny_tytul', '$tytul', '$rok_premiery', '$produkcja', '$czas_trwania')";
    
    if (mysqli_query($link, $sql)) 
	{
		$ID = $link->insert_id;
        echo "Film został pomyślnie utworzony! Jego ID to: ";
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
