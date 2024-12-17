<?php

require_once '../../connect/connectDB.php';
require_once '../../utils/check-utilisateur.php';

try {

    $stmt = $pdo->query('SELECT * FROM quiz');
    $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\PDOException $error) {
    throw $error;
}

?>

<?php require_once '../components/header/header.php'; ?>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

<h1>Bienvenue <?= $username ?></h1>


<h1>
    < QUIZZ<span class="quiz404"> 404/> </span>
</h1>
<h2>Les bonnes réponses ne sont pas introuvables</h2>
<h3>Voici les thèmes</h3>

<section class="thème">

    <?php foreach ($quizzes as $quiz) { ?>
        <div class="thèmeChoice">
            <img id="cssImage" src="<?= $quiz['img_path'] ?>" alt="<?= $quiz['img_alt'] ?>">
            <!-- <a href="../Question/question.php">Commencer</a> -->
            <form action="../../process/process-quiz-choice.php" method="post">
                <input type="hidden" name="idQuiz" value="<?= $quiz['id'] ?>">
                <input type="submit" value="Commencer" class="commencer">
            </form>
        </div>

    <?php } ?>
</section>
<a id=deconnexion href="../../process/clean-user-session.php">Déconnexion</a>


<?php require_once '../components/footer/footer.php'; ?>