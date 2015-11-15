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

#freewall {
  margin-left:25%;
}

</style>
<div class="grids-slider-grid-row2">
  <div class="grids-slider-grid-row2-grid1" style="width:30%">

    <h1 class="title">Projects</h1>
    <ul class="menu">
      <li class="current">Ivory Coast</li>
      <li onclick="document.location.href='#lebanon'">Lebanon</li>
      <li onclick="document.location.href='#moroco'">Morocco</li>
      <li onclick="document.location.href='#qatar'">Qtar</li>
      <li onclick="document.location.href='#uae'">UAE</li>
    </ul>

    <div>
  </div>

  <div class="clear"> </div>

  </div>

  </div>
  <!---->


  <div id="freewall" class="free-wall">

    <div class="size13 " data-nested=".brick" data-fixSize=0>
    <div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice1.png')">
      <div class="grid-top-tags">
        <ul>
          <li><a href="#">1 Diplomat Tower</a></li>
          <div class="clear"> </div>
        </ul>
      </div>
    </div>

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice2.png')">
      <div class="grid-top-tags">
        <ul>
          <li><a href="#">1 Diplomat Tower</a></li>
          <div class="clear"> </div>
        </ul>
      </div>
    </div>

  </div>



  <div class="size13 " data-nested=".brick" data-fixSize=0>

  <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice2.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

  <div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice1.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

  </div>


  <div class="size13 " data-nested=".brick" data-fixSize=0>
  <div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice1.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

  <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice2.png')">
    <div class="grid-top-tags">
      <ul>
        <li><a href="#">1 Diplomat Tower</a></li>
        <div class="clear"> </div>
      </ul>
    </div>
  </div>

</div>



<div class="size13 " data-nested=".brick" data-fixSize=0>

<div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice2.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

<div class="brick size12" style="background-image:url('<?= get_template_directory_uri(); ?>/images/projects/projects-slice1.png')">
  <div class="grid-top-tags">
    <ul>
      <li><a href="#">1 Diplomat Tower</a></li>
      <div class="clear"> </div>
    </ul>
  </div>
</div>

</div>




  </div>
