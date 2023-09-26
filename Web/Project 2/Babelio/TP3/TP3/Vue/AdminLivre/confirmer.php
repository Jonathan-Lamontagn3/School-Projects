<?php $titre = "Supprimer - " . $livre['titre']; ?>

<article>
    <header>
        <p>
        <h1 data-i18n="Vsupprimer">
            Voulez-vous supprimer les informations de ce livre?
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

<h2 data-i18n="Tsupprimer">Supprimer un livre</h2>
<form action="AdminLivre/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $livre['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="AdminEditeur/lire/<?= $livre['editeur_id'] ?>" method="post" >
    <input type="submit" value="Annuler" />
</form>