<?php
session_start();

require_once __DIR__ . "/../classes/GestionNotes.php";

$pdo = Database::getConnection();

$nomMatiere = trim($_POST['nomMatiere'] ?? "");
$codeMatiere = trim($_POST['codeMatiere'] ?? "");
$matiere = new Matiere($nomMatiere, $codeMatiere);
$gestion = new GestionNote();

$gestion->ajouterMatiere($matiere);

header("location: index.php");
exit();
