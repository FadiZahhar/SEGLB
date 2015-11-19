/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function(){
    var app = angular.module('directives',[]);
    
    app.directive('productTitle',function(){
    return {
      restrict: 'E',
      templateUrl: 'product-title.html'
    };
});
})();

