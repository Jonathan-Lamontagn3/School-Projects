<?php $titre = 'Babelio'; ?>

<?php foreach ($editeurs as $editeur):
    ?>
    <article>
        <header>
            <a href="<?= "Editeur/lire/" . $editeur['id'] ?>">
                <h1 class="titreBabelio"><?= $this->nettoyer($editeur['nom']) ?></h1>
            </a>
                
        </header>
        <h3><?= $this->nettoyer($editeur['information']) ?></h3>
    </article>
    <hr />
<?php endforeach; ?> 