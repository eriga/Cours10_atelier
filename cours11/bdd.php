<?php
$bdd = mysqli_connect("localhost", "root", "");

if($bdd == false){
    echo "Erreur de connexion à la base de données.";
    exit();
}

mysqli_select_db($bdd, "cours8_ecole");

?>