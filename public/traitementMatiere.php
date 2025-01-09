<?php 
include __DIR__  ."/../includes/database.php";

$pdo = Database::getConnection();

$nomMatiere = trim($_POST['nomMatiere'] ?? "");
$codeMatiere = trim($_POST['codeMatiere'] ?? "");

$sql = "INSERT INTO matieres (nomMatiere, codeMatiere)
VALUES (:nomMatiere, :codeMatiere)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nomMatiere' => $nomMatiere, ':codeMatiere' => $codeMatiere]);

header("location: index.php");
exit();
?>