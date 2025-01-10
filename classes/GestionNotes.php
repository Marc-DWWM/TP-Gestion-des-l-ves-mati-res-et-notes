<?php
include_once __DIR__ . '/Etudiant.php';
include_once __DIR__ . '/Matiere.php';
include_once __DIR__ . '/Note.php';
include_once __DIR__ . '/../includes/Database.php';




class GestionNote
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function ajouterEtudiant(Etudiant $etudiant)
    {

        $sql = "INSERT INTO etudiants (nom, prenom, matricule)
        VALUES (:nom, :prenom, :matricule)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nom' => $etudiant->getNom(), ':prenom' => $etudiant->getPrenom(), ':matricule' => $etudiant->getMatricule()]);
    }

    public function ajouterMatiere(Matiere $matiere)
    {

        $sql = "INSERT INTO matieres (nomMatiere, codeMatiere)
VALUES (:nomMatiere, :codeMatiere)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nomMatiere' => $matiere->getNomMatiere(), ':codeMatiere' => $matiere->getCodeMatiere()]);
    }

    public function attribuerNote(Note $note)
    {
        $sql = "INSERT INTO notes (id_etudiant, id_matiere, valeurNote)
VALUES (:id_etudiant, :id_matiere, :valeurNote)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_etudiant' => $note->getId_etudiant(), ':id_matiere' => $note->getId_matiere(), 'valeurNote' => $note->getValeurNote()]);
    }

    public function calculerMoyenneEtudiant()
    {
        $sql = "SELECT id_etudiant, AVG(valeurNote)
        FROM notes
        GROUP BY id_etudiant";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listerEtudiants()
    {
        $sql = "SELECT * FROM etudiants";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listerMatieres()
    {
        $sql = "SELECT * FROM matieres";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listerNotes()
    {
        $sql = "SELECT * FROM notes";

        $stmt = $this->pdo->query($sql);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
