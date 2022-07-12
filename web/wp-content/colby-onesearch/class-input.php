<?php
/**
 * Validate and sanitize $_GET values for use in the search
 *
 * @package colby-onesearch
 */

namespace Colby_Onesearch;

/**
 * Validate and sanitize search parameters
 */
final class Input
{
	/** Boolean parameters. */
	public static function bool_validate( $bool )
	{
		if ( '0' == $bool ) {
			return;
		}
		if ( '1' == $bool ) {
			return 1;
		}
	}


	/** The name of the search box. */
	public static function box_validate( $box )
	{
		if ( is_array( ONESEARCH_BOXES ) && array_key_exists( $box, ONESEARCH_BOXES ) ) {
			return $box;
		}
	}


	/** The search type (keyword, title, author, subject). */
	public static function type_validate( $type )
	{
		$known_types = [ 'k', 't', 'a', 's' ];

		if ( in_array( $type, $known_types, true ) ) {
			return $type;
		}
	}


	/** The query string. */
	public static function q_validate( $q )
	{
		if ( ! is_string( $q ) ) {
			return;
		}

		$q = htmlspecialchars_decode( urldecode( trim( esc_attr( $q ) ) ), ENT_QUOTES );

		if ( $q ) {
			return $q;
		}
	}


	/** The 'From' and 'To' fields. */
	public static function year_validate( $date )
	{
		if ( (int) $date < 1000 ) {
			return null;
		}
		if ( (int) $date > (int) date( 'Y' ) ) {
			return null;
		}
		return $date;
	}
}
