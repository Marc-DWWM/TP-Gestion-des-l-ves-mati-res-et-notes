<?php 
if(isset($_POST['id_etudiant']) && isset($_POST['id_matiere']) && isset($_POST['valeurNote'])) {
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
    <title>Document</title>
</head>
<body>
    <form action="traitementNote.php" method="POST">
<div>
    <label for="id_etudiant">L'id de l'étudiant : </label>
    <input type="text" name="id_etudiant" id="id_etudiant">
    </div>
    <div>
        <label for="id_matiere">L'id de la matière : </label>
        <input type="text" name="id_matiere" id="id_matiere">
    </div>
    <div>
        <label for="valeurNote">La note de l'étudiant : </label>
        <input type="number" name="valeurNote" id="valeurNote">
    </div>
    <button type="submit">Entrez</button>
    </form>
</body>
</html>