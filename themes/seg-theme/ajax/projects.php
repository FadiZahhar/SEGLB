<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 99, 'category_name' => 'projects', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
// get the id of the parent category to be able to search for shild categories
$catid = get_category_by_slug('projects');
$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$childs = get_posts( $args );
/*echo "<pre>";
print_r($parents);
exit;*/
?>
<head>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/projects/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/projects/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />

<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/projects/css/style2.css" />

<style>
.thumb-container > ul {
  list-style: none;
  max-width:80%;
}

.thumb-container > ul > li {
  display:inline-block!important;
}

.thumb-container > li:hover {
  border:1px solid #004b93;
}

.img-wrap > .description2 {
  position:absolute;
  top:0px;
  padding:10px;
  visibility:hidden;
}

.img-wrap > .description2 > .details {
  visibility:hidden;
}

.img-wrap > .description  {
  display:none;
}

.img-wrap:hover > .description2 {
  visibility:visible;
}

button.action.action--close {
  color:#fff;
}

.description--preview {
  top:-50px!important;
}

.description--preview p {
	font-size: 0.65em;
	max-width: 80%!important;
	text-align: justify;
}

.description2 p {
	font-size:11px;
	max-width: 80%!important;
	text-align: justify;
}
</style>

<style>


/* -------------------- Select Box Styles: bavotasan.com Method (with special adaptations by ericrasch.com) */
/* -------------------- Source: http://bavotasan.com/2011/style-select-box-using-only-css/ */
.styled-select {
   background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
   height: 29px;
   overflow: hidden;
   width: 240px;
}

.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}

.styled-select.slate {
   background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
   height: 34px;
   width: 240px;
}

.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

/* -------------------- Rounded Corners */
.rounded {
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
}

.semi-square {
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
}

/* -------------------- Colors: Background */
.slate   { background-color: #ddd; }
.green   { background-color: #779126; }
.blue    { background-color: #004b93; }
.yellow  { background-color: #eec111; }
.black   { background-color: #000; }

/* -------------------- Colors: Text */
.slate select   { color: #000; }
.green select   { color: #fff; }
.blue select    { color: #fff; }
.yellow select  { color: #000; }
.black select   { color: #fff; }


/* -------------------- Select Box Styles: danielneumann.com Method */
/* -------------------- Source: http://danielneumann.com/blog/how-to-style-dropdown-with-css-only/ */
#mainselection select {
   border: 0;
   color: #EEE;
   background: transparent;
   font-size: 20px;
   font-weight: bold;
   padding: 2px 10px;
   width: 378px;
   *width: 350px;
   *background: #58B14C;
   -webkit-appearance: none;
}

#mainselection {
   overflow:hidden;
   width:350px;
   -moz-border-radius: 9px 9px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 9px 9px 9px 9px;
   box-shadow: 1px 1px 11px #330033;
   background: #58B14C url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}


/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: http://stackoverflow.com/a/5809186 */
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}

select option {
    margin:40px;
    background: #004b93;
    color:#fff;
    text-shadow:0 1px 0 rgba(0,0,0,0.4);
    width: 240px;
}

​
    </style>
<script src="<?= get_template_directory_uri(); ?>/projects/js/modernizr-custom.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/example/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/freewall.js"></script>

  <div class="">
    <div class="styled-select blue rounded" style="margin-left:20px;">
      <select id="countrylist">
        <option value="0">All projects</option>
        <?php foreach($childcat as $cat): ?>
        <option value="<?= $cat->cat_ID ?>"><?= $cat->name ?></option>
        <?php  endforeach; ?>
      </select>
    </div>
    <div class="grid">


    </div>
    <!-- /grid -->
    <div class="preview">
      <button class="action action--close"><i class="fa fa-times"></i><span class="text-hidden">Close</span></button>
      <div class="description description--preview"></div>
    </div>
    <!-- /preview -->
  </div>
  <!-- /content -->


<script src="<?= get_template_directory_uri(); ?>/projects/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/projects/js/masonry.pkgd.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/projects/js/classie.js"></script>
<script src="<?= get_template_directory_uri(); ?>/projects/js/main.js"></script>
<script>

function getimg(img_url) {
  $('img.original').attr('src',img_url);
}
  (function() {

    $('#countrylist').on('change',function(e){
      // change the url to projects-id hashtag
      window.location.hash = '#projects-'+$('#countrylist').val();
    });

  })();
</script>
<script>
$(function () {
    'use strict';

    var hash = window.location.hash;
    var cat_id = hash.split("-");
    var url = '';

    if(cat_id[1]==undefined) {
      // put the default code that should display first.
      url = '<?= get_template_directory_uri(); ?>/ajax/ajax.php?cat_id=0&rand='+Math.random();
    }
    else {
      url = '<?= get_template_directory_uri(); ?>/ajax/ajax.php?cat_id='+cat_id[1]+'&rand='+Math.random();
      // set the combo box value
      $('#countrylist').val(cat_id[1]);
    }

    $.ajax({
    url: url,
    data: {
    format: 'html'
    },
    error: function() {
    alert('error');
    },
    dataType: 'html',
    success: function(data) {
    $('.grid').html(data);


    var support = { transitions: Modernizr.csstransitions },
      // transition end event name
      transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
      transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
      onEndTransition = function( el, callback ) {
        var onEndCallbackFn = function( ev ) {
          if( support.transitions ) {
            if( ev.target != this ) return;
            this.removeEventListener( transEndEventName, onEndCallbackFn );
          }
          if( callback && typeof callback === 'function' ) { callback.call(this); }
        };
        if( support.transitions ) {
          el.addEventListener( transEndEventName, onEndCallbackFn );
        }
        else {
          onEndCallbackFn();
        }
      };

    new GridFx(document.querySelector('.grid'), {
      imgPosition : {
        x : -0.5,
        y : 1
      },
      onOpenItem : function(instance, item) {
        instance.items.forEach(function(el) {
          if(item != el) {
            var delay = Math.floor(Math.random() * 50);
            el.style.WebkitTransition = 'opacity .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1), -webkit-transform .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1)';
            el.style.transition = 'opacity .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1), transform .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1)';
            el.style.WebkitTransform = 'scale3d(0.1,0.1,1)';
            el.style.transform = 'scale3d(0.1,0.1,1)';
            el.style.opacity = 0;
          }
        });
      },
      onCloseItem : function(instance, item) {
        instance.items.forEach(function(el) {
          if(item != el) {
            el.style.WebkitTransition = 'opacity .4s, -webkit-transform .4s';
            el.style.transition = 'opacity .4s, transform .4s';
            el.style.WebkitTransform = 'scale3d(1,1,1)';
            el.style.transform = 'scale3d(1,1,1)';
            el.style.opacity = 1;

            onEndTransition(el, function() {
              el.style.transition = 'none';
              el.style.WebkitTransform = 'none';
            });
          }
        });
      }
    });


    },
    type: 'GET'
    });





// possible code to be rewritten to initialized








});
</script>
