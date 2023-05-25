<?php
/**
 * Parent template for the search accordion.
 *
 * @package colby-libraries
 */

global $colby_libraries;

// OneSearch tab IDs
$oneSearchTabID[0] = 'LibrarySearch';
$oneSearchTabID[1] = 'Journals & Newspapers';
$oneSearchTabID[2] = 'Databases';
$oneSearchTabID[3] = 'Research Guides';
$oneSearchTabID[4] = 'Special Collections & Archives';

?>

<div class="tabbable tabs-left" id="librarySearch">
	<section class="nav-section">
		<ul class="nav nav-tabs">
			<?php foreach ( $colby_libraries->search_tabs as $index => $tab ) : ?>

			<li
				<?php
				echo 0 === $index ? ' class=active' : ''; // add active class
				echo ' id="' . $oneSearchTabID[ $index ] . '" '; // add ID specific to tab
				?>
				>

				<a href=#<?php echo $index; ?> data-toggle="tab">
					<?php echo $tab; ?>
				</a>
				<span class="arrow-right">&nbsp;</span>
			</li>
			<?php endforeach; ?>
		</ul>
	 </section >
	<section class="content-section">
		<div class="tab-content">
			<?php
			foreach ( $colby_libraries->search_tab_ids as $index => $tab ) :
				$tab = strtolower( str_replace( ' ', '-', $tab ) );
				?>

			<div class="tab-pane<?php echo 0 === $index ? ' active' : ''; ?>" id=<?php echo $index; ?>>
				<?php include "{$colby_libraries->path}templates/search-tabs/{$tab}.php"; ?>

			</div>
			<?php endforeach; ?>

		</div>
		<div class="search-footer">
			<ul class="search-footer-links">
				<li><a href="https://libguides.colby.edu/librarysearch"><img src='/wp-content/plugins/colby-libraries/assets/img/more_info.svg' alt="More Info"></a></li>
				<li><a href="https://libanswers.colby.edu/"><img src='/wp-content/plugins/colby-libraries/assets/img/get_help.svg' alt="Get Help"></a></li>
				<li><a href="https://libraries.colby.edu/ill/"><img src='/wp-content/plugins/colby-libraries/assets/img/interlibrary_loan.svg' alt="Interlibrary Loan"></a></li>
				<li><a href="https://libraries.colby.edu/remote-library-access"><img src='/wp-content/plugins/colby-libraries/assets/img/more_info.svg' alt="Remote Access"></a></li>
			</ul>
		</div>
	</section >
</div>
