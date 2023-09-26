<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>
<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Continents",
    "action" => "getContinents",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Authors/add_edit/edit', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?=
            $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $author->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $author->id), 'class' => 'side-nav-item']
            )
            ?>
            <?= $this->Html->link(__('List Authors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="authors form content" ng-app="linkedlists" ng-controller="continentsController">
            <?= $this->Form->create($author) ?>
            <fieldset>
                <legend><?= __('Edit Author') ?></legend>
                <input type="hidden" ng-init="continentId =<?= $author["continent_id"] ?>" ng-model="continentId">
                <input type="hidden" ng-init="nationalityId =<?= $author["nationality_id"] ?>" ng-model="nationalityId">
                <div>
                    <?= __('Continents') ?> : 
                    <select 
                        name="continent_id"
                        id="continent-id" 
                        ng-model="continent" 
                        ng-options="continent.name for continent in continents track by continent.id"
                        >
                        <option value=''>Select</option>
                    </select>
                </div>
                <div>
                    <?= __('Nationalities') ?> : 
                    <!--pre ng-show='continents'>{{ continents | json }}></pre-->
                    <select
                        name="nationality_id"
                        id="nationality-id" 
                        ng-disabled="!continent" 
                        ng-model="nationality"
                        ng-options="nationality.name for nationality in continent.nationalities track by nationality.id"
                        >
                        <option value=''>Select</option>
                    </select>
                </div>
                <?php
                // echo $this->Form->control('continent_id', ['options' => $continents]);
                // echo $this->Form->control('nationality_id');
                echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
