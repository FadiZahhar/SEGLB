<?php
/*
Plugin Name: Ordering
Plugin URI: http://huge-it.com
Description: Our plugin is very simple in use. Just drag your post in the position you need and drop it.
Version: 1.0.0
Author: Huge-IT
Author URI: http://huge-it.com
License: GPL
*/

add_action('admin_menu', 'huge_it_ordering_options_panel');
register_activation_hook(__FILE__, 'hugeit_ordering_activate');
define('HUGEIT_PLUGIN_DIR', WP_PLUGIN_DIR . "/" . plugin_basename(dirname(__FILE__)));

function huge_it_ordering_options_panel()
{
     $page_cat = add_menu_page('Theme page title', 'Huge IT ordering', 'manage_options', 'huge_it_ordering', 'Options_ordering_styles', plugins_url('images/huge_it_ordering_mini_logo.png', __FILE__));
    add_submenu_page('huge_it_ordering', 'Featured Plugins', 'Featured Plugins', 'manage_options', 'huge_it_featured_order_plugins', 'huge_it_featured_order_plugins');
	add_action('admin_print_styles-' . $page_cat, 'huge_it_ordering_admin_script');
}


function huge_it_ordering_admin_script()
{
		wp_enqueue_style("jquery_ui", plugins_url("style/jquery-ui.css", __FILE__), FALSE);
		wp_enqueue_script("jquery_new", plugins_url("js/admin/jquery-1.10.2.js", __FILE__), FALSE);
		wp_enqueue_script("jquery_ui_new", plugins_url("js/admin/jquery-ui.js", __FILE__), FALSE);
		wp_enqueue_style("admin_css", plugins_url("style/admin.style.css", __FILE__), FALSE);
		wp_enqueue_script("admin_js", plugins_url("js/admin/admin.js", __FILE__), FALSE);
}

function Options_ordering_styles()
{

	switch ($_GET['task']) {
	default:
		include_once("admin/controller/huge_it_ordering.php");
		$controller = new Controller();
		$controller->invoke();
		break;
	}
}
function huge_it_featured_order_plugins()
{
	switch ($_GET['task']) {
	default:
		include_once("admin/controller/huge_it_featured_plugins.php");
		break;
	}
}
function hugeit_ordering_activate()
{
	include_once("admin/controller/install_base.php");
}



function hugeitoder_style() {
	global $wpdb;
	if(!(isset($_GET['p']))){
	$orderheader = $wpdb->get_row("SELECT * from ".$wpdb->prefix."hugeit_ordering ");
	if((get_site_url().'/') == ("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'])){
	$categoryifhome = '';
	}
	else
	{
	$categoryifhome = 'cat='.the_category_ID($echo=false);
	}
	query_posts($categoryifhome.'orderby='.$orderheader->orderby.'&order='.$orderheader->ordering); 
	}
}
add_custom_image_header('hugeitoder_style', 'admin_header_style');
?>