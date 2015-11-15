<?php
class Model {
	public function getorderingList()
	{
		global $wpdb;
		$orderheader = $wpdb->get_row("SELECT * from ".$wpdb->prefix."hugeit_ordering ");
		$orderby=$orderheader->orderby;
		$order=$orderheader->ordering;
		$rows = $wpdb->get_results($wpdb->prepare("SELECT * from ".$wpdb->prefix."posts where post_type = '%s' and post_status = '%s' order by ".$orderby." ".$order." ", 'post', 'publish'));
		return $rows;
	}
	public function getorderingSave()
	{
		global $wpdb;
		$rowpost = $wpdb->get_results($wpdb->prepare("SELECT * from ".$wpdb->prefix."posts where post_type = '%s' and post_status = '%s' ", 'post', 'publish'));
		foreach($rowpost as $rowposts){
		$menuorderif = $_POST["ht_menuorder_".$rowposts->ID.""];
		if(isset($menuorderif)){
		$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."posts SET menu_order = '".$_POST["ht_menuorder_".$rowposts->ID.""]."' WHERE ID = %d ", $rowposts->ID));
		}
		}		
	}
}
?>