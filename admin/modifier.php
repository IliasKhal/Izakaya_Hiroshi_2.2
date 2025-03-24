<?php

include "../includes/init.php";


if (empty($_POST)) {
    //affichage du form
    $id = $_GET["id"];
    
    $sql = "
        SELECT *
        FROM plats_principaux_vege
        WHERE id = :id
    ";
    
    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);
    $plat = $stmt->fetch();


}else{
    // //traitement du form
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $ingrediants = $_POST["ingrediants"];
    $prix = $_POST["prix"];
    

    $sql = "
        UPDATE plats_principaux_vege
        SET
            nom = :nom,
            ingrediants = :ingrediants,
            prix = :prix
        WHERE id = :id
    ";  
    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
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
    <title>Modifier un plat</title>
</head>
<body>
    <p>
        <a href="index.php">Retour</a>
    </p>

    <h1>Modifier</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $plat["id"] ?>">

        <p>Nom:</p>
        <input type="text" name="nom" value="<?= $plat["nom"] ?>">

        <p>Ingrediants:</p>
        <input type="text" name="ingrediants"  value="<?= $plat["ingrediants"] ?>">

        <p>Prix:</p>
        <input type="text" name="prix"  value="<?= $plat["prix"] ?>">

        <p>
            <input type="submit" value="Modifier">
        </p>
    </form>
</body>
</html>