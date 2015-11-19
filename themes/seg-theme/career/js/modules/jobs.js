/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function(){
    
var app = angular.module('jobs',[]);

app.controller('JobController', function(){
    this.jobs = jobs;
});

app.controller('PanelController', function(){
   this.tab = 1
   this.selectTab = function(setTab) {
       this.tab = setTab;
   };
   
   this.isSelected = function(checkTab) {
    return this.tab === checkTab;   
   };
});

var jobs = [{
    id:1,
    category_name: 'Engineers',
    jobs: [
        {
            name:'Civil',
            id: 1,
        },
        {
            name:'Mecanical',
           id: 2,
        },
        {
            name:'Electrical',
            id: 3,
        },
        {
            name:'Architecture',
            id: 4,
        }
    ]
},
{
    id:2,
    category_name: 'Business',
    jobs: [
        {
            name:'Civil',
            id: 5,
        },
        {
            name:'Mecanical',
            id: 6,
        },
        {
            name:'Electrical',
            id: 7,
        },
        {
            name:'Architecture',
            id: 8,
        }
    ]
},
{
    id:3,
    category_name: 'Others',
    jobs: [
        {
            name:'Civil',
            id: 9,
        },
        {
            name:'Mecanical',
            id: 10,
        },
        {
            name:'Electrical',
            id: 11,
        },
        {
            name:'Architecture',
            id: 12,
        }
    ]
}];
})();

