<?php
include("bdd.php");

/* Si le paramètre GET["examen_id"] n'existe pas
*  on redirige automatiquement vers index.php
*/
if(isset($_GET["examen_id"]) == false){
    header("location:index.php");
    exit();
}

$examen_id = $_GET["examen_id"];

$sql = "SELECT notes.*, etudiants.prenom, examens.note_maximale
        FROM notes
        INNER JOIN etudiants
            ON notes.etudiant_id = etudiants.id
        INNER JOIN examens
            ON notes.examen_id = examens.id
        WHERE examen_id = ".$examen_id."
        ";

$notes = mysqli_query($bdd, $sql);
$nb_notes = mysqli_num_rows($notes);

// Deuxième requête pour obtenir l'id du cours
$sql_examen = "SELECT cours_id
               FROM examens
               WHERE id = " . $examen_id
               ;
$cours = mysqli_query($bdd, $sql_examen);
$le_cours = mysqli_fetch_assoc($cours);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des notes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <p>
            <a href="examens.php?id=<?= $le_cours["cours_id"]?>">⇐ Liste d'examens</a>
        </p>
        <h1>Liste des notes</h1>
        <div class="liste">
            <?php
                for($i = 0; $i < $nb_notes; $i++){
                    $une_note = mysqli_fetch_assoc($notes);
                   
            ?>
                <div class="cours">
                   <?= $une_note["prenom"]; ?> -
                   <?= $une_note["note"]; ?>/<?= $une_note["note_maximale"];?> 
                   (<?= round($une_note["note"]/$une_note["note_maximale"] * 100); ?>%)

                </div>

            <?php
                }
            ?>            
        </div>
    </div>
</body>
</html>