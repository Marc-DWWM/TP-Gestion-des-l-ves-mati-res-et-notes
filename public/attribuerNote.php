<?php
session_start();
if (isset($_POST['id_etudiant']) && isset($_POST['id_matiere']) && isset($_POST['valeurNote'])) {
    $id_etudiant = trim($_POST['id_etudiant'] ?? "");
    $id_matiere = trim($_POST['id_matiere'] ?? "");
    $valeurNote = trim($_POST['valeurNote'] ?? "");
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
        <h1 class="text-3xl font-bold flex items-center justify-center">Formulaire pour ajouter une note</h1>
    </header>

    <nav class="bg-red-800 text-white p-4 space-x-4 flex items-center justify-center">
        <a href="index.php" class="hover:underline">Revenir à la page de gestion</a>
    </nav>
    <main class="flex flex-col items-center mt-8">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Attribuer une note</h2>

        <form action="traitementNote.php" method="POST" class="bg-white p-12 flex flex-col items-center justify-center">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">

            <div class="mb-4">
                <label for="id_etudiant" class="block text-sm font-medium text-gray-700 underline text-center p-2">L'id de l'étudiant : </label>
                <input type="text" name="id_etudiant" id="id_etudiant" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="id_matiere" class="block text-sm font-medium text-gray-700 underline text-center p-2">L'id de la matière : </label>
                <input type="text" name="id_matiere" id="id_matiere" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="valeurNote" class="block text-sm font-medium text-gray-700 underline text-center p-2">La note de l'étudiant : </label>
                <input type="number" name="valeurNote" id="valeurNote" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-red-500 hover:bg-red-600 p-1 border rounded py-2 px-3">Entrez</button>
        </form>
    </main>
    <footer class="bg-red-800 flex items-center justify-center font-bold h-28 text-white">Site de Marc DWWM</footer>
</body>

</html>