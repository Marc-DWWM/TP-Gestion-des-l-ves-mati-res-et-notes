<?php
session_start();
require_once __DIR__ . "/../classes/GestionNotes.php";

$pdo = Database::getConnection();

$id_etudiant = trim($_POST['id_etudiant'] ?? "");
$id_matiere = trim($_POST['id_matiere'] ?? "");
$valeurNote = trim($_POST['valeurNote'] ?? "");
$note = new Note($id_etudiant, $id_matiere, $valeurNote);
$gestion = new GestionNote();

$gestion->attribuerNote($note);

header("location: index.php");
exit();
