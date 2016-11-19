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

/*********************************
includes
**********************************/
// if (!class_exists("PHPMailer")) {
// 	include('phpmailer/class.phpmailer.php');   
// }
include_once(ABSPATH . WPINC . '/class-phpmailer.php');
$mail= new PHPMailer;
$mail_user= new PHPMailer;
include('includes/scripts.php'); //this controls all JS and CSS
//include('includes/data-processing.php'); //this saves data
include('includes/display-function.php'); //display content functions
function deactivateContact()
{
	global $wpdb;
	//$table_name ="contact_form";
	$sql = "DROP TABLE contact_form";	
	$wpdb->query($sql);
}
register_deactivation_hook( __FILE__, 'deactivateContact' );
function activateContact()
{
	global $wpdb;
    //$table_name ="contact_form";
    $sql = "CREATE TABLE contact_form (
			`id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`title` VARCHAR(500 ) NOT NULL ,
			`content` VARCHAR(5000) NOT NULL ,
			`d_time` DATETIME NOT NULL ,
			`edit_field` VARCHAR(5000) NOT NULL,
			`others_info` VARCHAR(5000) NOT NULL ,
			UNIQUE ( `id` )
			)";
    $wpdb->query($sql);
}
register_activation_hook( __FILE__, 'activateContact' );