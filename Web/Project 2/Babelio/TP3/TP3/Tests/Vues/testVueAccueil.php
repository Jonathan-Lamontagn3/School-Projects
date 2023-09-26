<?php

require_once 'Framework/Vue.php';
$editeurs = [
    [
        'id' => '991',
        'nom' => 'titre Test 1',
        'information' => 'Editeur test 1'
    ],
    [
        'id' => '992',
        'nom' => 'titre Test 2',
        'information' => 'Editeur test 1'
    ]
];
$vue = new Vue('index', 'Editeur');
$vue->generer(['editeurs' => $editeurs]);

