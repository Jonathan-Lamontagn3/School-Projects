<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>
<div class="books index content">
    <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Books') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('nb_pages') ?></th>
                    <th><?= $this->Paginator->sort('rating') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= h($book->title) ?></td>
                    <td><?= @$this->Html->image('books/' . $book->image, ['style' => 'max-width:50px;height:50px;border-radius:50%;']) ?></td>
                    <td><?= $this->Number->format($book->nb_pages) ?></td>
                    <td><?= $this->Number->format($book->rating) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $book->slug]) ?>
                        <?= $this->Html->link('(pdf)', ['action' => 'view', $book->slug . '.pdf']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->slug]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
