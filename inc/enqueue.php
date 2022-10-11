<?php

function enqueue_editor_css() {

    wp_register_style(
		'editor-styles', 
		get_stylesheet_directory_uri() . '/css/editor.css',
		'',
		'',
		''
	);

	wp_enqueue_script(
		'evn-editor', 
		get_stylesheet_directory_uri() . '/js/editor.js', 
		array( 'wp-blocks', 'wp-dom' ), 
		filemtime( get_stylesheet_directory() . '/js/editor.js' ),
		true
	);

	wp_enqueue_style( 'editor-styles', get_stylesheet_directory_uri() . '/css/editor.css' );
	wp_enqueue_style( 'gutenberg-css', get_stylesheet_directory_uri() . '/gutenberg.css' );

}
add_action( 'enqueue_block_editor_assets', 'enqueue_editor_css' );

/**
 * Enqueue scripts and styles.
 */
function evn_scripts() {
	
	wp_enqueue_style( 'evn-style', get_stylesheet_uri(), array(), PTY_GDNVERSION );
	wp_style_add_data( 'evn-style', 'rtl', 'replace' );

	wp_enqueue_script( 'evn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), PTY_GDNVERSION, true );

	wp_enqueue_script( 'evn-cta-focus', get_template_directory_uri() . '/js/set-cta-focus.js', array(), PTY_GDNVERSION, true );

	wp_enqueue_script('evn_parvus_src', get_template_directory_uri() . '/js/parvus.min.js', array('jquery'), PTY_GDNVERSION, true );
	
	wp_enqueue_script('evn_parvus_init', get_template_directory_uri() . '/js/parvus-init.js', array('evn_parvus_src', 'jquery'), PTY_GDNVERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'evn_scripts' );