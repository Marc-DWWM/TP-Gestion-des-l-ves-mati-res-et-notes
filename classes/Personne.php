<?php
class Personne
{

    protected $nom;
    protected $prenom;

    public function __construct($nom, $prenom)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
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
}
