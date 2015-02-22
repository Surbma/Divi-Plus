<?php

// Enqueue the Divi css file
function divi_extras_enqueue_scripts() {
	wp_enqueue_style( 'divi', get_template_directory_uri() . '/style.css', false, '2.3.1' );
}
add_action( 'wp_enqueue_scripts', 'divi_extras_enqueue_scripts' );

// Remove comment form allowed tags
function divi_extra_remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'divi_extra_remove_comment_form_allowed_tags' );

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