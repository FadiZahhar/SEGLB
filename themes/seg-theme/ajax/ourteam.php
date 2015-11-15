<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 99, 'category_name' => 'about-us', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
$meta = get_post_meta ($parents[2]->ID);
$image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
$icons = $dynamic_featured_image->get_featured_images($parents[2]->ID);
// get the id of the parent category to be able to search for shild categories
//$catid = get_category_by_slug('services');
//$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
//$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
//$childs = get_posts( $args );
$content = explode("<br/>",$parents[2]->post_content);
?>
<head>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<style>
.sub-content {
  background-repeat:no-repeat;
  background-size:cover;
}
@media only screen and (max-width: 1024px) {
.grids-slider-grid-row2-grid1 {
  width:24%!important;
}

.grids-slider-grid-row2-grid2 {
  width:74%!important;
}

}

@media only screen and (max-width: 980px) {
.grids-slider-grid-row2-grid1 {
  width:100%!important;
  margin:0 auto;
  float:right;
}
.grids-slider-grid-row2-grid2 {
  width:100%!important;
  margin:0 auto;
}

}

@media only screen and (max-width: 720px) {

  .sub-content {
    background-position:-160px 0;
  }

  .grids-slider-grid-row2-grid1 {
    float:none;
    clear:both;
  }

  .sub-content p {
      font-size: 14px;
      line-height: 1;
      width: 75%;
      padding-left: 15%;
      text-align: justify;
  }

}

@media only screen and (max-width:400px) {

  .sub-content {
    background-position:-170px 0;
  }

  .grids-slider-grid-row2-grid1 {
    float:none;
    clear:both;
  }

  .sub-content p {
      font-size: 14px;
      line-height: 1;
      width: 75%;
      padding-left: 15%;
      text-align: justify;
  }

}
</style>
<div class="grids-slider-grid-row2">
  <div class="grids-slider-grid-row2-grid1" style="width:30%">

    <h1 class="title">About Us</h1>
    <ul class="menu">
      <li onclick="document.location.href='#aboutus'">company profile</li>
      <li onclick="document.location.href='#philosophy'">philosophy</li>
      <li class="current">our team</li>
    </ul>

    <div>
  </div>

  <div class="clear"> </div>

  </div>

  </div>
  <!---->
  <div class="grids-slider-grid-row2-grid2" style="width:65%;padding-top:20px;" onclick="location.href='#';">

    <img src="<?= $image[0] ?>" />


    <div class="clear"> </div>
  </div>
  <!--//-->

  <div class="clear"> </div>

<div class="clear"> </div>
