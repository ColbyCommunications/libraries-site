<?php
/**
 * Control code tied to action hooks and filters
 *
 * @package colby-onesearch
 */

/** Add the settings page. */
add_action(
	'admin_menu', function() {
		new Colby_Onesearch\Admin\Settings_Page();
	}
);


/** Load template for results or, if no search string is present, a new search form. */
add_filter(
	'template_include', function( $template ) {
		if ( get_the_id() == get_option( 'onesearch_results_page' ) ) { // Option set in activation hook.
			if ( defined( 'ONESEARCH_SEARCH_STRING' ) && ONESEARCH_SEARCH_STRING ) {
				return ONESEARCH_PATH . 'resultspage/templates/bento-base.php';
			}
			return ONESEARCH_PATH . 'resultspage/templates/bento-new-search.php'; // No search query exists.
		}
		return $template;
	}
);


/** If this is an Ajax request, run the search. */
add_action( 'wp_ajax_bentoAjaxRequest', 'onesearch_run_search' );
add_action( 'wp_ajax_nopriv_bentoAjaxRequest', 'onesearch_run_search' );


/** Load scripts and styles. */
add_action(
	'wp_enqueue_scripts', function() {
		if ( get_the_id() != get_option( 'onesearch_results_page' ) ) {
			return;
		}

		$min = true === ONESEARCH_DEBUG ? '' : '.min';
		wp_enqueue_script( 'bento-js', ONESEARCH_URL . "js/scripts{$min}.js", [ 'jquery' ], ONESEARCH_VERSION, true );
		wp_enqueue_style( 'bentocss', ONESEARCH_URL . "css/style{$min}.css", [], ONESEARCH_VERSION );

		if ( ! wp_style_is( 'font-awesome' ) ) {
			wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );
		}

	}, 99
);


/** Make this site's ajax URL available to scripts. */
add_action(
	'wp_head', function() {
	?>

<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
</script>
	<?php
	}
);
