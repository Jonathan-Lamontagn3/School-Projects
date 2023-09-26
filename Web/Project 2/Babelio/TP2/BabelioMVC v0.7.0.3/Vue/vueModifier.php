<?php $titre = "Modifier - " . $livre['titre']; ?>
<?php ob_start(); ?>
<article>
    <header>
        <p>
        <h1 data-i18n="Vmodifier">
            Voulez-vous modifier les informations de ce livre?
        </h1>
        <div>
            Titre: <?= $livre['titre'] ?> avec <?= $livre['nb_pages'] ?> pages <br />
            Rating de: <?= $livre['rating'] ?> /5 <br /> 
            Date d'édition: <?= $livre['date_edition'] ?> <br />
            Résumer du livre: <br /><u><?= $livre['resumer'] ?></u><br /> 
        </div>
        </p>
    </header>
</article>

<form action="index.php?action=update" method="post">
    <h2 data-i18n="Tmodifier">Modifier un livre</h2>
    <p>
        <label for="courriels_auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="courriels_auteur" id="courriels_auteur" value="<?= $livre['courriels_auteur'] ?>" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> <br />
        <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $livre['titre'] ?>"/><br />
        <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" value="<?= $livre['nb_pages'] ?>" />
        <?= ($erreur == 'nb_pages') ? '<span style="color : red;">Entrez un nombre de page valide s.v.p.</span>' : '' ?> <br />
        <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" step="0.01" oninput = "x.value = rating.value" value="<?= $livre['rating'] ?>" />
        <output name="x" for="rating"><?= $livre['rating'] ?></output><br />
        <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" ><?= $livre['resumer'] ?></textarea><br />
        <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" value="<?= $livre['date_edition'] ?>"/><br />
        <label for="genre">Genre</label> : <input type="text" name="genre" id="auto" value="<?= $livre['genre'] ?>" /> <br />
        <input type='hidden' name='editeur_id' value='<?= $livre['editeur_id'] ?>' /><br />
        <input type="hidden" name="id" value="<?= $livre['id'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="editeur" />
    <input type="hidden" name="id" value="<?= $livre['editeur_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>