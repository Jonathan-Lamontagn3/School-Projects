<?php $titre = "Ajouter un éditeur"; ?>

<header>
    <h1 id="titreReponses">Ajouter un éditeur :</h1>
</header>
<form action="AdminEditeur/ajouter" method="post" enctype="multipart/form-data">
    <h2>Ajouter un éditeur</h2>
    <p>
        <label for="nom">Nom de l'éditeur</label> : <input type="text" name="nom" id="nom" /> <br />
        <label for="information">information</label> :  <textarea type="text" name="information" id="information" >Écrivez les informations sur votre editeur ici</textarea><br />
        <label for="date_creation">Date de création</label> :  <input type="date" name="date_creation" id="date_creation" /><br />
        <label for="image">Image</label> :  <input type="file" name="image" id="image" /><br />       
        <input type="hidden" name="utilisateur_id" value="<?= $utilisateur['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>
<form action="AdminEditeur/index/" method="post" >
    <input type="submit" value="Annuler" />
</form>