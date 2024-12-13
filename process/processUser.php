<?php

require_once '../connect/connectDB.php';


$sql = "INSERT INTO user (username)
 VALUES (:username )";



header("Location: ../../front/Acceuil/acceuil.php");

