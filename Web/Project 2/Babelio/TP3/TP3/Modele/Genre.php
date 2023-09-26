<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres de livres
 * 
 * @author Jonathan Lamontagne
 */
class Genre extends Modele {

    // Recherche les genres répondant à l'autocomplete
    public function searchGenre($term) {
        $sql = 'SELECT genre FROM genres WHERE genre LIKE :term';
        $stmt = $this->executerRequete($sql, ['term' => '%' . $term . '%']);

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['genre'];
        }

        /* Toss back results as json encoded array. */
        return json_encode($return_arr);
    }

}
