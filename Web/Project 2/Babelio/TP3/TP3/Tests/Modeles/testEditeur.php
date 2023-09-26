<?php

require_once 'Modele/Editeur.php';

$tstEditeur = new Editeur;
$editeurs = $tstEditeur->getEditeurs();
echo '<h3>Test getEditeurs : </h3>';
var_dump($editeurs->rowCount());

echo '<h3>Test getEditeur : </h3>';
$editeur =  $tstEditeur->getEditeur(1);
var_dump($editeur);