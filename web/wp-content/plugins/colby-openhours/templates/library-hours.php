<?php
	/**
	 * Template for library-hours shortcode. Should be removed when it's verified that the open-hours shortcode works.
	 *
	 * @package colby-openhours
	 */

?>

<div class="upcoming-hours<?php
echo 'false' !== $wp_query->atts['viewall'] ? ' schedule-viewall' : '';
echo 'false' !== $wp_query->atts['viewall'] || 'vertical' === $wp_query->atts['view'] ? ' vertical' : ''; ?>">

<?php
if ( 'false' === $wp_query->atts['viewall'] ) :
	if ( $wp_query->atts['showclock'] ) : ?>

<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.848 12.459c.202.038.202.333.001.372-1.907.361-6.045 1.111-6.547 1.111-.719 0-1.301-.582-1.301-1.301 0-.512.77-5.447 1.125-7.445.034-.192.312-.181.343.014l.985 6.238 5.394 1.011z"/></svg>

<?php /*

	<img alt=glyphicons_054_clock
		 class=houricon
		 src=<?php echo esc_url( $colby_openhours->assets_url . 'img/clock.png' ); ?>
		 width=17
		 height=17 />
*/ ?>



	<?php endif;
	if ( $wp_query->atts['linkto'] ) : ?>

	<a href=<?php echo esc_url( $wp_query->atts['linkto'] ); ?>>
	<?php endif; ?>

	<strong>Today's Hours: </strong>
	<?php if ( $wp_query->atts['linkto'] ) : ?>

	</a>
	<?php endif;
endif;
if ( 'vertical' === $wp_query->atts['view'] ) : ?>

	<ul>
<?php endif;

foreach ( $wp_query->posts as $key => $post ) :
	setup_postdata( $post );

	if ( in_array( $wp_query->atts['location'], [ null, get_the_title(), '' ], true ) ) :

		$todays_hours = 'false' === $wp_query->atts['viewall'] ? '' :
			'<div class="hourtype-header"><strong>Regular Hours:</strong></div>';

		$todays_hours .= Colby_Openhours\Functions::get_hours_text( get_the_id(), 'false' !== $wp_query->atts['viewall'] );

		// Check for override...
		foreach ( $special_hours->posts as $special ) :
			$in_date_range = false;
			$special_start = get_field( 'start_date', $special->ID );
			$special_end = get_field( 'end_date', $special->ID );
			if ( get_the_title() === $special->post_title ) :
				// Same location, check for override in date range.
				if ( strtotime( $special_start . '00:00:00' ) <= strtotime( 'now' ) &&
						strtotime( $special_end . ' 23:59:59' ) >= strtotime( 'now' ) ) :
					$in_date_range = true;
				endif;

				if ( true === $in_date_range ||
						( strtotime( $special_end ) > strtotime( 'now' )  &&
						  'false' !== $wp_query->atts['viewall'] ) ) :
					if ( 'false' !== $wp_query->atts['viewall'] ) :
						// Viewing all records...output special hours in addition to current hours.
						$to_append = "<div class='hourtype-header special-hours'><strong>";
						if ( true !== $in_date_range ) :
							$to_append .= 'Upcoming ';
						endif;

						$to_append .= 'Special Hours ' .
							date( 'n/j/Y', strtotime( $special_start ) ) .
							' - ' .
							date( 'n/j/Y', strtotime( $special_end ) ) .
							':</strong></div>'.
							Colby_Openhours\Functions::get_hours_text( $special->ID, 'false' !== $wp_query->atts['viewall'] );

						if ( true === $in_date_range ) :
							$todays_hours = $to_append . $todays_hours;
						else :
							$todays_hours .= $to_append;
						endif;
					else :
						$todays_hours = \Colby_Openhours\Functions::get_hours_text( $special->ID, 'false' !== $wp_query->atts['viewall'] );
					endif;
				endif;
			endif;
		endforeach;

		if ( ! empty( $todays_hours ) ) :
			// if ( 0 !== $key ) :
			// 	if ( 'horizontal' === $wp_query->atts['view'] ) :
			// 		echo ' <span class="pipe">|</span> ';
			// 	endif;
			// endif;

			if ( 'vertical' === $wp_query->atts['view'] ) :
				echo '<li>';
			endif;

			if ( in_array( $wp_query->atts['location'], [ null, '' ] ) ) :

				echo '<span class="location-title">'. get_the_title() . ':';

				if ( 'Special Collections' === get_the_title() && 'false' !== $wp_query->atts['viewall'] ) :
					$displayasterisk = true;
					echo '<span class = "asterisk">*</span>';
				endif;

				echo '</span> ';
			endif;

			echo $todays_hours;

			if ( 'Special Collections' === get_the_title() && 'false' === $wp_query->atts['viewall'] ) :
				$displayasterisk = true;
				echo '<span class = "asterisk">*</span>';
			endif;

			if ( 'vertical' === $wp_query->atts['view'] ) :
				echo '</li>';
			endif;
		endif;
	endif;
endforeach;

if ( 'vertical' === $wp_query->atts['view'] ) :
	echo '</ul>';
endif;

if ( isset( $displayasterisk ) ) :
	echo '<div class="asterisklegend">*Closed noon - 1 p.m.</div>';
endif;

echo '</div>';
