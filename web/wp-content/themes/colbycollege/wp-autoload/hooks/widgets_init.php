<?php

function remove_unused_widgets() {
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}
add_action( 'widgets_init', 'remove_unused_widgets' );


function colby_register_sidebars() {

	register_sidebar(array(
		'id' => 'footer_right',
		'name' => 'Footer Right',
		'description' => 'Widget area for giving, etc.',
		'before_widget' => '<div id="%1$s">', //  class="widget span12 %2$s"
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	  ));
	  
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page EXCEPT the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Front Page Sidebar',
    	'description' => 'Used only on the front page page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    register_sidebar(array(
    	'id' => 'sidebar3',
    	'name' => 'Middle Sidebar',
    	'description' => 'Used only on the 3-column page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer1',
      'name' => 'Footer',
      'before_widget' => '<div id="%1$s">', //  class="widget span12 %2$s"
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footercontact',
      'name' => 'Footer Contact',
      'description' => 'Used if the default contact information for the college is to be overwritten.',
      'before_widget' => '<div id="%1$s">', //  class="widget span12 %2$s"
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
	));
}
add_action( 'widgets_init', 'colby_register_sidebars' );