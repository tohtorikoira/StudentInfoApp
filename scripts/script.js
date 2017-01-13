var crudApp = angular.module('crudApp', []);

var MainController = function($scope, $http) {

    $scope.todos;
    $scope.repoSortOrder = "+firstname";

    $scope.getStudents = function() {

        $http({
                method: 'GET',
                url: 'get.php'
            })
            .then(function(response) {
                $scope.todos = response.data;
            }, function(response) {

                console.log(response.data, response.status);
            });
    };

    $scope.getStudents();

    $scope.addPerson = function() {
        $http({
            method: 'POST',
            url: 'add.php',
            data: { newfirstName: $scope.newfirstName, newlastName: $scope.newlastName, newEmail: $scope.newEmail }

        }).then(function(response) { // on success
            $scope.getStudents();
            $scope.newfirstName = "";
            $scope.newlastName = "";
            $scope.newEmail = "";

        }, function(response) {

            console.log(response.data, response.status);

        });
    };

    $scope.delete = function(id) {

        $http({
            method: 'POST',
            url: 'delete.php',
            data: { delID: id }

        }).then(function(response) { // on success
            console.log('{id}');
            $scope.getStudents();

        }, function(response) {

            console.log(response.data, response.status);

        });
    };

    $scope.update = function(id, firstname, lastname, email) {

        $scope.delete(id);
        $scope.addPerson();

    };

    $scope.modify = function(id, firstname, lastname, email) {
        console.log("ID " + id);
        $scope.newfirstName = firstname;
        $scope.newlastName = lastname;
        $scope.newEmail = email;

        $scope.currentFirstname = firstname;
        $scope.currentLastname = lastname;
        $scope.currentEmail = email;
        $scope.currentId = id;

        $scope.showme = "true";


    };




};
