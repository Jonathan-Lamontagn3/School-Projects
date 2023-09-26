<?php $titre = "Ajouter un éditeur"; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreReponses">Ajouter un éditeur :</h1>
</header>
<form action="index.php?action=ajouterEditeur" method="post">
    <h2>Ajouter un éditeur</h2>
    <p>
        <label for="nom">Nom de l'éditeur</label> : <input type="text" name="nom" id="nom" /> <br />
        <label for="information">information</label> :  <textarea type="text" name="information" id="information" >Écrivez votre article ici</textarea><br />
        <label for="date_creation">Date de création</label> :  <input type="date" name="date_creation" id="date_creation" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
