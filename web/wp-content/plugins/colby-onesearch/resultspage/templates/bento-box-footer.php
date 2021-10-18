<?php
/**
 * The bottom of a results box.
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools; ?>

</div> 
<div class="bento-box__more">
	<a href="<?php echo esc_url( ! empty( $results_link ) ?  $results_link : Tools::draw_see_more_link() ); ?>">
		See more results
	</a>
</div>
