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
            <h1 class="title">Lista Filmów</h1>
            <br><br>
			
			
            
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$query =  "SELECT F.ID_film, F.oryginalny_tytul, F.tytul, R.imie, R.nazwisko, G.nazwa_gatunek, O.wiek, F.rok_premiery, F.produkcja, F.czas_trwania  FROM Film F, 
Gatunek G, Rezyser R, OgraniczeniaWiekoweFilmu O WHERE F.ID_gatunek = G.ID_gatunek AND F.ID_rezyser = R.ID_rezyser AND F.ID_ograniczenia = O.ID_ograniczenia ORDER BY ID_film;";

$result = mysqli_query($link, $query) or die('Blad zapytania SQL');

echo "<table border=1>";
 echo "<tr>
        <th>ID filmu</th>
        <th>Oryginalny tytuł</th>
		<th>Tytuł</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Gatunek</th>
		<th>Wiek</th>
		<th>Rok premiery</th>
		<th>Produkcja</th>
		<th>Czas trwania</th>	
        </tr>";

while ($line = mysqli_fetch_assoc($result)) {
      echo "<tr>";
    echo "<td>".$line["ID_film"]."</td>";
    echo "<td>".$line["oryginalny_tytul"]."</td>";
	echo "<td>".$line["tytul"]."</td>";
    echo "<td>".$line["imie"]."</td>";
	echo "<td>".$line["nazwisko"]."</td>";
	echo "<td>".$line["nazwa_gatunek"]."</td>";
    echo "<td>".$line["wiek"]."</td>";
	echo "<td>".$line["rok_premiery"]."</td>";
    echo "<td>".$line["produkcja"]."</td>";
	echo "<td>".$line["czas_trwania"]."</td>";
	echo "</tr>";
	}
echo "</table>";

mysqli_close($link);
?>

         <br> <br>			
<input type="button" onclick="location.href='zarządzanieFilmami.html';" value="Powrót" />
               
        </div>
    </body>
</html>
