<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux editeurs
 * 
 * @author Jonathan Lamontagne
 */
class Editeur extends Modele {

    // Renvoie la liste de tous les éditeurs, triés par identifiant décroissant
    public function getEditeurs() {
        $sql = 'select e.id,'
                . ' e.nom,'
                . ' e.information,'
                . ' e.date_creation,'
                . ' e.utilisateur_id,'
                . ' e.image,'
                . ' u.nom as nomUtil,'
                . ' u.identifiant'
                . ' FROM editeur e'
                . ' INNER JOIN utilisateur u'
                . ' ON e.utilisateur_id = u.id'
                . ' ORDER BY id desc';
        $editeurs = $this->executerRequete($sql);
        return $editeurs;
    }

    // Enregistre un nouvel éditeur
    public function setEditeur($editeur) {
        $fichierImage = $this->enregistrerImage($editeur['image']);
        $sql = 'INSERT INTO editeur (nom, information, date_creation, utilisateur_id, image) VALUES(?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$editeur['nom'], $editeur['information'], $editeur['date_creation'], $editeur['utilisateur_id'], $fichierImage]);
        return $result;
    }

    // Renvoie les informations sur un éditeur
    public function getEditeur($id_editeur) {
               $sql = 'select e.id,'
                . ' e.nom,'
                . ' e.information,'
                . ' e.date_creation,'
                . ' e.utilisateur_id,'
                . ' e.image,'
                . ' u.nom as nomUtil,'
                . ' u.identifiant'
                . ' FROM editeur e'
                . ' INNER JOIN utilisateur u'
                . ' ON e.utilisateur_id = u.id'
                . ' WHERE e.id = ?'
                . ' ORDER BY id desc';
        $editeur = $this->executerRequete($sql, [$id_editeur]);
        if ($editeur->rowCount() == 1) {
            return $editeur->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun editeur ne correspond à l'identifiant '$id_editeur'");
        }
    }
    
    // Met à jour un editeur
    public function updateEditeur($editeur) {
        $fichierImage = $this->enregistrerImage($editeur['image']);
        $sql = 'UPDATE editeur'
                . ' SET nom = ?, information = ?, date_creation = ?,utilisateur_id = ?, image = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$editeur['nom'], $editeur['information'], $editeur['date_creation'],$editeur['utilisateur_id'], $fichierImage, $editeur['id']]);
        return $result;
    }

}
