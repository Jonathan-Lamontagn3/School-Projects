<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les éditeurs du blog
function accueil() {
    $editeurs = getEditeurs();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un éditeur
function editeur($id, $erreur) {
    $editeur = getEditeur($id);
    $livres = getLivres($id);
    require 'Vue/vueLivre.php';
}

function nouvelEditeur() {
    require 'Vue/vueAjouter.php';
}

// Enregistre le nouvel éditeur et retourne à l'accueil
function ajouterEditeur($editeur) {
    setEditeur($editeur);
    header('Location: index.php');
}

// Ajoute un livre à un éditeur
function ajouter($livre) {
    $validation_courriel = filter_var($livre['courriels_auteur'], FILTER_VALIDATE_EMAIL);
    $validation_nb_pages = filter_var($livre['nb_pages'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 99999)));
    if ($validation_courriel) {
        // Ajouter le livre à l'aide du modèle
        if ($validation_nb_pages) {
            setLivre($livre);
            //Recharger la page pour mettre à jour la liste des livres associés
            header('Location: index.php?action=editeur&id=' . $livre['editeur_id']);
        } else {
            header('Location: index.php?action=editeur&id=' . $livre['editeur_id'] . '&erreur=nb_pages');
        }
    } else {
        //Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=editeur&id=' . $livre['editeur_id'] . '&erreur=courriel');
    }
}

// Confirmer la suppression d'un livre
function confirmer($id) {
    // Lire le livre à l'aide du modèle
    $livre = getLivre($id);
    require 'Vue/vueConfirmer.php';
}

function modifier($id, $erreur) {
    // Lire le livre à l'aide du modèle
    $livre = getLivre($id);
    require 'Vue/vueModifier.php';
}

// Modifie un livre
function update($id) {
    getLivre($id);
    $livre = $_POST;
    $validation_courriel = filter_var($livre['courriels_auteur'], FILTER_VALIDATE_EMAIL);
    $validation_nb_pages = filter_var($livre['nb_pages'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 99999)));
    if ($validation_courriel) {
        // Modifie le livre à l'aide du modèle
        if ($validation_nb_pages) {
            updateLivre($livre);
            //Recharger la page pour mettre à jour la liste des livres associés
            header('Location: index.php?action=editeur&id=' . $livre['editeur_id']);
        } else {
            header('Location: index.php?action=modifier&id=' . $livre['id'] . '&erreur=nb_pages');
        }
    } else {
        //Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=modifier&id=' . $livre['id'] . '&erreur=courriel');
    }
}

// Supprimer un livre
function supprimer($id) {
    // Lire le livre afin d'obtenir le id du livre associé
    $livre = getLivre($id);
    // Supprimer le livre à l'aide du modèle
    deleteLivre($id);
    //Recharger la page pour mettre à jour la liste des livres associés
    header('Location: index.php?action=editeur&id=' . $livre['editeur_id']);
}

// recherche et retourne les genres pour l'autocomplete
function quelsGenres($term) {
    echo searchGenre($term);
}

function a_propos() {
    require 'Vue/vueA_Propos.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
