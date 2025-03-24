<?php

include "../includes/init.php";


if (empty($_POST)) {
    //affichage du form
    $id = $_GET["id"];
    
    $sql = "
        SELECT *
        FROM plats
        WHERE id = :id
    ";
    
    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);
    $plat = $stmt->fetch();
    $sortes = selectAll("sortes","id, nom");

}else{
    // //traitement du form
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $ingrediants = $_POST["ingrediants"];
    $prix = $_POST["prix"];
    $id_sortes = $_POST["id_sortes"];
    

    $sql = "
        UPDATE plats
        SET
            nom = :nom,
            ingrediants = :ingrediants,
            prix = :prix
            id_sortes= :id_sortes
        WHERE id = :id
    ";  
    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
        ":nom" => $nom,
        ":ingrediants" => $ingrediants,
        ":prix" => $prix,
        ":id_sortes" => $id_sortes,
    ]);
    
    header("location: index_plats.php");

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
        <div>
            <select name="id_sortes" >
                <?php foreach ($sortes as $sorte):?>
                    <option value="<?= $sorte["id"]?>"><?=$sorte["nom"]?></option>
                <?php endforeach ?>
            </select>
        </div>
        <p>
            <input type="submit" value="Modifier">
        </p>
    </form>
</body>
</html>