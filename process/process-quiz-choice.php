<?php 



// traitement de formulaire

if(!isset($_POST['idQuiz'])){
    header("Location: ../front/Acceuil/accueil.php");
    exit;
}

if(empty($_POST['idQuiz'])){
    header("Location: ../front/Acceuil/accueil.php");
    exit;
}

$idQuiz = htmlspecialchars(trim($_POST['idQuiz']));

include_once '../connect/connectDB.php';

try {
    
    $stmt = $pdo->prepare("SELECT * FROM quiz WHERE id = :id");
    $stmt->execute([
        ':id' => $idQuiz
    ]);

    $quiz = $stmt->fetch(PDO::FETCH_ASSOC);

    session_start();

    $_SESSION['quiz'] = $quiz;

} catch (\PDOException $error) {
    throw $error;
}

header("Location: ../front/Question/question.php");
exit;