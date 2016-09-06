angular.module('starter.controllers')
    .controller('ClientViewProductCtrl', ['$scope', '$state', 'appConfig', '$resource', function ($scope, $state, appConfig, $resource) {

        var product = $resource(appConfig.baseURL + '/api/client/products');

        product.query();

    }]);