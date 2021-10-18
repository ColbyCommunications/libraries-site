<?php
/**
 * The top of a results box.
 *
 * @package colby-onesearch
 */

?>

<div class="bento-box__title">
	<i class="fa fa-<?php echo esc_attr( ONESEARCH_BOXES[ ONESEARCH_BOX ]['ficon'] ); ?> fa-lg"></i>
	<h1 class="bento-box__box">

		<?php echo esc_html( isset( $results_name ) && $results_name ?
		$results_name : ONESEARCH_BOXES[ ONESEARCH_BOX ]['pretty_name'] ); ?>
	</h1>
</div>
<div class="bento-box__inner">
