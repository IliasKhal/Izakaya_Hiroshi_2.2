<?php

include "../includes/init.php";

if (!empty($_POST)) {
    $nom = $_POST["nom"];
    $ingrediants = $_POST["ingrediants"];
    $prix = $_POST["prix"];

    $sql = "
        INSERT INTO plats_principaux_vege
            (nom, ingrediants, prix)
        VALUES
            (:nom, :ingrediants, :prix)
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":nom" => $nom,
        ":ingrediants" => $ingrediants,
        ":prix" => $prix,
    ]);

    header("location: index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un plat</title>
</head>
<body>
    <p>
        <a href="index.php">Retour</a>
    </p>

    <h1>Ajouter</h1>

    <form action="" method="post">
        <p>Nom:</p>
        <input type="text" name="nom">

        <p>Ingrédiants:</p>
        <input type="text" name="ingrediants">

        <p>Prix:</p>
        <input type="text" name="prix">

        <p>
            <input type="submit" value="Ajouter">
        </p>
    </form>
</body>
</html>