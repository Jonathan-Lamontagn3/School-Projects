<?php $titre = "Modifier - " . $livre['titre']; ?>

<article>
    <header>
        <p>
        <h1 data-i18n="Vmodifier">
            Voulez-vous modifier les informations de ce livre?
        </h1>
        <div>
            <div style="float:left; margin-right:25px">
                <?php
                if ($livre['image'] != "") {
                    echo '<img src="' . 'Contenu/images/livre/' . $livre['image'] . '" width="180" height="180" >';
                }
                ?>  
            </div>
            Titre: <?= $this->nettoyer($livre['titre']) ?> avec <?= $this->nettoyer($livre['nb_pages']) ?> pages <br />
            Courriel de l'auteur: <?= $this->nettoyer($livre['courriels_auteur']) ?> <br />
            Genre: <?= $this->nettoyer($livre['genre']) ?> <br />
            Rating de: <?= $this->nettoyer($livre['rating']) ?> /5 <br /> 
            Date d'édition: <?= $this->nettoyer($livre['date_edition']) ?> <br />
            Résumer du livre: <br /><u><?= $this->nettoyer($livre['resumer']) ?></u><br />
        </div>
        </p>
    </header>
</article><br /><br />

<h2 data-i18n="Tmodifier">Modifier un livre</h2>
<form action="AdminLivre/update" method="post" enctype="multipart/form-data">
    <p>
        <label for="courriels_auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="courriels_auteur" id="courriels_auteur" value="<?= $livre['courriels_auteur'] ?>" /> 
        <?= (isset($erreur['courriel'])) ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> <br />
        <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $livre['titre'] ?>"/><br />
        <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" value="<?= $livre['nb_pages'] ?>" />
        <?= (isset($erreur['nb_pages'])) ? '<span style="color : red;">Entrez un nombre de page valide s.v.p.</span>' : '' ?> <br />
        <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" step="0.01" oninput = "x.value = rating.value" value="<?= $livre['rating'] ?>" />
        <output name="x" for="rating"><?= $livre['rating'] ?></output><br />
        <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" ><?= $livre['resumer'] ?></textarea><br />
        <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" value="<?= $livre['date_edition'] ?>"/><br />
        <label for="genre">Genre</label> : <input type="text" name="genre" id="auto" value="<?= $livre['genre'] ?>" /> <br />
        <label for="image">Image</label> :  <input type="file" name="image" id="image" value="<?= $livre['image'] ?>" /><br />
        <input type='hidden' name='editeur_id' value='<?= $livre['editeur_id'] ?>' /><br />
        <input type="hidden" name="id" value="<?= $livre['id'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="AdminLivre/annuler" method="post" >
    <input type='hidden' name='editeur_id' value='<?= $livre['editeur_id'] ?>' />
    <input type="submit" value="Annuler" />
</form>