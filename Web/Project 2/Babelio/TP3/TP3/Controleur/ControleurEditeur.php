<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Editeur.php';
require_once 'Modele/Livre.php';

class ControleurEditeur extends Controleur {

    private $editeur;
    private $livre;

    public function __construct() {
        $this->editeur = new Editeur();
        $this->livre = new Livre();
    }

// Affiche la liste de tous les editeurs du site
    public function index() {
        $editeurs = $this->editeur->getEditeurs();
        $this->requete->getSession()->setAttribut('erreur', false);
        $this->genererVue(['editeurs' => $editeurs]);
    }

    // Affiche les détails sur un éditeur
    public function lire() {
        $editeur_id = $this->requete->getParametreId("id");
        $editeur = $this->editeur->getEditeur($editeur_id);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $livres = $this->livre->getLivres($editeur_id);
        $this->genererVue(['editeur' => $editeur, 'livres' => $livres, 'erreur' => $erreur]);
    }

}
