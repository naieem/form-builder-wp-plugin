<?php
/*
Plugin Name: Custom Form Builder
Plugin URI: http://www.facebook.com/naieemmahmudsupto
Description: This is simple plugin to create custom form and use to make contact us page and get other information
Author: Naieem
Version: 1.0
Author URI: http://www.facebook.com/naieemmahmudsupto
*/



/*********************************
global variables
**********************************/

//$aim_plugin_name = 'Acxcom Inventory Adjust';

/*********************************
includes
**********************************/
include('includes/scripts.php'); //this controls all JS and CSS
//include('includes/data-processing.php'); //this saves data
include('includes/display-function.php'); //display content functions
function deactivateContact()
{
	// delete_post_meta_by_key( 'main_caption' );	
	// delete_post_meta_by_key( 'main_title' );
	// global $wpdb;
	// $table_name = $wpdb->prefix."font_list";
	// $sql = "DROP TABLE `$table_name`;";	
	// $wpdb->query($sql);
	// global $up_theme_options;
	// foreach($up_theme_options as $val)
	// 		{
	// 			if($val['type']=='google_font')
	// 			{
	// 				delete_option($val['id']);
	// 			}
	// 			else
	// 			delete_option("plugin_options");
	// 		}
}
register_deactivation_hook( __FILE__, 'deactivateContact' );
function activateContact()
{
	  // global $wpdb;
   //  $table_name = $wpdb->prefix."font_list";
   //  $sql = "CREATE TABLE `$table_name` (
			// `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			// `font_name` VARCHAR( 255 ) NOT NULL ,
			// UNIQUE ( `id` )
			// ) COLLATE utf8_general_ci, ENGINE = InnoDB;";
   //  $wpdb->query($sql);
}
register_activation_hook( __FILE__, 'activateContact' );