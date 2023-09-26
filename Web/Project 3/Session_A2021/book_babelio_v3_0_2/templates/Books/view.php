<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->slug], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books view content">
            <h3><?= h($book->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $book->has('user') ? $this->Html->link($book->user->id, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= h($book->author['name']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($book->title) ?></td>
                </tr>
                <!--
                <tr>
                    <th><?= __('Image') ?></th>
                    <td style="text-align: center;"><?= @$this->Html->image('books/' . h($book->image)) ?></td>
                </tr>
                -->
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($book->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($book->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nb Pages') ?></th>
                    <td><?= $this->Number->format($book->nb_pages) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= $this->Number->format($book->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($book->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($book->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Summary') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($book->summary)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Tags') ?></h4>
                <?php if (!empty($book->tags)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Definition') ?></th>
                            </tr>
                            <?php foreach ($book->tags as $tags) : ?>
                                <tr>
                                    <td><?= h($tags->name) ?></td>
                                    <td><?= h($tags->definition) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reviews') ?></h4>
                <?php if (!empty($book->reviews)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Body') ?></th>
                            </tr>
                            <?php foreach ($book->reviews as $reviews) : ?>
                                <tr>
                                    <td><?= h($reviews->user_id) ?></td>
                                    <td><?= h($reviews->body) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <div class="related">
                <h4><?= __('Related Files') ?></h4>
                <?php if (!empty($book->files)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($book->files as $files) : ?>
                                <tr>
                                    <td>                                
                                        <?= $this->Html->image($files->path . $files->name, ['style' => 'max-width:50px;height:50px;border-radius:50%;']); ?>
                                    </td>
                                    <td><?= h($files->created) ?></td>
                                    <td><?= h($files->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
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
