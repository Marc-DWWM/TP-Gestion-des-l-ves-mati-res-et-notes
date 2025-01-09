<?php 
session_start();
if(empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <h1>Bienvenue sur la Page d'accueil</h1>
</header>
<nav>    
    <a href="ajoutEtudiant.php">ajoutEtudiant</a>
    <a href="ajoutMatiere.php">AjoutMatiere</a>
    <a href="attribuerNote.php">AjoutNote</a>
</nav>
<body>
<h2>étudiants :</h2>

</body>
</html>