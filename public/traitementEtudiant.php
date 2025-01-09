<?php
session_start();
require_once __DIR__ . "/../classes/GestionNotes.php";

$nom = trim($_POST['nom'] ?? "");
$prenom = trim($_POST['prenom'] ?? "");
$matricule = trim($_POST['matricule'] ?? "");
$etudiant = new Etudiant($nom, $prenom, $matricule);
$gestion = new GestionNote();

$gestion->ajouterEtudiant($etudiant);
header("location: index.php");
exit();
