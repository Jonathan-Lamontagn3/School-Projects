<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Editeur.php';
require_once 'Modele/Livre.php';

class ControleurAdminEditeur extends ControleurAdmin {

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

    public function nouveau() {
        $this->genererVue();
    }

    // Enregistre le nouvel éditeur et retourne à l'accueil
    public function ajouter() {
        $editeur['nom'] = $this->requete->getParametre('nom');
        $editeur['information'] = $this->requete->getParametre('information');
        $editeur['date_creation'] = $this->requete->getParametre('date_creation');
        $editeur['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
        $editeur['image'] = $this->requete->getParametre('image');
        $this->editeur->setEditeur($editeur);
        $this->executerAction('index');
    }

    // Modifier un editeur existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $editeur = $this->editeur->getEditeur($id);
        $this->genererVue(['editeur' => $editeur]);
    }

    // Enregistre l'editeur modifié et retourne à la liste des editeurs
    public function update() {
        $editeur['id'] = $this->requete->getParametreId('id');
        $editeur['nom'] = $this->requete->getParametre('nom');
        $editeur['information'] = $this->requete->getParametre('information');
        $editeur['date_creation'] = $this->requete->getParametre('date_creation');
        $editeur['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
        $editeur['image'] = $this->requete->getParametre('image');

        $sess_util_id = $this->requete->getSession()->getAttribut('utilisateur')['id'];
        $editeur_util_id = $this->editeur->getEditeur($editeur['id'])['utilisateur_id'];

        if ($sess_util_id == $editeur_util_id) {
            $this->editeur->updateEditeur($editeur);
        } else {
            $this->requete->getSession()->setAttribut('message',
                    'Seule l\'administrateur de l\'éditeur peut le modifier');
        }
    
        $this->executerAction('index');
    }

}
