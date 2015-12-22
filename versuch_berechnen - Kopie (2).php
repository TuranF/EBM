 <html>
 <head>
 <title> versuch </title>
 <meta charset="UTF-8">
 </head>
 <body>
 
 <form action="versuch_berechnen.php" method="post" name="form2"> 
 <select name="auswahl" size="3"> 
 <option>Fernsehen</option> 
 <option>Mixer</option>  
 <option>Tischlampe</option></select>
 <input type="submit" value="Auswählen" >
 </form>

 <?php
$verbindung = mysql_connect("localhost", "root" , "")
or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

mysql_select_db("test_db_berechnen") or die ("Datenbank konnte nicht ausgewählt werden");


$auswahl = $_POST["auswahl"];

$result = mysql_query("SELECT wert FROM beispiel WHERE name = '$auswahl'");
$menge = mysql_num_rows($result);
$resultsumme = mysql_query("SELECT SUM(wert) AS wertsumme FROM beispiel WHERE name = '$auswahl'");
$summe = mysql_fetch_assoc($resultsumme);
$durschnitt =  $summe["wertsumme"]/$menge;

echo "Gerät:  $auswahl <br>";
echo "Anzhal der Registrierten Geräte: $menge <br>";
echo "Verbräuche aller Geräte zusammen: ";
echo $summe["wertsumme"] ;
echo " Watt<br>";
echo "Durchschnitt: $durschnitt Watt";


?> 
 </body>
</html>
