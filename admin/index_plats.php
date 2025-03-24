<?php

include "../includes/init.php";

if (!empty($_GET["supprimer"])) {
    $sql = "
        DELETE FROM plats_principaux_vege
        WHERE id = :id
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $_GET["supprimer"],
    ]);

    header("location: index_plats.php");
}


$sql = "
    SELECT 
        id, 
        nom, 
        ingrediants,
        prix
    FROM plats_principaux_vege
    ORDER BY nom
";

$stmt = $bdd->prepare($sql);
$stmt->execute();
$plats = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone admin</title>
</head>
<body>
    <a href="index.php">retour</a>
    <div>
        <h1>Zone admin</h1>
        <p class="bouton_ajout">
            <a href="ajouter.php" >Ajouter un plat</a>
        </p>
    </div>

    <h2>Liste des plats</h2>
    <div class="plats">
        <?php foreach ($plats as $plat): ?>
        <div class="plat">
           <ul>
               <li>
                   <p class="id">(<?= $plat["id"] ?>)</p>
                    <h3><?= $plat["nom"] ?></h3>
                    <p><?= $plat["ingrediants"] ?></p>
                    <p><?= $plat["prix"] ?></p>
                    <div class=bouton>
                        <a href="modifier.php?id=<?= $plat['id'] ?>">Modifier</a>
                        <a href="index_plats.php?supprimer=<?= $plat['id'] ?>">Supprimer</a>
                    </div>
               </li>
           </ul>
        </div>
        <?php endforeach ?>
    </div>


</body>
</html>