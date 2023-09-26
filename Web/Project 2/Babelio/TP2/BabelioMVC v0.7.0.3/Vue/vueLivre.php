<?php $titre = "L'éditeur - " . $editeur['nom']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreBabelio"><?= $editeur['nom'] ?></h1>
    </header>
    <br />
    <div><?= $editeur['information'] ?></div>
    <br />
</article>
<hr />
<header>
    <h1 id="titreReponses">Livres de l'éditeur <?= $editeur['nom'] ?> :</h1>
</header>
<?php foreach ($livres as $livre): ?>
<a href="index.php?action=confirmer&id=<?= $livre['id'] ?>" ><span data-i18n="supprimer">[Supprimer]</span></a>
    <a href="index.php?action=modifier&id=<?= $livre['id'] ?>" ><span data-i18n="modifier">[Modifier]</span></a>

    <div>
        Titre: <?= $livre['titre'] ?> avec <?= $livre['nb_pages'] ?> pages <br />
        Rating de: <?= $livre['rating'] ?> /5 <br /> 
        Date d'édition: <?= $livre['date_edition'] ?> <br />
        Résumer du livre: <br /><u><?= $livre['resumer'] ?></u><br /> 
    </div>
    <br />
<?php endforeach; ?>

<form action="index.php?action=ajouter" method="post">
    <h2 data-i18n="Tajouter">Ajouter un livre</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="courriels_auteur" id="courriels_auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> <br />
        <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" /><br />
        <label for="nb_pages">Nombre de page</label> :  <input type="number" name="nb_pages" id="nb_pages" min="1" />
        <?= ($erreur == 'nb_pages') ? '<span style="color : red;">Entrez un nombre de page valide s.v.p.</span>' : '' ?> <br />
        <label for="rating">Rating</label> :  <input type="range" name="rating" id="rating" min="0" max="5" step="0.01" oninput = "x.value = rating.value" value="0" />
        <output name="x" for="rating">0</output><br />
        <label for="resumer">Résumer</label> :  <textarea type="text" name="resumer" id="resumer" >Écrivez le résumer du livre ici</textarea><br />
        <label for="date_edition">Date d'édition</label> :  <input type="date" name="date_edition" id="date_edition" /><br />
        <label for="genre">Genre</label> : <input type="text" name="genre" id="auto" /> <br />
        <input type='hidden' name='editeur_id' value='<?= $editeur['id'] ?>' />
        <input type="submit" value="Ajouter" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

