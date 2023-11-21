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

$auswahl = $_GET['Auswahl'];
$sql2 = "INSERT INTO ulm (auswahl_id) VALUES ('$auswahl')";

if ($con->query($sql2) === TRUE) {
    

}      else {
    echo "Fehler beim Einfügen der Daten: " . $con->error;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HelloWorld</title>
</head>
<body>

    <div class="container">

        <div class="wrapper">
            <!--Überschrift-->
            <h2>Einen Verstoß melden</h2>

            <!--Mündlicher Link-->
            <div class="toplinks">
                <a href="#" class="">Hilfe</a> 
                <a href="Test.php" class="">Mündlich melden</a> 
            </div>
        
        </div>
        <form action="speichern.php" method="post">
        <!--Verstoß-->
        <div class="teil1">
            <label class="" for="key">Verstoß*</label>
            <select class="" name="verstoß" class="verstoßliste" id="verstoß" >
                <option value="-"> </option>
                <option value="Hello World">Hello World</option>
                <option value="Rote Winterschuhe">Rote Winterschuhe</option>
                <option value="Neues iPhone">Neues iPhone</option>
                <option value="Big Bang">Big Bang</option>
                <option value="Altes Fahrrad">Altes Fahrrad</option>
            </select>

            <!-- Beschreibung -->
            <label class="" for="message">Beschreibung :</label>
            <textarea class="" name="Beschreibung" id="message" rows="5" cols="50" placeholder="Bitte geben Sie Ihre Beschreibung an" required></textarea>

        </div>


        <div class="teil2">
            <!--Anrede-->
            <label class="" for="key">Anrede*</label>
            <select class="" name="anrede" class="anredeliste" id="anrede" aria-placeholder="hallo" required>
                <option class="" value="-"> </option>
                <option class="" value="Herr">Herr</option>
                <option class="" value="Frau">Frau</option>
                <option class="" value="Divers">Divers</option>
            </select>

            <!-- Vorname und Nachname -->
            <label class="" for="key">Vorname*</label>
            <input class="" name="Vorname" type="text" id="vorname" value="" placeholder="Vorname" size="50" required>
            <label class="" for="key">Nachname*</label>
            <input class="" name="Nachname" type="text" id="vorname" value="" placeholder="Vorname" size="50" required>

        </div>

        <div class="dropdown">
            <!-- Nicht sichtbar erst nach button klick sichtbar oder nicht mehr sichtbar ()-->
            <button class="more" id="" onclick="">Mehr...</button>
            <label class="" for="key">Straße</label>
            <input class="" name="Straße" type="text" id="strasse" value="" placeholder="Straße" size="50">
            <label class="" for="key">Postleihzahl</label>
            <input class="" name="PLZ" type="text" id="plz" value="" placeholder="Vorname" size="50">
            <label class="" for="key">Ort</label>
            <input class="" name="Ort" type="text" id="plz" value="" placeholder="Vorname" size="50">
        

        </div>
        


        
        <div>
            <!--  -->  
            <label class="" for="key">E-Mail*</label>
            <input class="" name="Email" type="email" id="vorname" value="" placeholder="Vorname" size="50" required>
            <label class="" for="key">Telefon*</label>
            <input class="" name="Telefonnr" type="tel" id="vorname" value="" placeholder="Vorname" size="50" required>
        </div>

        <div>
            <!-- -->
            <input class="" id="agbs" name="checkbox1" type="checkbox" required> Datenschutzbestimmungen akzeptieren*
            <div class="buttons">
                <button type="submit" name="send" id="enc-btn">Einreichen</button>
                <button class="" id="dec-btn">???</button>
            </div>
            </form>
            <!-- -->
            <input type="file">
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

        </div>

        
    </div>

    <script src="script.js"></script>
    
</body>
</html>