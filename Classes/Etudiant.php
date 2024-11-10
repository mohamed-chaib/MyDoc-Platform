<?php
require_once "./Classes/Personne.php";
class Etudiant extends Personne{
    public function __construct($matricule,$password)
    {
        parent::__construct($matricule,$password);
    }
}
?>