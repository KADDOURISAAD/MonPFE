<?php
// get_groups.php

// Inclure la configuration de la base de données
include('config/dbcon.php');

// Récupérer le champ sélectionné depuis la requête GET
$field = $_GET['field'];

// Échapper les entrées pour éviter les injections SQL (assurez-vous de nettoyer vos données d'entrée en production)
$field = mysqli_real_escape_string($con, $field);

// Requête pour récupérer les groupes correspondant au champ sélectionné
$group_query = "SELECT name FROM groups WHERE field = '$field'";
$group_query_run = mysqli_query($con, $group_query);

// Vérifier si la requête a réussi
if ($group_query_run) {
    $groups = array();
    // Parcourir les résultats et stocker les noms de groupe dans un tableau
    while ($group_row = mysqli_fetch_assoc($group_query_run)) {
        $groups[] = $group_row['name'];
    }
    // Renvoyer les groupes au format JSON
    echo json_encode($groups);
} else {
    // Renvoyer une réponse d'erreur en cas d'échec de la requête
    echo json_encode(array('error' => 'Unable to fetch groups'));
}
?>
