<?php

// Replace default stylesheet
function divi_plus_default_stylesheet() {
	return get_template_directory_uri() . '/style.css';
}
add_filter( 'stylesheet_uri', 'divi_plus_default_stylesheet', 10, 2 );

function divi_plus_enqueues() {
	wp_enqueue_style( 'divi-plus', get_stylesheet_directory_uri() . '/css/divi-plus.css' );
}
add_action( 'wp_enqueue_scripts', 'divi_plus_enqueues', 20 );

// Add 404 widget position
function divi_plus_widgets_init() {
	register_sidebar( array(
		'name' => '404',
		'id' => 'divi-plus-404',
		'before_widget' => '<div id="%1$s" class="et_404_widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );
}
add_action( 'widgets_init', 'divi_plus_widgets_init', 999 );
