<?php

include("../includes/init.php");
if (!isset($_SESSION["est_connecte"])){
    header("location: connexion.php");
}

if (!empty($_POST)) {
    $courriel = $_POST["courriel"];
    $mdp = $_POST["mdp"];
    $mdp_encrypte = password_hash($mdp , PASSWORD_DEFAULT);
    
    $sql = "
        INSERT INTO utilisateurs
            (courriel, mdp)
        VALUES
            (:courriel , :mdp)
    ";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":courriel" => $courriel,
        ":mdp" => $mdp_encrypte,
    ]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'Administrateur</title>
</head>
<body>
    <h1>Creation d'Administrateur</h1>
    
    <form action="creer-administrateur.php" method="post">
        <input name="courriel" type="text" placeholder="Courriel">
        <input name="mdp" type="password" placeholder="Mot de passe">
        <input type="submit" value="Créer">
    </form>
</body>
</html>