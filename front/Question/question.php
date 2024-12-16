<?php

require_once '../../utils/check-utilisateur.php';
require_once '../../connect/connectDB.php';

if (isset($_SESSION['quiz'])) {
    $quiz = $_SESSION['quiz']; 
    $quizId = $quiz['id'];  

    
    $sql = "SELECT question.id, question.intitule 
            FROM question 
            WHERE question.id_quiz = :quiz_id"; 

   
    try {
        $stmt = $pdo->prepare($sql);  
        $stmt->execute(['quiz_id' => $quizId]);  
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    } catch (PDOException $error) {
        echo "Problème pour récupérer les questions : " . $error->getMessage();  
        exit;
    }

// 2ème try catch pour gerer les réponses aux questions
$sqlReponse = "SELECT answer.reponse 
               FROM answer 
               WHERE answer.id_question = :question_id";

$reponses = []; // tableau pour stocker les réponses associées à chaque question

try {
    // la je fait un foreach pour recup toute les questions pour  recupe leur reponse
    foreach ($questions as $question) {
        $stmt = $pdo->prepare($sqlReponse);
        $stmt->execute(['question_id' => $question['id']]); // la j'execute avec l'id de la question

        // la je recup toutes les question qui vont avc les reponse et je les stock dans le tableau
        $reponses[$question['id']] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($reponses);
        // die(); 
    }
} catch (PDOException $error) {
    
    echo "Problème pour récupérer les réponses : " . $error->getMessage();
    exit;
}

} else {
   
    header("Location: ../../index.html");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link rel="stylesheet" href="../../css/question.css">

    
   

   
</head>
<body>
<main>
    <h1><?= $quiz['name'] ?></h1> 

    <?php $countQuestion = 1; ?> 

    <?php if (!empty($questions)): ?>  
        <?php foreach ($questions as $question): ?>  
            <section class="question">
                <h2>< QUESTION-<span style="color: #9B5EBF;"> <?= $countQuestion ?> /></span></h2>  
                <form action="" method="post">
                    <div class="btn-placement">
                        <div class="h3-placement">
                            <h3><?= $question['intitule'] ?></h3>  
                        </div>

                        <!-- la je verif si des reponse exist pour les question  et count compte le nombre de réponse dispo-->
                        <?php if (isset($reponses[$question['id']]) && count($reponses[$question['id']]) > 0): ?>
                            <?php foreach ($reponses[$question['id']] as $reponse): ?>  <!-- ce foreach sert afficher les repons de chaque question  -->
                                <button type="button"><?= $reponse['reponse'] ?></button>   <!-- un bouton par reponse   -->
                            <?php endforeach; ?> <!-- la je termine la boucle qui parcou toute les reponses-->
                        <?php else: ?>
                            <p>pas de rep</p>  
                        <?php endif; ?>

                        <button class="hover-green" id="btn-validez">Validez</button> 
                    </div>
                </form>
            </section>
            <?php $countQuestion += 1; ?>  
        <?php endforeach; ?> <!-- la je termine la boucle qui parcou toute les questions-->
    <?php else: ?>
        <p>pas de question </p>  
    <?php endif; ?> <!-- endif ferme le if elsze -->

    <input type="submit" class="btn-submit" value="Voir les résultats">  
</main>
</body>
</html>
