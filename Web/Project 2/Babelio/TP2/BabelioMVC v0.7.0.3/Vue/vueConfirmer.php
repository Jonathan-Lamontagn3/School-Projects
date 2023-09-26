<?php $titre = "Supprimer - " . $livre['titre']; ?>
<?php ob_start(); ?>
<article>
    <header>
        <p>
        <h1 data-i18n="Vsupprimer">
            Voulez-vous supprimer les informations de ce livre?
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

<h2 data-i18n="Tsupprimer">Supprimer un livre</h2>
<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $livre['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="editeur" />
    <input type="hidden" name="id" value="<?= $livre['editeur_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>