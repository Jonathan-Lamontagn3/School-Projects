<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un livre</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>


        <?php
// Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=babelio;charset=utf8', 'root', 'mysql');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Récupération du livre à modifier
//$reponse = $bdd->query('SELECT * FROM livre WHERE id = ' . $_GET['id']);
        try {
            $req = $bdd->prepare('SELECT * FROM livre WHERE id = ?');
            $req->execute(array($_GET['id']));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
// Affichage du livre à modifer (toutes les données externes sont protégées par htmlspecialchars)
        $donnees = $req->fetch();
        $req->closeCursor();
        $option = $bdd->query('SELECT * FROM editeur')
        ?>

        <form action="livre_mise_a_jour.php" method="post">
            <h2>Modifier un livre V0.1.1</h2>
            <p>
                <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($donnees['titre']); ?>" /><br />
                <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" value="<?php echo htmlspecialchars($donnees['nb_pages']); ?>" /><br />
                <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" value="<?php echo htmlspecialchars($donnees['rating']); ?>"step="0.01" oninput = "x.value = rating.value" />
                <output name="x" for="rating"><?php echo htmlspecialchars($donnees['rating']); ?></output><br />
                <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" ><?php echo htmlspecialchars($donnees['resumer']); ?></textarea><br />
                <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" value="<?php echo htmlspecialchars($donnees['date_edition']); ?>" /><br />
                <label for="editeur_id">Éditeur</label> : <select name="editeur_id">
                <?php
                while ($editeur = $option->fetch()) {
                    echo '<option value="' . $editeur['id'] . '" ';
                    echo ($editeur['id'] == $donnees['editeur_id']) ? 'selected="selected"' : '';
                    echo '>' . $editeur['id'] . '- ' . $editeur['nom'] . '</option>';
                }
                $option->closeCursor()
                ?>
                </select><br /><br />
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <input type="submit" value="Modifier" />
            </p>
        </form>

        <form action="index.php">
            <input type="submit" value="Annuler" />
        </form>	
        
    </body>
</html>



