<?php
require_once('../../../../wp-config.php');




global $post;
// get the latest enws
$args = array( 'numberposts' => 99, 'category_name' => 'news', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$news = get_posts( $args );

?>
<head>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
<style>
a.current {
    color: #00ff03;
    text-decoration:underline;
}
ul li > a.current {
  color:#fff!important;
}

</style>
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
<script src="<?= get_template_directory_uri(); ?>/slick/slick.min.js"></script>
<link href="<?= get_template_directory_uri(); ?>/slick/slick.css" rel="stylesheet" type="text/css">
<link href="<?= get_template_directory_uri(); ?>/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/scroller/jquery.mCustomScrollbar.css">
<style type="text/css">
  .free-wall {
    margin: 15px;
  }
</style>
<div id="freewall" class="free-wall">



  <!---->
  <div class="your-class size32">
  </div>

  <!-- content -->
  <div  class="size33 mCustomScrollbar">
    <div id="content"></div>
  </div>

  <!--//-->

  <div class="size31  mCustomScrollbar">
    <h2>Latest News</h2>
    <hr />
    <?php
    foreach($news as $latest):
      $meta = get_post_meta ($latest->ID);
      $feature = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'thumbnail');
     ?>
    <!-- News block -->
    <a href="#news-<?= $latest->ID ?>">
      <div class="news-block">
        <h3 style="float:left;width:74%"><?= $latest->post_title ?></h3>
        <div class="text-right" style="25%">
            <img src="<?= $feature[0] ?>" width="75" height="75" />
        </div>
      </div>
    </a>
    <hr />
    <!-- End news block -->
    <?php
    endforeach;
     ?>

  </div>
<!-- end scroller -->

</div>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/scroller/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
$(function () {
    'use strict';

    var hash = window.location.hash;
    var news_id = hash.split("-");

    if(news_id[1]==undefined) {
      news_id = $('.size31').find('a').first().attr('href').split("-");
    }

    $('a').removeClass('current');
    $('ul > li > a[href=#news]').addClass('current');
    $('a[href='+hash+']').addClass('current');
    $.ajax({
    url: '<?= get_template_directory_uri(); ?>/ajax/ajax.php?news_id='+news_id[1]+'&rand='+Math.random(),
    data: {
    format: 'html'
    },
    error: function() {
    alert('error');
    },
    dataType: 'html',
    success: function(data) {
    $('#content').html(data);


    $.ajax({
    url: '<?= get_template_directory_uri(); ?>/ajax/ajax.php?images_id='+news_id[1]+'&rand='+Math.random(),
    data: {
    format: 'html'
    },
    error: function() {
    alert('bad');
    },
    dataType: 'html',
    success: function(data) {
      $('.your-class').slick({
                dots: false,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                arrows: false
              });

      $('.your-class').slick('slickAdd',data);
      $('.your-class').slick('setPosition');
      $('.your-class').slick('reinit');

    },
    type: 'GET'
    });

    },
    type: 'GET'
    });






$("#content-1").mCustomScrollbar();








});
</script>
