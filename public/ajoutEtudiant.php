<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['matricule'])) {
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
    <link rel="stylesheet" href="css/styles.css">

    <title>Document</title>
</head>
<header class="bg-red-500 text-white p-4">
    <h1 class="text-3xl font-bold flex items-center justify-center">Formulaire pour ajouter un élèves</h1>
</header>
<nav class="bg-red-800 text-white p-4 flex space-x-4 flex items-center justify-center">
    <a href="index.php" class="hover:underline">Revenir à la page de gestion</a>
</nav>

<body class="bg-gray-200 text-gray-800">
    <form action="traitementEtudiant.php" method="POST" class="flex">
        <input type="hidden" name="csrf_token"
            value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
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
            <input type="text" name="matricule" id="matricule">
        </div>
        <button type="submit">Entrez</button>
    </form>
</body>

</html>