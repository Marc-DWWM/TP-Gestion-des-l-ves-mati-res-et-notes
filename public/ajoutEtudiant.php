<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? "");
    $prenom = trim($_POST['prenom'] ?? "");
    $matricule = trim($_POST['matricule'] ?? "");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="class/traitementEtudiant.php" method="POST">
        <div>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="matricule">Matricule : </label>
            <input type="number" name="matricule" id="matricule">
        </div>
        <button type="submit">Entrez</button>
    </form>
</body>

</html>