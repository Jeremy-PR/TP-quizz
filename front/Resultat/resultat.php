<?php 

require_once '../../connect/connectDB.php';
require_once '../../utils/check-utilisateur.php';

// session_start();
// var_dump($_SESSION);

$sql = "SELECT * FROM `résultat` ";

try {
    $stmt = $pdo->query($sql);
    $scores = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat
    // var_dump($scores);
    // die();
    

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat</title>
    <link rel="stylesheet" href="../../css/resultat.css">
</head>
<body>




<section class="resultat">


<?php foreach($scores as $score): ?>   
    <h1>Bien jouer vous avez <?= $score['score'] ?> /3 </h1>
<?php endforeach; ?>

    <a href="../Acceuil/accueil.php">Retournez au menu d'accueil</a>
</section>





</body>
</html>