<form class=option1>
 <div class="sc-btn-container">
	 <input id="physical-collections-btn" type="radio" name="special-collections" checked="checked" autocomplete="off">
	 <label for="physical-collections-btn">Physical Collections</label>
	 <input id="digital-collections-btn" type="radio" name="special-collections" autocomplete="off">
	 <label for="digital-collections-btn">Digital Collections</label>
</div >
</form>

<section class="content-area">
	<div id="content_7">
		<p>Our physical collections include culturally significant materials in various formats from the 13th through the 21st centuries.</p>
		<ul>
			<!-- <li>
				<p>Use <a href="#">LibrarySearch</a> to search for published special collections and archives materials and collection-level records for unpublished materials.</p>
			</li> -->
			<li>
				<p>Use <a href="https://archivesspace.colby.edu/">ArchivesSpace</a> to search for detailed finding aids describing many of our manuscript and archival collections.</p>
			</li>
		</ul>
	</div>

	<div id="content_8">
		<ul>
			<li>
				<p><a href="https://digitalcommons.colby.edu/">Digital Commons</a>: Explore senior theses, college publications, yearbooks, and more.</p>
			</li>
			<li>
				<p><a href="https://library.artstor.org/#/browse/institution">Artstor</a>: Discover archival photo collection, unique materials and items from the Libraries’ special collections and beyond.</p>
			</li>
			<li>
				<p>Special Collections and Archives’ <a href="https://web.colby.edu/csc-home/">web portal</a> contains digital exhibits displaying curated collection holdings selections.</p>
			</li>
		</ul>
	</div>
</section>

<div class="search-footer">
	<ul class="search-footer-links">
		<li><a href="https://libraries.colby.edu/specialcollections/"><img src='/wp-content/plugins/colby-libraries/assets/img/more_info.svg' alt="More Info"><span>more info</span></a></li>
		<li><a href="https://libanswers.colby.edu/"><img src='/wp-content/plugins/colby-libraries/assets/img/get_help.svg' alt="Get Help"><span>get help</span></a></li>
		<li><a href="https://web.colby.edu/csc-home/"><img src='/wp-content/plugins/colby-libraries/assets/img/digital_exhibits.svg' alt="Digital Exhibits"><span>digital exhibits</span></a></li>
	</ul>
</div>

<script type='text/javascript'>
	document.addEventListener('DOMContentLoaded', () => {
		const handleRendering = () => {
			const radio_4 = document.querySelectorAll('#physical-collections-btn')[0];
			const radio_5 = document.querySelectorAll('#digital-collections-btn')[0];
			const content_7 = document.getElementById('content_7');
			const content_8 = document.getElementById('content_8');

			if (radio_4.checked) {
				content_7.style.display = 'block';
			} else {
				content_7.style.display = 'none';
			}

			if (radio_5.checked) {
				content_8.style.display = 'block';
			} else {
				content_8.style.display = 'none';
			}
		}

		handleRendering();

		const scRadioButtons = document.getElementsByName('special-collections');
		for (const radioButton of scRadioButtons) {
			radioButton.addEventListener('change', handleRendering);
		}
	});
</script>

