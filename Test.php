<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audioaufnahme und Datenbank</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<button id="startAufnahme">Start Aufnahme</button>
<button id="stopAufnahme" disabled>Stop Aufnahme</button>

<audio id="audioPlayer" controls></audio>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const startAufnahmeButton = document.getElementById('startAufnahme');
    const stopAufnahmeButton = document.getElementById('stopAufnahme');
    const audioPlayer = document.getElementById('audioPlayer');

    let mediaRecorder;
    let audioChunks = [];

    navigator.mediaDevices.getUserMedia({ audio: true })
        .then(function (stream) {
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = function (event) {
                if (event.data.size > 0) {
                    audioChunks.push(event.data);
                }
            };

            mediaRecorder.onstop = function () {
                const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                const audioUrl = URL.createObjectURL(audioBlob);
                audioPlayer.src = audioUrl;

                // Daten an den Server senden
                $.ajax({
                    type: 'POST',
                    url: 'upload.php', // Ersetze 'upload.php' durch den tatsächlichen Dateinamen
                    data: audioBlob,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.error('Fehler beim Hochladen:', error);
                    }
                });
            };

            startAufnahmeButton.addEventListener('click', function () {
                mediaRecorder.start();
                startAufnahmeButton.disabled = true;
                stopAufnahmeButton.disabled = false;
            });

            stopAufnahmeButton.addEventListener('click', function () {
                mediaRecorder.stop();
                startAufnahmeButton.disabled = false;
                stopAufnahmeButton.disabled = true;
            });
        })
        .catch(function (error) {
            console.error('Error accessing microphone:', error);
        });
});
</script>
<form action="download.php" method="post">

    <button>Download</button>

</form>
</body>
</html>