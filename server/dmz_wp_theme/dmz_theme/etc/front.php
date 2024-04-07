<?php

/**
 * Enqueue scripts and styles.
 */
function dmz_ct_scripts() {
	wp_enqueue_style( 'dmz-ct-style', get_stylesheet_uri(), array(), DMZ_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'dmz_ct_scripts' );


