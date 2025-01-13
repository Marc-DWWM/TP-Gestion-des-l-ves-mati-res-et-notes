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
    <link rel="stylesheet" href="./css/styles.css">

    <title>Document</title>
</head>

<body class="bg-gray-200 text-gray-800">

    <header class="bg-red-600 text-white p-4">
        <h1 class="text-3xl font-bold flex items-center justify-center">Formulaire pour ajouter un élève</h1>
    </header>

    <nav class="bg-red-800 text-white p-4 space-x-4 flex items-center justify-center">
        <a href="index.php" class="hover:underline">Revenir à la page de gestion</a>
    </nav>

    <main class="flex flex-col items-center mt-8">

        <h2 class="text-2xl font-bold text-gray-700 mb-6">Ajouter Nouvelle élève</h2>

        <form action="traitementEtudiant.php" method="POST" class="bg-white p-12 flex flex-col items-center justify-center">

            <input type="hidden" name="csrf_token"
                value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700 underline text-center p-2">Nom : </label>
                <input type="text" name="nom" id="nom" placeholder="Entrez nom" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-sm font-medium text-gray-700 underline text-center p-2">Prénom : </label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez prénom" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="matricule" class="block text-sm font-medium text-gray-700 underline text-center p-2">Matricule : </label>
                <input type="text" name="matricule" id="matricule" placeholder="Entrez matricule" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 p-1 border rounded py-2 px-3">Entrez</button>
        </form>
    </main>
    <footer class="bg-red-800 flex items-center justify-center font-bold h-28 text-white">Site de Marc DWWM</footer>
</body>

</html>