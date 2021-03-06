<?php
include("bdd.php");

// Requête
$sql = "SELECT * 
        FROM cours 
        ORDER BY titre ASC
        ";

// Exécution
$cours = mysqli_query($bdd, $sql);
// Nombre de résultats
$nb_cours = mysqli_num_rows($cours);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours 10 - atelier</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Liste de cours</h1>
        <div class="liste">
            <?php
                for($i = 0; $i < $nb_cours; $i++){
                    $un_cours = mysqli_fetch_assoc($cours);           
            ?>
                    <div class="cours">
                        <a href="examens.php?id=<?= $un_cours["id"]; ?>">
                            <?= $un_cours["titre"]; ?>
                        </a>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>