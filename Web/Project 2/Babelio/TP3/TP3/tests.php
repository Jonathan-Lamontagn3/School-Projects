<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleEditeur') {
        require 'Tests/Modeles/testEditeur.php';
    } else if ($_GET['test'] == 'modeleLivre') {
        require 'Tests/Modeles/testLivre.php';
    } else if ($_GET['test'] == 'modeleGenre') {
        require 'Tests/Modeles/testGenre.php';
    } else if ($_GET['test'] == 'vueAccueil') {
        require 'Tests/Vues/testVueAccueil.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleEditeur">Editeur</a>
    </li>
    <li>
        <a href="tests.php?test=modeleLivre">Livre</a>
    </li>
    <li>
        <a href="tests.php?test=modeleGenre">Genre</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueAccueil">Accueil</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
