<?php 
$servername = "localhost";
$user = "root";
$pw = "";
$db_name = "whistleblower";

$con = new mysqli($servername, $user, $pw, $db_name);
$sql = "ALTER TABLE ulm AUTO_INCREMENT = 1";

if ($con->query($sql) !== TRUE) {
    echo "Fehler beim Zurücksetzen des AUTO_INCREMENT-Werts: " . $con->error;
}
if (!$con) {
    echo "Connection failed";
}


function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}
$pVorname = validate($_POST['Vorname']);
$pNachname = validate($_POST['Nachname']);
$pStraße = validate($_POST['Straße']);
$pPLZ = validate($_POST['PLZ']);
$pOrt = validate($_POST['Ort']);
$pEmail = validate($_POST['Email']);
$pTelefonnr = validate($_POST['Telefonnr']);
$pBeschreibung = mysqli_real_escape_string($con, $_POST['Beschreibung']);
$pcheckboxValue = isset($_POST['checkbox1']) ? 1 : 0;
$selectedOption = $_POST['verstoß'];

// Aktuelles Datum und Uhrzeit abrufen
$aktuellesDatum = date('Y-m-d H:i:s');

// Enddatum 30 Tage später berechnen
$endDatum = date('Y-m-d H:i:s', strtotime($aktuellesDatum . ' + 30 days'));


$sql2 = "UPDATE ulm SET Vorname= '$pVorname',Nachname='$pNachname',Straße = '$pStraße', Plz='$pPLZ', Ort='$pOrt', EMail='$pEmail', Telefonnr='$pTelefonnr', Verstoße='$selectedOption', Beschreibung='$pBeschreibung' ,EndDatum='$endDatum' , Datenschutz='$pcheckboxValue' WHERE Id = (SELECT MAX(ID) FROM ulm)";

if ($con->query($sql2) === TRUE) {
    

}      else {
    echo "Fehler beim Einfügen der Daten: " . $con->error;
}

 $con->close();



?>