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

<body class="bg-gray-200 text-gray-800">

    <main class="p-4">

        <p class="text-lg flex items-center justify-center">Utilisez le menu pour gérer les étudiants, matières et notes.</p>

        <h2 class="text-2xl font-bold mt-6 flex aligns-center justify-center underline">Etudiants</h2>

        <div class="space-x-4 columns-3 p-5 max-w-full overflow-hidden text-center">
            <?php foreach ($gestion->listerEtudiants() as $gestions) :  ?>
                <p class="p-1"><span class="font-bold underline">Nom</span> <?= htmlspecialchars($gestions['nom'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="p-1"><span class="font-bold underline">Prénom</span> <?= htmlspecialchars($gestions['prenom'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="p-1"><span class="font-bold underline">Matricule</span> <?= htmlspecialchars($gestions['matricule'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>

        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Matières</h2>

        <div class="columns-3 p-5 text-center space-x-4  max-w-full overflow-hidden">
            <?php foreach ($gestion->listerMatieres() as $gestions) :  ?>
                <p class="text-center p-1"><span class="font-bold underline">Nom matière</span> <?= htmlspecialchars($gestions['nomMatiere'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="text-center p-1"> <span class="font-bold underline">Code matière</span> <?= htmlspecialchars($gestions['codeMatiere'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>

        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Notes</h2>

        <div class="space-x-4 p-5 columns-3 max-w-full overflow-hidden">
            <?php foreach ($gestion->listerNotes() as $gestions) :  ?>
                <p class="text-center p-1"><span class="font-bold underline">Id étudiant</span> <?= htmlspecialchars($gestions['id_etudiant'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="text-center p-1"><span class="font-bold underline">Id matière</span> <?= htmlspecialchars($gestions['id_matiere'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="text-center p-1"><span class="font-bold underline">Note</span> <?= htmlspecialchars($gestions['valeurNote'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>

        <h2 class="text-2xl font-bold mt-6 flex items-center justify-center underline">Moyenne notes étudiants</h2>

        <div class="space-x-4 columns-3 p-5 max-w-full overflow-hidden">
            <?php foreach ($gestion->calculerMoyenneEtudiant() as $gestions) :  ?>
                <p class="text-center p-1"><span class="font-bold underline">Id étudiant</span> <?= htmlspecialchars($gestions['id_etudiant'], ENT_QUOTES, 'UTF-8') ?>
                    <span class="font-bold underline">Moyenne</span> <?= htmlspecialchars($gestions["AVG(valeurNote)"], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endforeach; ?>
        </div>

    </main>

</body>

</html>