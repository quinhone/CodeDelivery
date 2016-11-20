/**
 * Created by LuisCarlos on 20/11/2016.
 */
angular.module('starter.services')
    .factory('Order', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseURL + '/api/client/order/:id', {id: '@id'}, {
            'query': {
                isArray: false
            }
        });
    }]);