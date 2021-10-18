<?php
/**
 * Configuration class
 *
 * @package colby-openhours
 */

namespace Colby_Openhours;

/**
 * Set variables used throughout the plugin.
 */
class Colby_Openhours {

	/**
	 * The protocol-free URL.
	 *
	 * @var $assets_url string
	 */
	public $assets_url = '';

	/**
	 * Run the plugin in debug mode.
	 *
	 * @var $debug bool
	 */
	public $debug = false;

	/**
	 * The system path to the main directory file.
	 *
	 * @var $main_file string
	 */
	public $main_file = '';

	/**
	 * The string to add to minified asset URLs when not debugging.
	 *
	 * @var $min string
	 */
	public $min = '';

	/**
	 * The system path to the plugin root.
	 *
	 * @var $path string
	 */
	public $path = '';

	/**
	 * The array of post types registered by this plugin.
	 *
	 * @var $post_types array
	 */
	public $post_types = [];

	/**
	 * The array of scripts enqueued by this plugin.
	 *
	 * @var $scripts array
	 */
	public $scripts = [];

	/**
	 * The array of shortcodes added by this plugin.
	 *
	 * @var $shortcodes array.
	 */
	public $shortcodes = [];

	/**
	 * The array of stylesheets enqueued by this plugin.
	 *
	 * @var $stylesheets array
	 */
	public $stylesheets = [];

	/**
	 * The array of taxonomies added by this plugin.
	 *
	 * @var $taxonomies array
	 */
	public $taxonomoies = [];

	/**
	 * The plugin's text domain.
	 *
	 * @var $text_domain string
	 */
	public $text_domain = '';

	/**
	 * The text domain with an underscore instead of a hyphen.
	 *
	 * @var $text_domain_underscore string
	 */
	public $text_domain_underscore = '';

	/**
	 * The plugin directory's root URL.
	 *
	 * @var $url string
	 */
	public $url = '';

	/**
	 * The plugin's version number.
	 *
	 * @var $version string
	 */
	public $version = '0.1';

	/**
	 * Populate the object's variables with real values.
	 *
	 * @param string $main_file The system path of the main plugin file.
	 * @param array  $plugin_data The plugin data set in the main file.
	 */
	public function __construct( $main_file, $plugin_data ) {
		$this->main_file = $main_file;
		$this->debug = isset( $_GET['debug'] ) ? true : false;
		$this->path = trailingslashit( dirname( $main_file ) );
		$this->url = trailingslashit( plugin_dir_url( $main_file ) );
		$this->assets_url = substr( $this->url, ( strpos( $this->url, '//' ) ) ) . 'assets/';
		$this->text_domain = $plugin_data['Text Domain'];
		$this->text_domain_underscore = str_replace( '-', '_', $this->text_domain );
		$this->version = $plugin_data['Version'];
		$this->min = true === $this->debug ? '' : '.min';

		$this->post_types();
		$this->taxonomies();
		$this->shortcodes();
		$this->styles();
		$this->scripts();
	}

	/**
	 * Set an associative array of this plugin's post types -- name => settings.
	 * Example:
	 * $this->post_types = [
	 *		'type' => [
	 *			'label' => 'Types',
	 *			'labels' => [
	 *				'singular_name' => 'Type',
	 *			],
	 *			'public' => true,
	 *			'supports' => [ 'title', 'editor' ],
	 *			'hierarchical' => false,
	 *			'taxonomies' => [ 'type-categories' ],
	 *		],
	 *	];
	 */
	public function post_types() {
		$this->post_types = [
			'hours' => [
				'label' => 'Library Hours',
				'description' => '',
				'public' => true,
				'menu_icon' => 'dashicons-clock',
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
	}

	/**
	 * Set an array of arrays corresponding to wp_enqueue_script parameters.
	 */
	public function scripts() {
		$this->scripts = [];
	}

	/**
	 * Set an array of namespaces corresponding to this plugin's shortcode classes.
	 */
	public function shortcodes() {
		$this->shortcodes = [
			'Colby_Openhours\\Shortcodes\\Library_Hours',
			'Colby_Openhours\\Shortcodes\\Open_Hours',
		];
	}

	/**
	 * Set an array of arrays corresponding to wp_enqueue_style parameters.
	 */
	public function styles() {
		$this->stylesheets = [
			[ $this->text_domain, "{$this->assets_url}style{$this->min}.css", [], $this->version ],
		];
	}

	/** Set an associative array of this plugin's taxonomies -- name => settings
	 * Example:
	 * $this->taxonomies = [
	 *		'type-categories' => [
	 *			'type' => 'type',
	 *			'args' => [
	 *				'label' => 'Type Categories',
	 *				'labels' => [
	 *					'singular_name' => 'Type Category',
	 *				],
	 *				'hierarchical' => true,
	 *			],
	 *		],
	 *	];
	 */
	public function taxonomies() {
		$this->taxonomies = [];
	}
}
