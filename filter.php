<?php
session_start();
$servername = "localhost";
$user = "root";
$pw = "";
$db_name = "whistleblower";
$newStartDate = date('Y-m-d H:i:s');

$con = new mysqli($servername, $user, $pw, $db_name);

if ($con->connect_error) {

    die("Verbindung fehlgeschlagen: " . $con->connect_error);
}
$sql = "UPDATE ulm SET StartDatum = '$newStartDate'";
if ($con->query($sql) === TRUE) {

} else {
    echo "Fehler beim Datumsupdate: " . $con->error;
}
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

$wahl=$_POST['filterWert'];
// SQL-Statement zum Abrufen von Start- und Enddatum sowie der Differenz
$sql = "SELECT  *, DATEDIFF(EndDatum, StartDatum) AS differenz_in_tagen FROM ulm Where auswahl_id = $wahl";

$result = $con->query($sql);
$numFilteredRows = $result->num_rows;

// Überprüfen, ob das Abrufen erfolgreich war
if ($numFilteredRows > 0) {
    // Daten aus der Datenbank ausgeben
    while ($row = $result->fetch_assoc()) {
        if($row['differenz_in_tagen']<=10){
            echo "<div class='fast'>Vorname: " . $row['Vorname'] ."Nachname: ".$row['Nachname']." Verstoße: ".$row['Verstoße']." ". $row["differenz_in_tagen"] . "</div>";
        }else{
    
        echo "<div class='zeit'>Vorname: " . $row['Vorname'] ." "."Nachname: ".$row['Nachname']." Verstoße: ".$row['Verstoße']."  ". $row["differenz_in_tagen"] . " Tage bis zum Antworten</div>";
        }
    }
} else {
    echo "Keine Daten gefunden";
}
$_SESSION['Anzahl']=$numFilteredRows ;
$con->close();

?>