<?php
class MatiereSur20 extends Matiere
{
    public function __construct($nomMatiere, $codeMatiere) {
        parent::__construct($nomMatiere, $codeMatiere, 20);
    }

    public function validerNote($valeurNote):bool
    {
        if ($valeurNote >= 0 && $valeurNote <= 20) {
            return true;
        } else {
            return false;
        }
    }
}
