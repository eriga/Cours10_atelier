<?php
// Connexion à la MySQL
$bdd = mysqli_connect("localhost", "root", "");

// Vérification dans le cas d'erreur de connexion
if($bdd == false){
    echo "Une erreur est survenue. Réessayer plus tard.";
    exit();
}

// Sélection de la base de données "cours7_ecole"
mysqli_select_db($bdd, "cours7_ecole");

// Requête
$sql = "SELECT * FROM etudiants";

// Exécution de la requête et récupération des résultats
$resultats = mysqli_query($bdd, $sql);

// Vérification d'erreur lors de la requête
if(! $resultats){
    echo "Une erreur est survenue. Réessayer plus tard.";
    exit();
}

// Nombre de résultats reçus
$nb_resultats = mysqli_num_rows($resultats);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours 9</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
    if($nb_resultats > 0) {
        for($i = 0; $i < $nb_resultats; $i++){
            $entree = mysqli_fetch_assoc($resultats);
    ?> 
         
        <p>L'étudiant <?= $entree["prenom"] ?> a <?= $entree["age"] ?> ans.</p>

    <?php }

        // while($entree = mysqli_fetch_assoc($resultats)) {
        //     echo "<p>L'étudiant " . $entree["prenom"] . " a " .$entree["age"] . " ans." . "</p>";  
        // }
    }

    ?>
</body>
</html>