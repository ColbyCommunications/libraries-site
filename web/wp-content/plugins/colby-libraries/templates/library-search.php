<?php
/**
 * Parent template for the search accordion.
 *
 * @package colby-libraries
 */

global $colby_libraries; 

// OneSearch tab IDs
$oneSearchTabID[0] = "OneSearch";
$oneSearchTabID[1] = "BooksAndMore";
$oneSearchTabID[2] = "JournalsAndArticles";
$oneSearchTabID[3] = "Databases";
$oneSearchTabID[4] = "Reserves";
$oneSearchTabID[5] = "ResearchHowTo";
$oneSearchTabID[6] = "SpecialCollections";

?>

<div class="tabbable tabs-left" id="librarySearch">
	<ul class="nav nav-tabs">
		<?php foreach ( $colby_libraries->search_tabs as $index => $tab ) : ?>

		<li<?php 
			echo 0 === $index ? ' class=active' : '' ; // add active class
			echo ' id="'.$oneSearchTabID[$index].'" '; // add ID specific to tab
			?>>

			<a href=#<?php echo $index; ?> data-toggle="tab">
				<?php echo $tab; ?>
			</a>
			<span class="arrow-right">&nbsp;</span>
		</li>
		<?php endforeach; ?>
	</ul>

	<div class="tab-content">
		<?php foreach ( $colby_libraries->search_tabs as $index => $tab ) :
			$tab = strtolower( str_replace( ' ', '-', $tab ) ); ?>

		<div class="tab-pane<?php echo 0 === $index ? ' active' : ''; ?>" id=<?php echo $index; ?>>
			<?php include "{$colby_libraries->path}templates/search-tabs/{$tab}.php"; ?>

		</div>
		<?php endforeach; ?>

	</div>
</div>
