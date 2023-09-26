var app = angular.module('app', []);

app.controller('TagCRUDCtrl', ['$scope', 'TagCRUDService', function ($scope, TagCRUDService) {

        $scope.updateTag = function (tag) {
            TagCRUDService.updateTag(tag)
                    .then(function success(response) {
                        $scope.message = 'Tag data updated!';
                        $scope.errorMessage = '';
                        // Rafraîchir la liste
                        $scope.getAllTags();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating tag!';
                                $scope.message = '';
                            });
        }

        $scope.getTag = function (id) {
//            var id = $scope.tag.id;
            TagCRUDService.getTag(id)
                    .then(function success(response) {
                        $scope.tag = response.data.tag;
                        $scope.tag.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Tag not found!';
                                } else {
                                    $scope.errorMessage = "Error getting tag!";
                                }
                            });
        }

        $scope.addTag = function () {
            if ($scope.tag != null && $scope.tag.name) {
                TagCRUDService.addTag($scope.tag.name, $scope.tag.definition)
                        .then(function success(response) {
                            $scope.message = 'Tag added!';
                            $scope.errorMessage = '';
                            // Rafraîchir la liste
                            $scope.getAllTags();
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding tag!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteTag = function (id) {
            TagCRUDService.deleteTag(id)
                    .then(function success(response) {
                        $scope.message = 'Tag deleted!';
                        $scope.tag = null;
                        $scope.errorMessage = '';
                        // Rafraîchir la liste
                        $scope.getAllTags();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting tag!';
                                $scope.message = '';
                            })
        }

        $scope.getAllTags = function () {
            TagCRUDService.getAllTags()
                    .then(function success(response) {
                        $scope.tags = response.data.tags;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting tags!';
                            });
        }

    }]);

app.service('TagCRUDService', ['$http', function ($http) {

        this.getTag = function getTag(tagId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + tagId,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.addTag = function addTag(name, definition) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name, definition: definition},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.deleteTag = function deleteTag(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            })
        }

        this.updateTag = function updateTag(tag) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + tag.id,
                data: {name: tag.name, definition: tag.definition},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            })
        }

        this.getAllTags = function getAllTags() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

    }]);


