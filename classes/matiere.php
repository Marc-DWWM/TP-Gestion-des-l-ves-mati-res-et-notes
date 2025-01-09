<?php
class Matiere
{
    private $nomMatiere;
    private $codeMatiere;

    public function __construct($nomMatiere, $codeMatiere)
    {

        $this->setNomMatiere($nomMatiere);
        $this->setCodeMatiere($codeMatiere);
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

    public function getCodeMatiere() {
        return $this->codeMatiere;
    }

    public function setCodeMatiere($codeMatiere) {

        if(empty($codeMatiere)) {
            throw new \Exception("Le code de la matière ne peut être vide !");
        }
        $this->codeMatiere = $codeMatiere;
    }
}
?>