<?php
require_once '../connect/connectDB.php';
session_start(); 

// la je verif si le username existe
if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username = htmlspecialchars(trim($_POST['username'])); // la je trim pour enlever les espaces et les saut de ligne

    try {
       
        $sql = "INSERT INTO user (username) VALUES (:username)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        //la je stocker l'user dans la session
        $_SESSION['username'] = $username;

     
        header("Location: ../front/Acceuil/accueil.php");
        exit;

    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
    }
} else {
    echo "Entrez un pseudo.";
}
?>
