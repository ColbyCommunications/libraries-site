<?php
/**
 * Configuration globals and constants
 *
 * @package colby-openhours
 */

global $colby_openhours_post_types, $colby_openhours_shortcodes;


/** CONSTANT Enable debugging with URL parameter 'debug' set to '1' anywhere on the site. */
define( 'COLBY_OPENHOURS_DEBUG', isset( $_GET['debug'] ) && '1' === $_GET['debug'] ? true : false );

/** CONSTANT The path to the plugin's root server directory, with trailing slash. */
define( 'COLBY_OPENHOURS_PATH', trailingslashit( dirname( __FILE__ ) ) );

/** CONSTANT The URL of the plugin root directory. */
define( 'COLBY_OPENHOURS_URL', esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) );

/** CONSTANT The URL of the plugin root directory, without the protocol. */
define( 'COLBY_OPENHOURS_ASSETS_URL', substr( COLBY_OPENHOURS_URL, ( strpos( COLBY_OPENHOURS_URL, '//' ) ) ) );

/** CONSTANT Current version number, mainly used to force re-caching of JS and CSS files. */
define( 'COLBY_OPENHOURS_VERSION', '0.1' );


/** GLOBAL The custom post types created by the plugin. */
$colby_openhours_post_types = [
	'hours' => [
		'label' => 'Library Hours',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => [
			'slug' => 'hours',
			'with_front' => true,
			],
		'query_var' => true,
		'supports' => [
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',
			'post-formats',
			],
		'labels' => [
			'name' => 'Open Hours',
			'singular_name' => 'Open Hour',
			'menu_name' => 'Open Hours',
			'add_new' => 'Add Open Hour',
			'add_new_item' => 'Add New Open Hour',
			'edit' => 'Edit',
			'edit_item' => 'Edit Open Hour',
			'new_item' => 'New Open Hour',
			'view' => 'View Open Hour',
			'view_item' => 'View Open Hour',
			'search_items' => 'Search Open Hours',
			'not_found' => 'No Open Hours Found',
			'not_found_in_trash' => 'No Open Hours Found in Trash',
			'parent' => 'Parent Open Hour',
			],
		],
];


/** GLOBAL Shortcode classes must be entered here before they will work. */
$colby_openhours_shortcodes = [
		'Colby_Openhours\\Shortcodes\\Library_Hours',
		'Colby_Openhours\\Shortcodes\\Open_Hours',
	];
