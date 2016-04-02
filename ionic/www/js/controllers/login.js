angular.module('starter.controllers',[])
    .controller('LoginCtrl', ['$scope', 'OAuth','$ionicPopup', '$state', function($scope,OAuth,$ionicPopup,$state){

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function(){
            OAuth.getAccessToken($scope.user).then(
            function(data){
                $state.go('home');
            },function(responseError){
                    $ionicPopup.alert({
                        title:'Attenzione',
                        template:'Login e/o password invalido'
                    })
            })
        }
    }]);