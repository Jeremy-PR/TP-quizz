<?php

require_once '../../connect/connectDB.php';
require_once '../../utils/check-utilisateur.php';

try {

    $stmt = $pdo->query('SELECT * FROM quiz');
    $quizs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\PDOException $error) {
    throw $error;
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
    <a id=deconnexion href="../../process/clean-user-session.php">Déconnexion</a>

    <h1>
        < QUIZZ<span style="color: #9B5EBF;"> 404/> </span>
    </h1>
    <h2>Les bonnes réponses ne sont pas introuvables</h2>
    <h3>Voici les thèmes</h3>

    <section class="thème">

        <?php foreach ($quizs as $quiz) { ?>
            <div class="thèmeChoice">
                <img src="<?= $quiz['img_path'] ?>" alt="<?= $quiz['img_alt'] ?>">
                <!-- <a href="../Question/question.php">Commencer</a> -->
                 <form action="../../process/process-quiz-choice.php" method="post">
                    <input type="hidden" name="idQuiz" value="<?= $quiz['id'] ?>">
                    <input type="submit" value="Commencer" class="commencer">
                 </form>
            </div>
        <?php } ?>
    </section>
</body>

</html>