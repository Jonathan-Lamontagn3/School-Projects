<html>
    <body>
		<!-- Ce bout de code HTML peut-être réutilisé n'importe où au besoin ---
		--- Seule l'action de la balise Form ci-dessous doit être adaptée au contexte ---
		--- Notez la différence dans l'affichage de "print_r" et de "var_dump" ---
		--- elle est due à la présence de l'extension "xdebug" dans l'environnement php de Ampps (cf. phpinfo) ---
		--- sinon l'affichage serait identique --- 
		--- comme xdebug est souvent présent dans les environnements de développement PHP, "var_dump" est préféré -->
		<h2>Envoyer un livre V0.0.2</h2>
	     *** Pour déboguage ***<br />
		Voici le contenu de $_POST envoyé par le formulaire d'envoi et transmis à la requête : <br />
        <?php var_dump($_POST); ?>
        <?php // print_r($_POST); // décommentez pour comparer avec var_dump ?>
        <form action="index.php">
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
$req = $bdd->prepare('INSERT INTO livre (titre, nb_pages, rating, resumer, date_edition, editeur_id) VALUES(?, ?, ?, ?, ?, ?)');
$req->execute(array($_POST['titre'],$_POST['nb_pages'], $_POST['rating'], $_POST['resumer'], $_POST['date_edition'],$_POST['editeur_id']));

// Redirection du visiteur vers la page d'accueil
// Mettre en commentaire spour déboguer
header('Location: index.php');
?>

