<?php

// Enqueue css files
function divi_extras_enqueue_scripts() {
	wp_enqueue_style( 'divi', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'divi-extra', get_stylesheet_directory_uri() . '/css/divi-extra.css', false, '2.0.0' );
}
add_action( 'wp_enqueue_scripts', 'divi_extras_enqueue_scripts' );

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