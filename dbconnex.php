<?php
function connexpdo($db)
{
    $sgbd = "mysql"; // choix de MySQL
    $host = "localhost";
    $charset = "UTF8";
    $user = "root"; // TODO : user id
    $pass = ""; // TODO : password
    try {
        $pdo = new PDO("$sgbd:host=$host;dbname=$db;charset=$charset", $user, $pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

function find_relation($organ, $pdo)
{
    $sql="SELECT relation FROM organs WHERE organ_name=? ";
    $st=$pdo->prepare($sql);
    $st->execute([$organ]);
    $rows=$st->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function display_list($rows)
{
    echo "<ul>";
    foreach($rows as $r)
    {
        echo "<li>".$r["relation"]."</li>";        
    }
    echo "</ul>";
}


function afficherPodcasts($pdo)
{

    // SELECT
    // Requête préparée pour sélectionner des données de la table utilisateurs
    $requete = $pdo->prepare("SELECT * FROM media WHERE type=\"podcast\"" );

    // Exécution de la requête
    $requete->execute();

   $result = $requete->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
function displayVideos($pdo)
{
    $requete = $pdo->prepare("SELECT * FROM media WHERE type=\"video\"" );

    // Exécution de la requête
    $requete->execute();

   $result = $requete->fetchAll(PDO::FETCH_ASSOC);
   return $result;
}
?>