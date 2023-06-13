<form
	id="jsearch"
	name="jForm"
	action="https://librarysearch.colby.edu/discovery/jsearch/"
	accept-charset="utf-8"
	method="GET"
	accept-charset="utf-8"
	onsubmit="journalSearch()">
	<div id="search-box">
		<input type=text
			id="jsearchQueryTemp"
			placeholder="Find a journal or newspaper by title or ISSN"
			class="summon-search-field search-bar-full"
			autocomplete=off>
		<input type="hidden" name="query" id="jsearchQuery">
		<input type="hidden" name="tab" value="jsearch">
		<input type="hidden" name="vid" value="01CBB_CCLIBRAR:COLBY">
		<input type="hidden" name="journals" id="jsearchJournals">
		<input type=image onclick="journalSearch()" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
</form>

<section class="content-area">
	<div id="content_4">
		<p>Locate and access Colby's academic journal and newspaper holdings. Use <a href="https://librarysearch.colby.edu/discovery/npsearch?vid=01CBB_CCLIBRAR:COLBY">Search Newspapers</a> to locate newspaper articles by keyword.</p>
		<br>
		<p>Did you know the Libraries provide subscriptions to the digital editions of the New York Times, Wall Street Journal, and Morning Sentinel to current students, faculty, and staff? <a href="https://libguides.colby.edu/newspapers-at-colby/setup">Register here for yours!</a></p>
	</div>
</section>

<div class="search-footer">
	<ul class="search-footer-links">
		<li><a href="https://libguides.colby.edu/newspapers-at-colby"><img src='/wp-content/plugins/colby-libraries/assets/img/more_info.svg' alt="More Info"><span>more info</span></a></li>
		<li><a href="https://libanswers.colby.edu/"><img src='/wp-content/plugins/colby-libraries/assets/img/get_help.svg' alt="Get Help"><span>get help</span></a></li>
		<li><a href="https://libraries.colby.edu/ill/"><img src='/wp-content/plugins/colby-libraries/assets/img/interlibrary_loan.svg' alt="Interlibrary Loan"><span>interlibrary loan</span></a></li>
		<li><a href="https://libraries.colby.edu/remote-library-access"><img src='/wp-content/plugins/colby-libraries/assets/img/remote_access.svg' alt="Remote Access"><span>remote access</span></a></li>
	</ul>
</div>

<script type="text/javascript">
	const journalSearch = () => {
		const jsearchQuery = document.getElementById('jsearchQuery');
		const jsearchJournals = document.getElementById('jsearchJournals');
		jsearchQuery.value = 'any,contains,' + document.getElementById('jsearchQueryTemp').value;
		jsearchJournals.value = 'any,' + document.getElementById('jsearchQueryTemp').value;
		document.forms['jForm'].submit();
	}

</script>
