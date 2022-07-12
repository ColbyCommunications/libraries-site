<?php
/**
 * Template to display when no search string exists.
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools;
get_header(); ?>

<main class="bento bento-start-page <?php echo esc_attr( Tools::advanced_search_is_active() ? ' advanced-search' : '' ); ?>">
<header class="bento__search-form">

	<?php include_once( ONESEARCH_PATH . 'resultspage/templates/bento-search-form.php' ); ?>
</header>
</main>
<?php get_footer();
