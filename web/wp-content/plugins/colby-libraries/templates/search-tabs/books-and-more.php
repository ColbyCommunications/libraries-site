<form action=https://cbbcat.net/search/ name=search id=tab2_form1 method=get class=option1>
	<input type=hidden id=iiiFormHandle_1>
	<input type=hidden name=searchtype value=X>
	<input maxlength=75
		   type=text
		   class=summon-search-field
		   name=searcharg
		   size=20
		   placeholder="Search by keyword, author, title, or subject">
	<input type=submit value="Search >" placeholder="<?php echo $colby_libraries->placeholder_text; ?>" />
	<a href=https://cbbcat.net/>
		More search options >
	</a>
</form>

<!-- MAINECAT -->
<form id=tab2_form3 class=option3 action=https://mainecat.maine.edu/search/ name=search>
	<input type=hidden id=iiiFormHandle_1>
	<div class=formEntryArea>
		<input type=text
			   class=summon-search-field
			   placeholder="<?php echo $colby_libraries->placeholder_text; ?>"
			   maxlength=75
			   name=searcharg
			   size=30>
		<span class="nowrap formButtonArea">
			<input type=hidden id=iiiFormHandle_1>
			<input type=submit value="Search >">
		</span>
		<select name=searchtype id=searchtype>
			<option value=X selected>Keyword
			<option value=t>Title
			<option value=a>Author (Last, First)
		</select>
	</div>
</form>

<!-- NEXPRESS -->

<form name=wcfw id=tab2_form4 class=option4 accept-charset=UTF-8 action=//www.worldcat.org/search>
	<ul>
		<li>
			<a href="https://colby.idm.oclc.org/login?url=https://firstsearch.oclc.org/dbname=WorldCat;done=referer;FSIP">
				WorldCat (FirstSearch)
			</a>
		<li><a href="https://www.worldcat.org/" target="_blank">WorldCat.org</a>
	</ul>
</form>
<form class=radioArea>
	<label for=tab2_option1 class=selected>
		<input data-inputid=1 name=tab2_option1 checked id=tab2_option1 type=radio class=option1>
		CBBCat
	</label>
	<label for=tab2_option3>
		<input id=tab2_option3 data-inputid=3 name=tab2_option3 type=radio class=option3>
		MaineCat
	</label>
	<label for=tab2_option4>
		<input id=tab2_option4 data-inputid=4 name=tab2_option4 type=radio class=option4>
			WorldCat
	</label>
</form>

<!-- Bottom text -->
<div class="bottom-text option1">
	<strong>What's this?</strong>
	<p>Books and other materials from Colby, Bates and Bowdoin.</p>
	
	<p><a href="https://www.cbbnet.org/new-books-and-media/">
    Explore NEW Items >
	  </a></p>
	<p>
		<a href=https://colby.libwizard.com/f/New-Suggest-a-Purchase-Form>
	 		Suggest a purchase >
		</a></p>
		
</div>
<div class="bottom-text option3">
	<strong>What's this?</strong>
	<p>Academic and public libraries in Maine</p>
	<a href=https://www.maineinfonet.org/mainecat/about/>Help with MaineCat</a>
</div>
<div class="bottom-text option4">
	<strong>What's this?</strong>
	<p>Libraries throughout the world</p>
	<a href=https://colby.idm.oclc.org/login?url=https://colby.illiad.oclc.org/illiad/illiad.dll>
		ILL Request
	</a> |
	<a href=https://help.oclc.org/Discovery_and_Reference/WorldCat-org?sl=en>Help with WorldCat</a>
</div>
