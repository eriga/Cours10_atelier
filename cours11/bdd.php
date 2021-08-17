<?php
$bdd = mysqli_connect("localhost", "root", "");

// Vérification de la connexion
if($bdd == false){
    echo "Erreur de connexion à la base de données.";
    exit();
}

// Sélection de la base de données
mysqli_select_db($bdd, "cours8_ecole");

?>