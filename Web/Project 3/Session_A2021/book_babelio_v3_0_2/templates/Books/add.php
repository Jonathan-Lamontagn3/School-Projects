<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<?php
$urlToAuthorsAutocompletedemoJson = $this->Url->build([
    "controller" => "Authors",
    "action" => "findAuthors",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToAuthorsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Books/add_edit/authorAutocomplete', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books form content">
            <?= $this->Form->create($book, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Book') ?></legend>
                <?php
                //echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->control('title');
                echo $this->Form->control('author_id', ['label' => '(author_id)', 'type' => 'hidden']);
                //echo $this->Form->control('slug');
                ?>
                
                <div>
                    <label for="autocomplete"><?= __("Author") ?></label>
                    <input id="autocomplete" type="text">
                </div>
                
                <?php
                echo $this->Form->control('nb_pages');
                echo $this->Form->control('rating');
                echo $this->Form->control('summary');
                echo $this->Form->control('image_file', ['type' => 'file']);
                //echo $this->Form->control('reviews._ids', ['options' => $reviews]);
                echo $this->Form->control('tags._ids', ['options' => $tags]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
