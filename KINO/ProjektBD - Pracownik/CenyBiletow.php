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
            <h1 class="title">Lista<br> Cen Biletów</h1>
            <br><br>
          
<?php
$link = mysqli_connect('localhost:3306', 'root', '', 'Kino') or die('Blad polaczenia z Serwerem BD'); 
$query = 'SELECT cena_biletu, nazwa_typu_biletu, opis FROM TypBiletu;'; 
$result = mysqli_query($link, $query) or die('Blad zapytania SQL'); 

echo "<table border=2>"; 
echo "<tr>  
		<th>Rodzaj biletu</th>
		<th>Cena biletu</th>
		<th>Opis</th>
 </tr>";

while ($line = mysqli_fetch_assoc($result)) 
{     
echo "<tr>";
            echo "<td>" . $line["nazwa_typu_biletu"] . "</td>";
            echo "<td>" . $line["cena_biletu"] . " zł. </td>";
            echo "<td>" . $line["opis"] . "</td>";
            echo "</tr>";
} 
echo "</table>\n"; 
mysqli_close($link);
?>  
         <br> <br>			
<input type="button" onclick="location.href='index.html';" value="Powrót" />
               
        </div>
    </body>
</html>
