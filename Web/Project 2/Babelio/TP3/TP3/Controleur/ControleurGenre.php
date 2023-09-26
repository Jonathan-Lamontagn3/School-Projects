<?php

require_once 'Modele/Genre.php';

class ControleurGenre extends Controleur {

    private $genre;

    public function __construct() {
        $this->genre = new Genre();
    }

    // recherche et retourne les genres pour l'autocomplete
    public function index() {
        $term = $this->requete->getParametre('term');
        echo $this->genre->searchGenre($term);
    }

}