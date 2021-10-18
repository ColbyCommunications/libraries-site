<?php
/**
 * Deprecated version of the open-hours shortcode. To be removed summer 2016.
 *
 * @package colby-openhours
 */

namespace Colby_Openhours\Shortcodes;

class Library_Hours {
	public $shortcode = 'library-hours';

	public $att_options = [
		'location' => [
			'options' => [
				null,
				'Miller Library',
				'Science Library',
				'Bixler Art and Music Library',
				'Special Collections',
				],
			],
		'view' => [
			'options' => [
				'horizontal',
				'vertical',
				],
			],
		'linkto' => null,
		'viewall' => [
			'options' => [
				'false',
				'true',
				],
			],
		'showclock' => [
			'options' => [
				'true',
				'false',
				],
			],
		];

	public function run( $atts ) {
		$atts = colby_openhours_set_atts( $atts, $this->att_options );

		if ( false === $libraries_site = get_blog_details( 'libraries' ) ) {
			return 'No hours to display.';
		}

		switch_to_blog( $libraries_site->blog_id );

		$new_query = new \WP_Query( [
				'post_type' => 'hours',
				'meta_key' => 'type',
				'meta_value' => 'Regular Hours',
				'orderby' => 'title',
				'order' => 'asc',
		] );

		$special_hours = new \WP_Query( [
				'post_type' => 'hours',
				'meta_key' => 'type',
				'meta_value' => 'Special Hours',
				'posts_per_page' => '-1',
		] );

		if ( empty( $new_query->posts ) ) {
			return 'No hours to display.';
		}

		$new_query->atts = $atts;

		return $this->draw( $new_query, $special_hours );
	}


	private function draw( $new_query, $special_hours ) {
		global $post, $wp_query;
		$wp_query = $new_query;

		ob_start();
		include COLBY_OPENHOURS_PATH . 'templates/library-hours.php';
		restore_current_blog();
		wp_reset_query();
		wp_reset_postdata();
		return ob_get_clean();
	}
}
