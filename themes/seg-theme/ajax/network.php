<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 99, 'category_name' => 'network', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
$meta = get_post_meta ($parents[0]->ID);
$image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
// get the id of the parent category to be able to search for shild categories
//$catid = get_category_by_slug('home-page');
//$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
//$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
//$childs = get_posts( $args );

?>
<head>
  <style>
  iframe {
    overflow: hidden;
    border:none;
    width:100%;
    max-width:1000px;
    max-height:600px;
  }
  </style>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<div class="grids-slider-grid-row2">
  <div class="grids-slider-grid-row2-grid1" style="width:100%">

    <h1 class="title"><?= $parents[0]->post_title ?></h1>

    <!-- <img src="<?= $image[0] ?>" class="map1" /> -->
    <iframe src="<?= get_template_directory_uri(); ?>/maps/map.html" width="100%" height="600" scrolling="no" />


  </div>

  <div class="clear"> </div>


</div>
