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
