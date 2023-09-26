<?php $titre = "L'éditeur - " . $editeur['nom']; ?>

<article>
    <header>
        <h1 class="titreBabelio"><?= $this->nettoyer($editeur['nom']) ?></h1>
    </header>
    <br />
    <div><?= $this->nettoyer($editeur['information']) ?></div>
    <br />
    <div>Date de création: <?= $this->nettoyer($editeur['date_creation']) ?></div>
    <br />
    <?php
    if ($editeur['image'] != "") {
        echo '<img src="' . 'Contenu/images/editeur/' . $editeur['image'] . '" class="editeurImg">';
    }
    ?>
</article>
<hr />
<header>
    <h1 id="titreReponses">Livres de l'éditeur <?= $this->nettoyer($editeur['nom']) ?> :</h1>

</header>
<?php foreach ($livres as $livre): ?>
    <?php if ($livre['efface'] == '0') : ?>
    <div>
        <a href="AdminLivre/confirmer/<?= $this->nettoyer($livre['id']) ?>" ><span data-i18n="supprimer">[Supprimer]</span></a>
        <a href="AdminLivre/modifier/<?= $this->nettoyer($livre['id']) ?>" ><span data-i18n="modifier">[Modifier]</span></a>
            <div style="float:left; margin-right:25px">
                <?php
                if ($livre['image'] != "") {
                    echo '<img src="' . 'Contenu/images/livre/' . $livre['image'] . '" width="180" height="240" >';
                }
                ?>  
            </div>
        <div>

            Titre: <?= $this->nettoyer($livre['titre']) ?> avec <?= $this->nettoyer($livre['nb_pages']) ?> pages <br />
            Courriel de l'auteur: <?= $this->nettoyer($livre['courriels_auteur']) ?> <br />
            Genre: <?= $this->nettoyer($livre['genre']) ?> <br />
            Rating de: <?= $this->nettoyer($livre['rating']) ?> /5 <br /> 
            Date d'édition: <?= $this->nettoyer($livre['date_edition']) ?> <br />
            Résumer du livre: <br /><u><?= $this->nettoyer($livre['resumer']) ?></u><br />
        </div>
        <br />
    </div><br /><br /><br />
    <?php else : ?>
        <p class="efface">
            <a href="AdminLivre/retablir/<?= $this->nettoyer($livre['id']) ?>" >[Rétablir]</a><br />
            Titre: <?= $this->nettoyer($livre['titre']) ?> avec <?= $this->nettoyer($livre['nb_pages']) ?> pages <br />
        </p>

    <?php endif; ?>
<br /><br />
<?php endforeach; ?>

<form action="AdminLivre/ajouter" method="post" enctype="multipart/form-data">
    <h2 data-i18n="Tajouter">Ajouter un livre</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="courriels_auteur" id="courriels_auteur" /> 
        <?= (isset($erreur['courriel'])) ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> <br />
        <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" /><br />
        <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" />
        <?= (isset($erreur['nb_pages'])) ? '<span style="color : red;">Entrez un nombre de page valide s.v.p.</span>' : '' ?> <br />
        <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" step="0.01" oninput = "x.value = rating.value" value="0" />
        <output name="x" for="rating">0</output><br />
        <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" >Écrivez le résumer du livre ici</textarea><br />
        <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" /><br />
        <label for="genre">Genre</label> : <input type="text" name="genre" id="auto" /> <br />
        <label for="image">Image</label> :  <input type="file" name="image" id="image" /><br />  
        <input type='hidden' name='editeur_id' value='<?= $editeur['id'] ?>' />
        <input type="submit" value="Ajouter" />
    </p>
</form>


