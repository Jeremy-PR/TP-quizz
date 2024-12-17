<?php

session_start();

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    header('Location: ./front/Acceuil/accueil.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

    <main>
        <h1>
            < QUIZZ<span style="color: #9B5EBF;"> 404/> </span>
        </h1>
        <img src="./assets/img/image-fond1.jpg" alt="photo principal" width="600px">
        <form action="./process/processUser.php" method="post">
            <div id="accueil">
                <h2>Connectez vous à votre compte</h2>
                <input type="text" name="username" id="pseudo" placeholder="Pseudonyme">

                <input id="inputJouer" type="submit" value="JOUER">

            </div>
        </form>
    </main>
</body>

</html>