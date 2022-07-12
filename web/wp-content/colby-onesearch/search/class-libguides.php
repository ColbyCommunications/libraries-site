<?php
/**
 * Run a LibGuides search
 *
 * @package colby-onesearch
 */

namespace Colby_Onesearch\Search;


/**
 * Use LibGuides API to conduct a search, then process the results.
 */
class Libguides
{
	/**
	 * The data to draw results from.
	 *
	 * @var $data
	 */
	private $data;

	/**
	 * The LibGuides subject data.
	 *
	 * @var $subjects
	 */
	private $subjects;

	/**
	 * API settings stored as options in the database.
	 *
	 * @var $options
	 */
	private $options;

	/** Load data from transient or web if transient is expired. */
	public function __construct() {

		$subjects = get_transient( 'clbs_database_subjects' );
		if ( $subjects ) {
			$this->subjects = $subjects;
		} else {
			$this->subjects = $this->refresh_subjects();
		}

		$data = get_transient( 'clbs_databases' );
		if ( $data ) {
			$this->data = $data;
		} else {
			$this->data = $this->refresh_data();
		}
	}


	/** If the search query matches a libguides subject, use data for that subject. */
	private function check_for_subject_match() {
		foreach ( $this->subjects as $subject ) {
			if ( strtolower( ONESEARCH_SEARCH_STRING ) === strtolower( $subject->name ) ) {
				$subject_id = $subject->id;
				if ( ! $this->options ) {
					$this->options = get_option( 'clbs_options' );
				}
				$libguides_id = $this->options['libguides_id'];
				$libguides_key = $this->options['libguides_key'];

				$url = str_replace( 'ID', $libguides_id, ONESEARCH_BOXES[ ONESEARCH_BOX ]['subject_query'] );
				$url = str_replace( 'KEY', $libguides_key, $url ) . $subject_id;

				return json_decode( wp_remote_get( $url )['body'] );
			}
		}
		return $this->data;
	}


	/**
	 * Send matching results to template files.
	 *
	 * @param array $results The results.
	 */
	private function draw_results( $results ) {
		$number_drawn = 0;
		include ONESEARCH_PATH . 'resultspage/templates/bento-box-header.php';

		foreach ( $results as $result ) {

			include ONESEARCH_PATH . 'resultspage/templates/bento-result--databases.php';
			if ( ONESEARCH_MAX_RESULT_COUNT <= $number_drawn++ ) {
				break;
			}
		}

		include ONESEARCH_PATH . 'resultspage/templates/bento-box-footer.php';
	}


	/** Get database data from the web API and save it on the WP database. **/
	private function refresh_data() {
		if ( ! $this->options ) {
			$this->options = get_option( 'clbs_options' );
		}
		$libguides_id = $this->options['libguides_id'];
		$libguides_key = $this->options['libguides_key'];

		$url = str_replace( 'ID', $libguides_id, ONESEARCH_BOXES[ ONESEARCH_BOX ]['data_url'] );
		$url = str_replace( 'KEY', $libguides_key, $url );

		$data = json_decode( wp_remote_get( $url )['body'] );
		set_transient( 'clbs_databases', $data, DAY_IN_SECONDS * 20 );
		return $data;
	}


	/** Get subject data from web API and save it to the WP database. **/
	public function refresh_subjects() {
		if ( ! $this->options ) {
			$this->options = get_option( 'clbs_options' );
		}
		$libguides_id = $this->options['libguides_id'];
		$libguides_key = $this->options['libguides_key'];

		$url = str_replace( 'ID', $libguides_id, ONESEARCH_BOXES[ ONESEARCH_BOX ]['subjects_url'] );
		$url = str_replace( 'KEY', $libguides_key, $url );

		$subjects = json_decode( wp_remote_get( $url )['body'] );
		set_transient( 'clbs_database_subjects', $subjects, DAY_IN_SECONDS * 30 );

		return $subjects;
	}


	/** Assign scores to matches. */
	public function run() {
		if ( 'a' === ONESEARCH_TYPE ) { // Exclude databases from author searches.
			return;
		}

		$this->data = $this->check_for_subject_match();

		$matches = [];
		foreach ( $this->data as $database ) {
			$score = 0;
			$score += onesearch_string_match( $database->name, ONESEARCH_SEARCH_STRING ) * 5;
			if ( 't' !== ONESEARCH_TYPE ) {
				$score += onesearch_string_match( $database->description, ONESEARCH_SEARCH_STRING );
			} else {
				$score *= 1.5;
			}

			if ( $score ) {
				$database->score = $score;
				array_push( $matches, $database );
			}
		}

		if ( $matches ) {
			$matches = onesearch_sort_objects_by( 'score', $matches );

			$this->draw_results( $matches );

			$this->score = ($matches[0]->score + 1) / 5;
		} else {
			$this->score = 0;
		}
	}
}
