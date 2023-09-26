<?php $titre = "À propos"; ?>

<header>
    <h1>À propos</h1>
</header>

<h2 style="text-align: center;">Jonathan Lamontagne</h2>

<p style="text-align: center;">
    420-5H6 MO Applications Web transactionnelles. <br/>
    Automne 2021, Collège Montmorency.
</p>

<br/>
<br/>
<h3>Lors de la premier arriver sur Index de la page Books</h3>
<p>Sans être authentifier vous ne pouvez accéder qu'a l'index et la view des livre</p>
<br/>
<h3>Fonction du site</h3>


<h4>Pour s'authentifier</h4>
<ul>
    <li>
        Il faut clicker sur le login dans le menu en haut à droite et entrer les informations de votre compte.
    </li>
    <li>
        Si vous n'avez pas de compte vous pouvez creer un utilisateur en cliquant sur le lien. 
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tous visiteur peuvent creer un compte puisqu'aucune authentification n'est nécessaire à cette fonction
    </li>
    <li>
        Vous pouvez vous deconnecter en cliquant sur logout dans le menu en haut
    </li>  
</ul><br/>

<h4>Pour ajouter un livre</h4>
<ul>
    <li>
        Une fois authentifier, si et seulement si notre courriel à été confirmer nous pouvons ajouter un livre.
    </li>
    <li>
        L'ajout ce fait lorsqu'on remplit le formulaire avec des information valide et que nous cliquons sur Sudmit.
    </li>  
</ul>
<h4>La modification et la suppression de livre</h4>
<ul>
    <li>
        Pour modifier ou supprimer un livre, il faut tous d'abord être authentifier. Ensuite, si nous sommes l'autheur qui à poster les informations sur le<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;livre nous pouvons les supprimer ou les modifier en cliquant sur le lien conrespondant.
    </li>
    <li>
        Une fois ces verification fait, une confirmation sera demandez pour la suppression des informations sur un livre.
    </li>
    <li>
        Pour la modification des informations sur un livre, vous serrez rediriger vers une page où vous remplirez un formulaire avant de cliquer Sudmit.
    </li>
    <li>
        L'utilisateur André peut modifier et supprimer les livre qu'il à créer même si son courriel n'est pas confirmer 
        ce qui deverait être impossible. Cela &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;est possible que parqu'il à créer les livres avant l'ajout de la politique 
        nécessitant la confirmation du courriel pour faire l'ajout d'un livre.
    </li>
</ul><br/>

<h4>La validation du courriel.</h4>
<ul>
    <li>
        À la création de son compte, un utilisateur ce vois attribuer un UUID et courriel de confirmation du compte est envoyer
    </li>
    <li>
        Une validation du courriel est nécessaire pour accéder à tous les droits d'un utilisateur authentifier.
    </li>
    <li>
        Un utilisateur authentifier mais sans validation de son courriel à les mêmes droits qu'un utilisateur non authentifier, en plus d'avoir le droit de
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visualiser, modifier ou supprimer son compte
    </li>  
</ul><br/>

<h4>Quelles sont les langues offertes pour l'interface et comment la changer</h4>
<ul>
    <li>
        Le site est offert en français, anglais et espagnole.
    </li>
    <li>
        Lorsque l'on clique sur le nom de la langue dans laquel nous voulons parcourrir le site dans le menu en haut, les champs 
        afficher, supprimer et &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;modifier, dans les vues index, change de langue selon celle sélectionner.
    </li> 
</ul><br/>

<h4>L'autocomplétion</h4>
<ul>
    <li>
        L'autocomplétion est éffectuer sur le champs author de la table Books.
    </li>
    <li>
        Lorsque l'on rempli le champs author avec des lettre le code JavaScript authorAutocomplete.js s'enclenche et recherche des noms
        correspondant &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dans la table authors.
    </li>
    <li>
        Il est également possible d'utilisé l'autocomplétion lors de l'édition d'un auteur.
    </li>
</ul><br/>

<h4>Les listes liées</h4>
<ul>
    <li>
        La table authors est liée à la table nationalities et continents.
    </li>
    <li>
        La table nationalities est liée continents.
    </li>
    <li>
        Lorsque l'on créer un nouvel author il faut sélectionner un continent avant d'avoir accès à la liste de nationalié 
        correspondant au continent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sélectionné 
        (ayant le même continent_id que le id du continent sélectionné)
    </li>
    <li>
        Il est également possible d'utilisé les liste liées lors de l'édition. (Malheureusement il affiche la bonne liste mais pas la
        nationalité correspondant à &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l'auteur sélectionné)
    </li>
</ul><br/>

<h4>Interface monopage avec Rest</h4>
<ul>
    <li>
        L'interface monopage avec Rest est effectué sur la table Tags
    </li>
    <li>
        On peut y accéder en cliquant sur le lien Monopage dans le menu
    </li>
    <li>
        Elle fait appel au code JavaScript index.js pour compléter ses action telle que add/edit/delete
    </li>
</ul><br/>

<h4>Préfixe de routage "Admin"</h4>
<ul>
    <li>
        Le prefixe de routage "Admin" est utilisé sur la table nationalities
    </li>
    <li>
        Lorsque l'on est pas en session, seul les vues index et view son disponible. Il est également imposible
        d'avoir accès au action pour &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;add/edit/delete une nationalité
    </li>
    <li>
        Une fois en session, nous avons accès à la section admin avec les action add/edit/delete
    </li>
</ul><br/>

<h4>Interface adaptative Bootstrap</h4>
<ul>
    <li>
        L'interface adaptative Bootstrap est utilisé pour la vue view de la table nationalities.
    </li>
    <li>
        Elle efféctuer pour la vue view avec et sans le prefix admin.
    </li>    
</ul><br/>

<h4>Document pdf</h4>
<ul>
    <li>
        Il est possible de créer un document pdf de la table Books en cliquant sur le lien pdf dans l'index de cette dernière.
    </li>
    <li>
        Le greffon utilisé pour convertir de html en pdf est Mpdf.
    </li>    
</ul><br/>

<h4>Information utile au test</h4>
<ul>
    <li>
        ID: 1 &nbsp; User: Jonathan &nbsp; Email:Joe@gmail.com &nbsp; Password:admin1 &nbsp; Courriel confirmer
    </li>
    <li>
        ID: 2 &nbsp; User: André &nbsp; Email:aPillon@gmail.com &nbsp; Password:admin2 &nbsp; non confirmer
    </li>
</ul><br/>

<div> 
    <h3 style="text-align: center;">La base de données utilisée par ce site</h3> <br/>
    <div><?= @$this->Html->image('apropos/bd_babelio_phpmyadmin.PNG', ['style' => 'margin-right: auto; margin-left: auto; display: block;']) ?></div>
</div>
<br/>
<div>  
    <h3 style="text-align: center;">est basée sur cet exemple : Books DB2 Sample</h3><br/>
    <div><?= @$this->Html->image('apropos/generic_book_data_model.PNG', ['style' => 'margin-right: auto; margin-left: auto; display: block;']) ?></div>
</div><br/>
<h3 style="text-align: center;"><?= $this->Html->link("https://www.db2tutorial.com/getting-started/db2-sample-database/") ?></h3>

<br/><br/>

<?= $this->Html->link(__('Retour à la page du livre'), array('controller' => 'Books', 'action' => 'index'), array('class' => 'button')) ?>