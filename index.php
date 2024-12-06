<html>
<head>
<title>
homepage
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="styles/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
require_once "dbconnex.php";
require_once "navbar.php";
?>
<body>
<div class="corps">
    
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$pdo=connexpdo("competition");
?>

<div class="container">
    <h1>Environnement est <span class="auto-type">en danger</span></h1>

</div> <!-- end of container-->
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed=new Typed(".auto-type",{strings:["en Danger!!", "un corps humain"],
        typeSpeed:150,
        backSpeed:150,
        loop:true
    });

</script>
<img class="image"  src="images/pixelcut-export.jpeg" width="100%" height="50%">
<div class="description">
    <p>
    L'Océan et le corps humain partagent des similarités fascinantes dans leur fonctionnement et dysfonctionnement.
En faisant des parallèles entre ces deux systèmes (corps humain et Océan), nous pourrons encore mieux illustrer
et comprendre l'importance cruciale de préserver l’Océan, garant de la vie sur terre
    </p>
</div> <!---end of description -->
<div class="catch" id="main">
    <button id="catch">catch me if u can !</button>
    <p id="distance"> <span ></span>  </p>
</div>
<div class="body_parts">
    <div class="body_parts_title">
        <h3>relations des parties du corps avec l'ocean</h3>
    </div>
    <button class="trick">Discover !!</button>
    <audio id="audio_trick" src="media/evil_laugh.mp3" 
    type="audio/mpeg" style="display: none;"></audio>

    <div class="three_cards">
        <div class="first">
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">poumons</h5>
    <p class="card-text"><?php 
        $rows2=find_relation("poumons", $pdo);
        display_list($rows2);
    ?></p>
    <a href="human_anatomy.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div> <!-- end of first      -->
        <div class="second">
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Coeur</h5>
    <p class="card-text">
      <?php
    $rows2=find_relation("Coeur", $pdo);
    display_list($rows2);
    ?>  
    </p>
    <a href="human_anatomy.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div> <!-- end of second-->
        <div class="third">
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">
    <?php
    $rows2=find_relation("Cerveau", $pdo);
    display_list($rows2);
    ?>  
    </p>
    <a href="human_anatomy.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div> <!-- end of third-->
      
    </div> <!-- end of three cards-->
    
</div> <!--end of body parts-->

<div class="body-anatomy">
   <h3> <a href="human_anatomy.php">Cliquer pour voir l'anatomie de l'être humain et la relation avec l'ocean</a></h3>
</div> <!--end of body anatomy-->
<div class="about_us">
<h3>Concernant le site:</h3><br>
une application web éducative et interactive qui
représente les parallèles entre les systèmes humains et
les systèmes océaniques.
Elle permet à l'utilisateur d'explorer les differentes partis de l'être humain et la relation avec l'ocean
</div>
</div> <!-- end of corps class -->


<script src="js/js.js" defer></script>
</body>
</html>