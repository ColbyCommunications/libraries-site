<?php
/**
 * Namespaced plugin functions
 *
 * @package colby-openhours
 */

namespace Colby_Openhours;

/**
 * Functions must not depend on this plugin.
 */
class Functions {

	/**
	 * Generate a string for open hours.
	 *
	 * @param int|string $id The open hours post ID.
	 * @param bool       $viewall True to return string for all seven days of the week.
	 *
	 * @return string $todays_hours The text.
	 */
	public static function get_hours_text( $id, $viewall = false ) {
		$today = strtolower( date( 'l', strtotime( 'now' ) ) );

		if ( false === $viewall ) {
			if ( ! $today_open = strtotime( get_field( "{$today}_open", $id ) ) ) {
				return 'Closed';
			}

			if ( $today_close = strtotime( get_field( "{$today}_close", $id ) ) ) {
				$todays_hours = $today_close === $today_open ?
					'24 hours' :
					date( 'g:i a', $today_open ) . ' - ' . date( 'g:i a', $today_close );
			}
			return self::fix_hours_text( $todays_hours );
		}

		// Loop through for M-SU.
		ob_start();
		for ( $i = 1; $i <= 7; $i++ ) {
			$day_of_week = date( 'l', strtotime( "Sunday +{$i} days" ) );
			$dow_open = strtotime( get_field( strtolower( $day_of_week .'_open' ), $id ) );
			$dow_close = strtotime( get_field( strtolower( $day_of_week .'_close' ), $id ) );

	?>

	<div class=dow>
		<?php echo $day_of_week; ?>:
		<?php if ( ! $dow_open ) : ?>
		Closed
	</div>
		<?php
			continue;
		endif;
	if ( $dow_close === $dow_open ) : ?>

		Open 24 hours
		<?php else :
		echo date( 'g:i a', $dow_open ) . ' - ' . ( $dow_close ? date( 'g:i a', $dow_close ) : '' );
		endif; ?>

	</div>
	<?php

		}
		return self::fix_hours_text( ob_get_clean() );
	}


	/**
	 * Put hours string in a more readable format conforming to Colby style.
	 *
	 * @param string $todays_hours The unprocessed string.
	 *
	 * @return string $todays_hours The processed string.
	 */
	public static function fix_hours_text( $todays_hours ) {
		$todays_hours = str_replace( '12:00 am', 'midnight', $todays_hours );
		$todays_hours = str_replace( ':00', '', $todays_hours );
		$todays_hours = str_replace( 'am', 'a.m.', $todays_hours );
		$todays_hours = str_replace( 'pm', 'p.m.', $todays_hours );
		return $todays_hours;
	}


	/**
	 * Validate a user-entered shortcode $atts array against an array containing defaults.
	 *
	 * @param array $input The user-entered array.
	 * @param array $defaults The array containing defaults. Null values accept anything.
	 *				['options'] key defines valid values, the first being the default.
	 * @param array $output The output array, empty before recursion.
	 *
	 * @return array $output The filled output array.
	 */
	public static function set_atts( $input, $defaults, $output = [] ) {
		if ( empty( $defaults ) ) {
			return $output;
		}
		$key = array_keys( $defaults )[0];
		$value = $defaults[ $key ];
		unset( $defaults[ $key ] );

		if ( empty( $input[ $key ] ) ) {
			$output[ $key ] = $value;
			if ( $value['options'] ) {
				$output[ $key ] = $value['options'][0];
			}
		} elseif ( null === $value && $input[ $key ] ) { // No default; any string accepted.
			$output[ $key ] = $input[ $key ];
		} elseif ( $value['options'] && in_array( $input[ $key ], $value['options'], true ) ) {
			$output[ $key ] = $input[ $key ];
		} elseif ( $value['options'] ) {
			$output[ $key ] = $value['options'][0];
		}
		return self::set_atts( $input, $defaults, $output );
	}
}
