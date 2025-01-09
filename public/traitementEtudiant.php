<?php
include __DIR__  ."/../includes/database.php";

$pdo = Database::getConnection();

$nom = trim($_POST['nom'] ?? "");
$prenom = trim($_POST['prenom'] ?? "");
$matricule = trim($_POST['matricule'] ?? "");
// $etudiant = new Etudiant($nom, $prenom, $matricule);

$sql = "INSERT INTO etudiants (nom, prenom, matricule)
VALUES (:nom, :prenom, :matricule)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nom' => $nom, ':prenom' => $prenom, ':matricule' => $matricule]);
header("location: index.php");
exit();

?>