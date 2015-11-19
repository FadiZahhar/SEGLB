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
  top:-180px!important;
}
</style>
<script src="<?= get_template_directory_uri(); ?>/projects/js/modernizr-custom.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/example/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/freewall.js"></script>

  <div class="">
    <div class="grid">
      <?php
      foreach($parents as $parent):
        // get the image
        $meta = get_post_meta ($parent->ID);
        $full = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');

        $medium = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'medium');
        $images = $dynamic_featured_image->get_featured_images($parent->ID);
        // get the brick class
        $class = $meta['project_image_size'];
       ?>
      <div class="grid__item" data-size="<?= $class[0] ?>">
        <a href="<?= $full[0] ?>" class="img-wrap"><img src="<?= $medium[0] ?>" alt="<?= $parent->post_title ?>" />
          <div class="description2">
            <h3><?= $parent->post_title ?></h3>
            <p><?= substr($parent->post_content, 0, 100); ?></p>
          </div>
          <div class="description description--grid">
            <div class="thumb-container">
              <ul>
            <?php
            foreach($images as $image):
            ?>
                <li style="cursor:pointer"><img src="<?= $image['thumb'] ?>" width="100" height="80" onclick="getimg('<?= $image['full'] ?>')"/></li>
            <?php
            endforeach;
             ?>
              </ul>
            </div>
            <h3><?= $parent->post_title ?></h3>
            <p><?= $parent->post_content ?></p>

          </div>
        </a>
      </div>
      <?php
      endforeach;
      ?>

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
  })();
</script>
