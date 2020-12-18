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
            <h1 class="title">Lista Zarezerwowanych<br>
            Biletów</h1>
            <br><br>
			
			
            
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD'); 
$query = 'SELECT b.ID_bilet, b.ID_rezerwacja, t.nazwa_typu_biletu, f.tytul, b.ID_seans FROM Bilet b, TypBiletu t, Seans s, Film f WHERE 
b.ID_typ_bilet = t.ID_typ_bilet AND f.ID_film = s.ID_film AND b.ID_seans = s.ID_seans ORDER BY ID_bilet;'; 
$result = mysqli_query($link, $query) or die('Blad zapytania SQL'); 

echo "<table border=2>"; 
echo "<tr>  
		<th>ID biletu</th>
		<th>ID rezerwacji</th>
		<th>ID seansu</th>
		<th>Typ biletu</th>
		<th>Tytuł filmu</th>
 </tr>";
 
while ($line = mysqli_fetch_assoc($result)) 
{     
echo "<tr>";
            echo "<td>" . $line["ID_bilet"] . "</td>";
			echo "<td>" . $line["ID_rezerwacja"] . "</td>";
			 echo "<td>" . $line["ID_seans"] . "</td>";
            echo "<td>" . $line["nazwa_typu_biletu"] . "</td>";
			echo "<td>" . $line["tytul"] . "</td>";
            echo "</tr>";
} 
echo "</table>\n"; 
mysqli_close($link);
?>
         <br> <br>			
<input type="button" onclick="location.href='zarządzanieBiletami.html';" value="Powrót" />
               <br><br>
        </div>
    </body>
</html>
