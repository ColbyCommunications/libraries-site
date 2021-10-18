<?php
/**
 * Plugin setup
 *
 * @package colby-openhours
 */

namespace Colby_Openhours;

class Setup {

	public function __construct( $plugin ) {
		$this->plugin = $plugin;

		register_activation_hook( $plugin->main_file, [ $this, 'activate' ] );
		add_action( 'init', [ $this, 'add_taxonomies' ], 98 );
		add_action( 'init', [ $this, 'add_post_types' ], 99 );
		add_action( 'init', [ $this, 'add_shortcodes' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ], 99 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 99 );
	}

	public function activate() {
		$plugin_name = get_plugin_data( 'Name' );
		// Stop activation if Advanced Custom Fields isn't active.
		if ( ! function_exists( 'get_field' ) ) {
			deactivate_plugins( plugin_basename( $this->plugin->main_file ) );
			wp_die( $plugin_name . ' depends on the Advanced Custom Fields plugin.' );
		}
		// Require PHP >5.6.
		if ( version_compare( phpversion(), '5.6', '<' ) ) {
			deactivate_plugins( plugin_basename( $this->plugin->main_file ) );
			wp_die( $plugin_name . ' requires PHP 5.6 or higher.' );
		}
	}

	public function add_post_types() {
		foreach ( $this->plugin->post_types as $name => $settings ) {
			register_post_type( $name, $settings );
		}
	}

	public function add_taxonomies() {
		foreach ( $this->plugin->taxonomies as $name => $settings ) {
			register_taxonomy( $name, $settings['type'], $settings['args'] );
		}
	}

	public function add_shortcodes() {
		foreach ( $this->plugin->shortcodes as $class ) {
			$shortcode = new $class();
			add_shortcode( $shortcode->shortcode, [ $shortcode, 'run' ] );
		}
	}

	public function enqueue_scripts() {
		foreach ( $this->plugin->scripts as $script ) {
			call_user_func_array( 'wp_enqueue_script', $script );
		}
	}

	public function enqueue_styles() {
		foreach ( $this->plugin->stylesheets as $style ) {
			call_user_func_array( 'wp_enqueue_style', $style );
		}
	}
}
