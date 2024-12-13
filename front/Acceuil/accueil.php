<?php
session_start(); 
require_once '../../connect/connectDB.php';

// sa c'est pour verif si l'user est connecté via la session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
   
} else {
   
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
   
    <h1>Bienvenue <?= $username ?></h1>

    <h1> < QUIZZ<span style="color: #9B5EBF;"> 404/> </span> </h1>
    <h2>Les bonnes réponses ne sont pas introuvables</h2>
    <h3>Voici les thèmes</h3>

    <section class="thème">
        <div class="thèmeChoice">
            <img src="../../img/image de super héros.jpg" alt="Photo de tous les super-héros">  
            <a href="../Question/question.php">Commencer</a>
        </div>

        <div class="thèmeChoice">
            <img src="../../img/dev web.jpg" alt="photo d'un ordinateur">
            <a href="../Question/question.php">Commencer</a>
        </div>
    </section>
</body>
</html>
