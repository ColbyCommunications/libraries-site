<?php
/**
 * The search form
 *
 * @package colby-onesearch
 */

use Colby_Onesearch\ResultsPage\Template_Tools as Tools; ?>

<form method="get" onsubmit="return validateForm()">
	<fieldset>
		<div class="bento__search-box-container">
			<input class="bento__search-box"
				   type="search" placeholder="Enter search term..."
				   value="<?php echo esc_attr( stripslashes( htmlentities( ONESEARCH_SEARCH_STRING ) ) ); ?>"
				   name="q"
				   required />
			<button type="submit" class="bento__search-button">
				<i class="fa fa-search fa-lg"></i>
			</button>
		</div>
		<div class="advanced-toggler-container">
			<a class="advanced-toggler" href="http://colby.summon.serialssolutions.com/advanced#!/advanced">
				Advanced Search
			</a>
		</div>
	</fieldset>
</form>
