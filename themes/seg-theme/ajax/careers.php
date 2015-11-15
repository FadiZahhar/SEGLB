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

  @media only screen and (max-width: 921px) {
    .half-box {
      width:100%;
      float:none;
      clear:both;
    }

    form {
    margin-left: 1%;
    margin-right:1%;
    padding-top: 0px;
}

.career-form {
  min-height:560px;
}
  }

    @media only screen and (max-width: 744px) {
      .half-box {
        width:49%;
        float:left;
        clear:none;
      }
      form {
        padding-top: 20%;
      }
    }

    @media only screen and (max-width: 440px) {
      .career-form {
        min-height:460px;
      }
    }

</style>
<div id="freewall" class="free-wall">



    <div class="brick size13 animated fadeInLeft" style="background-image:url('<?= get_template_directory_uri(); ?>/images/career/career-big-icon.png'); background-size:cover">

    </div>

  <div class=" size23" data-nested=".brick">

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/svg/career-position-1.svg'); background-position:50% 50%">

    </div>

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/svg/career-position-1.svg'); background-position:50% 50%">

    </div>

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/svg/career-position-2.svg'); background-position:50% 50%">

    </div>

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/svg/career-position-2.svg'); background-position:50% 50%">

    </div>

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/svg/career-position-3.svg'); background-position:50% 50%">

    </div>

    <div class="brick size11" style="background-image:url('<?= get_template_directory_uri(); ?>/images/svg/career-position-3.svg'); background-position:50% 50%">

    </div>

  </div>


  <div class="size34">

    <div class="half-box">
      <div class="career-form">
      <form>
        <div class="half-box">
          <label>Full Name</label>
          <input type="text" value="" />
          <label>Country Of Residence</label>
          <input type="text" value="" />
        </div>
        <div class="half-box">
          <label>Email Address</label>
          <input type="text" value="" />
          <label>Mobile</label>
          <input type="text" value="" />
        </div>

        <label>Address</label>
        <input type="text" value="" />

        <label>Desired position</label>
        <input type="text" value="lorem ipsum" disabled="disabled" />

        <div class="half-box">
          <label>Years of Experience</label>
          <input type="text" value="" /><br/>
          <label>Upload CV</label>
          <input type="file" value="Browse" />
        </div>
        <div class="half-box">
          <label>Expected Salary</label>
          <input type="text" value="" />
        </div>

        <button>Apply</button>
      </form>
      </div>
    </div>


    <div class="clear"> </div>

  </div>




</div>
