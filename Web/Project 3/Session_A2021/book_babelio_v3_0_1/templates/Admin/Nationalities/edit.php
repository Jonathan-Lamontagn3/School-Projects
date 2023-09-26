<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationality $nationality
 * @var \App\Model\Entity\Continent[]|\Cake\Collection\CollectionInterface $continents
 * @var \App\Model\Entity\Author[]|\Cake\Collection\CollectionInterface $authors
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nationality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationality->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Nationalities'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Continents'), ['prefix' => false,'controller' => 'Continents', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Continent'), ['prefix' => false,'controller' => 'Continents', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Authors'), ['prefix' => false,'controller' => 'Authors', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Author'), ['prefix' => false,'controller' => 'Authors', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="nationalities form content">
    <?= $this->Form->create($nationality) ?>
    <fieldset>
        <legend><?= __('Edit Nationality') ?></legend>
        <?php
            echo $this->Form->control('continent_id', ['options' => $continents]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
