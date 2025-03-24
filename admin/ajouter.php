<?php

include "../includes/init.php";

if (!empty($_POST)) {
    $nom = $_POST["nom"];
    $ingrediants = $_POST["ingrediants"];
    $prix = $_POST["prix"];
    $id_sortes = $_POST["id_sortes"];

    $sql = "
        INSERT INTO plats
            (nom, ingrediants, prix, :id_sortes)
        VALUES
            (:nom, :ingrediants, :prix , :id_sortes)
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":nom" => $nom,
        ":ingrediants" => $ingrediants,
        ":prix" => $prix,
        ":id_sortes" => $id_sortes
    ]);

    header("location: index_plats.php");

}
   $sortes = selectAll("sortes","id, nom");
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
        <a href="index_plats.php">Retour</a>
    </p>

    <h1>Ajouter</h1>

    <form action="" method="post">
        <p>Nom:</p>
        <input type="text" name="nom">

        <p>Ingrédiants:</p>
        <input type="text" name="ingrediants">

        <p>Prix:</p>
        <input type="text" name="prix">
        <div>
            <select name="id_sortes" >
                <?php foreach ($sortes as $sorte):?>
                    <option value="<?= $sorte["id"]?>"><?=$sorte["nom"]?></option>
                <?php endforeach ?>
            </select>
        </div>

        <p>
            <input type="submit" value="Ajouter">
        </p>
    </form>
</body>
</html>