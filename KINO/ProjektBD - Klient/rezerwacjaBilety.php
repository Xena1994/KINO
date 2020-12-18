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
            <h1 class="title">Rezerwacja</h1>
            <br><br>
          
<?php
$conn=new mysqli("localhost:3306","root","","Kino");
$conn->set_charset("utf8");
if($conn->connect_error)
 {
  echo "Brak polaczenia " . $conn->connect_error;
  }
  else
  {
	$ID_rezerwacja = $_POST["ID_rezerwacja"];
	$ID_seans = $_POST["ID_seans"];
	$ID_typ_bilet = $_POST["ID_typ_bilet"];


    if(($ilosc_biletow != 0  AND $ID_klient != 0)
	{
    $stmt = mysqli("INSERT into Bilet (ID_rezerwacja, ID_seans, ID_typ_bilet) VALUES ( '$ID_rezerwacja',  '$ID_seans', '$ID_typ_bilet')");
   
	if($stmt) echo "Rezerwacja tego biletu powiodła się!"; 
    else echo "Wystąpił błąd podczas rezerwacji biletu."; 
	$conn->close();
	}
}

  $conn->close();

?>
         <br> <br>			

               
        </div>
    </body>
</html>
