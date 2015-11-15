<?php
/**
 * 	Template Name: Sidebar/Home Page
 *
 *	This page template has a sidebar built into it,
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<div class="arrow-center">&nbsp;<img src="<?= get_template_directory_uri(); ?>/images/svg/arrow-top-isolated.png" /></div>
	<!---start-grids-slider---->
	<div class="grids-slider">

	<!-- Ajax Pages Calls goes here -->


	<!---End-grids-slider---->
</div>

</div>
<!---//End-wrap---->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
