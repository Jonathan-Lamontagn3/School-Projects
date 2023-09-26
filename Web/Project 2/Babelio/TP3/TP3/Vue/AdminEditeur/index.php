<?php $titre = 'Babelio'; ?>

<a href="AdminEditeur/nouveau"><h2 class="titreBabelio">Ajouter un éditeur</h2></a>
<br/>
<hr />
<?php foreach ($editeurs as $editeur):
    ?>
    <article>
        <header>
            <h1 class="titreBabelio">
                <a href="<?= "AdminEditeur/lire/" . $editeur['id'] ?>">
                    <?= $this->nettoyer($editeur['nom']) ?> 
                </a>
                &nbsp; administrer par: <?= $this->nettoyer($editeur['nomUtil']) ?> 
            </h1>    
        </header>
        <h3><?= $this->nettoyer($editeur['information']) ?></h3>
        <a href="AdminEditeur/modifier/<?= $editeur['id'] ?>"> [modifier l'éditeur]</a>
    </article>
    <hr />
<?php endforeach; ?> 