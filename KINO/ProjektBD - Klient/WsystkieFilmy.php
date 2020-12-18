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
            <h1 class="title">Wszystkie Filmy</h1>
            <br><br>
          
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD');

$query = 'SELECT ID_film,oryginalny_tytul,tytul,rok_premiery,produkcja,czas_trwania FROM film';

$result = mysqli_query($link, $query) or die('Blad zapytania SQL');

echo "<table border=1>";
echo "<tr>  
		<th>ID_film</th>
		<th>oryginalny_tytul</th>
		<th>tytul</th>
		<th>rok_premiery</th>
		<th>produkcja</th>
		<th>czas_trwania</th>
 </tr>";

while ($line = mysqli_fetch_assoc($result)) 
{
    echo "<tr>";
    echo "<td>" . $line["ID_film"] . "</td>";
    echo "<td>" . $line["oryginalny_tytul"] . " </td>";
	echo "<td>" . $line["tytul"] . " </td>";
	echo "<td>" . $line["rok_premiery"] . " </td>";
	echo "<td>" . $line["produkcja"] . " </td>";
    echo "<td>" . $line["czas_trwania"] . "</td>";
    echo "</tr>";
}
echo "</table>\n";

mysqli_close($link);
?>  
         <br> <br>			
<input type="button" onclick="location.href='index.html';" value="Powrót do strony głównej" />
               
        </div>
    </body>
</html>
