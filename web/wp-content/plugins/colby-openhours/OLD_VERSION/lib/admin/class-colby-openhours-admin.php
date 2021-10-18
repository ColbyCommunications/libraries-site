<?php
/**
 * Admin class
 *
 * @package colby-openhours
 */

namespace Colby_Openhours_Admin;

/**
 * Run admin actions and filters.
 */
class Colby_Openhours_Admin {
  public function __construct() {
    add_filter( 'manage_edit-hours_columns', [ $this, 'manage_edit_hours_columns' ] );
    add_action( 'manage_hours_posts_custom_column', [ $this, 'add_hours_column' ] );
  }

  public function add_hours_column( $column ) {
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
  }

  public function manage_edit_hours_columns( $columns ) {
    $columns = [
  		'cb' => '<input type="checkbox" />',
  		'title' => 'Title',
  		'type' => 'Type',
  		'start_date' => 'Start Date',
  		'end_date' => 'End Date',
  	];
  	return $columns;
  }
}
