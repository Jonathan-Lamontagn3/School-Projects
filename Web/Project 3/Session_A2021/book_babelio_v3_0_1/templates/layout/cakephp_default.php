<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

        <?=
        $this->Html->css(['normalize.min',
            'milligram.min',
            'cake',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
        ])
        ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
                ], ['block' => 'scriptLibraries']
        );
        ?>
    </head>
    <body>
        <nav class="top-nav">
            <div class="top-nav-title">
                <a href="<?= $this->Url->build('/') ?>"><span>Babelio</span> Books</a>
            </div>
            <div class="top-nav-links">
                <?= $this->Html->link('A propos', ['controller' => 'Apropos', 'action' => 'index']) ?>
                <?= $this->Html->link(__('Listes liées'), ['controller' => 'Authors', 'action' => 'add']) ?>
                <?= $this->Html->link(__('Autocomplétion'), ['controller' => 'Books', 'action' => 'add']) ?>
                <?= $this->Html->link(__('Monopage'), ['controller' => 'Tags', 'action' => 'index']) ?>
                <?= $this->Html->link(__('Admin demo'), ['prefix' => false, 'controller' => 'Nationalities', 'action' => 'index']) ?>
                <?php
                if (isset($LoggedUser)) {
                    echo $this->Html->link('Logout ', ['controller' => 'Users', 'action' => 'logout']);
                    echo $this->Html->link($LoggedUser->username, ['controller' => 'Users', 'action' => 'view', $LoggedUser->id]);
                } else {
                    echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']);
                }
                ?>
                <?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>
                <?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
                <?= $this->Html->link('Espagnol', ['action' => 'changeLang', 'es_Es'], ['escape' => false]) ?>
            </div>
        </nav>
        <main class="main">
            <div class="container">
                <div style="text-align: right">
                    <?php
                    if (isset($LoggedUser)) {
                        if ($LoggedUser->confirmed == 0) {
                            echo $this->Html->link('Send Mail', ['controller' => 'Users', 'action' => 'resendConfirmEmail', $LoggedUser->id], array('class' => 'button'));
                            echo '<p>Confirm your email if you want all your right. For now you have the same right has an unauthantifiate user.<br/>You also have the right to edit your personal information or delete your own account.</p>';
                        }
                    }
                    ?>
                </div>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer>
        </footer>
        <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script') ?>
        <?= $this->fetch('scriptBottom') ?>
    </body>
</html>
