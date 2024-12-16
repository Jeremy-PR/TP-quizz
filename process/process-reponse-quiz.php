<?php 
require_once '../connect/connectDB.php';

$score = 0;

foreach($_POST as $index => $givenAnswer){

    if($givenAnswer === "1"){
        $score++;
    }
    
}

session_start();

$_SESSION['givenAnswers'] = $_POST;
$_SESSION['score'] = $score;


try {
    $stmt = $pdo->prepare("INSERT INTO résultat(score, id_user, id_quiz) VALUES (:score, :id_user, :id_quiz)");
    $stmt->execute([
        ':score' => $score,
        ':id_user' => $_SESSION['user']['id'],
        ':id_quiz' => $_SESSION['quiz']['id'],
    ]);
} catch (\PDOException $error) {
    throw $error;
}


// Redirection
header("Location: ../front/Resultat/resultat.php");
exit;
?>
