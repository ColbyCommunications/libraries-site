<?php
/**
 * The base template for all the search results.
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools;
get_header(); ?>

<main class="bento<?php echo esc_attr( Tools::advanced_search_is_active() ? ' advanced-search' : '' ); ?>">
<header class="bento__search-form">
	<?php include_once( ONESEARCH_PATH . 'resultspage/templates/bento-search-form.php' ); ?>
	
</header>
<div class="bento-inner">
	<div id="did-you-mean"></div>
	<div class="bento-column">
	<?php
	$counter = 0;
	$order = wp_is_mobile() ? [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ] :
						      [ '0', '3', '6', '8', '1', '4', '7', '9', '2', '5', '10' ];
	foreach ( ONESEARCH_BOXES as $box_name => $box ) :
		if ( 'fallback' === $box_name ) :
			continue;
			endif;
		if ( 9 === ++$counter ) :
			include 'bento-sidebar.php';
			endif; ?>

		<section class="bento-box" id="bento-box-<?php echo esc_attr( $order[ $counter - 1 ] ); ?>">
		</section>

		<?php if ( in_array( $counter, [ 4, 8 ], true ) ) : ?>

	</div>
	<div class="bento-column">
		<?php endif; ?>

	<?php endforeach; ?>
	</div>
</div>

<footer class="bento__footer"> 
	<?php include 'bento-sidebar.php'; ?>
	
	<div class="bento-cover active">

		<div class="bento-cover-loading">
			<img class="bento-cover__logo"
				 src="http://www.colby.edu/libraries/wp-content/uploads/sites/100/2017/10/colby-libraries-logos-web-color.png">
			<h3 class="bento-cover__text">Loading results</h3>
			<div id="loadingBar">
				<div id="loadingProgress"></div>
			</div>
		</div>
		
	</div>
</footer>

</main>
<?php if ( isset( $_GET['qunit'] ) && '1' === $_GET['qunit'] ) : ?>

<div id="qunit"></div>
<div id="qunit-fixture"></div>
<?php endif;
get_footer();
