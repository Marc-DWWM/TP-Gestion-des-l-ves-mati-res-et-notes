<?php 
include __DIR__  ."/../includes/database.php";

$pdo = Database::getConnection();

$id_etudiant = trim($_POST['id_etudiant'] ?? "");
$id_matiere = trim($_POST['id_matiere'] ?? "");
$valeurNote = trim($_POST['valeurNote'] ?? "");

$sql = "INSERT INTO notes (id_etudiant, id_matiere, valeurNote)
VALUES (:id_etudiant, :id_matiere, :valeurNote)";

$stmt = $pdo->prepare($sql);
$stmt->execute([':id_etudiant' => $id_etudiant, ':id_matiere' => $id_matiere, 'valeurNote' => $valeurNote]);

header("location: index.php");
exit();
?>