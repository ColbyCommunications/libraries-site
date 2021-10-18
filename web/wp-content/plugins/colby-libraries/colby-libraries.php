<?php
/**
 * Plugin Name: Colby Libraries
 * Description: Templates and CSS modifications for the Colby College libraries sites.
 * Version: 0.1
 * Author: John Watkins
 * Text Domain: colby-libraries
 *
 * @package colby-libraries
 */

add_action( 'init', function() {
	global $colby_libraries;

	$plugin_data = [
		'Plugin Name' => 'Colby Libraries',
		'Description' => 'Templates and CSS modifications for the Colby College libraries sites.',
		'Version' => '0.1',
		'Author' => 'John Watkins',
		'Text Domain' => 'colby-libraries',
		'Namespace' => 'Colby_Libraries',
		];

	if ( false === function_exists( 'register_wp_autoload' ) ) {
		require_once( 'vendor/autoload.php' );
	}

	register_wp_autoload( 'Colby_Libraries\\', trailingslashit( __DIR__ ) . 'lib' );

	$colby_libraries = new Colby_Libraries\Colby_Libraries( __FILE__, $plugin_data );
	new Colby_Libraries\Setup( $colby_libraries );
}, 1 );
