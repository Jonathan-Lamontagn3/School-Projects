<?php

require_once 'Framework/Vue.php';
$livre = [
        'id' => '911',
        'titre' => 'test',
        'rating' => '3',
        'date_edition' => '2012-12-12',
        'resumer' => 'Mon resumer Test',
        'image' => 'CA_RBED_250_Single-Unit_close_cold_ORIGINAL_canwidth528px.png'
    ];
$vue = new Vue('Confirmer', 'AdminLivre');
$vue->generer(['livre' => $livre]);

