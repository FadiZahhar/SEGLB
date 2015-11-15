<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 99, 'category_name' => 'contact-us', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
// get the id of the parent category to be able to search for shild categories
//$catid = get_category_by_slug('home-page');
//$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
//$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
//$childs = get_posts( $args );

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

  @media only screen and (max-width: 727px) {
    .half-box {
      width:100%;
      float:none;
      clear:both;
    }

    form {
    margin-left: 1%;
    margin-right:1%;
    padding-top: 0px!important;
}
</style>
<div id="freewall" class="free-wall">



  <div class="size23" data-nested=".brick">
  <?php
  foreach($parents as $child):
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

  <div class="brick size43">

    <div class="half-box">
      <div class="contact-form">
      <form style="padding-top:75px;">
          <div class="outside-form"><label>Full Name</label>
          <input type="text" value="" class="input-outside-form" /></div>
        <div class="half-box">
          <label>Email Address</label>
          <input type="text" value="" class="input-inside-form"/>
          <label>Subject</label>
          <input type="text" value="" class="input-inside-form" />
        </div>
        <div class="half-box">
          <label>Mobile</label>
          <input type="text" value="" class="input-inside-form" />
          <label>Region</label>
          <input type="text" value="" class="input-inside-form" />
        </div>

        <div class="outside-form"><label>Message</label>
        <textarea  style="width:95%;height:90px;border:none;"></textarea></div>



        <button style="width:20%;margin-left:8px">Send</button>
      </form>
      </div>
    </div>


    <div class="clear"> </div>

  </div>





</div>
