<?php
include("bdd.php");

$sql = "SELECT *
        FROM modules
        ";

$modules = mysqli_query($bdd, $sql);
$nb_modules = mysqli_num_rows($modules);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des modules</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Liste des modules</h1>
        <div class="liste">
        <?php
            for($i = 0; $i < $nb_modules; $i++){
                $module = mysqli_fetch_assoc($modules);
                ?>
                    <h2>Module #<?= $module["numero"]; ?></h2>
                <?php
                $sql_cours = "SELECT * 
                              FROM cours
                              WHERE module_id = " . $module["id"];

                $cours = mysqli_query($bdd, $sql_cours);
                $nb_cours = mysqli_num_rows($cours);

                for($j = 0; $j < $nb_cours; $j++){
                    $le_cours = mysqli_fetch_assoc($cours);
                    ?>
                        <div class="cours">
                            <a href="examens.php?id=<?= $le_cours["id"]; ?>">
                                <?= $le_cours["titre"]; ?>
                            </a>
                        </div>
                    <?php
                }
            }
        ?>
        </div>
    </div>
</body>
</html>