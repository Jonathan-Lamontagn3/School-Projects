var onloadCallback = function () {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app', []);

var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('TagCRUDJwtCtrl', ['$scope', 'TagCRUDJwtService', function ($scope, TagCRUDJwtService) {

        $scope.updateTag = function (tag) {
            TagCRUDJwtService.updateTag(tag)
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
            TagCRUDJwtService.getTag(id)
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
                TagCRUDJwtService.addTag($scope.tag.name, $scope.tag.definition)
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
            TagCRUDJwtService.deleteTag(id)
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
            TagCRUDJwtService.getAllTags()
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

        $scope.login = function () {
            if (grecaptcha.getResponse(widgetId1) == '') {
                $scope.captcha_status = 'Please verify captha.';
                return;
            } else {
                $scope.captcha_status = '';
            }
            if ($scope.user != null && $scope.user.email) {
                TagCRUDJwtService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.email + ' en session!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token.jwt);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Courriel ou mot de passe invalide...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Entrez un courriel s.v.p.';
                $scope.message = '';
            }

        }
        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = '';
            $scope.errorMessage = 'Utilisateur déconnecté!';
        }
        $scope.changePassword = function () {
            TagCRUDJwtService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Mot de passe mis à jour!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Mot de passe inchangé!';
                                $scope.message = '';
                            });
        }

    }]);

app.service('TagCRUDJwtService', ['$http', function ($http) {

        this.getTag = function getTag(tagId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + tagId,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            });
        }

        this.addTag = function addTag(name, definition) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name, definition: definition},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            });
        }

        this.deleteTag = function deleteTag(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            })
        }

        this.updateTag = function updateTag(tag) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + tag.id,
                data: {name: tag.name, definition: tag.definition},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
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

        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {email: user.email, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }
        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            })
        }

    }]);


