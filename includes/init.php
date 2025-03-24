<?php

session_start();

date_default_timezone_set("America/Toronto");

include "bdd.php";

/**
 * Sélectionne toutes les entrées
 */
function selectAll($nom_table, $colonnes = "*") {
    global $bdd;

    $sql = "
        SELECT $colonnes
        FROM $nom_table
    ";
    
    $stmt = $bdd->prepare($sql);
    $stmt->execute([]);
    return $stmt->fetchAll();
}

function selectParId($nom_table, $id, $colonnes = "*") {
    global $bdd;
    
    $sql = "
        SELECT $colonnes
        FROM $nom_table
        WHERE id = :id
    ";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);
    return $stmt->fetch();
}

function selectCount($nom_table) {
    global $bdd;

    $stmt = $bdd->prepare("
        SELECT 
            COUNT(*) as qty
        FROM $nom_table
    ");
    $stmt->execute();
    $resultat = $stmt->fetch();
    return $resultat["qty"];
}