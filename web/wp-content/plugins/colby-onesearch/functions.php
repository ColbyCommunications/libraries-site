<?php
/**
 * Functions used in the plugin
 *
 * @package colby-onesearch
 */

/**
 * Check whether a string ends with a substring
 *
 * @param string $haystack The string.
 * @param string $needle The substring.
 *
 * @return bool|null The answer.
 */
function onesearch_ends_with( $haystack, $needle ) {
	if ( ! is_string( $haystack ) || ! is_string( $needle ) ) {
		return;
	}

	if ( $haystack === $needle ) {
		return true;
	}

	$substring = substr( $haystack, -(strlen( $needle )) );
	if ( $substring === $needle ) {
		return true;
	}

	return false;
}

/**
 * Make a punctuationless, lowercase array of words from a string. Optionally
 * filter out stopwords.
 *
 * @param string $string The string to be split into an array.
 * @param bool   $filter Filter out stopwords.
 *
 * @return array $output  The sorted array.
 */
function onesearch_no_punctuation_list( $string, $filter = true ) {
	global $stopwords;

	$string = strtolower( $string );

	// Ignore possessives.
	$string = str_replace( array( '\'s', '’s' ), '', $string );

	// Remove punctuation.
	$string = preg_replace( '/[^a-zA-Z0-9 ]/', ' ', $string );

	// Remove double spaces.
	$string = str_replace( '  ', ' ', $string );

	$unfiltered = explode( ' ', $string );

	if ( ! $filter ) {
		$output = [];
		foreach ( $unfiltered as $word ) {
			if ( ! in_array( $word, [ '', ' ' ], true ) ) {
				$output[] = $word;
			}
		}
		return $output;
	}

	$filtered = [];
	foreach ( $unfiltered as $word ) {
		if ( strlen( $word ) && ! in_array( $word, $stopwords, true ) ) {
			$filtered[] = $word;
		}
	}
	return $filtered;
}

/**
 * Generate a score based on how closely two strings match.
 *
 * @param string|array $string1 The first string.
 * @param string|array $string2 The second string.
 * @param int          $points_for_match The number of points for a word match.
 * @param bool         $trim_suffixes If true, trim suffixes from words before checking for matches.
 *
 * @return int $score The score.
 */
function onesearch_string_match( $string1, $string2, $points_for_match = 6, $trim_suffixes = false ) {
	if ( ! $string1 || ! $string2 ) {
		return 0;
	}
	if ( is_string( $string1 ) ) {
		$string1 = explode( ' ', $string1 );
	}
	if ( is_string( $string2 ) ) {
		$string2 = explode( ' ', $string2 );
	}

	if ( true === $trim_suffixes ) {
		$string1 = array_merge( $string1, onesearch_trim_suffixes( $string1 ) );
		$string2 = array_merge( $string2, onesearch_trim_suffixes( $string2 ) );
	}

	$string1 = onesearch_no_punctuation_list( implode( ' ', $string1 ) );
	$string2 = onesearch_no_punctuation_list( implode( ' ', $string2 ) );

	$score = 0;
	foreach ( $string2 as $word ) {
		if ( in_array( $word, $string1, true ) ) {
			$score += $points_for_match;
			$points_for_match--; // Matches earlier in the string earn more points.
		}
	}

	if ( 0 < $score || true === $trim_suffixes ) {
		return $score;
	}

	// Rerun the function with suffixes trimmed.
	return onesearch_string_match( $string1, $string2, 4, true );
}

/**
 * Trim suffixes from an array of words.
 *
 * @param array $array The words to trim.
 * @param array $output The array of trimmed words.
 *
 * @return array $output The array of trimmed words.
 */
function onesearch_trim_suffixes( $array, $output = [] ) {
	global $suffixes;

	// End recursion.
	if ( empty( $array ) ) {
		return $output;
	}

	// Word-ending letters usually doubled when a suffix is added.
	$doubled_letters = 'bdfglmnpstz';

	if ( is_string( $array ) ) {
		$array = [ $array ];
	}

	$word = array_shift( $array ) ?: 'none'; // $word = array_shift( $array );
	foreach ( $suffixes as $suffix ) {
		if ( ! onesearch_ends_with( $word, $suffix ) ) {
			continue;
		}
		$word = substr( $word, 0, -(strlen( $suffix )) );
		if ( substr( $word, -1 ) === substr( $word, -2, 1 ) // The word's last two letters are the same.
				&& false !== strpos( $doubled_letters, substr( $word, -1 ) ) ) { // The last letter is in $doubled_letters.
			$word = substr( $word, 0, strlen( $word ) - 1 ); // Remove the last letter.
		}
		$output[] = $word;
		break;
	}

	return onesearch_trim_suffixes( $array, $output );
}


/**
 * Print data in the browser.
 *
 * @param mixed  $data A PHP value.
 * @param string $message an optional message to display at the beginning of the block.
 *
 * @return void
 */
function pprint( $data, $message = '' ) {
	?>

<pre>
	<?php
	if ( $message ) :
		echo esc_html( "$message" );
endif;
?>

	<?php
	if ( $data ) :
		esc_html( $data );
endif;
?>

</pre>
<?php
}


/**
 * Callback for ajax search requests.
 *
 * Ajax callbacks must wp_die().
 *
 * @return void
 */
function onesearch_run_search() {
	$output = [
		'box' => ONESEARCH_BOX,
	];
	ob_start();
	if ( class_exists( '\Colby_Onesearch\\Search\\' . ONESEARCH_BOXES[ ONESEARCH_BOX ]['type'] ) ) {
		$classname = '\Colby_Onesearch\\Search\\' . ONESEARCH_BOXES[ ONESEARCH_BOX ]['type'];
		$searcher = new $classname();
	}

	if ( isset( $searcher ) && $searcher ) {
		$searcher->run();

		if ( 'fallback' === ONESEARCH_BOX ) {
			$output['html'] = $searcher->html;
			echo wp_json_encode( $output );
			wp_die();
		}

		// Some Summon scores are floats.
		$output['score'] = (int) ceil( (float) $searcher->score );

		if ( isset( $searcher->facet_counts ) && $searcher->facet_counts ) {
			$output['facet_counts'] = $searcher->facet_counts;
		}
		if ( isset( $searcher->did_you_mean ) && $searcher->did_you_mean ) {
			$output['did_you_mean'] = $searcher->did_you_mean;
		}
	}

	$output['html'] = ob_get_clean();

	echo wp_json_encode( $output );
	wp_die();
}


/**
 * Sort an array of objects by the value of a shared attribute.
 *
 * @param mixed  $key The shared attribute.
 * @param string $array_of_objects The namespace prefix.
 * @param array  $output The sorted array (used in recursive function calls).
 *
 * @return array $output The sorted array.
 */
function onesearch_sort_objects_by( $key, $array_of_objects, $output = [] ) {
	if ( ! $array_of_objects ) {
		return $output;
	}

	$highest_score = 0;
	$winning_index;
	foreach ( $array_of_objects as $index => $object ) {
		if ( $object->$key > $highest_score ) {
			$highest_score = $object->$key;
			$winning_index = $index;
		}
	}
	$output[] = $array_of_objects[ $winning_index ];

	// Safety check to avoid infinite recursion.
	if ( isset( $array_of_objects[ $winning_index ] ) && ! empty( $array_of_objects[ $winning_index ] ) ) {
		unset( $array_of_objects[ $winning_index ] );
	} else {
		return $output; // End early if something is wrong.
	}

	return onesearch_sort_objects_by( $key, $array_of_objects, $output );
}
