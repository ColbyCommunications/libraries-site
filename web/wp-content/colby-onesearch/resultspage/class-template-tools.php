<?php
/**
 * Functions for use in templates.
 *
 * @package colby-onesearch
 */

namespace Colby_Onesearch\ResultsPage;


/**
 * All methods are static.
 */
class Template_Tools
{
	/**
	 * Check for $_GET values that trigger the advanced search.
	 *
	 * @return bool;
	 */
	public static function advanced_search_is_active() {
		if ( 1 === strlen( ONESEARCH_TYPE ) && 'k' !== ONESEARCH_TYPE ) {
			return true;
		}
		if ( defined( 'ONESEARCH_START' ) && null !== ONESEARCH_START ) {
			return true;
		}
		if ( defined( 'ONESEARCH_END' ) && date( 'Y' ) !== ONESEARCH_END ) {
			return true;
		}
		if ( defined( 'ONLINE' ) && 1 === ONLINE ) {
			return true;
		}
		if ( defined( 'SCHOLARLY' ) && 1 === SCHOLARLY ) {
			return true;
		}
		return false;
	}


	/** Make the link at the bottom of each box. */
	public static function draw_see_more_link() {
		if ( 'Summon' === ONESEARCH_BOXES[ ONESEARCH_BOX ]['type'] ) {
			echo esc_url( 'https://colby.summon.serialssolutions.com/#!/search?ho=t' );
			$types = '';
			if ( ONESEARCH_BOXES[ ONESEARCH_BOX ]['content_types'] ) {
				echo '&fvf=';
				foreach ( ONESEARCH_BOXES[ ONESEARCH_BOX ]['content_types'] as $type ) {
					$types .= 'ContentType,' . $type . ',f%7C';
				}
				$types = substr( $types, 0, strrpos( $types, '%7C' ) );
				echo esc_attr( $types );
			}
			echo esc_attr( '&l=en&q=' . ONESEARCH_SEARCH_STRING );

		} elseif ( in_array( ONESEARCH_BOXES[ ONESEARCH_BOX ]['type'], [ 'LibGuides', 'LibAnswers' ], true ) ) {
			echo esc_attr( ONESEARCH_BOXES[ ONESEARCH_BOX ]['search_link'] . ONESEARCH_SEARCH_STRING );
		}
	}


	/** Draw the search type select input. */
	public static function draw_type_select() {
		foreach ( ONESEARCH_SEARCH_TYPES as $value => $text ) {
			$selected = ( ONESEARCH_TYPE === $value ) ? ' selected' : '';
			echo wp_kses_post( "<option value=\"$value\"$selected>$text</option>" );
		}
	}


	/**
	 * Draw the description for a libanswers result.
	 *
	 * @param string $description The description.
	 * @param int    $length The number of words to show.
	 *
	 * @return string The processed description.
	 */
	public static function libanswers_description( $description, $length = 25 ) {
		$description_explode = explode( ' ', $description );

		if ( count( $description_explode ) < $length ) {
			return $description;
		}

		return implode( ' ', array_slice( $description_explode, 0, $length ) ) . '...';
	}


	/**
	 * Assemble the string of authors.
	 *
	 * @param array $authors The list of authors.
	 *
	 * @return string The string to display.
	 */
	public static function summon_get_author( $authors ) {
		$output = '';

		foreach ( $authors as $index => $author ) {
			if ( $index > 3 ) {
				$output .= '; et al.';
				break;
			}

			if ( $index > 0 ) {
				$output .= '; ';
			}

			$output .= '<a href="?type=a&q=' . $author . '">';
			$output .= $author;
			$output .= '</a>';
		}

		if ( '.' !== substr( $output, -1 ) ) {
			$output .= '.';
		}

		return $output;
	}


	/**
	 * Assemble the string of libraries that have the result.
	 *
	 * @param object $result The full result data.
	 *
	 * @return string The string to display.
	 */
	public static function summon_get_libraries( $result ) {
		$colby = '';
		$bates = '';
		$bowdoin = '';

		$libraries = $result->Library;

		if ( '1' === $result->hasFullText || in_array( 'Colby Online', $libraries, true ) ) {
			$colby .= '<a class="bento-result__library-button--online" href="';
			$colby .= $result->link . '">Online</a>';
			return $colby;
		}

		$bowdoined = false;
		$batesed = false;
		foreach ( $libraries as $library ) {
			if ( strpos( $library, 'Colby' ) !== false ) {
				$library = substr( $library, strlen( 'Colby ' ) );
				$colby .= '<a class="bento-result__library-button--colby" href="';
				$colby .= $result->link . '">' . $library . '</a>';
				continue;
			}

			if ( strpos( $library, 'Bates' ) !== false ) {
				if ( $batesed or strpos( $library, 'Online' ) ) { continue; }
				$bates .= '<a class="bento-result__library-button--bates" href="';
				$bates .= $result->link . '">Bates</a>';
				$batesed = true;
				continue;
			}

			if ( strpos( $library, 'Bowdoin' ) !== false ) {
				if ( $bowdoined or strpos( $library, 'Online' ) ) { continue; }
				$bowdoin .= '<a class="bento-result__library-button--bowdoin" href="';
				$bowdoin .= $result->link . '">Bowdoin</a>';
				$bowdoined = true;
				continue;
			}
		}
		return $colby . $bates . $bowdoin;
	}


	/**
	 * Assemble a string from the result's publication.
	 *
	 * @param object $result The full result data.
	 *
	 * @return string $output The string to display.
	 */
	public static function summon_get_publication( $result ) {
		$output = '';

		if ( isset( $result->PublicationTitle )
			and is_array( $result->PublicationTitle )
			and $result->PublicationTitle[0] ) {
				$output .= $result->PublicationTitle[0];
		}

		if ( ! $output ) { return; }

		if ( isset( $result->Volume )
			and is_array( $result->Volume )
			and $result->Volume[0] ) {
				$output .= ', vol. ' . $result->Volume[0];
		}

		if ( isset( $result->Issue )
			and is_array( $result->Issue )
			and $result->Issue[0] ) {
				$output .= ' issue ' . $result->Issue[0];
		}

		$output .= '.';

		return $output;
	}


	/**
	 * Assemble a string from the result's publication source data.
	 *
	 * @param object $result The full result data.
	 *
	 * @return string $output The string to display.
	 */
	public static function summon_get_source( $result ) {
		if ( 'digitalcommons' === ONESEARCH_BOX ) {
			return;
		}

		$output = '';

		if ( in_array( ONESEARCH_BOX, [ 'images', 'audio' ], true ) && isset( $result->Genre ) && $result->Genre ) {
			$output .= ucwords( strtolower( $result->Genre[0] ) ) . '. ';
		}

		$publication_place_used = false;
		if ( isset( $result->PublicationPlace )
			&& is_array( $result->PublicationPlace )
			&& $result->PublicationPlace[0] ) {
				$output .= $result->PublicationPlace[0];
				$publication_place_used = true;
		}

		$publisher_used = false;
		if ( isset( $result->Publisher )
			&& (trim( ',' !== $result->Publisher[0] ) )
			&& is_array( $result->Publisher )
			&& $result->Publisher[0] ) {
			if ( $publication_place_used ) {
				$output .= ': ';
			}
				$output .= $result->Publisher[0];
				$publisher_used = true;
		}

		$publication_year_used = false;
		if ( isset( $result->PublicationYear )
			&& is_array( $result->PublicationYear )
			&& $result->PublicationYear[0] ) {
			if ( $publication_place_used || $publisher_used ) {
				$output .= ', ';
			}
				$output .= $result->PublicationYear[0];
				$publication_year_used = true;
		}

		if ( ($publication_place_used || $publisher_used || $publication_year_used)
				&& '.' !== substr( $output, -1 ) ) {
			$output .= '.';
		}

		return $output;
	}


	/**
	 * Assemble a string from the result's subtitle.
	 *
	 * @param object $result The full result data.
	 * @param int    $length The maximum length of the subtitle in words.
	 *
	 * @return string The string to display.
	 */
	public static function summon_get_subtitle( $result, $length = 15 ) {
		if ( ! isset( $result->Subtitle ) || ! is_array( $result->Subtitle ) || ! $result->Subtitle ) {
			return;
		}

		$output = '';

		$words = explode( ' ', $result->Subtitle[0] );

		if ( count( $words ) < $length ) {
			return implode( ' ', $words );
		}

		return implode( ' ', array_slice( $words, 0, $length ) ) . '...';
	}


	/**
	 * Determine whether the Summon result has a usable thumbanil.
	 *
	 * @param object $result The full result data.
	 *
	 * @return bool The answer.
	 */
	public static function summon_has_thumbnail( $result ) {
		if ( ! isset( $result->thumbnail_s ) || ! is_array( $result->thumbnail_s ) ) {
			return false;
		}
		if ( 'images' === ONESEARCH_BOX ) {
			return true;
		}
		if ( strpos( $result->thumbnail_s[0], 'freeimage=true' ) > 0 ) {
			return true;
		}
		return false;
	}


	/**
	 * Prepare a Summon result title for display.
	 *
	 * @param string $title The title from the result.
	 *
	 * @return string The processed title.
	 */
	public static function summon_sanitize_title( $title ) {
		$title = trim( $title );
		$title_explode = explode( ' ', $title );

		if ( count( $title_explode ) < 15 ) {
			return $title;
		}

		return implode( ' ', array_slice( $title_explode, 0, 15 ) ) . '...';

	}
}
