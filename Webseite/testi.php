<?php

//Variablen zuweisen
$Textfeld1 =    $_POST["Textfeld1"];
$Auswahlfeld1 = $_POST["Auswahlfeld1"];
$Auswahlfeld2 = $_POST["Auswahlfeld2"];
$auf          = $_POST["auf"];
 



//Verbindung herstellen
$datenbank = mysql_connect("localhost", "root", "") or die("Verbindung fehlgeschlagen: " . mysql_error());
$verbunden = mysql_select_db("test") or die("Datenbank nicht gefunden oder fehlerhaft");
if ($verbunden) {
    echo 'Verbindung erfolgreich: ';
} else {
    die('keine Verbindung mÃ¶glich: ' . mysqli_error());
}
//
//Daten in DB speichern
//$sql_befehl = mysql_query("INSERT INTO gereataufnehmen (name,Ort,typ) VALUES ('$Textfeld1','$Auswahlfeld1','$Auswahlfeld2')");
// Daten abfragen 


//

if ($sql_befehl) {
    echo "Ihr Eintrag wurde hinzugefügt.";
}
$sql = "SELECT *FROM gereataufnehmen ;";
 

//echo '<table border="1">';
while($row = mysql_fetch_assoc($result)){

      echo $row['name'];
      echo $row['Ort'];
      echo $row['typ'];
}


//Verbindung beenden
//Verbindung beenden
//mysql_close($datenbank)

//echo "</table>";
?>



