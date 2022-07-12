<?php
/**
 * Template for a libanswers result.
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools; ?>

<div class="bento-result">
	<div class="bento-result__title">
		<a href="<?php echo esc_url( $result->url->public ); ?>">
			<?php echo esc_html( $result->question ); ?>

		</a>
	</div>
	<?php if ( $result->owner->name ) : ?>

	<div class="bento-result__author">
		<?php echo esc_html( $result->owner->name ); ?>

	</div>
	<?php endif; ?>

	<?php if ( $result->answer ) : ?>

	<div class="bento-result__description">
		<?php echo esc_html( strip_tags( Tools::libanswers_description( $result->answer ) ) ); ?>

	</div>
	<?php endif; ?>

</div>
