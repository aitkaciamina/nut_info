<html>
<head>
<title>
videos
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link
  href="https://unpkg.com/video.js@7/dist/video-js.min.css"
  rel="stylesheet"
/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="styles/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src='js/toggle.js' defer></script>
</head>
<?php
require_once "navbar.php";
require_once "dbconnex.php";

?>
<body>
<div class="corps">
    
<?php 
$pdo = connexpdo("competition");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$videos=displayVideos($pdo);
foreach($videos as $v)
{
    $path=$v["path"];
    $title=$v["title"];
    echo "<h3 class=\"video_title\">$title</h3> <br>";
    echo "<video class=\"my-video video-js\" data-setup=\"{}\" controls >
    <source src=\"$path\" type=\"video/mp4\"> </video>";
}
?>
<script src="js/refresh.js"></script>
</body>
</html>