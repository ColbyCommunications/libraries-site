(function() {
	tinymce.PluginManager.add('tboot_shortcodes', function( editor, url ) {
		editor.addButton('tboot_shortcodes', {
			text: '',
			icon: "bootstrap-icon",
			type: 'menubutton',
			menu: [
				{
					text: 'Accordion',
					onclick: function() {
						editor.insertContent('[tboot_accordion]<br />[tboot_accordion_section title="Section 1"]<br />Accordion Content<br />[/tboot_accordion_section]<br />[tboot_accordion_section title="Section 2"]<br />Accordion Content<br />[/tboot_accordion_section]<br />[/tboot_accordion]');
					}
				},
				{
					text: 'Accordion Bootstrap',
					onclick: function() {
						editor.insertContent('[tboot_accordion_bootstrap name="UniqueName"]<br />[tboot_accordion_bootstrap_section name="UniqueName" heading="Container One Title" number="1" open="yes"]<br />Accordion Bootstrap Content<br />[/tboot_accordion_bootstrap_section]<br />[tboot_accordion_bootstrap_section name="UniqueName" heading="Container Two Title" number="2"]<br />Accordion Bootstrap Content<br />[/tboot_accordion_bootstrap_section]<br />[/tboot_accordion_bootstrap]');
					}
				},
				{
					text: 'Alert',
					onclick: function() {
						editor.insertContent('[tboot_alert color="danger" heading="Alert Heading"]Alert Content[/tboot_alert]');
					}
				},
				{
					text: 'Badge',
					onclick: function() {
						editor.insertContent('[tboot_badge color="important"]Label[/tboot_badge]');
					}
				},
				{
					text: 'Button',
					onclick: function() {
						editor.insertContent('[tboot_button color="primary" size="large" url="http://www.colby.edu" title="Visit Site" target="blank"]Button Text[/tboot_button]');
					}
				},
				{
					text: 'Button Dropdown',
					onclick: function() {
						editor.insertContent('[tboot_button_dropdown label="Button Text" icon="info-sign" color="danger" size="large"]<br />[tboot_dropdown_link icon="pencil" url="http://www.colby.edu" target="blank"]Button Text[/tboot_dropdown_link]<br />[tboot_dropdown_link icon="comment" url="http://www.colby.edu" target="blank"]Dropdown Link[/tboot_dropdown_link]<br />[tboot_dropdown_link icon="cog" url="http://www.colby.edu" target="blank"]Button Text[/tboot_dropdown_link]<br />[tboot_dropdown_divider]<br />[tboot_dropdown_link url="http://www.colby.edu" target="blank"]Button Text[/tboot_dropdown_link]<br />[/tboot_button_dropdown]');
					}
				},
				{
					text: 'Button Split Dropdown',
					onclick: function() {
						editor.insertContent('[tboot_button_split_dropdown label="Button Text" color="primary" size="large" url="http://www.colby.edu" target="blank"]<br />[tboot_dropdown_link icon="pencil" url="http://www.colby.edu" target="blank"]Button Text[/tboot_dropdown_link]<br />[/tboot_button_split_dropdown]');
					}
				},
				{
					text: 'Button Group',
					onclick: function() {
						editor.insertContent('[tboot_button_group]<br />[tboot_button color="primary" size="large" url="http://www.colby.edu" title="Visit Site" target="blank"]Button Text[/tboot_button][tboot_button color="danger" size="large" url="http://www.colby.edu" title="Visit Site" target="blank"]Button Text[/tboot_button]<br />[/tboot_button_group]');
					}
				},
				{
					text: 'Carousel',
					onclick: function() {
						editor.insertContent('[tboot_carousel name="ExampleCarousel"]<br />[tboot_carousel_image first="yes" title="Image Title" caption="Caption example text" link="http://domain.com/images/pic.jpg"]<br />[tboot_carousel_image title="Second Image Title" caption="Caption for second image" link="http://domain.com/images/pic.jpg"]<br />[tboot_carousel_image title="Third Image Title" caption="Caption for third image" link="http://domain.com/images/pic.jpg"]<br />[/tboot_carousel]');
					}
				},
				{
					text: 'Clear Floats',
					onclick: function() {
						editor.insertContent('[tboot_clear_floats]');
					}
				},
				{
					text: 'Columns',
					onclick: function() {
						editor.insertContent('[tboot_column_wrap]<br />[tboot_column size="4"]<br />Content in column 1<br />[/tboot_column]<br />[tboot_column size="4"]<br />Content in column 2<br />[/tboot_column]<br />[tboot_column size="4"]<br />Content in column 3<br />[/tboot_column]<br />[/tboot_column_wrap]');
					}
				},
				{
					text: 'Icon',
					onclick: function() {
						editor.insertContent('[tboot_icon icon="spinner" size="2x" spin="yes" border="yes" muted="yes" align="left"]');
					}
				},
				{
					text: 'Label',
					onclick: function() {
						editor.insertContent('[tboot_label color="warning"]Label[/tboot_label]');
					}
				},
				{
					text: 'Popover',
					onclick: function() {
						editor.insertContent('[tboot_popover title="Popover Title Text" popcontent="Content in Popover" placement="bottom"]Mouse over this text for Popover[/tboot_popover]');
					}
				},
				{
					text: 'Spacing',
					onclick: function() {
						editor.insertContent('[tboot_spacing size="40px"]');
					}
				},
				{
					text: 'Table',
					onclick: function() {
						editor.insertContent('[tboot_table strip="yes" border="yes" condense="yes" hover="yes" cols="names,values" data="name1,25,name2,409"][/tboot_table]');
					}
				},
				{
					text: 'Tabs',
					onclick: function() {
						editor.insertContent('[tboot_tabgroup]<br />[tboot_tab title="First Tab"]<br />First tab content<br />[/tboot_tab]<br />[tboot_tab title="Second Tab"]<br />Third Tab Content.<br />[/tboot_tab]<br />[/tboot_tabgroup]');
					}
				},
				{
					text: 'Tabs Bootstrap',
					onclick: function() {
						editor.insertContent('[tboot_tab_bootstrap]<br />[tboot_tab_titlesection type="tabs"]<br />[tboot_tab_tabtitle active="yes" number="1"]Tab 1[/tboot_tab_tabtitle]<br />[tboot_tab_tabtitle number="2"]Tab 2[/tboot_tab_tabtitle]<br />[/tboot_tab_titlesection]<br />[tboot_tab_contentsection]<br />[tboot_tab_tabcontent active="yes" number="1"]Tab 1 Content[/tboot_tab_tabcontent]<br />[tboot_tab_tabcontent number="2"]Tab 2 Content[/tboot_tab_tabcontent]<br />[/tboot_tab_contentsection]<br />[/tboot_tab_bootstrap]');
					}
				},
				{
					text: 'Testimonial',
					onclick: function() {
						editor.insertContent('[tboot_testimonial by="Joe Schmoe"]Add your testimonial[/tboot_testimonial]');
					}
				},
				{
					text: 'Toggle',
					onclick: function() {
						editor.insertContent('[tboot_tooltip text="Text in tooltip" placement="right"]Link for tooltip[/tboot_tooltip]');
					}
				},
				{
					text: 'Tooltip',
					onclick: function() {
						editor.insertContent('[tboot_toggle title="This Is Your Toggle Title"]Your Toggle Content[/tboot_toggle]');
					}
				},
				{
					text: 'Well',
					onclick: function() {
						editor.insertContent('[tboot_well width="50%"]Your Well Content[/tboot_well]');
					}
				}
				
			]

		});
	});
})();