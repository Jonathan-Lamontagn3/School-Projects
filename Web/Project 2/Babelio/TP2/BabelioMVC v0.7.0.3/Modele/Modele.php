<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=babelio;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les éditeurs, triés par identifiant décroissant
function getEditeurs() {
    $bdd = getBdd();
    $livres = $bdd->query('select * from editeur'
            . ' order by ID desc');
    return $livres;
}

// Renvoie les informations sur un éditeur
function getEditeur($id_editeur) {
    $bdd = getBdd();
    $editeur = $bdd->prepare('select * from editeur'
            . ' where ID=?');
    $editeur->execute(array($id_editeur));
    if ($editeur->rowCount() == 1) {
        return $editeur->fetch();  // Accès à la première ligne de résultat
    } else {
        throw new Exception("Aucun editeur ne correspond à l'identifiant '$id_editeur'");
    }
}

// Renvoie la liste des livres associés à un éditeur
function getLivres($idLivre) {
    $bdd = getBdd();
    $livres = $bdd->prepare('select * from livre'
            . ' where editeur_id = ?');
    $livres->execute(array($idLivre));
    return $livres;
}

// Renvoie un livre spécifique
function getLivre($id) {
    $bdd = getBdd();
    $livre = $bdd->prepare('select * from livre'
            . ' where id = ?');
    $livre->execute(array($id));
    if ($livre->rowCount() == 1)
        return $livre->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun livre ne correspond à l'identifiant '$id'");
    return $livre;
}

// Ajoute un livre associés à un éditeur
function setLivre($livre) {
    $bdd = getBdd();
    $Livres = $bdd->prepare('INSERT INTO livre (titre, nb_pages, rating, resumer, date_edition, editeur_id, courriels_auteur, genre) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $Livres->execute(array($livre['titre'], $livre['nb_pages'], $livre['rating'], $livre['resumer'], $livre['date_edition'], $livre['editeur_id'], $livre['courriels_auteur'], $livre['genre']));
    return $Livres;
}

// Enregistre un nouvel éditeur
function setEditeur($editeur) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO editeur (nom, information, date_creation) VALUES(?, ?, ?)');
    $result->execute(array($editeur['nom'], $editeur['information'],$editeur['date_creation'] ));
    return $result;
}

// Supprime un livre
function deleteLivre($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM livre'
            . ' WHERE id = ?');
    $result->execute(array($id));
    return $result;
}

function updateLivre($livre) {
    $bdd = getBdd();
    $req = $bdd->prepare('UPDATE livre SET titre = ?, nb_pages = ?, rating = ?, resumer = ?, courriels_auteur = ?, date_edition = ?, genre = ? WHERE id = ?');
    $req->execute(array($livre['titre'], $livre['nb_pages'], $livre['rating'], $livre['resumer'], $livre['courriels_auteur'], $livre['date_edition'], $livre['genre'], $livre['id']));
    return $req;
}

// Recherche les genres répondant à l'autocomplete
function searchGenre($term) {
    $bdd = getBdd();
    $stmt = $bdd->prepare('SELECT genre FROM genres WHERE genre LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['genre'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}
