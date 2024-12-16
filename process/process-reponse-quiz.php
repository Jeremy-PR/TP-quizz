
<?php 
require_once '../connect/connectDB.php';


$sql = "SELECT answer.is_correct FROM answer WHERE answer.id_question =  :question_id";


try {
    $stmt = $pdo->prepare($sql);
    $users = $stmt->execute([
        ':reponse' => $_POST["reponse"],
        ':question_id' => $_POST["question_id"]
        
    ]); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat




} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header("Location: ../front/Resultat/resultat.php");
exit;


?>
