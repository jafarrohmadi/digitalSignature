<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="csrf-token" content="SyAtyZ8DI2D63Rw1N55uXRbbKp2udKF6Oa9DxbBk">
    <meta name="theme-color" content="#005ba1">
    <title>AyooHRIS v3</title>
    <style>
        #githubLink {
            position: absolute;
            right: 0;
            top: 12px;
            color: #2D99FF;
        }

        h1 {
            margin: 10px 0;
            font-size: 40px;
        }

        #loadingMessage {
            text-align: center;
            background-color: #eee;
        }

        #canvas {
            width: 100%;
        }

        #output {
            margin-top: 20px;
            background: #eee;
            padding-bottom: 0;
        }

        #output div {
            padding-bottom: 10px;
            word-wrap: break-word;
        }

        #noQRFound {
            text-align: center;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://ayoohris.id/main/js/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="https://ayoohris.id/main/js/loadingoverlay/loadingoverlay_progress.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

</head>
<body>

<div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
<canvas id="canvas" hidden></canvas>
<div id="output" hidden style="display: none">
    <div id="outputMessage">No QR code detected.</div>
    <div hidden><b>Data:</b> <span id="outputData"></span></div>
</div>

<script src="https://ayoohris.id/main/js/jsqr/jsQR.js"></script>
<script>
    $('#mk_debug').html('zzzzzz');

    var scanned = 0;
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");

    function drawLine(begin, end, color) {
        canvas.beginPath();
        canvas.moveTo(begin.x, begin.y);
        canvas.lineTo(end.x, end.y);
        canvas.lineWidth = 4;
        canvas.strokeStyle = color;
        canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({
        audio: false,
        video: {
            facingMode: {ideal: 'environment'}
        }
    }).then(function (stream) {
        video.srcObject = stream;
        video.setAttribute("playsinline", true);
        video.play();
        requestAnimationFrame(tick);
    });

    function tick() {
        loadingMessage.innerText = "⌛ Loading video..."
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            loadingMessage.hidden = true;
            canvasElement.hidden = false;
            outputContainer.hidden = false;

            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
            var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
            var code = jsQR(imageData.data, imageData.width, imageData.height, {
                inversionAttempts: "dontInvert",
            });

            if (code) {
                drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                outputMessage.hidden = true;
                outputData.parentElement.hidden = false;
                outputData.innerText = code.data;

                $('#mk_debug').html('code:' + code.data);

                if (0 == scanned) {
                    $('#mk_debug').html('code123:' + code.data);
                    $("body").LoadingOverlay("show");
                    var qrtext = atob(code.data);
                    if (!qrtext) {
                        window.location.replace("https://ayoohris.id/main/scan-failed");
                    }
                    console.log('qrtext: ' + qrtext);


                    $('#mk_debug').html('qrtext:' + qrtext);

                    var pars = JSON.parse(qrtext);

                    console.log('pars: ' + pars);
                    console.log('pars.module: ' + pars.module);
                    console.log('pars.code: ' + pars.code);

                    if (pars.code) {
                        var linkz = "{{ url('digitalsignature') }}?redirect=" + pars.link + '&user=' + pars.code + '&module=' + pars.module;
                        window.location.replace(linkz);
                    } else {
                        window.location.replace("https://ayoohris.id/main/scan-failed");
                    }

                    scanned = 1;
                }

            } else {
                outputMessage.hidden = false;
                outputData.parentElement.hidden = true;
            }
        }
        requestAnimationFrame(tick);
    }
</script>
</body>
</html>
