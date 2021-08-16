<?php
include("bdd.php");

$cours_id = $_GET["id"];

$sql = "SELECT *
        FROM examens
        WHERE cours_id = " . $cours_id . "
        ";

$examens = mysqli_query($bdd, $sql);
$nb_examens = mysqli_num_rows($examens);

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
    <h1>Liste d'examens</h1>
    <?php
        for($i = 0; $i < $nb_examens; $i++){
            $un_examen = mysqli_fetch_assoc($examens);           
    ?>
            <div>
                <a href="#"><?php echo $un_examen["titre"]; ?></a>
            </div>
    <?php
        }
    ?>
</body>
</html>