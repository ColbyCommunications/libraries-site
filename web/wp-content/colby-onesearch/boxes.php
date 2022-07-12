<?php
/**
 * Settings for the search results boxes
 *
 * @package colby-onesearch
 */

const ONESEARCH_BOXES = [

	'audio'     => [
		'type'          => 'Summon',
		'pretty_name'   => 'Audio',
		'start_link'    => 'https://colby.summon.serialssolutions.com/',
		'ficon'         => 'headphones',
		'content_types' => [
			'Streaming Audio',
			'Compact Disc',
			'Audio Tape',
			'Audio Recording',
			'Music Recording',
			'Spoken Word Recording',
		],
		],

	'books'     => [
		'type'          => 'Summon',
		'pretty_name'   => 'Books',
		'start_link'    => 'https://cbbcat.net',
		'ficon'         => 'book',
		'content_types' => [ 'Book / eBook' ],
		],

	'databases' => [
		'type'          => 'Libguides',
		'pretty_name'   => 'Databases',
		'start_link'    => 'https://libguides.colby.edu/az.php',
		'ficon'         => 'archive',
		'subjects_url'  => 'https://lgapi.libapps.com/1.1/subjects?site_id=ID&key=KEY',
		'data_url'      => 'https://lgapi.libapps.com/1.1/assets?site_id=ID&key=KEY&asset_types=10',
		'subject_query' => 'https://lgapi.libapps.com/1.1/assets?site_id=ID&key=KEY&asset_types=10&subject_ids=',
		'search_link'   => 'https://libguides.colby.edu/az.php?q=',
		],

	'digitalcommons' => [
		'type'          => 'Summon',
		'pretty_name'   => 'Digital Commons @ Colby',
		'start_link'    => 'https://colby.digitalcommons.com',
		'ficon'         => 'cloud',
		'query_extra'   => ' (Publisher:(digital commons))',
		],

	// 'digitalcommons' => [
	// 	'type'          => 'Summon',
	// 	'pretty_name'   => 'Digital Commons @ Colby',
	// 	'start_link'    => 'https://digitalcommons.colby.edu',
	// 	'ficon'         => 'cloud',
	// 	'query_extra'   => ' (Publisher:(digital commons))',
	// 	],

	'fallback' => [
		'type'          => 'Summon',
		'pretty_name'   => 'fallback',
		'start_link'    => 'https://cbbcat.net',
		'ficon'         => 'book',
		'content_blocks' => [
			'Drawing',
			'Image',
			'Painting',
			'Photograph',
			'Poster',
			'Graphic Arts',
			'Streaming Audio',
			'Compact Disc',
			'Audio Tape',
			'Audio Recording',
			'Music Recording',
			'Spoken Word Recording',
			'Book / eBook',
			'Journal Article',
			'Journal / eJournal',
			'Research Guide',
			'Music Score',
			'Streaming Video',
			'Video Recording',
			'DVD',
		],
		],

	'images'    => [
		'type'          => 'Summon',
		'pretty_name'   => 'Images',
		'start_link'    => 'https://colby.summon.serialssolutions.com/',
		'ficon'         => 'image',
		'content_types' => [
			'Drawing',
			'Image',
			'Painting',
			'Photograph',
			'Poster',
			'Graphic Arts',
		],
		'query_extra'   => ' NOT (Publisher:(digital commons))',
		],

	'journalarticles' => [
		'type'          => 'Summon',
		'pretty_name'   => 'Journal Articles',
		'start_link'    => 'https://colby.summon.serialssolutions.com',
		'ficon'         => 'newspaper-o',
		'content_types' => [ 'Journal Article' ],
		],

	'journals'  => [
		'type'          => 'Summon',
		'pretty_name'   => 'Journals and Newspapers',
		'start_link'    => 'https://cbbcat.net/',
		'ficon'         => 'bookmark-o',
		'content_types' => [ 'Journal / eJournal', 'Newspaper' ],
		],

	'libanswers' => [
		'type'          => 'Libanswers',
		'pretty_name'   => 'FAQs',
		'sidebar_name'  => 'FAQ',
		'start_link'    => 'https://libanswers.colby.edu/',
		'ficon'         => 'question',
		'data_url'      => 'https://api2.libanswers.com/1.0/faqs?iid=ID&page=',
		'search_link'   => 'https://libanswers.colby.edu/search/?q=',
		],

	'libguides' => [
		'type'          => 'Summon',
		'pretty_name'   => 'Research Guides',
		'start_link'    => 'https://libguides.colby.edu/',
		'ficon'         => 'map-o',
		'content_types' => [ 'Research Guide' ],
		],

	'musicscores' => [
		'type'          => 'Summon',
		'pretty_name'   => 'Music scores',
		'start_link'    => 'https://colby.summon.serialssolutions.com/',
		'ficon'         => 'music',
		'content_types' => [ 'Music Score' ],
		],

	'video' => [
		'type'          => 'Summon',
		'pretty_name'   => 'Video',
		'start_link'    => 'https://colby.summon.serialssolutions.com/',
		'ficon'         => 'video-camera',
		'content_types' => [
			'Streaming Video',
			'Video Recording',
			'DVD',
		],
		],

	];
