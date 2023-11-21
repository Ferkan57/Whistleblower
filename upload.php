<?php
// Stelle eine Verbindung zur Datenbank her (ersetze die Platzhalter durch deine Daten)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audio";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "ALTER TABLE audio_table AUTO_INCREMENT = 1";
if ($conn->query($sql) !== TRUE) {
    echo "Fehler beim Zurücksetzen des AUTO_INCREMENT-Werts: " . $con->error;
}
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Verarbeite die empfangenen Audiodaten
$audioData = file_get_contents("php://input");

// Füge die Audiodaten in die Datenbank ein
$stmt = $conn->prepare("INSERT INTO audio_table (audio_data) VALUES (?)");
$stmt->bind_param("s", $audioData);
$stmt->execute();
$stmt->close();

// Schließe die Verbindung zur Datenbank
$conn->close();

echo "Audiodaten erfolgreich in die Datenbank eingefügt.";
?>