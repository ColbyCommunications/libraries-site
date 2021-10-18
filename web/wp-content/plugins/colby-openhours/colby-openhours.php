<?php
/**
 * Plugin Name: Colby Open Hours
 * Description: Shortcodes for displaying hours of operation
 * Version: 0.1
 * Author: John Watkins
 * Text Domain: colby-openhours
 *
 * @package colby-openhours
 */

add_action( 'plugins_loaded', function() {
	require_once( 'fields.php' );
	if ( ! function_exists( 'register_wp_autoload' ) ) {
		require_once( 'vendor/autoload.php' );
	}
}, 99 );


add_action( 'init', function() {
	global $colby_openhours;

	$plugin_data = [
		'Plugin Name' => 'Colby Open Hours',
		'Description' => 'Shortcodes for displaying hours of operation',
		'Version' => '0.1',
		'Author' => 'John Watkins',
		'Text Domain' => 'colby-openhours',
		'Namespace' => 'Colby_Openhours',
	];

	register_wp_autoload( 'Colby_Openhours\\', trailingslashit( __DIR__ ) . 'lib' );

	$colby_openhours = new Colby_Openhours\Colby_Openhours( __FILE__, $plugin_data );
	new Colby_Openhours\Setup( $colby_openhours );

}, 1 );

add_action( 'admin_init', function() {
	register_wp_autoload( 'Colby_Openhours_Admin\\', trailingslashit( __DIR__ ) . 'lib/admin' );
	new Colby_Openhours_Admin\Colby_Openhours_Admin();
}, 1 );
