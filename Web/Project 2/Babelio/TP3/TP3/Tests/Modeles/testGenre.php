<?php

require_once 'Modele/Genre.php';

echo '<h3>Test searchGenre(\'ro\') : </h3>';
$tstGenre = new Genre();
$genres = $tstGenre->searchGenre('ro');
var_dump($genres);
