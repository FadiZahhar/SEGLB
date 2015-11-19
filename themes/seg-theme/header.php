<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

			<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/example/css/style.css" />
			<link href="<?= get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
			<link href="<?= get_template_directory_uri(); ?>/dist/slicknav.css" rel="stylesheet" type="text/css" media="all" />
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,400italic,600italic,700italic,800,800italic,300italic,300' rel='stylesheet' type='text/css'>
			<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
			<script src="<?= get_template_directory_uri(); ?>/js/jquery.min.js"></script>
		<!-- end nav -->
		<script src="<?= get_template_directory_uri(); ?>/js/modernizr-custom.js"></script>
		<script src="<?= get_template_directory_uri(); ?>/src/loadingoverlay.min.js"></script>
		<script src="<?= get_template_directory_uri(); ?>/dist/jquery.slicknav.min.js"></script>


		<!---End-bx-slider---->

		<script src="<?= get_template_directory_uri(); ?>/js/site.js"></script>
	 <!----End Calender -------->

	 <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/images/home/sprites/sprites.css">
	 <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/images/services/sprites/sprites.css">
	 <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/images/career/sprites/sprites.css">
	 <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/images/contact-us/sprites/sprites.css">
	 <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/animate.css">
	 <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/custom.min.css">
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<!--<meta name="description" content="Freewall is a cross-browser and responsive jQuery plugin to help you create many types of grid layouts: flexible layouts, images layouts, nested grid layouts, metro style layouts, pinterest like layouts ... for desktop, mobile and tablet" />
		<meta name="keywords" content="javascript, dynamic, grid, layout, jquery plugin, flexible layouts, images layouts, fluid grid layouts, metro style layouts, pinterest like layouts"/>
		<meta name="og:image" content="http://vnjs.net/www/project/freewall/i/flex.png" />
		<meta name="og:description" content="Freewall is a cross-browser and responsive jQuery plugin for creating dynamic grid layouts for desktop, mobile and tablet." />
		<link rel="icon" href="favicon.ico" type="image/x-icon" />-->


	</head>

<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file,
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head();
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website.
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions.
// Move it if you like, but I would keep it around.
?>

</head>

<body>
		<ul id="menu">
			<li><a href="#aboutus">About us</a></li>
			<li><a href="#network">Network</a></li>
			<li><a href="#services">Services</a></li>
			<li><a href="">Projects</a></li>
			<li><a href="#news">News</a></li>
			<li><a href="#careers">Careers</a></li>
			<li><a href="#contactus">Contact us</a></li>
</ul>
		<header>
			<?php
			$categories = get_categories( array('parent' => 0, 'exclude' => 2) );
			 ?>
			<a href="#home"><div class="logo">&nbsp;</div></a>
				<ul>
					<?php foreach($categories as $category):
					?>
					<li><a href="#<?= $category->slug ?>"><?= $category->cat_name ?></a></li>
					<?php
					endforeach; ?>
				</ul>

		</header>
		<!---strat-wrap---->
		<img src="<?= get_template_directory_uri(); ?>/images/svg/arrow-left-isolarted.png" class="arrow-left" />
		<img src="<?= get_template_directory_uri(); ?>/images/svg/arrow-right-isolated.png" class="arrow-right" />
		<div class="wrap">
