<?php
/**
 * Control code tied to action hooks and filters
 *
 * @package colby-openhours
 */

/** Register post types. */
add_action( 'init', function() {
	global $colby_openhours_post_types;

	foreach ( $colby_openhours_post_types as $name => $settings ) {
		register_post_type( $name, $settings );
	}
} );


/** Add shortcodes. */
add_action( 'init', function() {
	global $colby_openhours_shortcodes;

	foreach ( $colby_openhours_shortcodes as $class ) {
		$shortcode = new $class();
		add_shortcode( $shortcode->shortcode, [ $shortcode, 'run' ] );
	}
} );


/** See codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns. */
add_filter( 'manage_edit-hours_columns', function( $columns ) {
	$columns = [
		'cb'   => '<input type="checkbox" />',
		'title' => 'Title',
		'type' => 'Type',
		'start_date' => 'Start Date',
		'end_date' => 'End Date',
	];
	return $columns;
} );


/** See codex.wordpress.org/Plugin_API/Action_Reference/manage_pages_custom_column. */
add_action( 'manage_hours_posts_custom_column', function( $column ) {
	global $post;

	if ( 'type' === $column ) {
		echo sprintf( '<strong><a href="%s">%s</a></strong>',
			esc_url( add_query_arg( [
				'post_type' => $post->post_type,
				'class_year' => get_field( 'class_year' ),
				'post' => $post->ID,
				'action' => 'edit',
				], 'post.php' )
			),
			esc_html( get_field( 'type' ) ) );
	} else if ( 'start_date' === $column ) {
		the_field( 'start_date' );
	} else if ( 'end_date' === $column ) {
		the_field( 'end_date' );
	}
} );

/** Register scripts and styles as late as possible. */
add_action( 'wp_enqueue_scripts', function() {
	$min = false === COLBY_OPENHOURS_DEBUG ? '.min' : '';
	wp_enqueue_style( 'openhours', COLBY_OPENHOURS_ASSETS_URL . "css/style{$min}.css", [], COLBY_OPENHOURS_VERSION );
}, 99 );
