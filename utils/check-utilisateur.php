<?php
session_start();
// sa c'est pour verif si l'user est connecté via la session
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
   
} else {
   
    header("Location: http://localhost/Vanilla-TP-Quizz/index.php");
    exit;
}
?>