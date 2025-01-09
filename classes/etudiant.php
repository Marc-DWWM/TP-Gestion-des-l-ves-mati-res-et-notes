<?php

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

        if (empty($matricule)) {
            throw new \Exception("Le matricule ne peut être vide !");
        }
        $this->matricule = $matricule;
    }
}
