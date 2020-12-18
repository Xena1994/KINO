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
            <h1 class="title">Usuwanie Biletu</h1>
            <br><br>
            <input type="button" onclick="location.href='zarządzanieBiletami.html';" value="Powrót" />
			<br><br>
<?php  
  $link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

	$ID_bilet = $_POST["ID_bilet"];
    $ID_rezerwacja = $_POST["ID_rezerwacja"];
	$ID_seans = $_POST["ID_seans"];

if ( $ID_rezerwacja != "" AND $ID_seans != "") 
{
  $sql = "DELETE FROM Bilet WHERE ID_rezerwacja='$ID_rezerwacja' AND ID_seans='$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		$zwiekszanie = "UPDATE Seans SET wolne_miejsca = wolne_miejsca + 1 WHERE ID_seans = '$ID_seans'";
		if (mysqli_query($link, $zwiekszanie)) echo "Bilet został poprawnie usunięty.";
    } 
	else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($link);	
    }
}

if ( $ID_bilet != "" AND $ID_seans != "") 
{
  $sql = "DELETE FROM Bilet WHERE ID_bilet='$ID_bilet' AND ID_seans='$ID_seans'";
    
    if (mysqli_query($link, $sql)) 
	{
		$zwiekszanie = "UPDATE Seans SET wolne_miejsca = wolne_miejsca + 1 WHERE ID_seans = '$ID_seans'";
		if (mysqli_query($link, $zwiekszanie)) echo "Bilet został poprawnie usunięty.";
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
