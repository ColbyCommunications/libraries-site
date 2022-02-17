<?php
/*
Plugin Name: Dismissable Alert Box
Plugin URI: 
Description: Alert box to show a temporary message that is dismissable by user. The box will not reappear if user has dismissed previously to make less annoying.
Version: 1.0
Author: Ben Greeley
Author URI: 
License: Colby College
	
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin activation hooks...
function activate_dismissable_alert_box() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-dismissAlertBox-activator.php';
	dismissAlertBox_Activator::activate();
}

register_activation_hook( __FILE__, 'activate_dismissable_alert_box' );

// Plugin deactivation hooks...
function deactivate_dismissable_alert_box() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-dismissAlertBox-deactivator.php';
	dismissAlertBox_Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_dismissable_alert_box' );

require plugin_dir_path( __FILE__) . 'inc/class-dismissAlertBox.php';

new dismissAlertBox();