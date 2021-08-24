<?php
include("bdd.php");

/* Si le paramètre GET["id"] n'existe pas
*  on redirige automatiquement vers index.php
*/
if(isset($_GET["id"]) == false){
    header("location:index.php");
    exit();
}

// Récupération du paramètre GET
$cours_id = $_GET["id"];

$sql = "SELECT *
        FROM examens
        WHERE cours_id = " . $cours_id . "
        ";

$examens = mysqli_query($bdd, $sql);
$nb_examens = mysqli_num_rows($examens);

// Deuxième requête pour obtenir le titre du cours de l'examen
$sql_cours = "SELECT titre FROM cours WHERE id = " . $cours_id;
$cours = mysqli_query($bdd, $sql_cours);
$le_cours = mysqli_fetch_assoc($cours);
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
        <p>
            <a href="index.php">⇐ Liste de cours</a>
        </p>
        <h1>Liste d'examens pour <?= $le_cours["titre"]; ?></h1>
        <div class="liste">
        <?php
            for($i = 0; $i < $nb_examens; $i++){
                $un_examen = mysqli_fetch_assoc($examens);           
        ?>
                <div class="cours">
                    <a href="notes.php?examen_id=<?= $un_examen["id"] ?>"><?php echo $un_examen["titre"]; ?></a>
                </div>
        <?php
            }
        ?>
        </div>
    </div>
</body>
</html>