<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Nationalities",
    "action" => "getByContinent",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Authors/add_edit/add', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Authors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="authors form content">
            <?= $this->Form->create($author) ?>
            <fieldset>
                <legend><?= __('Add Author') ?></legend>
                <?php
                    echo $this->Form->control('continent_id', ['options' => $continents]);
                    echo $this->Form->control('nationality_id', ['options' => [__('Please select a continent first')]]);
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
