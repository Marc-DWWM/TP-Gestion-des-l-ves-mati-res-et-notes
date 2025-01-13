<?php
session_start();

require_once __DIR__ . "/../classes/GestionNotes.php";

$pdo = Database::getConnection();

$nomMatiere = trim($_POST['nomMatiere'] ?? "");
$codeMatiere = trim($_POST['codeMatiere'] ?? "");
$bareme = intval($_POST['bareme'] ?? 20);
$gestion = new GestionNote();
$matiere;

if($bareme == 10){
    $matiere = new MatiereSur10($nomMatiere, $codeMatiere); 

}
else {
 $matiere = new MatiereSur20($nomMatiere, $codeMatiere);
}

$gestion->ajouterMatiere($matiere);

header("location: index.php");
exit();
