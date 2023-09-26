<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationality $nationality
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard_collapsable'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Nationalities'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Continents'), ['controller' => 'Continents', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', $this->fetch('tb_actions')); ?>

<div class="nationalities view large-9 medium-8 columns content">
    <h3><?= h($nationality->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Continent') ?></th>
                <td><?= $nationality->has('continent') ? $this->Html->link($nationality->continent->name, ['controller' => 'Continents', 'action' => 'view', $nationality->continent->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($nationality->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($nationality->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Authors') ?></h4>
        <?php if (!empty($nationality->authors)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Continent Id') ?></th>
                    <th scope="col"><?= __('Nationality Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($nationality->authors as $authors): ?>
                <tr>
                    <td><?= h($authors->id) ?></td>
                    <td><?= h($authors->continent_id) ?></td>
                    <td><?= h($authors->nationality_id) ?></td>
                    <td><?= h($authors->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Authors', 'action' => 'view', $authors->id], ['class' => 'btn btn-secondary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
