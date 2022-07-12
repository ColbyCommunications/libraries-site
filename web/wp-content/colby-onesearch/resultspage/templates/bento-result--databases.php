<?php
/**
 * Template for a database result.
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools; ?>

<div class="bento-result">
	<div class="bento-result__title">
		<a href="<?php echo esc_url( $result->url ); ?>">
			<?php echo esc_html( $result->name ); ?>

		</a>
	</div>

	<?php if ( ! empty( $result->description ) ) : ?>

	<div class="bento-result__description">
		<?php echo esc_html( strip_tags( Tools::libanswers_description( $result->description ) ) ); ?>

	</div>
	<?php endif; ?>

</div>
