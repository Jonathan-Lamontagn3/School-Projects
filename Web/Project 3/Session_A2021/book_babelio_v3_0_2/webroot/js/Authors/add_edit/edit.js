var app = angular.module('linkedlists', []);

app.controller('continentsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.continents = response.data.continents;
        angular.forEach($scope.continents, function (continent) {
            if (continent.id == $scope.continentId) {
                $scope.continent = continent;
                angular.forEach($scope.continent.nationalities, function (nationality) {
                    if (nationality.id == $scope.nationalityId) {
                        $scope.nationality = nationality;
                    }
                })
            }
        })
    });
});

