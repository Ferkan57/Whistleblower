<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<!-- HTML-Formular mit Dropdown-Liste -->
<form>
    <label for="filterAuswahl">Auswahl:</label>
    <select id="filterAuswahl">
        <option value=""></option>
    <option value="1">Hogaka Profi Ulm </option>
        <option value="2">Hogaka Profi Nürnberg </option>
        <option value="3">Gastromenü GmbH </option>
        <option value="4">Gastroevents GmbH </option>
        
        <!-- Weitere Optionen hier -->
    </select>
</form>

<!-- Container für die angezeigten Daten -->
<div id="ergebnisse"></div>
<script>
// jQuery für die Überwachung der Änderungen in der Dropdown-Liste
$(document).ready(function() {
    $('#filterAuswahl').change(function() {
        // Wert der Auswahl erhalten
        var selectedValue = $(this).val();

        // Ajax-Anfrage an PHP-Datei senden
        $.ajax({
            type: 'POST',
            url: 'filter.php',  // Ersetze 'filter.php' durch den tatsächlichen Dateinamen
            data: { filterWert: selectedValue },
            success: function(data) {
        // Daten in den Ergebniscontainer einfügen
        $('#ergebnisse').html(data);
        
        // Suchergebnis anzeigen (Anzahl der Datensätze)
        $('#anzahlErgebnisse').html(data);
    }
        });
    });
});
</script>

</body>
</html>