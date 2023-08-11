<!-- LibrarySearch -->
<form class="option1"
	id="search-libsearch"
	name="searchForm"
	method="GET"
	action="https://librarysearch.colby.edu/discovery/search"
	class="summon-search-widget"
	accept-charset="utf-8"
	onsubmit="librarySearch()">
	<div id="search-box">
		<input type="text"
			placeholder="Find articles, books, and more."
			class="summon-search-field search-bar"
			id="option1QueryTemp"
			autocomplete="off">
		<input type="hidden" name="query" id="option1Query">
		<input type="hidden" name="tab" value="Library">
		<input type="hidden" name="vid" value="01CBB_CCLIBRAR:COLBY">
		<div class="drop-down">
			<select name="search_scope">
				<option value="DN_and_CI">Everything</option>
				<option value="CentralIndex">Articles</option>
				<option value="MyInstitution">Books and More</option>
				<option value="CourseReserves">Course Reserves</option>
			</select>
		</div>
		<input type="image" onclick="librarySearch()" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
	<a href="https://librarysearch.colby.edu/discovery/search?vid=01CBB_CCLIBRAR:COLBY&mode=advanced" class="advanced-search">advanced search</a>
</form>
<!-- MaineCat -->
<form class="option2"
	id="search-mainecat"
	name="mcForm"
	method="GET"
	action="https://mainecat.maine.edu/search/"
	class="summon-search-widget"
	accept-charset="utf-8"
	onsubmit="searchMaineCat()">
	<!-- <input type="hidden" name="searchtype" id="searchtype">
	<div id="search-box">
		<input type="text"
			placeholder="Search libraries statewide."
			class="summon-search-field search-bar"
			id="option2QueryTemp"
			autocomplete="off"
			name="searcharg">
		<div class="drop-down">
			<select id="maineCatOptions">
				<option value="X">Keyword</option>
				<option value="t">Title</option>
				<option value="a">Author (Last, First)</option>
			</select>
		</div>
		<input type="image" onclick="searchMaineCat()"src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
	<a href="https://librarysearch.colby.edu/discovery/search?vid=01CBB_CCLIBRAR:COLBY&mode=advanced" class="advanced-search">advanced search</a> -->
</form>
<!-- Radio Controlls -->
<form>
	<div class="ls-btn-container">
		<input id="library-search-btn" type="radio" name="library-search" checked="checked" autocomplete="off">
		<label for="library-search-btn">LibrarySearch</label>
		<input id="mainecat-btn" type="radio" name="library-search" autocomplete="off">
		<label for="mainecat-btn">MaineCat</label>
		<input id="worldcat-btn" type="radio" name="library-search" autocomplete="off">
		<label for="worldcat-btn">WorldCat</label>
	</div>
</form>
<!-- Content Section -->
<section class="content-area">
	<div id="content_1">
		<p>Use <a href="https://librarysearch.colby.edu/discovery/search?vid=01CBB_CCLIBRAR:COLBY&lang=en">LibrarySearch</a> to access Colby, Bates, and Bowdoin's library collections.</p>
		<p><a href="https://libguides.colby.edu/librarysearch/about/">Explore</a> and utilize the dropdown options in the search box to get the best search results.</p>
		<p style="padding: 1rem 0; text-align: center;"><em>Not finding what you need?</em> Try MaineCat, or WorldCat.</p>
	</div>

	<div id="content_2" style="display: none;">
		<!-- <p><strong>MaineCat:</strong> Discover items from the public and academic libraries across Maine. Use <a href="https://libraries.colby.edu/ill/">Interlibrary Loan</a> to request items from MaineCat.</p> -->
		<p>MaineCat borrowing is currently unavailable and will resume during the fall semester. Until then, please use <a href="https://libraries.colby.edu/ill/">interlibrary loan</a> to request materials</p>
	</div>

	<div id="content_3" style="display: none;">
		<p><strong>WorldCat</strong>: Explore and request items from academic libraries worldwide.</p>
		<ul>
			<li>
				<p><a href="https://colby.idm.oclc.org/login?url=https://firstsearch.oclc.org/dbname=WorldCat;done=referer;FSIP">FirstSearch</a>: focused searches and automated <a href="https://libraries.colby.edu/ill/">Interlibrary Loan</a> requests.</p>
			</li>
			<li>
				<p>Use <a href="https://www.worldcat.org/">WorldCat.org</a> for the most intuitive browsing experience.</p>
			</li>
		</ul>
	</div>
</section>
<!-- Icon Footer -->
<div class="search-footer">
	<ul class="search-footer-links">
		<li><a id="ls-link-1" href="https://libguides.colby.edu/librarysearch"><img src="/wp-content/plugins/colby-libraries/assets/img/more_info.svg" alt="More Info"><span>more info</span></a></li>
		<li><a href="https://libanswers.colby.edu/"><img src="/wp-content/plugins/colby-libraries/assets/img/get_help.svg" alt="Get Help"><span>get help</span></a></li>
		<li><a href="https://libraries.colby.edu/ill/"><img src="/wp-content/plugins/colby-libraries/assets/img/interlibrary_loan.svg" alt="Interlibrary Loan"><span>interlibrary loan</span></a></li>
		<li><a href="https://libraries.colby.edu/remote-library-access"><img src="/wp-content/plugins/colby-libraries/assets/img/remote_access.svg" alt="Remote Access"><span>remote access</span></a></li>
	</ul>
</div>

<script type="text/javascript">
	const librarySearch = () => {
		const query1 = document.getElementById('option1Query');
		query1.value = 'any,contains,' + document.getElementById('option1QueryTemp').value;
		document.forms['searchForm'].submit();
	}

	const searchMaineCat = () => {
		const searchtype = document.getElementById('searchtype');
		searchtype.value = document.getElementById('maineCatOptions').value;
		document.forms['searchForm'].submit();
	}

	document.addEventListener('DOMContentLoaded', () => {
		const handleRendering = () => {
			const option_1 = document.querySelector('.option1');
			const option_2 = document.querySelector('.option2');
			const radio_1 = document.querySelectorAll('#library-search-btn')[0];
			const radio_2 = document.querySelectorAll('#mainecat-btn')[0];
			const radio_3 = document.querySelectorAll('#worldcat-btn')[0];
			const content_1 = document.getElementById('content_1');
			const content_2 = document.getElementById('content_2');
			const content_3 = document.getElementById('content_3');
			const dynamic_link_1 = document.getElementById('ls-link-1');
			const option1QueryTemp = document.getElementById('option1QueryTemp');

			if (radio_1.checked) {
				option_1.style.display = 'block';
				content_1.style.display = 'block';
				dynamic_link_1.href = 'https://libguides.colby.edu/librarysearch';
			} else {
				option_1.style.display = 'none';
				content_1.style.display = 'none';
			}

			if (radio_2.checked) {
				option_2.style.display = 'block';
				content_2.style.display = 'block';
				dynamic_link_1.href = 'https://www.maineinfonet.org/mainecat/about/';
			} else {
				option_2.style.display = 'none';
				content_2.style.display = 'none';
			}

			if (radio_3.checked) {
				content_3.style.display = 'block';
				dynamic_link_1.href = 'https://www.worldcat.org/about';
			} else {
				content_3.style.display = 'none';
			}
		}

		const handlePlaceholder = () => {
			const dropDownValue = document.getElementsByName("search_scope")[0].value;
			const option1QueryTemp = document.getElementById('option1QueryTemp');

			if (dropDownValue === 'DN_and_CI') {
				option1QueryTemp.placeholder = 'Find articles, books, and more.';
			} else if (dropDownValue === 'CentralIndex') {
				option1QueryTemp.placeholder = 'Colby’s articles & book chapters.';
			} else if (dropDownValue === 'MyInstitution') {
				option1QueryTemp.placeholder = 'Colby’s books & media.';
			} else if (dropDownValue === 'CourseReserves') {
				option1QueryTemp.placeholder = 'Locate course reserves.';
			}
		}


		handleRendering();
		handlePlaceholder();

		const lsRadioButtons = document.getElementsByName('library-search');
		for (const radioButton of lsRadioButtons) {
			radioButton.addEventListener('change', handleRendering);
		}

		const dropDownValues = document.getElementsByName("search_scope")
		for (const selectValue of dropDownValues) {
			selectValue.addEventListener('change', handlePlaceholder);
		}
	});
</script>
