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
            <h1 class="title">Seanse filmowe</h1>
            <br><br>
			
			
            
<?php
 $link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$query =  "SELECT S.ID_seans, F.tytul, S.ID_sala, S.dzien_tygodnia, S.godzina, S.wolne_miejsca FROM Seans S, Film F WHERE S.ID_film = F.ID_film ORDER BY ID_seans;";

$result = mysqli_query($link, $query) or die('Blad zapytania SQL');

echo "<table border=1>";
  echo "<tr>
        <th>ID seansu</th>
        <th>Tytuł filmu</th>
		<th>ID sali</th>
		<th>Dzien tygodnia</th>
		<th>Godzina</th>	
		<th>Wolne miejsca</th>	
        </tr>";

while ($line = mysqli_fetch_assoc($result)) {
  echo "<tr>";
    echo "<td>".$line["ID_seans"]."</td>";
    echo "<td>".$line["tytul"]."</td>";
	echo "<td>".$line["ID_sala"]."</td>";
    echo "<td>".$line["dzien_tygodnia"]."</td>";
	echo "<td>".$line["godzina"]."</td>";
	echo "<td>".$line["wolne_miejsca"]."</td>";
	echo "</tr>";
	}
echo "</table>";


mysqli_close($link);

?>

<br> <br>	
 <font color="red">Uwaga!</font> Jeśli zdecydowałeś się na któryś z seansów, zapamiętaj jego numer ID (<i>ID seansu</i>). Jest to niezbędne do rezerwacji biletów.
		 <br>
		 <input type="button" onclick="location.href='logowanieKlienta.html';" value="Rezerwuj" />  
         <br> <br>			
<input type="button" onclick="location.href='index.html';" value="Powrót" />
<br><br>
               
        </div>
    </body>
</html>
