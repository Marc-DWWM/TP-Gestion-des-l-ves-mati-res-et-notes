<?php
class MatiereSur10 extends Matiere
{

    public function __construct($nomMatiere, $codeMatiere)
    {
        parent::__construct($nomMatiere, $codeMatiere, 10);
    }
    public function validerNote($valeurNote): bool
    {
        if ($valeurNote >= 0 && $valeurNote <= 10) {
            return true;
        } else {
            return false;
        }
    }
}
