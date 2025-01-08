<?php

class Note
{
    private $id_etudiant;
    private $id_matiere;
    private $valeurNote;

    public function __construct($id_etudiant, $id_matiere, $valeurNote)
    {
        $this->setId_etudiant($id_etudiant);
        $this->setId_matiere($id_matiere);
        $this->setValeurNote($valeurNote);
    }

    public function getId_etudiant($id_etudiant)
    {

        return $this->id_etudiant;
    }

    public function setId_etudiant($id_etudiant)
    {
        if ($id_etudiant < 1 || $id_etudiant > 500) {
            throw new \Exception("L'id étudiant ne peut être vide !");
        }

        $this->id_etudiant = $id_etudiant;
    }

    public function getId_matiere($id_matiere)
    {
        return $this->$id_matiere;
    }

    public function setId_matiere($id_matiere)
    {
        if ($id_matiere < 1 || $id_matiere > 20) {
            throw new \Exception("L'id de la matière ne peut être vide !");
        }
        $this->id_matiere = $id_matiere;
    }

    public function getValeurNote($valeurNote)
    {

        return $this->valeurNote;
    }

    public function setValeurNote($valeurNote)
    {

        if ($valeurNote < 1 || $valeurNote > 20) {
            throw new \Exception("La valeur de la note ne peut être vide !");
        }
        $this->valeurNote = $valeurNote;
    }
}
?>