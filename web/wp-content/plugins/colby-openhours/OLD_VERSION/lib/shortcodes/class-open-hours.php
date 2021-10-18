<?php
/**
 * Class [open-hours] shortcode.
 *
 * @package colby-openhours
 */

namespace Colby_Openhours\Shortcodes;

class Open_Hours {
	public $shortcode = 'open-hours';
	private $source;

	public $att_options = [
		'source' => null,
		'location' => null,
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
		$atts = \Colby_Openhours\Functions::set_atts( $atts, $this->att_options );

		if ( $atts['source'] && ! empty( $atts['source'] ) ) {
			$this->source = $atts['source'];
			if ( false === $source_site = get_blog_details( $atts['source'] ) ) {
				return 'No hours to display.';
			}

			switch_to_blog( $source_site->blog_id );
		}

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
		global $post, $wp_query, $colby_openhours;
		$wp_query = $new_query;

		ob_start();
		include "{$colby_openhours->path}templates/open-hours.php";

		if ( ! empty( $this->source ) ) {
			restore_current_blog();
		}

		wp_reset_query();
		wp_reset_postdata();
		return ob_get_clean();
	}
}
