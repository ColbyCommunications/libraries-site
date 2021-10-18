jQuery(document).ready(function() {
	var liArray = jQuery("#accordion-horizontal li[data-background]");
	jQuery(liArray).each(function(index,element) {
		var curBackground = jQuery(this).attr("data-background");

		jQuery(this).css('background-image','url(' + curBackground + ')');
	});


	jQuery("#accordion-horizontal").awsAccordion({
	    type:"horizontal",
	    cssAttrsVer:{
	        ulWidth:"responsive",
	        liHeight:50
	    },
	    cssAttrsHor:{
	        ulWidth:"responsive",
	        liWidth:50,
	        liHeight:300
	    },
	    startSlide:1,
	    openOnebyOne:true,
	    classTab:"active",
	    slideOn:"click",
	    responsiveMedia: "(max-width: 400px)"
	});

	jQuery(".radioArea label input").click(function() {
		jQuery(this).parent().parent().children("label").removeClass('selected');
		jQuery(this).parent().addClass('selected');
		jQuery(this).parent().parent().children("label").children("input").prop('checked', false);
		jQuery(this).prop('checked', true);

		// Show/hide appropriate forms...
		var parentTab = jQuery(this).parent().parent().parent();
		jQuery(parentTab).children("form").hide();
		jQuery(parentTab).children(".radioArea").show();
		jQuery(parentTab).children("form.option" + jQuery(this).attr("data-inputid")).fadeIn();

		jQuery(parentTab).children(".bottom-text").hide();
		jQuery(parentTab).children(".bottom-text.option" + jQuery(this).attr("data-inputid")).show();
	});

	jQuery("#librarySearch .tab-content input").focus(function() {
		jQuery(this).addClass('inputfocus');
	});

	jQuery("#librarySearch .tab-content input").focusout(function() {
		if(jQuery(this).val() == '')
			jQuery(this).removeClass('inputfocus');
	});


	jQuery("#librarySearch .tab-content form").submit(function() {
		if(jQuery(this).children("input[type='text']").val() == '') {
			alert('A value is required.');
			jQuery(this).children("input[type='text']").focus();
			return false;
		}

		var searchForm = jQuery(this);

		// Add 'loading' div...
		jQuery( "#librarySearch" ).before('<div class="loading">&nbsp;</div>');

		// Rearrange the items so 'searchtype' is first.
		if(jQuery(this).children(".formEntryArea").children("select[name='searchtype']")) {
			var tempItem = jQuery(this).children(".formEntryArea").children("select[name='searchtype']").detach();
			jQuery(this).prepend(tempItem);
			jQuery(this).hide();
		}

	});
});
