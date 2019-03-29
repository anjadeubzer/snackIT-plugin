<?php

/***********************************
 * 2. The Block 'xy' for the custom post type 'snack'
 ***********************************/


//  Exit if accessed directly.
defined('ABSPATH') || exit;


// enqueue scripts/styles for both frontend and editor
add_action( 'enqueue_block_editor_assets', 'snackit_editor_scripts' );
//add_action( 'enqueue_block_assets', 'snackit_scripts' );


/** Enqueue block editor only JavaScript and CSS **/
function snackit_editor_scripts() {

	$blockPath = '../assets/js/editor.blocks.js';
	$blacklistPath = '../assets/js/editor.blocks.js';
	$editorStylePath = '../assets/css/blocks.editor.css';

	// Enqueue the bundled block JS file
	wp_enqueue_script(
		'snackit-block-js',
		plugins_url( $blockPath, __FILE__ ),
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ],
		filemtime( plugin_dir_path(__FILE__) . $blockPath )
	);

//	wp_enqueue_script(
//		'snackit-blacklist-blocks',
//		plugins_url( $blacklistPath, __FILE__ ),
//		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
//	);

	// Enqueue optional editor only styles
	wp_enqueue_style(
		'snackit-editor-css',
		plugins_url( $editorStylePath, __FILE__),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . $editorStylePath )
	);

}


//function snackit_blacklist_blocks() {
//	wp_enqueue_script(
//		'my-plugin-blacklist-blocks',
//		plugins_url( 'my-plugin.js', __FILE__ ),
//		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
//	);
//}
//add_action( 'enqueue_block_editor_assets', 'snackit_blacklist_blocks' );


/** we do not need these for the headless WP ---> */
/** Enqueue front end JavaScript and CSS **/
//function snackit_scripts() {
//
//	$blockPath = '/assets/js/frontend.blocks.js';
//	$stylePath = '/assets/css/blocks.style.css';
//
//	// Enqueue the bundled block JS file
//	wp_enqueue_script();
//
//	// Enqueue frontend and editor block styles
//	wp_enqueue_style();
//
//}
