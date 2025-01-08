<?php
require_once 'includes/database.php';

$nom = trim($_POST['nom'] ?? "");
$prenom = trim($_POST['prenom'] ?? "");
$matricule = trim($_POST['matricule'] ?? "");

class Etudiant
{
    private $nom;
    private $prenom;
    private $matricule;

    public function __construct($nom, $prenom, $matricule)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMatricule($matricule);
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        if (empty($nom)) {
            throw new \Exception("Le nom ne peut pas être vide !");
        }
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if (empty($prenom)) {
            throw new \Exception("Le prénom ne peut pas être vide !");
        }
        $this->prenom = $prenom;
    }

    public function getMatricule()
    {

        return $this->matricule;
    }

    public function setMatricule($matricule)
    {

        if ($matricule < 1 || $matricule > 500) {
            throw new \Exception("Le matricule doit être un nombre entre 1 et 500 !");
        }
        $this->matricule = $matricule;
    }

    public function Enregistrement($pdo)
    {
        $sql = "INSERT INTO etudiants (nom, prenom, matricule)
    VALUES (:nom, :prenom, :matricule)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([':nom' => $this->nom, ':prenom' => $this->prenom, ':matricule' => $this->matricule]);
        header("location: ajoutMatiere.php");
        exit();
    }
}
?>