<?php

// Replace default stylesheet
function divi_extras_default_stylesheet() {
	return get_stylesheet_directory_uri() . '/divi-extra.css';
}
add_filter( 'stylesheet_uri', 'divi_extras_default_stylesheet', 10, 2 );

// Add 404 widget position
function divi_extra_widgets_init() {
	register_sidebar( array(
		'name' => '404',
		'id' => '404',
		'before_widget' => '<div id="%1$s" class="et_404_widget %2$s">',
		'after_widget' => '</div> <!-- end .et_404_widget -->',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );
}
add_action( 'widgets_init', 'divi_extra_widgets_init' );