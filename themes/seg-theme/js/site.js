// call this from the developer console and you can control both instances
/*
 * jQuery hashchange event - v1.3 - 7/21/2010
 * http://benalman.com/projects/jquery-hashchange-plugin/
 *
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
 (function($) {
   "use strict";
   $(function(){

$.LoadingOverlay("show");
$('#menu').slicknav({
  label : ''
});
     function getpage(page) {
       $.ajax({
  url: 'http://localhost/segwordpress/wp-content/themes/seg-theme/ajax/'+page+'.php?rand='+Math.random(),
  data: {
     format: 'html'
  },
  error: function() {
     //$('#info').html('<p>An error has occurred</p>');
  },
  dataType: 'html',
  success: function(data) {
    $.LoadingOverlay("hide");
     $('.grids-slider').html(data);
       geteffect(page);
  },
  type: 'GET'
});
     }


     function getabout(id) {
       $.ajax({
  url: 'http://localhost/segwordpress/wp-content/themes/seg-theme/ajax/aboutus.php?id='+id+'&rand='+Math.random(),
  data: {
     format: 'html'
  },
  error: function() {
     //$('#info').html('<p>An error has occurred</p>');
  },
  dataType: 'html',
  success: function(data) {
    $.LoadingOverlay("hide");
     $('.grids-slider').html(data);
       geteffect('aboutus');
  },
  type: 'GET'
});
     }

    $(window).bind( 'hashchange', function(e) {
      var hash = window.location.hash;
      $('ul li').find('a').removeClass('current');

      switch(hash) {

        case "#aboutus":
        geteffectout();
        setTimeout(function()
          {
            getpage('aboutus');
          }, 1000);
          $('a[href=#aboutus]').addClass('current');
        break;

        case "#network":
        geteffectout();
        setTimeout(function()
          {
            getpage('network');
          }, 1000);
          $('a[href=#network]').addClass('current');
        break;

        case "#services":
        geteffectout();
        setTimeout(function()
          {
            getpage('services');
          }, 1000);
          $('a[href=#services]').addClass('current');
        break;

        case "#projects":
        geteffectout();
        setTimeout(function()
          {
              getpage('projects');
          }, 1000);
          $('a[href=#projects]').addClass('current');
        break;

        case "#gallery":
        geteffectout();
        setTimeout(function()
          {
              getpage('gallery');
          }, 1000);
          //$('a[href=#projects]').addClass('current');
        break;

        case "#projectscountries":
        geteffectout();
        setTimeout(function()
          {
              getpage('projectscountries');
          }, 1000);
          $('a[href=#projects]').addClass('current');
        break;

        case "#news":
        geteffectout();
        setTimeout(function()
          {
              getpage('news');
          }, 1000);
          $('a[href=#news]').addClass('current');
        break;

        case "#careers":
        geteffectout();
        setTimeout(function()
          {
            getpage('careers');
          }, 1000);
          $('a[href=#careers]').addClass('current');
        break;

        case "#contactus":
        geteffectout();
        setTimeout(function()
          {
            getpage('contactus');
          }, 1000);
          $('a[href=#contactus]').addClass('current');
        break;


        default:
        if(hash.indexOf("projects-") > -1) {
          geteffectout();
          getpage('projects');
          return;
        }
        if(hash.indexOf("aboutus-") > -1) {
          var id = hash.split("-");
          geteffectout();
          getabout(id[1]);
          return;
        }
        var news_id = hash.split("-");
        if(news_id[1]!=undefined) {
          geteffectout();
          getpage('news');
        }
        else {
        geteffectout();
        setTimeout(function()
          {
            getpage('home');
          }, 1000);
        }
        break;

      }
    });

     $(window).load(function() {
     // Animate loader off screen
     $.LoadingOverlay("hide");
     getpage('home');
     });

     function geteffect(page) {

       switch(page) {
       case "aboutus":
       $('.title').addClass('animated fadeInDown');
       $('.menu').addClass('animated fadeInLeft');
       $('.sub-content').addClass('animated fadeInRight');
       break;

       case "ourteam":
       $('.title').addClass('animated fadeInDown');
       $('.menu').addClass('animated fadeInLeft');
       $('.grids-slider-grid-row2-grid2').find('img').addClass('animated fadeInRight');
       break;

       case "philosophy":
       $('.title').addClass('animated fadeInDown');
       $('.menu').addClass('animated fadeInLeft');
       $('.sub-content').addClass('animated fadeInRight');
       break;

       case "network":
       $('.title').addClass('animated fadeInDown');
       $('.map1').addClass('animated fadeInUp');
       $('.grids-slider-grid-row2-grid2').find('img').addClass('animated fadeInRight');
       break;

       case "news":
       $('.size22').addClass('animated fadeInLeft');
       $('.size43').addClass('animated fadeInRight');
       break;

       case "services":
       $('.size12').addClass('animated fadeInUp');
       $('.size11').addClass('animated fadeInUp');
       $('.size21').addClass('animated fadeInDown');
       $('#info1').addClass('animated fadeInDown');
       $('#info2').addClass('animated fadeIn');
       $('#info3').addClass('animated fadeInUp');
       $('#info4').addClass('animated fadeInRight');
       $('#info5').addClass('animated fadeInRight');
       $('#info6').addClass('animated fadeInRight');
       break;

       case "contactus":
       $('.size11').addClass('animated fadeInUp');
       $('.box_332_162').addClass('animated fadeInUp');
       $('.size43').addClass('animated fadeInRight');
       break;

       case "careers":
       $('.career-big-icon').addClass('animated fadeInLeft');
       $('.size11').addClass('animated fadeInDown');
       $('.size43').addClass('animated fadeInRight');
       break;

       default:
       $('.size11').addClass('animated slideInDown');
       $('.size12').addClass('animated slideInDown');
       $('.size22').addClass('animated slideInLeft');
       $('.size3in1').addClass('animated slideInUp');
       $('.size23').addClass('animated slideInRight');
       break;
     }
     }

     function geteffectout() {

       $('.menu').addClass('animated fadeOutLeft');
       $('.grids-slider-grid-row2-grid2').find('img').addClass('animated fadeOutRight');
       $('.sub-content').addClass('animated fadeOutRight');

       $('.title').addClass('animated fadeOutUp');
       $('.map1').addClass('animated fadeOutDown');
       $('.size43').addClass('animated fadeOutRight');

       $('.size12').addClass('animated fadeOutDown');
       $('.size11').addClass('animated fadeOutDown');
       $('.size21').addClass('animated fadeOutUp');
       $('#info1').addClass('animated fadeOutDown');
       $('#info2').addClass('animated fadeOut');
       $('#info3').addClass('animated fadeOutUp');
       $('#info4').addClass('animated fadeOutRight');
       $('#info5').addClass('animated fadeOutRight');
       $('#info6').addClass('animated fadeOutRight');

       $('.box_332_162').addClass('animated fadeOutUp');


       $('.size22').addClass('animated slideOutLeft');
       $('.size3in1').addClass('animated slideOutDown');
       $('.size23').addClass('animated slideOutRight');


       $.LoadingOverlay("show");
     }
     function animationHover(element, animation){
       element = $(element);
       element.hover(
         function() {
           element.addClass('animated ' + animation);
         },
         function(){
           //wait for animation to finish before removing classes
           window.setTimeout( function(){
             element.removeClass('animated ' + animation);
           }, 2000);
         }
       );
     };


     function animationClick(element, animation){
     element = $(element);
     element.click(
       function() {
         element.addClass('animated ' + animation);
         //wait for animation to finish before removing classes
         window.setTimeout( function(){
             element.removeClass('animated ' + animation);
         }, 2000);
       }
     );
   };


   })
 })(jQuery);


  // Since the event is only triggered when the hash changes, we need to trigger
  // the event now, to handle the hash the page may have loaded with.

  // Hide it after 3 seconds
