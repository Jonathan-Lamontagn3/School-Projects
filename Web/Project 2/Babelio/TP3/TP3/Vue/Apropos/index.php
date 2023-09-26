<?php $titre = "À propos"; ?>

<header>
    <h1 id="titreBabelio">À propos</h1>
</header>

<h2 style="text-align: center;">Jonathan Lamontagne</h2>

<p style="text-align: center;">
    420-4A5 MO Web et Bases de données <br/>
    Hiver 2021, Collège Montmorency
</p>

<h3>Type d'association entre les 2 tables</h3>
<p>L'association entre ces 2 tables est 1:n entre la table editeur et la table livre</p>
<h3>Comment effectuer</h3>
<ol>
    <li>
        <h4>L'ajout sur les 2 tables</h4>
        <ul>
            <li>
                Pour ajouter un éditeur il faut être en session et cliquer sur ajouter un éditeur.
            </li><br/>
            <li>
                Pour ajouter un livre sur la table livre il faut cliquer sur le boutton "Ajouter" de la vue livre après avoir rempli le formulaire.
                Il ne faut pas être en session pour faire ce type d'ajout.
            </li>
        </ul>
    </li>
    <li>
        <h4>La modification et la suppression</h4>
        <ul>
            <li>
                Pour modifier un livre sur la table livre il faut cliquer sur le lien "[Modifier]".
                Il faut être en session et être l'administrateur de l'éditeur afin de pouvoir effectuer cette modification <br/>
                Pour modifier un éditeur il faut cliquer sur "[Modifier l'éditeur]" lorsqu'on est en session.
                Il faut être en session et être l'administrateur de l'éditeur afin de pouvoir effectuer cette modification
            </li><br/>
            <li>
                Pour supprimer un livre sur la table livre il faut cliquer sur le lien "[Supprimer]".
                Il faut être en session et être l'administrateur de l'éditeur afin de pouvoir effectuer cette suppression
            </li>
        </ul>
    </li>
    <li>
        <h4>La validation du courriel et d'un autre champ.</h4>
        <p>
            La validation du courriel ce fait avant un ajout ou une modification dans le contrôleur. Le champs courriels_auteur de la table livre
            et sur le champ nb_pages de la table livre. D'abord le courriel passe à travers du filtre qui verifie si le courriel envoyer dans le formulaire
            est valide pour le champs. Si il est valide on passe ensuite à la validation du champs nb_pages qui passe dans un filtre qui verifie
            que le nombre envoyer dans le formulaire est bien un nombre entier entre 1 et 99999.
        </p>
    </li>
</ol>
<h3>Quel champ est utilisé pour l'autocomplétion et comment y accéder</h3>
<p>
    Le champs utilisé pour l'autocomplétion est le champ genre de la table livre que l'on peut accèder dans le formulaire de la vue Livre
    ou dans le formulaire de la vue Modifier d'un livre à modifier.
</p>
<h3>Quelles sont les langues offertes pour l'interface et comment la changer</h3>
<p>
    Les langues offertes pour l'interface sont le français, l'anglais et le japonais et on peut changer de langue en cliquant sur le lien conrespondant
    dans le gabarit. Soite <u>Français</u> pour le français,<u>English</u> pour l'anglais et <u>日本語</u> pour le japonais. 
</p>

<h3>Ajout dans le framework du professeur</h3>
<p>
    Ajout de la fonction protected enregistrerImage dans le modèle du framework afin de pouvoir ajouter des images autant dans la table
    de l'éditeur que celle des livres
</p>

<div> 
    <h3 style="text-align: center;">La base de données utilisée par ce site</h3> <br/>
    <img src="Contenu/images/apropos/babelio_phpmyadmin_v2.PNG" 
         
         style="margin-right: auto; margin-left: auto; display: block;"
    />
</div>
<div>  
    <h3 style="text-align: center;">est basée sur cet exemple : Books DB2 Sample</h3><br/>
    <img src="Contenu/images/apropos/generic_book_data_model.PNG" 
        
        style="margin-right: auto; margin-left: auto; display: block;" 
    />
</div><br/>
<a href="https://www.db2tutorial.com/getting-started/db2-sample-database/">(source : https://www.db2tutorial.com/getting-started/db2-sample-database/)</a>

<br/><br/><br/>

<form action=<?= $utilisateur != null ? 'Admin' : ''; ?>Editeur/index/ method="post">
    <input type="submit" value="Retour" />
</form>