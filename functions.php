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

	// And our custom post types
	register_post_type('footer_posts',
		array(
			'labels' => array(
				'name' => __('Footer Posts', 'tge-theme'),
				'singular_name' => __('Footer Post', 'tge-theme')
			),
			'public' => true,
			'has_archive' => false,
			'exclude_from_search' => true,
			'show_in_menu' => true,
			'menu_position' => 21,
			'capability_type' => 'page',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'page-attributes',
			),
		)
	);

	// Some image sizes that we need
	// 745 pixels wide (and unlimited height)
	add_image_size('post_regular', 745);

	// 455 pixels wide (and unlimited height)
	add_image_size('post_floated', 455);	

	// 420x420 and cropped image
	add_image_size('geek_portrait', 420, 420, true);	
}
add_action('init', 'tge_init');

// Image sizes should be selectable in the Media library as well
function tge_custom_sizes($sizes) {
    return array_merge($sizes, array(
        'post_regular' => __('Post Regular (745px)', 'tge-theme'),
        'post_floated' => __('Post Floated (455px)', 'tge-theme'),
    ));
}
add_filter('image_size_names_choose', 'tge_custom_sizes');

// Theme setup
function tge_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// Featured image, crop it to 16:9, hard crop from center center
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(960, 544, array('center', 'center'));
}
add_action('after_setup_theme', 'tge_setup');

// Helper function for our SVG icons
function tge_icon($icon) {
	$svg = NULL;
	$path = dirname(__FILE__) . '/images/icons/' . $icon . '.svg';
	if(file_exists($path)) {
		$svg = file_get_contents($path);
	}
	return $svg;
}
