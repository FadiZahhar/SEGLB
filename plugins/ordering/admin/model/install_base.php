<?php
	global $wpdb;
	$hugeit_ordering = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "hugeit_ordering (
	`orderby` varchar(22) NOT NULL,
	`ordering` varchar(22) NOT NULL
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	$wpdb->query($hugeit_ordering);
	$sql_hugeit_ordering = "INSERT INTO " . $wpdb->prefix . "hugeit_ordering (`orderby`, `ordering`) VALUES
	('menu_order', 'ASC')";
	if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "hugeit_ordering")) {
		$wpdb->query($sql_hugeit_ordering);
	}
?>