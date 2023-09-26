<?php $titre = "À propos"; ?>

<?php ob_start(); ?>
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
                Pour ajouter un éditeur sur la table editeur il faut cliquer sur le lien "Ajouter un éditeur" de la vue Accueil qui va effectuer l'action nouvelEditeur. 
                Cette action fais appel à la fonction nouvelEditeur du contrôleur qui elle va requerir la vue Ajouter. 
                Ensuite il faut remplir le formulaire et cliquer sur envoyer ce qui fera appel à l'action ajouterEditeur, qui elle fera appel à la fonction ajouter du contrôleur.
                Pour finir, cette fonction fera appel à la fonction setEditeur de mon modèle en lui envoyant les information de mon formulaire.
            </li><br/>
            <li>
                Pour ajouter un livre sur la table livre il faut cliquer sur le boutton "Ajouter" de la vue livre après avoir rempli le formulaire, ce qui va effectuer l'action ajouter. 
                Cette action fais appel à la fonction ajouter du contrôleur en envoyant les informations du formulaire, qui elle va faire appel à la fonction setLivre de mon modèle. 
            </li>
        </ul>
    </li>
    <li>
        <h4>La modification et la suppression</h4>
        <ul>
            <li>
                Pour modifier un livre sur la table livre il faut cliquer sur le lien "[Modifier]" de la vue livre ce retrouvant en haut du livre que l'on veut modifier, ce qui va effectuer l'action modifier. 
                Cette action fais appel à la fonction modifier du contrôleur qui elle va requerir la vue Modifier en lui envoyant le id du livre à modifier.
                Ensuite il faut modifier les informations que l'on veut changer dans le formulaire et cliquer sur modifier ce qui fera appel à l'action update, qui elle fera appel à la fonction update du contrôleur
                ou sur annuler pour revenir à la vue Éditeur du livre à modifier en utilisant le id de l'editeur soit editeur_id.
                Pour finir, cette fonction fera appel à la fonction updateLivre de mon modèle en lui envoyant les information de mon formulaire à mettre à jour.
            </li><br/>
            <li>
                Pour supprimer un livre sur la table livre il faut cliquer sur le lien "[Supprimer]" de la vue livre ce retrouvant en haut du livre que l'on veut supprimer, ce qui va effectuer l'action confirmer. 
                Cette action fais appel à la fonction confirmer du contrôleur qui elle va requerir la vue Confirmer en lui envoyant le id du livre à modifier.
                Ensuite il faut cliquer sur Oui ce qui fera appel à l'action supprimer, qui elle fera appel à la fonction supprimer du contrôleur
                ou sur annuler pour revenir à la vue Éditeur du livre à supprimer en utilisant le id de l'editeur soit editeur_id.
                Pour finir, cette fonction fera appel à la fonction deleteLivre de mon modèle en lui envoyant le id du livre à supprimer.
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

<p> La base de données utilisée par ce site <br/>
    <img src="Contenu/images/babelio_phpmyadmin.PNG" />
</p>
<p> est basée sur cet exemple : Books DB2 Sample<br/>
    <img src="Contenu/images/generic_book_data_model.PNG" />
<p/>
<a href="https://www.db2tutorial.com/getting-started/db2-sample-database/">(source : https://www.db2tutorial.com/getting-started/db2-sample-database/)</a>

<br/><br/><br/>

<form action="index.php">
    <input type="submit" value="Retour" />
</form>



<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>