<?php
require_once '../../utils/check-utilisateur.php';

// var_dump($_SESSION);
// die();


if (isset($_SESSION['quiz'])){
    $quiz = $_SESSION['quiz'];
} else {
  
    header("Location: ../../index.html");
    exit();
}

 



 


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link rel="stylesheet" href="../../css/question.css">
 <script src="../../JS/question.js"></script>
    
   

   
</head>
<body>

<main>

<section class="question">
    <h2> < QUESTION-<span style="color: #9B5EBF;"> 1/> </span> </h2>
    
    
    <form action="" method="">
    <div class="btn-placement">
        <div class="h3-placement">
            <h3>Ici on pose la question ?</h3>
        </div>

        <button>Super héros</button>
        <button>Super héros</button>
        <button class="hover-green">Validez</button>
    </div>
    </form>
   
</section>

<section class="question">
    <h2> < QUESTION-<span style="color: #9B5EBF;"> 2/> </span> </h2>
    
    <form action="" method="">
    <div class="btn-placement">
        <div class="h3-placement">
            <h3>Ici on pose la question ?</h3>
        </div>

        <button>Super héros</button>
        <button>Super héros</button>
        <button class="hover-green">Validez</button>
    </div>
    </form>
</section>

<section class="question">
    <h2> < QUESTION-<span style="color: #9B5EBF;"> 3/> </span> </h2>
    
    <form action="" method="">
    <div class="btn-placement">
        <div class="h3-placement">
            <h3>Ici on pose la question ?</h3>
        </div>

        <button>Super héros</button>
        <button>Super héros</button>
        <button class="hover-green">Validez</button>
    </div>
    </form>
</section>


<input type="submit" class="btn-submit" value="Voir les résultats">

</main>

</body>
</html>
