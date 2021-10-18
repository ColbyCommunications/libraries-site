<form method=get
		action=https://lw5cz6wa6g.search.serialssolutions.com/ 
		id=tab3_form1
		name=SS_EJPSearchForm
		class=option1>
		<div class=SS_ToolLabels style=display:none;>
			<p><b>Limit </b> search to the following content types:</p>
			<input type=checkbox name=SS_searchTypeAll value=yes onclick=setAllCheckboxes(this);>All |
		<input type=checkbox name=SS_searchTypeBook value=yes> Books |
		<input name=SS_searchTypeJournal checked=true value=yes onclick=updateSelectAll(this); type=checkbox> Journals |
		<input type=checkbox name=SS_searchTypeOther value=yes onclick="updateSelectAll(this)">Other
	</div>
	<input value=1.0 name=V type=hidden>
	<input value=100 name=N type=hidden>
	<input type=hidden name=L value=LW5CZ6WA6G>
	<select id=select_searchTypes name=S style=display:none;>
		<option value=AC_T_B selected=selected>Title begins with</option>
		<option value=AC_T_M>Title equals</option>
		<option value=T_W_A>Title contains all words</option>
		<option value=I_M>ISSN/ISBN equals</option>
		</select>
		<input type=text class=summon-search-field id=SS_CFocusTag name=C placeholder="<?php echo $colby_libraries->placeholder_text; ?>">
		<input value="Search >" type=Submit>
</form>
<form id="tab3_form2" class="option2" method="GET" action="https://libguides.colby.edu/az.php">
	<fieldset>
		<input id=search_box
					 class=summon-search-field
					 type=text
					 value=""
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

<form method=POST id=tab3_form3 class=option3>
	<a href=https://colby.idm.oclc.org/login?url=https://colby.illiad.oclc.org/illiad/illiad.dll>Interlibrary Loan Request ></a>
</form>

<form id=tab3_form4 class=option4 action=https://colby.summon.serialssolutions.com/ method=GET>
	<input name="fvf" type="hidden" value="ContentType,Journal Article">
	<input name="q" type="text" class="summon-search-field" placeholder="<?php echo $colby_libraries->placeholder_text; ?>">
	<input type="submit" value="Search >">&nbsp;
</form>

<form class=radioArea>
	<label for=tab3_option1 class=selected>
		<input data-inputid=1 name=tab3_option1 checked id=tab3_option1 type=radio class=option1>
		Journals by Title
	</label>
	<label for=tab3_option2>
		<input id=tab3_option2 data-inputid=2 name=tab3_option2 type=radio class=option2>
		Databases
	</label>

	<label for=tab3_option3>
		<input id=tab3_option3 data-inputid=3 name=tab3_option3 type=radio class=option2>
		Interlibrary Loan Request
	</label>
	<label for=tab3_option4>
		<input id=tab3_option4 data-inputid=4 name=tab3_option4 type=radio class=option2>
		Articles
	</label>
</form>

<div class="bottom-text option1">
	<strong>What's this?</strong>
	<p>Titles (A-Z) of journals to which Colby subscribes with links to their contents.</p>
<!-- 	<a href="https://libguides.colby.edu/offcampusaccess">Off-Campus Access</a> | <a href="https://colby.idm.oclc.org/login?url=https://colby.illiad.oclc.org/illiad/illiad.dll">ILL Request</a> -->
</div>
<div class="bottom-text option2">
	<strong>What's this?</strong>
	<p>Lists of our electronic databases, with links for access.</p>
	<a href="https://libguides.colby.edu/offcampusaccess">Off-Campus Access</a>
</div>
<div class="bottom-text option3">
	<strong>What's this?</strong>
	<p>Request a book, chapter, journal article, or thesis that Colby does not own or check the status of your requests.</p>
	<a href="mailto:illmail@colby.edu">For assistance contact: illmail@colby.edu</a>
</div>
<div class="bottom-text option4">
	<strong>What's this?</strong>
	<p>Easily search for articles across thousands of sources.</p>
	<a href="https://colby.idm.oclc.org/login?url=https://colby.illiad.oclc.org/illiad/illiad.dll">ILL Request</a>
</div>