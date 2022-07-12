<?php
/**
 * Run a LibAnswers search
 *
 * @package Colby/Onesearch
 */


/**
 * Use LibAnswers API to conduct a search, then process the results.
 */
final class Libanswers
{
	/**
	 * The data used for the search.
	 *
	 * @var $data array
	 */
	private $data = [];

	/** Load data from transient or web if transient is expired. */
	public function __construct() {
		$data = get_transient( 'clbs_libanswers_data' );
		if ( $data ) {
			$this->data = $data;
		} else {
			$this->data = $this->refresh_data();
		}
	}


	/**
	 * Put results into template files.
	 *
	 * @param array $results The search results.
	 */
	private function draw_results( $results ) {
		$number_drawn = 0;
		include ONESEARCH_PATH . 'resultspage/templates/bento-box-header.php';

		foreach ( $results as $result ) {
			if ( ! $this->validate_result( $result ) ) {
				continue;
			}

			include ONESEARCH_PATH . 'resultspage/templates/bento-result--libanswers.php';
			if ( ONESEARCH_MAX_RESULT_COUNT >= $number_drawn++ ) {
				break;
			}
		}

		include ONESEARCH_PATH . 'resultspage/templates/bento-box-footer.php';
	}


	/** Requery data from the web API. Adds a few seconds to a single page load. */
	private function refresh_data() {
		$data = [];
		$page = 1;
		$libanswers_id = get_option( 'clbs_options' )['libanswers_id'];
		$url = str_replace( 'ID', $libanswers_id, ONESEARCH_BOXES[ ONESEARCH_BOX ]['data_url'] ) . "$page";

		$next_page = wp_remote_get( $url )['body'];
		$next_page = wp_json_decode( $next_page )->faqs;
		$data = array_merge( $data, $next_page );

		while ( count( $next_page ) ) { // Last page plus one is an empty array.
			$page++;
			$url = str_replace( 'ID', $libanswers_id, ONESEARCH_BOXES[ ONESEARCH_BOX ]['data_url'] ) . "$page";
			$next_page = wp_remote_get( $url )['body'];
			$next_page = json_decode( $next_page )->faqs;
			$data = array_merge( $data, $next_page );
		}

		set_transient( 'clbs_libanswers_data', $data, DAY_IN_SECONDS * 25 );
		return $data;
	}


	/** Check the data for matches. If matches, send to templates. */
	public function run() {
		$matches = [];
		foreach ( $this->data as $faq ) {
			$score = 0;
			if ( ONESEARCH_START && $faq->published < ONESEARCH_START ) {
				continue;
			}
			if ( ONESEARCH_END && $faq->published > ONESEARCH_END ) {
				continue;
			}

			if ( isset( $faq->author ) ) {
				$score = onesearch_string_match( $faq->author, ONESEARCH_SEARCH_STRING );
			}

			if ( 'a' === ONESEARCH_TYPE ) { // If author search, nothing else needed.
				if ( $score ) {
					$score *= 2;
					$faq->score = $score;
					array_push( $matches, $faq );
				}
				continue;
			}

			$score += onesearch_string_match( $faq->details, ONESEARCH_SEARCH_STRING ) * 2;
			$score += onesearch_string_match( $faq->answer, ONESEARCH_SEARCH_STRING );

			if ( $score ) {
				$faq->score = $score;
				array_push( $matches, $faq );
			}
		}

		if ( $matches ) {
			$matches = onesearch_sort_objects_by( 'score', $matches );

			$this->draw_results( $matches );

			$this->score = $matches[0]->score;
		} else {
			$this->score = 0;
		}

	}


	/**
	 * Make sure the result has parts required by the templates.
	 *
	 * @param object $result A matching result.
	 */
	private function validate_result( $result ) {

		if ( ! $result->owner ) {
			return;
		}
		if ( ! $result->url ) {
			return;
		}
		return true;
	}
}
