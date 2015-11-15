<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 6, 'category_name' => 'services', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
// get the id of the parent category to be able to search for shild categories
$catid = get_category_by_slug('services');
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
  @media only screen and (max-width: 1099px) {
    .main-contracting-info ul {
      margin-left:0px;
    }
    .main-contracting-info ul li span {
    margin-top: 5px;
    font-size: 12px;
    color: #004b93;
    text-transform: capitalize;
    line-height: 28px;
    padding-left: 0px;
}
  }

  @media only screen and (max-width: 905px) {
    .main-contracting-info ul li span {
    margin-top: 5px;
    font-size: 16px;
    color: #004b93;
    text-transform: capitalize;
    line-height: 28px;
    padding-left: 9px;
}
  }

  @media only screen and (max-width: 745px) {
    .main-contracting-info ul li span {
    margin-top: 5px;
    font-size: 12px;
    color: #004b93;
    text-transform: capitalize;
    line-height: 28px;
    padding-left: 0px;
}
  }

  @media only screen and (max-width: 529px) {
    .main-contracting-info ul li span {
    margin-top: 5px;
    font-size: 16px;
    color: #004b93;
    text-transform: capitalize;
    line-height: 28px;
    padding-left: 9px;
}
  }

  @media only screen and (max-width: 360px) {
    .main-contracting-info ul li span {
    margin-top: 5px;
    font-size: 14px;
    color: #004b93;
    text-transform: capitalize;
    line-height: 28px;
    padding-left: 0px;
}
  }
</style>
<div id="freewall" class="free-wall">



    <div class="brick size12 size160x462" style="background:url('<?= get_template_directory_uri(); ?>/images/services/services-big-icon.png') no-repeat; background-position:50% 50%;" data-fixSize=0>
    &nbsp;
    </div>

  <div class="size160x462" data-nested=".brick" data-fixSize=0>

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
    <?= $child->post_content; ?>
    </div>

    <?php endforeach; ?>
  </div>


  <?php
  foreach($parents as $child):
  // get the image
  $meta = get_post_meta ($child->ID);
  $image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
  // get the brick class
  $class = explode(":",$meta['brick_size'][0]);
  $class = $class[0];
  ?>
  <div class="<?= $class ?>" style="background-image:url('<?= $image[0] ?>')" style="min-width:210px!important">
  <?= $child->post_content; ?>
  </div>

  <?php endforeach; ?>
  </div>




</div>
