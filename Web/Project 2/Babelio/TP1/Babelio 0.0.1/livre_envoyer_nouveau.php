<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajout d'un livre</title>
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
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=babelio;charset=utf8', 'root', 'mysql');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
        
<?php
    $option = $bdd->query('SELECT * FROM editeur')
?>
        
        <form action="livre_ajouter.php" method="post">
        
	<h2>Ajouter un livre V0.1.1</h2>
        <p>
            <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" /><br />
            <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" /><br />
            <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" step="0.01" oninput = "x.value = rating.value" value="0" />
            <output name="x" for="rating">0</output><br />
            <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" >Écrivez le résumer du livre ici</textarea><br />
            <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" /><br />
            <label for="editeur_id">Éditeur</label> : <select name="editeur_id">
            <?php
            while ($editeur = $option->fetch()) {
                echo '<option value="' . $editeur['id'] . '">' . $editeur['id'] . '- ' . $editeur['nom'] . '</option>';
            }
            ?>
            </select><br />
            <input type="submit" value="Ajouter" />
	</p>
    </form>

<?php
$option->closeCursor();
?>
        <form action="index.php">
            <input type="submit" value="Annuler" />
        </form>	
    </body>
</html>

