<?php

    include "../includes/init.php";
    if (!isset($_SESSION["est_connecte"])){
        header("location: connexion.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index_plats.php">plats</a>
    <a href="index_employe.php">employés</a>
    <a href="deconnexion.php">Deconnexion lol</a>
</body>
</html>