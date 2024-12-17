<?php
require_once '../connect/connectDB.php';
session_start();

// la je verif si le username existe
if (!isset($_POST['username']) || empty($_POST['username'])) {
    echo "Entrez un pseudo.";
    return;
}





$username = htmlspecialchars(trim($_POST['username'])); // la je trim pour enlever les espaces et les saut de ligne

try {

    $stmt = $pdo->prepare('SELECT * FROM user where username = :username');
    $stmt->execute([
        ':username' => $username
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if (!$user) {
        $sql = "INSERT INTO user (username) VALUES (:username)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        //la je stocker l'user dans la session
        $_SESSION['user']['id'] = $pdo->lastInsertId();
        $_SESSION['user']['username'] = $username;
    } else {
        $_SESSION['user'] = $user;
    }


    header("Location: ../front/Acceuil/accueil.php");
    exit;
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion : " . $e->getMessage();
}
