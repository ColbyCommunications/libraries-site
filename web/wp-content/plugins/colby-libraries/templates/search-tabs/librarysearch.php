<form class=option1
	id=search-cbbcat
	name=search-cbbcat
	action=https://colby.summon.serialssolutions.com/search
	class=summon-search-widget
	accept-charset=utf-8
	id=sb1a9a060f7150131756b2ae8d1b2df50>
  <input name=utf8 type=hidden value=✓>
	<div id="search-box">
		<input type=text
			placeholder="<?php echo $colby_libraries->placeholder_text; ?>"
			class="summon-search-field search-bar"
			name=s.q
			autocomplete=off>
		<div class="drop-down">
			<select>
				<option>Everything</option>
				<option>Articles</option>
				<option>Books and More</option>
				<option>Course Reserves</option>
			</select>
			</div>
		<input type="image" src="/wp-content/plugins/colby-libraries/assets/img/search.svg" alt="search">
	</div>
  <input type=hidden name=s.fvf[] value="ContentType,Newspaper Article,t">
  <input type=hidden name=keep_r value=true>
  <a href="https://colby.primo.exlibrisgroup.com/discovery/search?vid=01CBB_CCLIBRAR:COLBY&mode=advanced"
 class="advanced-search">advanced search</a>
 <div class="ls-btn-container">
	 <input id="library-search-btn" type="radio" name="library-search" checked="checked" autocomplete="off">
	 <label for="library-search-btn">LibrarySearch</label>
	 <input id="mainecat-btn" type="radio" name="library-search" autocomplete="off">
	 <label for="mainecat-btn">MaineCat</label>
	 <input id="worldcat-btn" type="radio" name="library-search" autocomplete="off">
	 <label for="worldcat-btn">WorldCat</label>
</div >
</form>

<section class="content-area">
	<div id="content_1">
		<p><strong>LibrarySearch</strong> is a comprehensive search for all Colby, Bates, and Bowdoin library holdings. use the <strong>dropdown menu</strong> to limit your search to <strong>Books and More, Articles and More or Cours Reserves</strong>.
		<br/>
		<br/>
		<strong>Not finding what you need?</strong>
		<br/>
		Search and request from libraries statewide via <strong>MaineCat</strong>, or worldwide via <strong>WorldCat.</strong>
		</p>
	</div>

	<div id="content_2" style="display: none;">
		<p>Use <strong>MaineCat</strong> to search for and request items from <strong>academic and public libraries in Maine</strong>.</p>
	</div>

	<div id="content_3" style="display: none;">
		<p>Use <strong>WorldCat</strong> to search for and request items from <strong>libraries worldwide</strong>.
		<ul>
			<li>
				<p>Use <a href="https://colby.idm.oclc.org/login?url=https://firstsearch.oclc.org/dbname=WorldCat;done=referer;FSIP">FirstSearch</a> to focus your search, and for automated <a href="https://libraries.colby.edu/ill/">Interlibrary Loan</a> requests</p>
			</li>
			<li>
				<p>Use <a href="https://www.worldcat.org/">WorldCat.org</a> for the most intuitive browsing experience</p>
			</li>
		</ul>
	</div>
</section>

<div class="search-footer">
	<ul class="search-footer-links">
		<li><a id="ls-link-1" href="https://libguides.colby.edu/librarysearch"><img src='/wp-content/plugins/colby-libraries/assets/img/more_info.svg' alt="More Info"><span>more info</span></a></li>
		<li><a href="https://libanswers.colby.edu/"><img src='/wp-content/plugins/colby-libraries/assets/img/get_help.svg' alt="Get Help"><span>get help</span></a></li>
		<li><a href="https://libraries.colby.edu/ill/"><img src='/wp-content/plugins/colby-libraries/assets/img/interlibrary_loan.svg' alt="Interlibrary Loan"><span>interlibrary loan</span></a></li>
		<li><a href="https://libraries.colby.edu/remote-library-access"><img src='/wp-content/plugins/colby-libraries/assets/img/remote_access.svg' alt="Remote Access"><span>remote access</span></a></li>
	</ul>
</div>

<script type='text/javascript'>
	document.addEventListener('DOMContentLoaded', () => {
		const handleRendering = () => {
			const radio_1 = document.querySelectorAll('#library-search-btn')[0];
			const radio_2 = document.querySelectorAll('#mainecat-btn')[0];
			const radio_3 = document.querySelectorAll('#worldcat-btn')[0];
			const content_1 = document.getElementById('content_1');
			const content_2 = document.getElementById('content_2');
			const content_3 = document.getElementById('content_3');
			const dynamic_link_1 = document.getElementById('ls-link-1');

			if (radio_1.checked) {
				content_1.style.display = 'block';
				dynamic_link_1.href='https://libguides.colby.edu/librarysearch';
			} else {
				content_1.style.display = 'none';
			}

			if (radio_2.checked) {
				content_2.style.display = 'block';
				dynamic_link_1.href='https://www.maineinfonet.org/mainecat/about/';
			} else {
				content_2.style.display = 'none';
			}

			if (radio_3.checked) {
				content_3.style.display = 'block';
				dynamic_link_1.href='https://www.worldcat.org/about';
			} else {
				content_3.style.display = 'none';
			}
		}

		handleRendering();

		const lsRadioButtons = document.getElementsByName('library-search');
		for (const radioButton of lsRadioButtons) {
			radioButton.addEventListener('change', handleRendering);
		}
	});
</script>

