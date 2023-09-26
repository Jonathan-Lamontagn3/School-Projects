<?php $titre = 'Babelio'; ?>

<?php ob_start(); ?>

<a href="index.php?action=nouvelEditeur"><h2 class="titreBabelio">Ajouter un éditeur</h2></a>

<?php foreach ($editeurs as $editeur):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=editeur&id=" . $editeur['id'] ?>">
                <h1 class="titreBabelio"><?= $editeur['nom'] ?></h1>
            </a>
                <h3 class=""><?= $editeur['information'] ?></h3>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>