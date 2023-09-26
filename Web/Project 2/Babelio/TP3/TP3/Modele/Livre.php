<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux livres
 * 
 * @author Jonathan Lamontagne
 */
class Livre extends Modele {

    // Renvoie la liste des livres associés à un éditeur
    public function getLivres($editeur_id = NULL) {
        if ($editeur_id == NULL) {
            $sql = 'select l.id,'
                    . ' l.titre,'
                    . ' l.nb_pages,'
                    . ' l.rating,'
                    . ' l.resumer,'
                    . ' l.editeur_id,'
                    . ' l.date_edition,'
                    . ' l.courriels_auteur,'
                    . ' l.genre,'
                    . ' l.efface,'
                    . ' l.image,'
                    . ' e.nom'
                    . ' FROM livre l'
                    . ' INNER JOIN editeur e'
                    . ' ON l.editeur_id = e.id'
                    . ' ORDER BY id desc';
            $livres = $this->executerRequete($sql);
        } else {
            $sql = 'select * from livre'
                    . ' where editeur_id = ?';
            $livres = $this->executerRequete($sql, [$editeur_id]);
        }
        return $livres;
    }

    // Renvoie un livre spécifique
    public function getLivre($id) {
        $sql = 'select * from livre'
                . ' where id = ?';
        $livre = $this->executerRequete($sql, [$id]);
        if ($livre->rowCount() == 1)
            return $livre->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun livre ne correspond à l'identifiant '$id'");
    }

    // Ajoute un livre associés à un éditeur
    public function setLivre($livre) {
        $fichierImage = $this->enregistrerImage($livre['image']);
        $sql = 'INSERT INTO livre (titre, nb_pages, rating, resumer, date_edition, editeur_id, courriels_auteur, genre, image) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$livre['titre'], $livre['nb_pages'], $livre['rating'], $livre['resumer'], $livre['date_edition'], $livre['editeur_id'], $livre['courriels_auteur'], $livre['genre'], $fichierImage]);
        return $result;
    }

    // Met à jour un livre
    public function updateLivre($livre) {
        $fichierImage = $this->enregistrerImage($livre['image']);
        $sql = 'UPDATE livre'
                . ' SET titre = ?, nb_pages = ?, rating = ?, resumer = ?, date_edition = ?, courriels_auteur = ?, genre = ?, image = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$livre['titre'], $livre['nb_pages'], $livre['rating'], $livre['resumer'], $livre['date_edition'], $livre['courriels_auteur'], $livre['genre'], $fichierImage, $livre['id']]);
        return $result;
    }

    // Supprime un livre de façon permanente
    public function deleteLivre($id) {
        $sql = 'DELETE FROM livre'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Efface un livre
    public function eraseLivre($id) {
        $sql = 'UPDATE livre'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un livre
    public function restoreLivre($id) {
        $sql = 'UPDATE livre'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

}
