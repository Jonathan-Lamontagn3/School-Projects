<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="books view content">
            <h3><?= h($book->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= h($book->author['name']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($book->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td style="text-align: center;"><?= @$this->Html->image('books/' . h($book->image)) ?></td>
                </tr>
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
        </div>
    </div>
</div>
