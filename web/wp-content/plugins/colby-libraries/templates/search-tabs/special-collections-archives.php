<form
	id="sc-search"
	name="scForm"
	action="https://librarysearch.colby.edu/discovery/search"
	accept-charset="utf-8"
	method="GET"
	accept-charset="utf-8"
	onsubmit="scSearch()">
	<div id="sc-search-box">
		<input type=text
			id="scSearchQueryTemp"
			placeholder="Search for physical materials in our special collections and archives"
			class="summon-search-field search-bar-full"
			autocomplete=off>
		<input type="hidden" name="query" id="scSearchQuery">
		<input type="hidden" name="vid" value="01CBB_CCLIBRAR:COLBY">
		<!-- <input type="hidden" name="tab" value="Library&search_scope=SCA"> -->
		<input type="hidden" name="search_scope" value="SCA">
		<!-- <input type="hidden" id="scSearch"> -->
		<input type=image onclick="scSearch()" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
 <div class="sc-btn-container">
	 <input id="physical-collections-btn" type="radio" name="special-collections" checked="checked" autocomplete="off">
	 <label for="physical-collections-btn">Physical Collections</label>
	 <input id="digital-collections-btn" type="radio" name="special-collections" autocomplete="off">
	 <label for="digital-collections-btn">Digital Collections</label>
</div >
</form>

<section class="content-area">
	<div id="content_7">
		<p><p>Discover Colby’s <strong>physical</strong> Special Collections & Archives collections which include both culturally significant materials and Colby documents and memorabilia from the 13th through the 21st centuries.</p></p>
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
		<p>Explore Colby’s <strong>digital</strong> Special Collections & Archives collections which include both culturally significant materials and Colby documents and memorabilia from the 13th through the 21st centuries.</p>
		<ul>
			<li>
				<p><a href="https://digitalcommons.colby.edu/">Digital Commons</a>: Explore senior theses, college publications, yearbooks, and more.</p>
			</li>
			<li>
				<p><a href="https://library.artstor.org/#/browse/institution">Artstor</a>: Discover archival photo collections, unique materials and items from the Libraries’ special collections and beyond.</p>
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
			const scSearchBox = document.getElementById('sc-search-box');

			if (radio_4.checked) {
				content_7.style.display = 'block';
				scSearchBox.style.display = 'flex';
			} else {
				content_7.style.display = 'none';
				scSearchBox.style.display = 'none';
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

	const scSearch = () => {
		const scSearchQuery = document.getElementById('scSearchQuery');
		const scSearch = document.getElementById('scSearch');
		scSearchQuery.value = 'any,contains,' + document.getElementById('scSearchQueryTemp').value;
		// scSearch.value = 'any,' + document.getElementById('scSearchQueryTemp').value;
		document.forms['scForm'].submit();
	}

</script>

