<?php
/**
 * Constants and globals
 *
 * @package colby-onesearch
 */

namespace Colby_Onesearch;

global $stopwords, $suffixes;

define( 'ONESEARCH_PATH', trailingslashit( dirname( __FILE__ ) ) );

// Include long constants.
require( ONESEARCH_PATH . 'boxes.php' );
require( ONESEARCH_PATH . 'facet-groups.php' );

define( 'ONESEARCH_BOX', Input::box_validate( isset( $_GET['box'] ) ? $_GET['box'] : '' ) );
define( 'ONESEARCH_DEBUG', isset( $_GET['debug'] ) && '1' === $_GET['debug'] ? true : false );
define( 'ONESEARCH_END', Input::year_validate( isset( $_GET['end'] ) ? $_GET['end'] : date( 'Y' ) ) );
define( 'ONESEARCH_GET_FACET_COUNTS', Input::bool_validate( isset( $_GET['get_facet_counts'] ) ? $_GET['get_facet_counts'] : '' ) );
define( 'ONESEARCH_MAX_RESULT_COUNT', 3 );
define( 'ONESEARCH_ONLINE', Input::bool_validate( isset( $_GET['online'] ) ? $_GET['online'] : '' ) );
define( 'ONESEARCH_SCHOLARLY', Input::bool_validate( isset( $_GET['scholarly'] ) ? $_GET['scholarly'] : '' ) );
define( 'ONESEARCH_SEARCH_STRING', Input::q_validate( isset( $_GET['q'] ) ? $_GET['q'] : null ) );

define( 'ONESEARCH_START', Input::year_validate( isset( $_GET['start'] ) ? $_GET['start'] : null ) );
define( 'ONESEARCH_TYPE', Input::type_validate( isset( $_GET['type'] ) ? $_GET['type'] : '' ) );
define( 'ONESEARCH_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'ONESEARCH_VERSION', '1.0.2' );

$stopwords = [
	'',
	' ',
	'a',
	'able',
	'about',
	'across',
	'after',
	'all',
	'almost',
	'also',
	'am',
	'among',
	'an',
	'and',
	'any',
	'are',
	'as',
	'at',
	'be',
	'because',
	'been',
	'but',
	'by',
	'can',
	'cannot',
	'could',
	'dear',
	'did',
	'do',
	'does',
	'either',
	'else',
	'ever',
	'every',
	'for',
	'from',
	'get',
	'got',
	'had',
	'has',
	'have',
	'he',
	'her',
	'hers',
	'him',
	'his',
	'how',
	'however',
	'i',
	'if',
	'in',
	'into',
	'is',
	'it',
	'its',
	'just',
	'least',
	'let',
	'like',
	'likely',
	'may',
	'me',
	'might',
	'most',
	'must',
	'my',
	'neither',
	'no',
	'nor',
	'not',
	'of',
	'off',
	'often',
	'on',
	'only',
	'or',
	'other',
	'our',
	'own',
	'rather',
	'said',
	'say',
	'says',
	'she',
	'should',
	'since',
	'so',
	'some',
	'than',
	'that',
	'the',
	'their',
	'them',
	'then',
	'there',
	'these',
	'they',
	'this',
	'tis',
	'to',
	'too',
	'twas',
	'us',
	'wants',
	'was',
	'we',
	'were',
	'what',
	'when',
	'where',
	'which',
	'while',
	'who',
	'whom',
	'why',
	'will',
	'with',
	'would',
	'yet',
	'you',
	'your',
	'others',
];


$suffixes = [
	'es',
	's',
	'izing',
	'ized',
	'ising',
	'ised',
	'ing',
	'ed',
	'ism',
	'ist',
	'ment',
	'able',
	'ible',
	'ly',
	'y',
	'ish',
	'al',
	'er',
];
