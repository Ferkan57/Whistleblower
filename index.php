<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langsames Verschwinden</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            margin: auto;
            transition: opacity 5s ease; /* 5s entspricht der Dauer der Animation */
        }
    </style>
</head>
<body>

    <img id="fadeOutImage" src="Logo.jpg" alt="Bildbeschreibung">

    <script>
        // Warte 1 Sekunde, bevor die Animation startet (kann angepasst werden)
        setTimeout(function(){
            document.getElementById("fadeOutImage").style.opacity = 0;
        }, 1000);
        setTimeout(function(){
            window.location.href = "auswahl.php"; // Ersetze "ziel_seite.html" durch die gewünschte URL
        }, 6000)
        
    </script>

</body>
</html>