<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 99, 'category_name' => 'home-page', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
// get the id of the parent category to be able to search for shild categories
$catid = get_category_by_slug('home-page');
$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$childs = get_posts( $args );

?>
<head>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
</head>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/example/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/freewall.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/example/js/index.js"></script>
<script type="text/javascript">
  $(function() {
    app.setup({
      share: 1,
      color: 0,
      layout: 1,
      events: 1,
      methods: 1,
      options: 1,
      preload: 1,
      drillhole: 1
    });
  });
</script>
<script src="<?= get_template_directory_uri(); ?>/js/assets/jquery.mousewheel.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/assets/jquery.event.drag.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.newstape.js"></script>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .free-wall {
    margin: 15px;
  }

  @media only screen and (max-width: 419px) {
    .grid-top-tags ul {
      margin-top:0px;
    }
  }
</style>
<div id="freewall" class="free-wall">
<?php
// get the image
$meta = get_post_meta ($parents[0]->ID);
$image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
// get the brick class
$class = explode(":",$meta['brick_size'][0]);
$class = $class[0];
?>
  <div class="<?= $class ?>"  style="background-image:url('<?= $image[0]  ?>')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#"><?= $parents[0]->post_title ?></a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

  <div class="size22 " data-nested=".brick" data-fixSize=0>
    <?php
    foreach($childs as $child):
    // get the image
    $meta = get_post_meta ($child->ID);
    $image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
    // get the brick class
    $class = explode(":",$meta['brick_size'][0]);
    $class = $class[0];
    ?>
    <div class="<?= $class ?>" style="background-image:url('<?= $image[0] ?>')">

    </div>

    <?php endforeach; ?>
  </div>
  <?php
  $meta = get_post_meta ($parents[1]->ID);
  $image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
  // get the brick class
  $class = explode(":",$meta['brick_size'][0]);
  $class = $class[0];
  ?>
  <div id="wrapper" class="<?= $class ?>" style="background-image:url('<?= $image[0] ?>');">
    <div class='cover'>
      <div class="content">
      <h1>SEG’s latest news</h1>
      <div class="newstape">
          <div class="newstape-content">
              <div class="news-block">
                  <h3>Lorem ipsum</h3>
                  <small>13.04.2015</small>
                  <p class="text-justify">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
                  </p>
                  <div class="text-right">
                      <a href="#">More</a>
                  </div>
                  <hr />
              </div>
              <div class="news-block">
                  <h3>Ut enim ad</h3>
                  <small>13.04.2015</small>
                  <p class="text-justify">
                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                  </p>
                  <div class="text-right">
                      <a href="#">More</a>
                  </div>
                  <hr />
              </div>
              <div class="news-block">
                  <h3>Duis aute</h3>
                  <small>13.04.2015</small>
                  <p class="text-justify">
                      Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur...
                  </p>
                  <div class="text-right">
                      <a href="#">More</a>
                  </div>
                  <hr />
              </div>
          </div>
      </div>

    </div>
    </div>
  </div>

  <?php
  // get the image
  $meta = get_post_meta ($parents[2]->ID);
  $image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
  // get the brick class
  $class = explode(":",$meta['brick_size'][0]);
  $class = $class[0];
  ?>

  <div class="<?= $class ?>"  style="text-align:center;background:url('<?= $image[0] ?>') no-repeat; background-position:50% 50%;">
      &nbsp;
  </div>
</div>
<script>
    $(function() {
        $('.newstape').newstape();
    });
</script>
