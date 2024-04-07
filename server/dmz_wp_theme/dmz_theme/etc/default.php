<?php

function dmz_ct_setup() {
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on dmz custom theme, use a find and replace
	* to change 'dmz-custom-theme' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'dmz-ct', get_template_directory() . '/languages' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dmz-ct' ),
		)
	);
}
add_action( 'after_setup_theme', 'dmz_ct_setup' );