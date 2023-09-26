<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build('/api/tags');
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Tags/index', ['block' => 'scriptBottom']);
?>

<br />

<div  ng-app="app" ng-controller="TagCRUDCtrl">
    <input type="hidden" id="id" ng-model="tag.id" />
    <table>
        <tr>
            <td width="100">Name:</td>
            <td><input type="text" id="name" ng-model="tag.name" /></td>
        </tr>
        <tr>
            <td width="100">Definition:</td>
            <td><input type="text" id="definition" ng-model="tag.definition" /></td>
        </tr>
    </table>

    <button ng-click="updateTag(tag)">Mettre à jour Tag</button> 
    <button ng-click="addTag(tag.name, tag.definition)">Ajouter Tag</button>

    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center">ID</th>
                <th class="width-30-pct">Name</th>
                <th class="width-30-pct">Definition</th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>

        <tbody ng-init="getAllTags()">

            <tr ng-repeat="tag in tags| filter:search">
                <td class="text-align-center">
                    {{tag.id}}
                </td>
                <td>
                    {{tag.name}}
                </td>
                <td>
                    {{tag.definition}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getTag(tag.id)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteTag(tag.id)">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>
    <!--pre ng-show='tags'>{{tags| json }}</pre-->
</div>

