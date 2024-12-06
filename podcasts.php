<html>
<head>
<title>
podcasts
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/wavesurfer.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="styles/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src='js/toggle2.js' defer></script>
</head>
<?php
require_once "navbar.php";
?>
<body>
    <div class="verticallines">
        <div class="vert" id="vert1"></div>
        <div class="vert" id="vert2"></div>
        <div class="vert" id="vert3"></div>
        <div class="vert" id="vert4"></div>
        <div class="vert" id="vert5"></div>
        <div class="vert" id="vert6"></div>
        <div class="vert" id="vert7"></div>
        <div class="vert" id="vert8"></div>
        <div class="vert" id="vert9"></div>
        <div class="vert" id="vert10"></div>
        <div class="vert" id="vert11"></div>
        <div class="vert" id="vert12"></div>
        <div class="vert" id="vert13"></div>
        <div class="vert" id="vert14"></div>
        <div class="vert" id="vert15"></div>
    </div>
<div class="podcasts">
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "dbconnex.php";

$pdo = connexpdo("competition");
$records=afficherPodcasts($pdo);

foreach($records as $rec)
{
    $id=$rec["id"];
    $path=$rec["path"];
    echo "<p id=\"title$id\" class=\"title_pod\">".$rec["title"]."</p>";
    echo "<div id=\"mus$id\" class=\"music-player\">";
    
    echo "<div class=\"info\"";
    echo "<div class='waveforms' id='waveform$id'></div>";
    echo "<div class=\"control-bar\">";
    echo " <img src=\"./images/play.png\" alt=\"play\" id=\"playBtn\" title=\"Play / Pause\">";
    echo " <img src=\"./images/stop.png\" alt=\"stop\" id=\"stopBtn\" title=\"Stop\">";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<script>
    var wavesurfer=WaveSurfer.create({
    container:'#waveform$id',
    wavecolor:'#000839',
    progressColor:'#48beff'
    });
    wavesurfer.load('$path');
   
      playBtn.onclick = function(){
            wavesurfer.playPause();
            if(playBtn.src.match(\"play\")){
                playBtn.src  = \"images/pause.png\";
            }
            else{
                playBtn.src = \"images/play.png\"
            }
        }
        
        stopBtn.onclick = function(){
            wavesurfer.stop();
            playBtn.src = \"images/play.png\"
        }
    </script>";
}
?>
<script src="js/refresh.js" defer></script>
</body>
</html>