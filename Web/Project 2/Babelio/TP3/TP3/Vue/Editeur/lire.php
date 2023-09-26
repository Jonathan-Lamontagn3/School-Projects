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
        echo '<img src="' . 'Contenu/images/editeur/' . $editeur['image'] . '">';
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
            <div style="float:left; margin-right:25px">
                <?php
                if ($livre['image'] != "") {
                    echo '<img src="' . 'Contenu/images/livre/' . $livre['image'] . '" width="180" height="240" >';
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
        <br /><br /><br /><br />
    <?php endif; ?>
        <br /><br /><br /><br />
<?php endforeach; ?>


