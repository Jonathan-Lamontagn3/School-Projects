<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Supprimer un livre</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
        table
        {
            border-collapse: collapse;
            border: 1px solid black;
        }
        td,th
        {
            border: 1px solid black;
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

// Récupération du livre à supprimer
        $reponse = $bdd->query('SELECT * FROM livre WHERE id = ' . $_GET['id']);

// Affichage du livre à supprimer (toutes les données externes sont protégées par htmlspecialchars)
        $donnees = $reponse->fetch();
        $reponse->closeCursor();
        $option = $bdd->query('SELECT * FROM editeur')
        ?>

        <form action="livre_supprimer.php" method="post">
            <h2>Supprimer un livre V0.3.1</h2>
            <p>
                <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($donnees['titre']); ?> " disabled /><br />
                <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" value="<?php echo htmlspecialchars($donnees['nb_pages']); ?>" disabled /><br />
                <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" value="<?php echo htmlspecialchars($donnees['rating']); ?>" disabled /><br />
                <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" disabled ><?php echo htmlspecialchars($donnees['resumer']); ?></textarea><br />
                <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" value="<?php echo htmlspecialchars($donnees['date_edition']); ?>" disabled /><br />
                <label for="editeur_id">Éditeur</label> : <select name="editeur_id" disabled >
                <?php
                while ($editeur = $option->fetch()) {
                    echo '<option value="' . $editeur['id'] . '" ';
                    echo ($editeur['id'] == $donnees['editeur_id']) ? 'selected="selected"' : '';
                    echo '>' . $editeur['id'] . '- ' . $editeur['nom'] . '</option>';
                }
                $option->closeCursor()
                ?>
                </select><br />                
                <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
                <input type="submit" value="Supprimer" />
            </p>
        </form>
        
        <form action="index.php">
            <input type="submit" value="Annuler" />
        </form>
        
        <br /><br /><br />
        

        
    </body>
</html>



