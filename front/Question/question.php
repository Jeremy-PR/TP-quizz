<?php
require_once '../../utils/check-utilisateur.php';
require_once '../../connect/connectDB.php';

// var_dump($_SESSION);
// die();


if (isset($_SESSION['quiz'])) {
    $quiz = $_SESSION['quiz']; 
    $quizId = $quiz['id']; 
  

    $sql = "SELECT 
                question.id, 
                question.intitule 
            FROM question 
            JOIN quiz ON question.id_quiz = quiz.id 
            WHERE quiz.id = :quiz_id";

    try {
        $stmt = $pdo->prepare($sql); 
        $stmt->execute(['quiz_id' => $quizId]); 
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        
        // var_dump($questions);
        // die();
    } catch (PDOException $error) {
        echo "Erreur lors de la requête : " . $error->getMessage();
    }




 
}

 else {
  
    header("Location: ../../index.html");
    exit();
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
<?php $countQuestion = 1; ?>

<main>
<h1><?= $quiz['name'] ?></h1>
<?php foreach($questions as $question){ 
    ?>
    

<section class="question">
    <h2> < QUESTION-<span style="color: #9B5EBF;"> <?= $countQuestion?>/> </span> </h2>
    
    
    <form action="" method="">
    <div class="btn-placement">
      
        <div class="h3-placement">
         
            <h3><?= $question['intitule'] ?></h3>
           
        </div>
         <?php if(isset($questions)): ?>
        <button>super héros</button>
        <button>super héros</button>
        <button class="hover-green">Validez</button>
        <?php else: ?>  <!-- si la condit exste pas il ce passe sa  -->
    <p>Aucun patient trouvé avec cet ID.</p>
<?php endif; ?>
    </div>
    </form>
   
</section>

<?php 
$countQuestion +=1;
} ?>





<input type="submit" class="btn-submit" value="Voir les résultats">

</main>

</body>
</html>
