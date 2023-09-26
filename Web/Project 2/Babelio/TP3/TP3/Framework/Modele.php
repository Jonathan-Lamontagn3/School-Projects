<?php

require_once 'Configuration.php';

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO de PHP
 *
 * @version 1.0
 * @author Baptiste Pesquet
 */
abstract class Modele {

    /** Objet PDO d'accès à la BD 
        Statique donc partagé par toutes les instances des classes dérivées */
    private static $bdd;

    /**
     * Exécute une requête SQL
     * 
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = self::getBdd()->query($sql);   // exécution directe
        }
        else {
            $resultat = self::getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * 
     * @return PDO Objet PDO de connexion à la BDD
     */
    private static function getBdd() {
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $mdp, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
    
    protected function enregistrerImage($image) {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($image) AND $image['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            $dimension = $image['size'];
            if ($dimension <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($image['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    $fichierImage = 'Contenu/Images/'
                            . get_class($this) . '/'
                            . basename($image['name']);
                    
                    move_uploaded_file($image['tmp_name'], $fichierImage);
                    return basename($image['name']);
                } else {
                    throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                }
            } else {
                throw new Exception("Votre image ($dimension octets) dépasse la dimension autorisée (1000000 octets)");
            }
        } else {
            throw new Exception("Erreur rencontrée lors de la transmission du fichier");
        }
    }

}
