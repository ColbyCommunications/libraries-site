<?php
/**
 * Configuration class
 *
 * @package colby-libraries
 */

namespace Colby_Libraries;

/**
 * Set variables used throughout the plugin.
 */
class Colby_Libraries {

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
	 * The text used in most search boxes.
	 *
	 * @var $placeholder_text string
	 */
	public $placeholder_text = 'Find articles, books, journals and more.';

	/**
	 * The array of post types registered by this plugin.
	 *
	 * @var $post_types array
	 */
	public $post_types = array();

	/**
	 * The array of scripts enqueued by this plugin.
	 *
	 * @var $scripts array
	 */
	public $scripts = array();

	/**
	 * The pretty names of the search tabs.
	 *
	 * @var $search_tabs array
	 */
	public $search_tabs = array(
		'LibrarySearch',
		'Journals & Newspapers',
		'Databases',
		'Research Guides',
		'Special Collections & Archives',
	);

		/**
	 * The pretty names of the search tabs.
	 *
	 * @var $search_tabs array
	 */
	public $search_tab_ids = array(
		'librarysearch',
		'journals-newspapers',
		'databases',
		'research-guides',
		'special-collections-archives',
	);


	/**
	 * The array of shortcodes added by this plugin.
	 *
	 * @var $shortcodes array.
	 */
	public $shortcodes = array();

	/**
	 * The array of stylesheets enqueued by this plugin.
	 *
	 * @var $stylesheets array
	 */
	public $stylesheets = array();

	/**
	 * The array of taxonomies added by this plugin.
	 *
	 * @var $taxonomies array
	 */
	public $taxonomoies = array();

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
		$this->main_file              = $main_file;
		$this->debug                  = isset( $_GET['debug'] ) ? true : false;
		$this->path                   = trailingslashit( dirname( $main_file ) );
		$this->url                    = trailingslashit( plugin_dir_url( $main_file ) );
		$this->assets_url             = substr( $this->url, ( strpos( $this->url, '//' ) ) ) . 'assets/';
		$this->text_domain            = $plugin_data['Text Domain'];
		$this->text_domain_underscore = str_replace( '-', '_', $this->text_domain );
		$this->version                = $plugin_data['Version'];
		$this->min                    = true === $this->debug ? '' : '.min';

		$this->taxonomies();
		$this->shortcodes();
		$this->styles();
		$this->scripts();
	}

	/**
	 * Set an associative array of this plugin's post types -- name => settings.
	 * Example:
	 * $this->post_types = [
	 *      'type' => [
	 *          'label' => 'Types',
	 *          'labels' => [
	 *              'singular_name' => 'Type',
	 *          ],
	 *          'public' => true,
	 *          'supports' => [ 'title', 'editor' ],
	 *          'hierarchical' => false,
	 *          'taxonomies' => [ 'type-categories' ],
	 *      ],
	 *  ];
	 */
	public function post_types() {
		$this->post_types = array();
	}

	/**
	 * Set an array of arrays corresponding to wp_enqueue_script parameters.
	 */
	public function scripts() {
		$this->scripts = array(
			array( $this->text_domain, "{$this->assets_url}scripts{$this->min}.js", array(), $this->version, true ),
		);
	}

	/**
	 * Set an array of namespaces corresponding to this plugin's shortcode classes.
	 */
	public function shortcodes() {
		$this->shortcodes = array(
			'Colby_Libraries\\Shortcodes\\Library_Search',
		);
	}

	/**
	 * Set an array of arrays corresponding to wp_enqueue_style parameters.
	 */
	public function styles() {
		$this->stylesheets = array(
			array( $this->text_domain, "{$this->assets_url}style{$this->min}.css", array(), $this->version ),
		);
	}

	/** Set an associative array of this plugin's taxonomies -- name => settings
	 * Example:
	 * $this->taxonomies = [
	 *      'type-categories' => [
	 *          'type' => 'type',
	 *          'args' => [
	 *              'label' => 'Type Categories',
	 *              'labels' => [
	 *                  'singular_name' => 'Type Category',
	 *              ],
	 *              'hierarchical' => true,
	 *          ],
	 *      ],
	 *  ];
	 */
	public function taxonomies() {
		$this->taxonomies = array();
	}
}
