<?php

require_once 'Modele/Livre.php';

$tstLivre = new Livre();
$livres = $tstLivre->getLivres(1);
echo '<h3>Test getLivres : </h3>';
var_dump($livres->rowCount());

$livre = $tstLivre->getLivre(4);
echo '<h3>Test getLivre : </h3>';
var_dump($livre);