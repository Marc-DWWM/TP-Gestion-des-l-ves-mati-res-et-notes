<?php

class Etudiant extends Personne
{
    private $matricule;

    public function __construct($nom, $prenom, $matricule)
    {
        parent::__construct($nom, $prenom);
        $this->setMatricule($matricule);
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
