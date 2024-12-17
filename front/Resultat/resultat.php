<?php

require_once '../../connect/connectDB.php';
require_once '../../utils/check-utilisateur.php';

// $sql = "SELECT * FROM `résultat` ";

// try {
//     $stmt = $pdo->query($sql);
//     $scores = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat
    // var_dump($scores);
    // die();


// } catch (PDOException $error) {
//     echo "Erreur lors de la requête : " . $error->getMessage();
// }

?>



<?php require_once '../components/header/header.php'; ?>
<link rel="stylesheet" href="../../assets/css/resultat.css">
</head>

<body>



    <section class="resultat">



        <h1>Bien jouer vous avez <?= $_SESSION['score'] ?> /3 </h1>



        <a href="../Acceuil/accueil.php">Retournez au menu d'accueil</a>
    </section>




    <?php require_once '../components/footer/footer.php'; ?>