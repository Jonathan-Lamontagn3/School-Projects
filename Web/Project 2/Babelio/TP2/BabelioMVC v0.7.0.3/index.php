<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // Afficher un éditeur
        if ($_GET['action'] == 'editeur') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    editeur($id, $erreur);
                } else
                    throw new Exception("Identifiant d'éditeur incorrect");
            } else
                throw new Exception("Aucun identifiant d'éditeur");

            // Ajouter un livre
        } else if ($_GET['action'] == 'ajouter') {
            if (isset($_POST['editeur_id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['editeur_id']);
                if ($id != 0) {
                    // vérifier si l'éditeur existe;
                    $editeur = getEditeur($id);
                    // Récupérer les données du formulaire
                    $livre = $_POST;
                    // Ajouter le livre à l'aide du modèle
                    ajouter($livre);
                    //Recharger la page pour mettre à jour la liste des livres associés
                } else
                    throw new Exception("Identifiant d'éditeur incorrect");
            } else
                throw new Exception("Aucun identifiant d'éditeur");
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant de livre incorrect");
            } else
                throw new Exception("Aucun identifiant de livre");

            // Supprimer un livre
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception("Identifiant de livre incorrect");
            } else
                throw new Exception("Aucun identifiant de livre");
            // Ajouter un éditeur
        } else if ($_GET['action'] == 'nouvelEditeur') {
            nouvelEditeur();

            // Enregistrer le nouvel éditeur
        } else if ($_GET['action'] == 'ajouterEditeur') {
            $editeur = $_POST;
            ajouterEditeur($editeur);
        } else if ($_GET['action'] == 'modifier') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    modifier($id, $erreur);
                } else
                    throw new Exception("Identifiant de livre incorrect");
            } else
                throw new Exception("Aucun identifiant de livre");
        } else if ($_GET['action'] == 'update') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    update($id);
                } else
                    throw new Exception("Identifiant de livre incorrect");
            } else
                throw new Exception("Aucun identifiant de livre");
            
        } else if ($_GET['action'] == 'quelsGenres') {
            quelsGenres($_GET['term']);
        } else if ($_GET['action'] == 'a_propos') {
            a_propos();
        } else {
            // Action mal définie
            throw new Exception("Action non valide");
        }

        // Action par défaut
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
