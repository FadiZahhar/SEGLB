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

.size26 {
	width: 214px;
	height: 640px;
}

.size22 {
	width: 214px;
	height: 220px;
}

.size21 {
	width: 214px;
	height: 120px;
}

.size11 {
	width: 208px;
	height: 120px;
}

.size12 {
	width: 208px;
	height: 190px;
}

.size16 {
	width: 208px;
	height: 640px;
}

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

  <div class="size26 " data-nested=".brick" data-fixSize=0>
  <div class="brick size22" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice1.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

  <div class="brick size22" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice2.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

  <div class="brick size22" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice3.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

</div>



<div class="size16 " data-nested=".brick" data-fixSize=0>
<div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice4.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice5.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice6.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice7.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

</div>



<div class="size34 " data-nested=".brick" data-fixSize=0>
<div class="brick size34" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice8.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>


</div>


<div class="size16 " data-nested=".brick" data-fixSize=0>
<div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice9.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice10.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice11.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice12.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

</div>



</div>
