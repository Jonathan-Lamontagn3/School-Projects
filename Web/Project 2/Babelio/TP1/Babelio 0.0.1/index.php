<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Index</title>
    </head>
    <style>
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
        
        <h2>Babelio découvrer des livre V0.1.1</h2>
        <a href="a_propos.html">[À propos]</a>
        <br/>
        <a href="livre_envoyer_nouveau.php">[Ajouter un livre]</a>
        <br/><br/><br/>
        
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
        
        <table>

            <tr>
                <th>Actions </th>
                <th>Titre </th>
                <th>Nombre de pages </th>
                <th>Rating </th>
                <th>ID de l'éditeur </th>
                <th>Date d'édition </th>
                <th>Résumer du livre </th>
            </tr>  
        

<?php
// Récupération des 10 derniers livre
$reponse = $bdd->query('SELECT * FROM livre ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque livre (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<tr><td><a href="livre_modifier.php?id=' . $donnees['id'] . '">[modifier]</a> ' . '<a href="livre_confirmer.php?id=' . $donnees['id'] . '">[supprimer]</a></td>' 
              .  '<td><em>' . htmlspecialchars($donnees['titre']) . '</em></td><td>' . htmlspecialchars($donnees['nb_pages']) . '</td><td>' .
              htmlspecialchars($donnees['rating']) . '/5</td><td>' . htmlspecialchars($donnees['editeur_id']) . '</td><td>' . htmlspecialchars($donnees['date_edition']) . '</td><td>' .
              htmlspecialchars($donnees['resumer']) .
            '</td></tr>';
}

$reponse->closeCursor();

?>
        </table>
    </body>
</html>

