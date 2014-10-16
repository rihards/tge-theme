<?php

// Let's cleanup a little and remove things we don't need
remove_action('wp_head', 'wp_generator');
function tge_hide_version() {
	return '';
}
add_filter('the_generator', 'tge_hide_version');

// Scripts and styles we want
function tge_scripts_styles() {
	// Main style sheet
	wp_enqueue_style('tge-style', get_stylesheet_uri());

	// jQuery in noConflict mode
	wp_enqueue_script('jquery');

	// Typekit
	wp_enqueue_script('typekit-font', '//use.typekit.net/afi6dbc.js', array(), null, true);

	// The Giant Eye custom js
	wp_enqueue_script('tge-custom', get_template_directory_uri() . '/js/tge.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'tge_scripts_styles');

// Init action
function tge_init() {
	// Create our custom menus
	register_nav_menus(
		array(
			'social-menu' => __('Social Media Menu', 'tge-theme'),
		)
	);
}
add_action('init', 'tge_init');

// Theme setup
function tge_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// Featured image, unlimited height, soft crop
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(960, 9999);
}
add_action('after_setup_theme', 'tge_setup');
