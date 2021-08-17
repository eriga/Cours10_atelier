<?php
include("bdd.php");

$examen_id = $_GET["examen_id"];

$sql = "SELECT notes.*, etudiants.prenom, examens.note_maximale
        FROM notes
        INNER JOIN etudiants
            ON notes.etudiant_id = etudiants.id
        INNER JOIN examens
            ON notes.examen_id = examens.id
        WHERE examen_id = ".$examen_id."
        ";

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
    <h1>Liste des notes</h1>
</body>
</html>