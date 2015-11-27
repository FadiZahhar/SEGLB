<?php
require_once('../../../../wp-config.php');


global $post;
// the parents is the left navigation
$args = array( 'numberposts' => 99, 'category_name' => 'aboutus', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
// if the id is set get the post by id
if(isset($_REQUEST["id"])) {
$parent = get_post ($_REQUEST["id"]);
$meta = get_post_meta ($parent->ID);
$image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
$icons = $dynamic_featured_image->get_featured_images($parent->ID);
$content = explode("<br/>",$parent->post_content);
$title = $parent->post_title;
//echo "here"; echo "<pre>"; print_r($parents); exit;
}
else {

  $meta = get_post_meta ($parents[0]->ID);
  $image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
  $icons = $dynamic_featured_image->get_featured_images($parents[0]->ID);
  $content = explode("<br/>",$parents[0]->post_content);
  $title = $parents[0]->post_title;
}
//echo "<pre>"; print_r($parents);exit;
// get the id of the parent category to be able to search for shild categories
//$catid = get_category_by_slug('services');
//$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
//$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
//$childs = get_posts( $args );

?>
<head>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<style>
ul.ulcontent {
  padding-top:5%;
  padding-bottom:5%;
}

.brline {
  height:2px;
  width:100%;
  background-color:#fff;
  margin-bottom:10px;
}
.row h1 {
  font-size: 28px;
  line-height: 1.5;
  text-align: justify;
  text-transform:capitalize;
  padding-top:10px;
  width:225px;
}
.row {

      line-height: 1;
      width: 72%;
      padding-left: 25%;
      text-align: justify;
}
.subcontent {
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

  .grids-slider-grid-row2-grid1 {
    float:none;
    clear:both;
  }



}

@media only screen and (max-width: 639px) {
ul.ulcontent > li {
  background:none!important;
}

.row h1 {
  font-size: 28px;
  line-height: 1.5;
  text-align: justify;
  text-transform:capitalize;
  padding-top:10px;
  width:225px;
}
.row {

      line-height: 1;
      width: 92%;
      padding-left: 4%;
      padding-right:4%;
      text-align:left;
}
}


</style>
<div class="grids-slider-grid-row2">
  <div class="grids-slider-grid-row2-grid1" style="width:30%">

    <h1 class="title">About Us</h1>
    <ul class="menu">
      <?php
      foreach($parents as $parent):
       ?>
      <li><a href="#aboutus-<?= $parent->ID ?>"><?= $parent->post_title ?></a></li>
      <?php
      endforeach;
      ?>
    </ul>

    <div>
  </div>

  <div class="clear"> </div>

  </div>

  </div>
  <!---->
  <div class="grids-slider-grid-row2-grid2" style="width:65%;padding-top:20px;" onclick="location.href='#';">

<div class="subcontent" style="background-image:url('<?= $image[0] ?>')">

<ul class="ulcontent">
    <li style="background:url('<?= $icons[0]['full'] ?>') no-repeat; background-position:10px 10px">
    <div class="row">
      <h1><?= $title ?>
        <div class="brline" >&nbsp;</div>
      </h1>

      <?= $content[0]?><br/>
    </div>
    </li>
    <li style="background:url('<?= $icons[1]['full'] ?>') no-repeat; background-position:10px 50px">
      <div class="row">
      <?= $content[1]?><br/>
      <?= $content[2]?><br/>
      </div>
    </li>
    <li style="background:url('<?= $icons[2]['full'] ?>') no-repeat; background-position:10px 10px">
    <div class="row">
    <?= $content[3]?>
    </div>
    </li>
</ul>

</div>

    <div class="clear"> </div>
  </div>
  <!--//-->

  <div class="clear"> </div>

<div class="clear"> </div>
<!-- used to set the current selected menu to be hilighted -->
<script>
$(function () {
    'use strict';

    var hash = window.location.hash;
    var id = hash.split("-");

    $('a').removeClass('current');
    $('ul > li > a[href=#aboutus]').addClass('current');

    if(id[1]==undefined) {
      $('ul.menu > li:first-child').find('a').addClass('current');
    }
else {

    $('a[href='+hash+']').addClass('current');
  }

  });
</script>
