<?php
/**
 * Template for a Summon result.
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools; ?>

<div class="bento-result">

	<?php if ( Tools::summon_has_thumbnail( $result ) ) : ?>

	<div class="bento-result__thumbnail-container">
		<a href="<?php echo esc_url( $result->link ); ?>">
			<img src="<?php echo esc_url( $result->thumbnail_s[0] ); ?>">
		</a>
	</div>
	<?php endif; ?>

	<div class="bento-result__title">
		<a href="<?php echo esc_url( $result->link ); ?>">
			<?php echo wp_kses_post( Tools::summon_sanitize_title( $result->Title[0] ) );
				  $subtitle = Tools::summon_get_subtitle( $result );
			echo wp_kses_post( $subtitle ? ': ' . $subtitle : '' ); ?>

		</a>
	</div>

	<?php if ( isset( $result->Author ) && $result->Author ) : ?>

	<div class="bento-result__author">
		<?php echo wp_kses_post( Tools::summon_get_author( $result->Author ) ); ?>
	</div>
	<?php endif; ?>

	<?php $publication = Tools::summon_get_publication( $result ); ?>

	<?php if ( $publication ) : ?>

	<div class="bento-result__publication">
		<?php echo wp_kses_post( $publication ); ?>

	</div>
	<?php endif; ?>

	<?php $source = Tools::summon_get_source( $result ); ?>

	<?php if ( $source ) : ?>

	<div class="bento-result__source">
		<?php echo wp_kses_post( $source ); ?>

	</div>
	<?php endif; ?>

	<?php if ( isset( $result->Library ) && $result->Library ) :  ?>

	<div class="bento-result__libraries">

		<?php echo wp_kses_post( Tools::summon_get_libraries( $result ) ); ?>
	</div>
	<?php endif; ?>

</div>
