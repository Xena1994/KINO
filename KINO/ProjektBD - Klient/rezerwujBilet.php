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
            <h1 class="title">Dodawanie Biletu</h1>
            <br><br>

<?php

$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$ID_rezerwacja = $_POST["ID_rezerwacja"];
$ID_typ_bilet  = $_POST["ID_typ_bilet"];
$ID_seans      = $_POST["ID_seans"];

if ($ID_rezerwacja != "" AND $ID_typ_bilet != "" AND $ID_seans != "") 
{
   
    $zmniejszanie = "UPDATE Seans SET wolne_miejsca = wolne_miejsca - 1 WHERE ID_seans = '$ID_seans' AND wolne_miejsca>0";
    
    if (mysqli_query($link, $zmniejszanie)) 
	{	 
		$sql = "INSERT into Bilet(ID_rezerwacja, ID_typ_bilet, ID_seans) VALUES('$ID_rezerwacja', '$ID_typ_bilet', '$ID_seans')";
		$r = (mysqli_query($link, $sql));
		$ID  = $link->insert_id;
        echo "Bilet został pomyślnie dodany do zamówienia numer ";
        echo $ID_rezerwacja;
        echo ". Jego ID to: ";
        echo $ID;
        echo ". Powróć do poprzedniej strony za pomocą \"Wstecz\"."; 
    }
}
else 
{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

?>
         <br> <br>			

               
        </div>
    </body>
</html>
