<?php
// Verbindung zur Datenbank herstellen (ersetze die Platzhalter durch deine Daten)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// ID des Datensatzes mit den Audiodaten (ersetze 1 durch die tatsächliche ID)
$recordId = 5;

// SQL-Abfrage, um die Audiodaten abzurufen
$sql = "SELECT audio_data FROM audio_table WHERE id = $recordId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Datensatz gefunden, Audiodaten abrufen
    $row = $result->fetch_assoc();
    $audioData = $row['audio_data'];

    // Audiodaten in eine Datei schreiben
    $audioFilename = 'T:\2OG\Erkan\Audio\audiofile'.$recordId.'.mp3'; // Setze den gewünschten Dateinamen und Dateityp
    file_put_contents($audioFilename, $audioData);

    echo "Audiodatei erfolgreich erstellt: $audioFilename";
} else {
    echo "Datensatz nicht gefunden";
}

// Verbindung schließen
$conn->close();
?>