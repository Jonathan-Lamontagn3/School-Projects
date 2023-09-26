var app = angular.module('linkedlists', []);

app.controller('continentsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.continents = response.data.continents;
    });
});

