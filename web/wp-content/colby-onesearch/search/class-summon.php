<?php
/**
 * Run a Summon search
 *
 * @package colby-onesearch
 */

namespace Colby_Onesearch\Search;

require_once( ONESEARCH_PATH . 'library/Summon.php-modified/SerialsSolutions/Summon/Base.php' );


/**
 * Inherit from Serials Solutions base class.
 */
class Summon extends \SerialsSolutions_Summon_Base {

	/**
	 * Allow synonym-based query expansion.
	 *
	 * @var bool $expand
	 */
	protected $expand = true;

	/**
	 * The filters to pass to the query object.
	 *
	 * @var array $filters
	 */
	protected $filters = [];

	/**
	 * ISBNs and ISSNs that have already been displayed.
	 *
	 * @var array $id_numbers
	 */
	private $id_numbers = [];

	/**
	 * The number of results to request per page.
	 *
	 * @var int $pageSize
	 */
	protected $pageSize = 20;

	/**
	 * The range filters to pass to the query object.
	 *
	 * @var array $range_filters
	 */
	protected $range_filters = [];

	/**
	 * The number of times a search has failed and been retried.
	 *
	 * @var int $retries
	 */
	private $retries = 0;

	/**
	 * The search string.
	 *
	 * @var string $search_string
	 */
	public $search_string;


	/** Set up the parent class and the search string. */
	public function __construct() {

		$api_settings = get_option( 'clbs_options' );
		parent::__construct( $api_settings['summon_id'], $api_settings['summon_key'] );

		$box = ONESEARCH_BOXES[ ONESEARCH_BOX ]; // Shorthand.

		// Add content types for current facet group.
		if ( $box['content_types'] ) {
			foreach ( $box['content_types'] as $content_type ) {
				$this->filters[] = 'ContentType,' . $content_type . ',false';
			}
		}

		// Add blocked content for current facet group.
		if ( array_key_exists( 'content_blocks', $box ) && $box['content_blocks'] ) {
			foreach ( $box['content_blocks'] as $content_type ) {
				$this->filters[] = 'ContentType,' . $content_type . ',true';
			}
		}

		if ( 1 === ONESEARCH_ONLINE ) {
			$this->filters[] = 'IsFullText,true,f';
		}
		if ( 1 === ONESEARCH_SCHOLARLY ) {
			$this->filters[] = 'IsScholarly,false,true';
		}
		if ( ONESEARCH_START || ONESEARCH_END ) {
			$this->range_filters[] = 'PublicationDate,' . ONESEARCH_START . ':' . ONESEARCH_END;
		}

		// Modify the search string for author, title, or subject query.
		if ( 'a' === ONESEARCH_TYPE ) {
			$this->search_string = '(AuthorCombined:(' . ONESEARCH_SEARCH_STRING . '))';
		} elseif ( 't' === ONESEARCH_TYPE ) {
			$this->search_string = '(TitleCombined:(' . ONESEARCH_SEARCH_STRING . '))';
		} elseif ( 's' === ONESEARCH_TYPE ) {
			$this->search_string = '(SubjectTerms:(' . ONESEARCH_SEARCH_STRING . '))';
		} else {
			$this->search_string = ONESEARCH_SEARCH_STRING;
		}

		// If anything should be added to the search string, add it.
		if ( array_key_exists( 'query_extra', $box ) && $box['query_extra'] ) {
			$this->search_string = "($this->search_string) " . $box['query_extra'];
		}
	}


	/** Assemble HTML for the facet counts. */
	private function draw_facet_counts( $facet_counts ) {
		ob_start(); ?>

<ul class="facet-counts">
	<?php foreach ( $facet_counts as $facet_group => $count ) : ?>

	<li class="facet-counts__item">
		<a href="http://colby.summon.serialssolutions.com/#!/search?ho=t&fvf=
		<?php
		echo esc_attr( $this->type_string( $facet_group ) );
		?>
		&l=en&q=
		<?php
		echo esc_attr( ONESEARCH_SEARCH_STRING );
		?>
		">

			<?php echo wp_kses_post( $facet_group ); ?>
		</a> (<?php echo esc_html( number_format( $count ) ); ?>)
	</li>
	<?php endforeach; ?>

</ul>
<?php
		return ob_get_clean();
	}


	/** Send results to the template files */
	public function draw_results( $results, $results_name = null, $results_link = null ) {
		$number_drawn = 0;
		include ONESEARCH_PATH . 'resultspage/templates/bento-box-header.php';
		foreach ( $results as $result ) {
			if ( ! $this->validate_result( $result ) ) {
				continue;
			}

			include ONESEARCH_PATH . 'resultspage/templates/bento-result--summon.php';

			if ( ONESEARCH_MAX_RESULT_COUNT <= $number_drawn++ ) {
				break;
			}
		}

		include ONESEARCH_PATH . 'resultspage/templates/bento-box-footer.php';

	}

	/** Run a fallback search if there are too few results from the default boxes. */
	public function handle_fallback( $results ) {
		ob_end_clean(); // Get rid of the output buffer and start over

		$groups = [];
		foreach ( $results as $result ) {
			if ( ! array_key_exists( $result->ContentType[0], $groups ) ) {
				$groups[ $result->ContentType[0] ] = [];
			}
			$groups[ $result->ContentType[0] ][] = $result;
		}

		$boxes = [];

		foreach ( $groups as $group_name => $group ) {
			$group_link = 'http://colby.summon.serialssolutions.com/#!/search?ho=t&fvf='
						  . 'ContentType,' . $group_name . ',f&q=' . ONESEARCH_SEARCH_STRING;
			ob_start();
			$this->draw_results( $group, $group_name, $group_link );
			$boxes[] = ob_get_clean();
		}
		$this->html = $boxes;
	}


	/** Required by parent. */
	public function handleFatalError( $e ) {
		throw $e;
	}


	/** Overrides parent method to use wp_remote_get. Don't change from camel case. */
	public function httpRequest( $baseUrl, $method, $queryString, $headers ) {
		$args = array(
			'headers' => $headers,
			'timeout' => 5,
		);

		$results = wp_remote_get( "{$baseUrl}?{$queryString}", $args );

		if ( is_wp_error( $results ) ) {
			if ( $this->retries == 0 ) {
				$this->retries++;
				return $this->httpRequest( $baseUrl, $method, $queryString, $headers );
			}
		} else {
			return json_decode( $results['body'] );
		}
	}


	/** Run the search. */
	public function run() {
		$query = new \SerialsSolutions_Summon_Query(
			$this->search_string, [
				'facets' => ONESEARCH_GET_FACET_COUNTS == 1 ? [ 'ContentType,or,1,100' ] : [],
				'filters' => $this->filters,
				'pageSize' => ONESEARCH_BOX == 'fallback' ? 50 : $this->pageSize,
				'rangeFilters' => $this->range_filters,
				'didYouMean' => true,
			]
		);

		$results = $this->query( $query, true );

		if ( ! $results || ! is_array( $results ) ) {
			return;
		}

		if ( is_array( $results ) ) {
			$results = (object) $results;
		}

		if ( 'fallback' === ONESEARCH_BOX ) {
			return $this->handle_fallback( $results->documents );
		}

		$this->draw_results( $results->documents );

		$this->score = $results->documents[0]->Score[0];

		if ( $results->didYouMeanSuggestions && $results->didYouMeanSuggestions[0]->suggestedQuery ) {
			$this->did_you_mean = $results->didYouMeanSuggestions[0]->suggestedQuery;
		}

		if ( isset( $results->facetFields ) && isset( $results->facetFields[0]->counts ) && $results->facetFields[0]->counts ) {
			$this->facet_counts = $this->sort_facet_counts( $results->facetFields[0]->counts );
			$this->facet_counts = $this->draw_facet_counts( $this->facet_counts );
		}
	}

	/** The facet counts are grouped into categories to reduce the size of the sidebar list. */
	private function sort_facet_counts( $facet_counts ) {
		$combined_counts = [];

		foreach ( $facet_counts as $facet ) {
			if ( in_array( $facet->value, ONESEARCH_FACET_GROUPS['XXX'] ) ) {
				continue;
			}
			foreach ( ONESEARCH_FACET_GROUPS as $group => $members ) {
				if ( in_array( $facet->value, $members ) ) {
					if ( ! array_key_exists( $group, $combined_counts ) ) {
						$combined_counts[ $group ] = 0;
					}
					$combined_counts[ $group ] += $facet->count;
					continue 2;
				}
			}
		}

		ksort( $combined_counts );

		return $combined_counts;
	}


	/** Assemble a string of content types for this URL query. */
	private function type_string( $facet_group ) {
		$types = '';
		foreach ( ONESEARCH_FACET_GROUPS[ $facet_group ] as $type ) {
			$types .= 'ContentType,' . $type . ',f%7C';
		}
		$types = substr( $types, 0, strrpos( $types, '%7C' ) );
		return $types;
	}


	/** Attempt to remove duplicate results */
	private function validate_result( $result ) {
		if ( ! $result->link ) {
			return;
		}

		$is_duplicate = false;
		$numbers = [];
		if ( isset( $result->EISSN ) && $result->EISSN ) {
			$numbers = array_merge( $numbers, $result->EISSN );
		}
		if ( isset( $result->ISBN ) && $result->ISBN ) {
			$numbers = array_merge( $numbers, $result->ISBN );
		}
		if ( isset( $result->ISSN ) && $result->ISSN ) {
			$numbers = array_merge( $numbers, $result->ISSN );
		}

		foreach ( $numbers as $number ) {
			if ( in_array( $number, $this->id_numbers ) ) {
				$is_duplicate = true;
			} else {
				$this->id_numbers[] = $number;
			}
		}

		$this->id_numbers = array_merge( $this->id_numbers, $numbers );

		if ( ! $is_duplicate ) {
			return true;
		}
	}

	// Summon sometimes ignores date range parameters.
	private function year_matches( $result ) {
		if ( ! isset( $result->PublicationYear ) || ! is_array( $result->PublicationYear ) ) {
			return true;
		}
		$year = $result->PublicationYear[0];

		if ( ONESEARCH_START && $year < ONESEARCH_START ) {
			return;
		}
		if ( ONESEARCH_END && $year > ONESEARCH_END ) {
			return;
		}

		return true;
	}
}
