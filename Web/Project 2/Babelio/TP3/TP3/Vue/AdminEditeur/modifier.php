<?php $this->titre = "Babelio - " . $editeur['nom']; ?>

<header>
    <h1 id="titreReponses">Modifier un editeur :</h1>
</header>
<form action="AdminEditeur/update" method="post" enctype="multipart/form-data">
    <h2>Modifier un editeur</h2>
    <p>
        <label for="nom">Nom de l'éditeur</label> : <input type="text" name="nom" id="nom" value="<?= $editeur['nom'] ?>" /> <br />
        <label for="information">information</label> :  <textarea name="information" id="information" ><?= $editeur['information'] ?></textarea><br />
        <label for="date_creation">Date de création</label> :  <input type="date" name="date_creation" id="date_creation" value="<?= $editeur['date_creation'] ?>" /><br />
        <?php
        if ($editeur['image'] != "") {
            echo '<img src="' . 'Contenu/images/editeur/' . $editeur['image'] . '">';
        }
        ?><br /> 
        <label for="image">Image</label> :  <input type="file" name="image" id="image" /><br />  
        <input type="hidden" name="id" value="<?= $editeur['id'] ?>" /><br />
        <input type="hidden" name="utilisateur_id" value="<?= $utilisateur['id'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="AdminEditeur/index/" method="post" >
    <input type="submit" value="Annuler" />
</form>

