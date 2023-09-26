<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationality[]|\Cake\Collection\CollectionInterface $nationalities
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Admin Nationalities'), ['prefix' => 'Admin','controller' => 'Nationalities','action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
<li><?= $this->Html->link(__('List Continents'), ['controller' => 'Continents', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('continent_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($nationalities as $nationality) : ?>
        <tr>
            <td><?= $nationality->has('continent') ? $this->Html->link($nationality->continent->name, ['controller' => 'Continents', 'action' => 'view', $nationality->continent->id]) : '' ?></td>
            <td><?= h($nationality->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $nationality->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
