<form class="option1"
	id="search-libsearch"
	name="searchForm"
	method="GET"
	action="https://colby.primo.exlibrisgroup.com/discovery/search"
	class="summon-search-widget"
	accept-charset="utf-8"
	onsubmit="searchPrimo()">
	<div id="search-box">
		<input type="text"
			placeholder="Find articles, books, and more."
			class="summon-search-field search-bar"
			id="queryTemp"
			autocomplete="off">
		<input type="hidden" name="query" id="query">
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
		<input type="image" onclick="searchPrimo()" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
	<a href="https://colby.primo.exlibrisgroup.com/discovery/search?vid=01CBB_CCLIBRAR:COLBY&mode=advanced" class="advanced-search">advanced search</a>
</form>

<form class="option2"
	id="search-mainecat"
	name="searchForm"
	method="GET"
	action="https://colby.primo.exlibrisgroup.com/discovery/search"
	class="summon-search-widget"
	accept-charset="utf-8">
	<div id="search-box">
		<input type="text"
			placeholder="Search for and request items from libraries statewide."
			class="summon-search-field search-bar-full"
			id="queryTemp"
			autocomplete="off">
		<input type="image" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
	<a href="https://colby.primo.exlibrisgroup.com/discovery/search?vid=01CBB_CCLIBRAR:COLBY&mode=advanced" class="advanced-search">advanced search</a>
</form>

<form class="option3"
	id="search-worldcat"
	accept-charset="utf-8">
</form>

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

<section class="content-area">
	<div id="content_1">
		<p><strong>LibrarySearch</strong> is a comprehensive search for all Colby, Bates, and Bowdoin library holdings. Use the <strong>dropdown menu</strong> to limit your search to <strong>Books and More, Articles and More, or Course Reserves</strong>.</p>
		<strong>Not finding what you need?</strong>
		<br/>
		Search and request from libraries statewide via <strong>MaineCat</strong>, or worldwide via <strong>WorldCat</strong>.
	</div>

	<div id="content_2" style="display: none;">
		<p>Use <strong>MaineCat</strong> to search for and request items from <strong>academic and public libraries in Maine</strong>. Use ILL to request items from MaineCat.</p>
	</div>

	<div id="content_3" style="display: none;">
		<p>Use <strong>WorldCat</strong> to search for and request items from <strong>libraries worldwide</strong>.</p>
		<ul>
			<li>
				<p>Use <a href="https://colby.idm.oclc.org/login?url=https://firstsearch.oclc.org/dbname=WorldCat;done=referer;FSIP">FirstSearch</a> to focus your search and for automated <a href="https://libraries.colby.edu/ill/">Interlibrary Loan</a> requests.</p>
			</li>
			<li>
				<p>Use <a href="https://www.worldcat.org/">WorldCat.org</a> for the most intuitive browsing experience.</p>
			</li>
		</ul>
	</div>
</section>

<div class="search-footer">
	<ul class="search-footer-links">
		<li><a id="ls-link-1" href="https://libguides.colby.edu/librarysearch"><img src="/wp-content/plugins/colby-libraries/assets/img/more_info.svg" alt="More Info"><span>more info</span></a></li>
		<li><a href="https://libanswers.colby.edu/"><img src="/wp-content/plugins/colby-libraries/assets/img/get_help.svg" alt="Get Help"><span>get help</span></a></li>
		<li><a href="https://libraries.colby.edu/ill/"><img src="/wp-content/plugins/colby-libraries/assets/img/interlibrary_loan.svg" alt="Interlibrary Loan"><span>interlibrary loan</span></a></li>
		<li><a href="https://libraries.colby.edu/remote-library-access"><img src="/wp-content/plugins/colby-libraries/assets/img/remote_access.svg" alt="Remote Access"><span>remote access</span></a></li>
	</ul>
</div>

<script type="text/javascript">
	const searchPrimo = () => {
		const query = document.getElementById('query');
		query.value = 'any,contains,' + document.getElementById('queryTemp').value;
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
			const queryTemp = document.getElementById('queryTemp');

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
			const queryTemp = document.getElementById('queryTemp');

			if (dropDownValue === 'DN_and_CI') {
				queryTemp.placeholder = 'Find articles, books, and more.';
			} else if (dropDownValue === 'CentralIndex') {
				queryTemp.placeholder = 'Colby’s articles & book chapters.';
			} else if (dropDownValue === 'MyInstitution') {
				queryTemp.placeholder = 'Colby’s books & media.';
			} else if (dropDownValue === 'CourseReserves') {
				queryTemp.placeholder = 'Locate course reserves.';
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
