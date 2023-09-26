<?php $titre = 'Babelio'; ?>

<header>
    <h1 id="titreReponses">Livre du Site Babelio :</h1>
</header>
<?php
foreach ($livres as $livre):
    ?>
    <?php if ($livre['efface'] == '0') : ?>
        <div>
            <div style="float:left; margin-right:25px">
                <?php
                if ($livre['image'] != "") {
                    echo '<img src="' . 'Contenu/images/livre/' . $livre['image'] . '" width="180" height="200" >';
                }
                ?>  
            </div>
            Titre: <?= $this->nettoyer($livre['titre']) ?> avec <?= $this->nettoyer($livre['nb_pages']) ?> pages <br />
            Courriel de l'auteur: <?= $this->nettoyer($livre['courriels_auteur']) ?> <br />
            Genre: <?= $this->nettoyer($livre['genre']) ?> <br />
            Résumer du livre: <br /><u><?= $this->nettoyer($livre['resumer']) ?></u><br /> 
        </div> <br /> <br /> 
        <a href="Editeur/lire/<?= $this->nettoyer($livre['editeur_id']) ?>" >[Livre édité par: <?= $this->nettoyer($livre['nom']) ?> ]</a><br /> 
    <?php endif; ?>
    <br /><br /><br /><br />
<?php endforeach; ?>