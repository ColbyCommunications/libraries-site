<form
	id="jsearch"
	name="jForm"
	action="https://colby.primo.exlibrisgroup.com/discovery/jsearch?query=any,contains,test&tab=jsearch_slot&vid=01CBB_CCLIBRAR:COLBY&offset=0&journals=any,test"
	accept-charset="utf-8"
	method="GET"
	action="https://colby.primo.exlibrisgroup.com/discovery/"
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
		<input type=image onclick="journalSearch()" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
</form>

<section class="content-area">
	<div id="content_4">
		<p>Use this search to locate a title, and use <strong>LibrarySearch</strong> to search for <strong>articles</strong>.</p>
		<p>Did you know the Libraries provide subscriptions to the <strong>digital editions of the New York Times, Wall Street Journal, and Morning Sentinel</strong> to current students, faculty, and staff? <a href="https://libguides.colby.edu/newspapers-at-colby/setup">Register here</a> for yours!</p>
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
		jsearchQuery.value = 'any,contains,' + document.getElementById('jsearchQueryTemp').value;
		document.forms['jForm'].submit();
	}
</script>
