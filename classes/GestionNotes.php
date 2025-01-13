<?php
require_once __DIR__ . '/Personne.php';
require_once __DIR__ . '/Etudiant.php';
require_once __DIR__ . '/Matiere.php';
require_once __DIR__ . '/MatiereSur10.php';
require_once __DIR__ . '/MatiereSur20.php';
require_once __DIR__ . '/Note.php';
require_once __DIR__ . '/../includes/Database.php';




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

        $sql = "INSERT INTO matieres (nomMatiere, codeMatiere, bareme)
VALUES (:nomMatiere, :codeMatiere, :bareme)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nomMatiere' => $matiere->getNomMatiere(), ':codeMatiere' => $matiere->getCodeMatiere(), ':bareme' => $matiere->getBareme()]);
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
        $sql = "SELECT 
    etudiants.id AS idEtudiant,
    etudiants.nom AS nomEtudiant,
    etudiants.prenom AS prenomEtudiant,
    matieres.nomMatiere AS nomMatiere,
    notes.id AS idNote,
    notes.valeurNote AS valeurNote,
    moyenne.moyenneParMatiere
FROM 
    etudiants
LEFT JOIN 
    notes ON etudiants.id = notes.id_etudiant
LEFT JOIN 
    matieres ON notes.id_matiere = matieres.id
LEFT JOIN (
    SELECT 
        id_etudiant,
        id_matiere,
        AVG(valeurNote) AS moyenneParMatiere
    FROM 
        notes
    GROUP BY 
        id_etudiant, id_matiere
) AS moyenne ON notes.id_etudiant = moyenne.id_etudiant AND notes.id_matiere = moyenne.id_matiere
ORDER BY 
    etudiants.nom, etudiants.prenom, matieres.nomMatiere, notes.id;";

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
