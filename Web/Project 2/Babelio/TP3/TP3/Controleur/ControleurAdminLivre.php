<?php

require_once 'Modele/Livre.php';
require_once 'Modele/Editeur.php';
require_once 'Controleur/ControleurAdmin.php';

class ControleurAdminLivre extends ControleurAdmin {

    private $livre;
    private $editeur;

    public function __construct() {
        $this->livre = new Livre();
        $this->editeur = new Editeur();
    }

    // Afficher tous les livres
    public function index() {
        $livres = $this->livre->getLivres();
        $this->genererVue(['livres' => $livres]);
    }

    // Confirmer la suppression d'un livre
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le livre à l'aide du modèle
        $livre = $this->livre->getLivre($id);
        $this->genererVue(['livre' => $livre]);
    }

    // Supprimer un livre
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le livre afin d'obtenir le id de l'editeur associé
        $livre = $this->livre->getLivre($id);
        // Verifier si l'utilisateur en session est l'administrateur de l'éditeur
        $sess_util_id = $this->requete->getSession()->getAttribut('utilisateur')['id'];
        $editeur_util_id = $this->editeur->getEditeur($livre['editeur_id'])['utilisateur_id'];
        // Supprimer le commentaire à l'aide du modèle
        if ($sess_util_id == $editeur_util_id) {
            $this->livre->eraseLivre($id);
        } else {
            $this->requete->getSession()->setAttribut('message',
                    'Seule l\'administrateur de l\'éditeur peut effacer un livre');
        }

        //Recharger la page pour mettre à jour la liste des livres associés
        $this->rediriger('AdminEditeur', 'lire/' . $livre['editeur_id']);
    }

    // Rétablir un livre
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commentaire afin d'obtenir le id de l'éditeur associé
        $livre = $this->livre->getLivre($id);
        // Verifier si l'utilisateur en session est l'administrateur de l'éditeur
        $sess_util_id = $this->requete->getSession()->getAttribut('utilisateur')['id'];
        $editeur_util_id = $this->editeur->getEditeur($livre['editeur_id'])['utilisateur_id'];
        // Restorer le livre à l'aide du modèle
        if ($sess_util_id == $editeur_util_id) {
            $this->livre->restoreLivre($id);
        } else {
            $this->requete->getSession()->setAttribut('message',
                    'Seule l\'administrateur de l\'éditeur peut restorer un livre');
        }
        //Recharger la page pour mettre à jour la liste des livres associés
        $this->rediriger('AdminEditeur', 'lire/' . $livre['editeur_id']);
    }

    public function modifier() {
        // Lire le livre à l'aide du modèle
        $id = $this->requete->getParametreId('id');
        $livre = $this->livre->getLivre($id);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $this->genererVue(['livre' => $livre, 'erreur' => $erreur]);
    }

    // Modifie un livre
    function update() {
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
        $livre['id'] = $this->requete->getParametreId('id');

        if ($erreur == false) {

            $livre['titre'] = $this->requete->getParametre('titre');
            $livre['rating'] = $this->requete->getParametre('rating');
            $livre['resumer'] = $this->requete->getParametre('resumer');
            $livre['date_edition'] = $this->requete->getParametre('date_edition');
            $livre['genre'] = $this->requete->getParametre('genre');
            $livre['image'] = $this->requete->getParametre('image');

            $sess_util_id = $this->requete->getSession()->getAttribut('utilisateur')['id'];
            $editeur_util_id = $this->editeur->getEditeur($livre['editeur_id'])['utilisateur_id'];

            if ($sess_util_id == $editeur_util_id) {
                $this->livre->updateLivre($livre);
            } else {
                $this->requete->getSession()->setAttribut('message',
                        'Seule l\'administrateur de l\'éditeur peut modifier les informations de ce livre');
            }
            
            $this->requete->getSession()->setAttribut('erreur', false);

            //Recharger la page pour mettre à jour la liste des livres associés ou afficher une erreur
            $this->rediriger('AdminEditeur', 'lire/' . $livre['editeur_id']);
        } else {
            $this->requete->getSession()->setAttribut('erreur', $erreur);
            $this->rediriger('AdminLivre', 'modifier/' . $livre['id']);
        }
    }

    function annuler() {
        $this->requete->getSession()->setAttribut('erreur', false);
        $livre['editeur_id'] = $this->requete->getParametreId('editeur_id');
        $this->rediriger('AdminEditeur', 'lire/' . $livre['editeur_id']);
    }

}
