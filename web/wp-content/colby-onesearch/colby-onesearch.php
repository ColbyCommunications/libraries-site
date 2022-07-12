<?php
/**
 * Plugin Name: Colby Libraries OneSearch
 * Description: Search the Colby College libraries
 * Author: John Watkins
 * Version: 1.0
 * Text Domain: colby-onesearch
 *
 * @package colby-onesearch
 */


register_activation_hook(
	__FILE__, function() {
		$search_results_page = [
			'post_name'     => 'search-results', // If this already exists, it will be search-results-2.
			'post_status'   => 'publish',
			'post_type'     => 'page',
			'post_title'    => 'Search Results',
		];

		$page_id = wp_insert_post( $search_results_page );
		update_option( 'onesearch_results_page', $page_id );
	}
);

register_deactivation_hook(
	__FILE__, function() {
		wp_delete_post( get_option( 'onesearch_results_page' ), true ); // Use true to bypass trash.
		delete_option( 'onesearch_results_page' );
	}
);

require_once( 'vendor/autoload.php' );
register_wp_autoload( 'Colby_Onesearch\\', __DIR__ );

require_once( 'config.php' );
require_once( 'functions.php' );
require_once( 'actions-filters.php' );
