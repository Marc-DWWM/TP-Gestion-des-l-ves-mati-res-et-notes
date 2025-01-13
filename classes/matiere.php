<?php
abstract class Matiere
{
    protected $nomMatiere;
    protected $codeMatiere;
    protected $bareme;
    public function __construct($nomMatiere, $codeMatiere, $bareme)
    {

        $this->setNomMatiere($nomMatiere);
        $this->setCodeMatiere($codeMatiere);
        $this->bareme = $bareme;
    }

    public function getNomMatiere()
    {

        return $this->nomMatiere;
    }

    public function setNomMatiere($nomMatiere)
    {

        if (empty($nomMatiere)) {

            throw new \Exception("Le nom de la matière ne peut être vide !");
        }
        $this->nomMatiere = $nomMatiere;
    }

    public function getCodeMatiere()
    {
        return $this->codeMatiere;
    }

    public function setCodeMatiere($codeMatiere)
    {

        if (empty($codeMatiere)) {
            throw new \Exception("Le code de la matière ne peut être vide !");
        }
        $this->codeMatiere = $codeMatiere;
    }

    public function getBareme() {
        return $this->bareme;
    }

    abstract function validerNote($valeurNote):bool;


}
