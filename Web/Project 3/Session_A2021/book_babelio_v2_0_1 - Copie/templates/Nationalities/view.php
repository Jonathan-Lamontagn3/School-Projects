<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationality $nationality
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nationality'), ['action' => 'edit', $nationality->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nationality'), ['action' => 'delete', $nationality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationality->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nationalities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nationality'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="nationalities view content">
            <h3><?= h($nationality->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Continent') ?></th>
                    <td><?= $nationality->has('continent') ? $this->Html->link($nationality->continent->name, ['controller' => 'Continents', 'action' => 'view', $nationality->continent->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($nationality->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nationality->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Authors') ?></h4>
                <?php if (!empty($nationality->authors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Continent Id') ?></th>
                            <th><?= __('Nationality Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($nationality->authors as $authors) : ?>
                        <tr>
                            <td><?= h($authors->id) ?></td>
                            <td><?= h($authors->continent_id) ?></td>
                            <td><?= h($authors->nationality_id) ?></td>
                            <td><?= h($authors->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Authors', 'action' => 'view', $authors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Authors', 'action' => 'edit', $authors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Authors', 'action' => 'delete', $authors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
