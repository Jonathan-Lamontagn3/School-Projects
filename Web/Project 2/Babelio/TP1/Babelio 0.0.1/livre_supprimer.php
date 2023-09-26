<!-- Pour déboguage -->
<html>
    <body>
        <h2>Supprimer un livre V0.3.1</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>

<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=babelio;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Suppression du livre à l'aide d'une requête préparée
$req = $bdd->prepare('DELETE FROM livre WHERE id = ?');
$req->execute(array($_POST['id']));

// Redirection du visiteur vers la page d'accueil du Blogue
// En commentaire si déboguage
header('Location: index.php');
?>
