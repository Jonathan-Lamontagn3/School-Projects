<!-- Pour déboguage -->
<html>
    <body>
		<h2>Mettre à jour un livre V0.1.1</h2>
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

// Insertion du livre à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE livre SET titre = ?, nb_pages = ?, rating = ?, resumer = ?, editeur_id = ?, date_edition = ? WHERE id = ?');
$req->execute(array($_POST['titre'],$_POST['nb_pages'],$_POST['rating'], $_POST['resumer'], $_POST['editeur_id'], $_POST['date_edition'], $_POST['id']));

// Redirection du visiteur vers la page d'accueil du Blogue
// Mettre en commentaire pour déboguer
header('Location: index.php');
?>

