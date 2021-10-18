<form id=tab4_form1 class=option1 action="https://libguides.colby.edu/az.php">
	<fieldset>
		<input id=search_box
			   type=text
			   name=q
			   autofocus=autofocus
			   autocomplete=off
			   placeholder="<?php echo $colby_libraries->placeholder_text; ?>"
			   class=summon-search-field>
		<input type=submit value="Search >" class="summon-search-submit button-website">
	</fieldset>
 	<a href=https://libguides.colby.edu/az.php>Databases by Title/Subject ></a>
 	<div class=btn-group>
    	<a class="btn dropdown-toggle" href=https://libguides.colby.edu/az.php>Popular Databases ></a>
	</div>
</form>

<form action=https://catalog.hathitrust.org/Search/Home name=HT_CatalogSearchForm_01 id=tab4_form2 class=option2>
	<div style=margin-bottom:3px;>
		<input type=hidden name=checkspelling value=true>
		<input type=hidden name=type value=all>
		<input class=searchterms
			   type=text
			   name=lookfor
			   id=lookfor
			   placeholder="<?php echo $colby_libraries->placeholder_text; ?>">
		<input type=submit name=submit value="Search >">
	</div>
	<div style=margin-bottom:3px;>
		<select id=searchtype name=type style=font-size:13px;>
		    <option value=all>All Fields
		    <option value=title>Title
		    <option value=author>Author
		    <option value=subject>Subject
		    <option value=isn>ISBN/ISSN
		    <option value=publisher>Publisher
		    <option value=series>Series Title
		    <option value=year>Year of Publication
		</select>
		<input type=hidden name=sethtftonly value=true>
		<input type=checkbox name=htftonly value=true id=fullonly checked=yes style=position:relative;font-size:13px;>
		&nbsp;
		<label for=fullonly style=position:relative;font-family:Arial,Verdana,Helvetica,sans-serif;font-size:12px;>
			Full view only
		</label>
	</div>
</form>

<form id=tab4_form3 name=search action=http://catalog.crl.edu/search/Y class=option3>
	<input type=text name=SEARCH size=20 placeholder="<?php echo $colby_libraries->placeholder_text; ?>">
	<input type=hidden value=1 name=searchscope>
	<input type=submit value="Search >" />
</form>

<form method=POST id=tab4_form4 class=option4>
	<a href=https://libguides.colby.edu/az.php>View Trial Databases ></a>
</form>

<form class=radioArea>
	<label for=tab4_option1 class=selected>
		<input data-inputid=1 name=tab4_option1 checked id=tab4_option1 type=radio class=option1>
		Databases by Title/Subject
	</label>
	<label for=tab4_option2>
		<input id=tab4_option2 data-inputid=2 name=tab4_option2 type=radio class=option2>
		HathiTrust
	</label>
	<label for=tab4_option3>
		<input id=tab4_option3 data-inputid=3 name=tab4_option3 type=radio class=option3>
		Center for Research Libraries
	</label>
	<label for=tab4_option4>
		<input id=tab4_option4 data-inputid=4 name=tab4_option4 type=radio class=option4>
		Trial Databases
	</label>
</form>
<div class="bottom-text option1">
	<strong>What's this?</strong>
	<p>Lists of our electronic databases, with links for access.</p>
	<a href=https://www.colby.edu/libraries/remote-library-access>Remote Access</a> |
	<a href=https://libanswers.colby.edu/>Questions? Ask Us!</a>
</div>
<div class="bottom-text option2">
	<strong>What's this?</strong>
	<p>Digital repository of books, and primary resources from around the world. <a href=https://libguides.colby.edu/hathi?hs=a>More detailed information and help.</a>
</div>
<div class="bottom-text option3">
	<strong>What's this?</strong>
	<p>Digital repository of journals, newspapers, theses, archives and government publications from the U.S. and developing regions. For assistance, contact a research librarian.
</div>
<div class="bottom-text option4">
	<strong>What's this?</strong>
	<p>New database subscriptions under consideration.
	<p><a href=https://bit.ly/1pgWnCf>Trial database feedback form ></a>
</div>
