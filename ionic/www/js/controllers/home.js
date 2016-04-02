angular.module('starter.controllers',[])
    .controller('HomeCtrl',['$scope',function($scope,$resource){
        $scope.load = function(){
            return $resource(
                '/api/user/authenticated'
            );
            $scope.user = $resource.query();
        };
}]);