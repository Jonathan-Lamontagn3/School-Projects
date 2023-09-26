<?php

require_once 'Modele/Livre.php';
require_once 'Framework/Controleur.php';

class ControleurLivre extends Controleur {

    private $livre;

    public function __construct() {
        $this->livre = new Livre();
    }

    // Afficher tous les livres
    public function index() {
        $livres = $this->livre->getLivres();
        $this->genererVue(['livres' => $livres]);
    }

    // Ajoute un livre à un éditeur
    public function ajouter() {
        $erreur = false;
        if (!$this->requete->existeParametre('courriels_auteur')) {
            $erreur['courriel'] = true;
        } else {
            $livre['courriels_auteur'] = $this->requete->getParametre('courriels_auteur');
            $validation_courriel = filter_var($livre['courriels_auteur'], FILTER_VALIDATE_EMAIL);
            if (!$validation_courriel) {
                $erreur['courriel'] = true;
            }
        }

        if (!$this->requete->existeParametre('nb_pages')) {
            $erreur['nb_pages'] = true;
        } else {
            $livre['nb_pages'] = $this->requete->getParametre('nb_pages');
            $validation_nb_pages = filter_var($livre['nb_pages'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 99999)));
            if (!$validation_nb_pages) {
                $erreur['nb_pages'] = true;
            }
        }

        $livre['editeur_id'] = $this->requete->getParametreId('editeur_id');

        if ($erreur == false) {
            $livre['titre'] = $this->requete->getParametre('titre');
            $livre['rating'] = $this->requete->getParametre('rating');
            $livre['resumer'] = $this->requete->getParametre('resumer');
            $livre['date_edition'] = $this->requete->getParametre('date_edition');
            $livre['genre'] = $this->requete->getParametre('genre');
            $livre['image'] = $this->requete->getParametre('image');

            $this->livre->setLivre($livre);
            $this->requete->getSession()->setAttribut('erreur', false);
        } else {
            $this->requete->getSession()->setAttribut('erreur', $erreur);
        }

        //Recharger la page pour mettre à jour la liste des livres associés ou afficher une erreur
        $this->rediriger('Editeur', 'lire/' . $livre['editeur_id']);
    }

}
