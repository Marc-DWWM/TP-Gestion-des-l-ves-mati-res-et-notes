<?php 
session_start();
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . "/../classes/GestionNotes.php";

$gestion = new GestionNote(); 



if(empty($_SESSION['csrf_token'])) {
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
    <h2>Etudiants : </h2>
<?php foreach($gestion->listerEtudiants() as $gestions) :  ?>
    <p>Nom : <?= $gestions['nom'] ?></p>
    <p>Prénom : <?= $gestions['prenom'] ?></p>
    <p>Matricule : <?= $gestions['matricule'] ?></p>
    <?php endforeach; ?>
    <h2>Matières : </h2>
    <?php foreach($gestion->listerMatieres() as $gestions) :  ?>
    <p>Nom de la matière : <?= $gestions['nomMatiere'] ?></p>
    <p>Code de la matière : <?= $gestions['codeMatiere'] ?></p>
    <?php endforeach; ?>
    <h2>Notes : </h2>
    <?php foreach($gestion->listerNotes() as $gestions) :  ?>
    <p>Id de l'étudiant : <?= $gestions['id_etudiant'] ?></p>
    <p>Id de la matière : <?= $gestions['id_matiere'] ?></p>
    <p>Note : <?= $gestions['valeurNote'] ?></p>
    <?php endforeach; ?>
    <h2>Moyenne notes étudiants : </h2>
    <?php foreach($gestion->calculerMoyenneEtudiant() as $gestions) :  ?>
    <p>Id de l'étudiant : <?= $gestions['id_etudiant'] ?></p>

    <p>Moyenne de l'étudiant : <?= $gestions["AVG(valeurNote)"] ?></p>
    <?php endforeach; ?>

</body>
</html>