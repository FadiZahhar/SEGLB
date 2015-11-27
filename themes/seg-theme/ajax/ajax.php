<?php
require_once('../../../../wp-config.php');

global $post;
// get the parent bricks that are not inside a container brick

if(isset($_REQUEST["news_id"])):
$news = get_post( $_GET["news_id"] );
echo "<h2>".$news->post_title."</h2>
    <hr />";
echo $news->post_content;
endif;

if(isset($_REQUEST["images_id"])):
$post = get_post( $_GET["images_id"] );
$meta = get_post_meta ($post->ID);
$feature = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
$images = $dynamic_featured_image->get_featured_images($post->ID);
$slick = '<div><img src="'.$feature[0].'" width="100%" /></div>';
foreach($images as $image):
$slick .= '<div><img src="'.$image['full'] .'" width="100%" /></div>';
endforeach;
echo $slick;
endif;


if(isset($_REQUEST["cat_id"])):

  if($_REQUEST["cat_id"]==0) {
    $args = array( 'numberposts' => 99, 'category_name' => 'intro', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
    $parents = get_posts( $args );
  }
  else {
  // get the parent bricks that are not inside a container brick
  $args = array( 'numberposts' => 99, 'category' => $_REQUEST["cat_id"], 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
  $parents = get_posts( $args );
  }
  //echo "<pre>"; print_r($parents); exit;
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
endif;
/*
$meta = get_post_meta ($parents[0]->ID);
$image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
$icons = $dynamic_featured_image->get_featured_images($parents[0]->ID);
// get the id of the parent category to be able to search for shild categories
//$catid = get_category_by_slug('services');
//$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
//$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
//$childs = get_posts( $args );
$content = explode("<br/>",$parents[0]->post_content);
*/
