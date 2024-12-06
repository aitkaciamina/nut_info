<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="quiz.css">

    <title>QCM CYBER</title>
</head>
<body>
    <a href="index.php">retourner à la page d'accueil</a>
    <h1>QCM SENSIBILISATION CYBER :</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

    

    <?php
         error_reporting(E_ALL);

        //  require_once("../BD/BD.php");
        require_once("dbconnex.php");

    
         $pdo = connexpdo("competition");
         
         function afficherQuestions($pdo)
         {
     
             // SELECT
             // Requête préparée pour sélectionner des données de la table utilisateurs
             $requete = $pdo->prepare("SELECT * FROM QCM");
     
             // Exécution de la requête
             $requete->execute();
             $idQuestion = 1;
             while ($result = $requete->fetch(PDO::FETCH_ASSOC))
             {
                 echo "<h2>$idQuestion) $result[question]</h2>";
                 $reponses = $result['réponses'];
                 $tab_reponses = explode(',',$reponses);
                
                //echo $tab_reponses[0];
                foreach ( $tab_reponses as $r)
                {
                    echo "<div>";
                        //echo $r;
                        echo "<input id='question$result[id_question]' type='radio' name='question$result[id_question]' value=\"$r\">";
                        echo "<label for='question$result[id_question]'>$r</label>";
                        echo "</br>";

                    echo "</div>";

 
                }
                $idQuestion++;
     
             }
             echo "</br>";
             echo "</br>";

             echo "<input type='submit' name='valider' value='Valider'>";
         }

         afficherQuestions($pdo);

         
        // Gestion du Valider : vérification des réponses :
        
        
        if (isset($_POST["valider"])) // : name du 
        //sumbit
        {    
             
            $id =1;
            $correct = true;
            $pasRepondu = false;

            $requete = $pdo->prepare("SELECT COUNT(*) FROM QCM");

            // Exécution de la requête
            $requete->execute();
            
            // Récupération des résultats
            $nombresQuestions = $requete->fetch();
            $nombresQuestions = $nombresQuestions[0];
            //echo $nombresQuestions; 
            
            while ($correct and !$pasRepondu and $id < $nombresQuestions)
            {
                
                 $question = "question$id";
                
                 if (!empty($_POST[$question]))
                 {
                    $requete = $pdo->prepare("SELECT * FROM QCM WHERE id_question = :id");

                    // Liaison du paramètre avec la valeur
                    $requete->bindParam(':id', $id, PDO::PARAM_INT);
                    
                    // Exécution de la requête
                    $requete->execute();
                    
                    // Récupération des résultats
                    $result = $requete->fetch(PDO::FETCH_ASSOC);

                    if($_POST[$question] == $result["bonne_réponse"])
                        ++$id;
                    else
                    {
                        // echo "réponse $_POST[$question]";
                        // echo "bonne réponse $result[bonne_réponse]";

                        // echo "a";
                        $correct = false;
                    }
                    // if ($correct)
                    // echo "correct !";
                    // else
                    //     echo "erreur1";
                }
                else
                    $pasRepondu = true;

                // if ($correct)
                //     echo "correct !";
                // else
                //     echo "erreur2";
            }

            // if ($correct)
            //     echo "correct !";
            // else
            //     echo "erreur";

            if ($pasRepondu)
            {
                echo "Question n°$id non traitée !";
                echo "<script>alert('Question n°$id non traitée !')</script>";
            
            }
            else
            {
                echo "Votre score : $id / $nombresQuestions";
                echo "<script>alert('Votre score : $id / $nombresQuestions')</script>";
            }
        }
        ?>

</form>
    
</body>
</html>