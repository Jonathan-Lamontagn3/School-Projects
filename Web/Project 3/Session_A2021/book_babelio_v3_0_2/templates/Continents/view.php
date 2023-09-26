<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Continent $continent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Continent'), ['action' => 'edit', $continent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Continent'), ['action' => 'delete', $continent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $continent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Continents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Continent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="continents view content">
            <h3><?= h($continent->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($continent->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($continent->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Authors') ?></h4>
                <?php if (!empty($continent->authors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Continent Id') ?></th>
                            <th><?= __('Nationality Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($continent->authors as $authors) : ?>
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
            <div class="related">
                <h4><?= __('Related Nationalities') ?></h4>
                <?php if (!empty($continent->nationalities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Continent Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($continent->nationalities as $nationalities) : ?>
                        <tr>
                            <td><?= h($nationalities->id) ?></td>
                            <td><?= h($nationalities->continent_id) ?></td>
                            <td><?= h($nationalities->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Nationalities', 'action' => 'view', $nationalities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Nationalities', 'action' => 'edit', $nationalities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nationalities', 'action' => 'delete', $nationalities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalities->id)]) ?>
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
