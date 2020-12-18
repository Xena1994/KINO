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
            <h1 class="title">Seanse filmowe<br>Cloverfield <br>Lane 10</h1>
            <br><br>
			
			
            
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$query = 'SELECT S.ID_seans, F.tytul, SA.ilosc_miejsc, SA.ID_sala, S.dzien_tygodnia, S.godzina FROM Seans S, Film F, Sala SA 
WHERE S.ID_film = F.ID_film AND F.ID_film = 3 AND SA.ID_sala = S.ID_sala ORDER BY ID_seans;';

$result = mysqli_query($link, $query) or die('Blad zapytania SQL');

echo "<table border=1>";
echo "<tr>
        <th>ID seansu</th>
		<th>Numer sali</th>
		<th>Ilość dostępnych miejsc w sali</th>
		<th>Dzień tygodnia</th>
		<th>Godzina</th>	
        </tr>";

while ($line = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $line["ID_seans"] . "</td>";
    echo "<td>" . $line["ID_sala"] . "</td>";
    echo "<td>" . $line["ilosc_miejsc"] . "</td>";
    echo "<td>" . $line["dzien_tygodnia"] . "</td>";
    echo "<td>" . $line["godzina"] . "</td>";
    echo "</tr>";
}
echo "</table>\n";

mysqli_close($link);
?>
        <br> <br>	
 <font color="red">Uwaga!</font> Jeśli zdecydowałeś się na któryś z seansów, zapamiętaj jego numer ID (<i>ID seansu</i>). Jest to niezbędne do rezerwacji biletów.
		 <br>
		 <input type="button" onclick="location.href='logowanieKlienta.html';" value="Rezerwuj" />
		 <br> <br>		 
<input type="button" onclick="location.href='Cloverfield_Lane_10.html';" value="Powrót do opisu filmu" />
               <br> <br>    
        </div>
    </body>
</html>
