<?php
session_start();
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . "/../classes/GestionNotes.php";

$gestion = new GestionNote();



if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
}
// var_dump($gestion->calculerMoyenneEtudiant());
// var_dump($gestion->listerEtudiants());
// var_dump($gestion->listerMatieres());
// var_dump($gestion->listerNotes());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>Document</title>
</head>
<header class="bg-red-500 text-white p-4">
    <h1 class="text-3xl font-bold flex items-center justify-center">Bienvenue sur la page de gestion</h1>
</header>
<nav class="bg-red-800 text-white p-4 flex space-x-4 flex items-center justify-center">

    <a href="ajoutEtudiant.php" class="hover:underline">Ajouter un étudiant</a>
    <a href="ajoutMatiere.php" class="hover:underline">Ajouter une matière</a>
    <a href="attribuerNote.php" class="hover:underline">Ajouter une note</a>

</nav>

<body class="bg-gray-100 text-gray-800">
    <main class="p-4">
        <p class="text-lg flex items-center justify-center">Utilisez le menu pour gérer les étudiants, matières et notes.</p>
        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Etudiants</h2>
        <div class="flex space-x-4 flex items-center justify-center">
            <?php foreach ($gestion->listerEtudiants() as $gestions) :  ?>
                <p>Nom : <?= htmlspecialchars($gestions['nom'], ENT_QUOTES, 'UTF-8') ?>
                Prénom : <?= htmlspecialchars($gestions['prenom'], ENT_QUOTES, 'UTF-8') ?>
                Matricule : <?= htmlspecialchars($gestions['matricule'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>
        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Matières</h2>
        <div class="flex space-x-4 flex items-center justify-center">
            <?php foreach ($gestion->listerMatieres() as $gestions) :  ?>
                <p>Nom de la matière : <?= htmlspecialchars($gestions['nomMatiere'], ENT_QUOTES, 'UTF-8') ?>
                Code de la matière : <?= htmlspecialchars($gestions['codeMatiere'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>
        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Notes</h2>
        <div class="flex space-x-4 flex items-center justify-center">
            <?php foreach ($gestion->listerNotes() as $gestions) :  ?>
                <p>Id de l'étudiant : <?= htmlspecialchars($gestions['id_etudiant'], ENT_QUOTES, 'UTF-8') ?>
                Id de la matière : <?= htmlspecialchars($gestions['id_matiere'], ENT_QUOTES, 'UTF-8') ?>
                Note : <?= htmlspecialchars($gestions['valeurNote'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>
        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Moyenne notes étudiants</h2>
        <div class="flex space-x-4 flex items-center justify-center">
            <?php foreach ($gestion->calculerMoyenneEtudiant() as $gestions) :  ?>
                <p>Id de l'étudiant : <?= htmlspecialchars($gestions['id_etudiant'], ENT_QUOTES, 'UTF-8') ?>
                Moyenne de l'étudiant : <?= htmlspecialchars($gestions["AVG(valeurNote)"], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>