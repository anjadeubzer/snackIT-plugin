<?php

/***********************************
 * 1. The Custom Post Type 'snack' for the SnackIT app
 ***********************************/


//  Exit if accessed directly.
defined('ABSPATH') || exit;


add_action( 'init', 'create_post_type_snack' );
add_action( 'init', 'create_custom_taxonomy_snack', 0 );


function create_post_type_snack() {

	$labels = array(
		'name'               => _x( 'Snacks', 'post type general name', 'snackit' ),
		'singular_name'      => _x( 'Snack', 'post type singular name', 'snackit' ),
		'menu_name'          => _x( 'SnackIT', 'admin menu', 'snackit' ),
		'name_admin_bar'     => _x( 'Snack', 'add new on admin bar', 'snackit' ),
		'add_new'            => _x( 'New Snack', 'adds a new snack', 'snackit' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'All snacks, lunch packs or soups provided by the office.', 'snackit' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'snack' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_rest'       => true,
		'template' => array(
			array( 'snackit/snack-meta' ),
		),
		'template_lock'      => 'all',
		'taxonomies'         => array( 'post_tag', 'snack_groups' ),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields')
	);

	register_post_type( 'snack', $args );
}

//function myplugin_register_template() {
//	$post_type_object = get_post_type_object( 'snack' );
//	$post_type_object->template = array(
//		array( 'snackit/snack-meta' ),
//	);
//	$post_type_object->template_lock = 'all';
//}
//add_action( 'init', 'myplugin_register_template' );


function create_custom_taxonomy_snack() {

	$labels = array(
		'name'                       => __( 'Snack Groups'),
		'singular_name'              => __( 'Snack Group'),
		'menu_name'                  => __( 'Snack Groups' ),
		'search_items'               => __( 'Search Snack Groups' ),
		'popular_items'              => __( 'Popular Snack Groups' ),
		'all_items'                  => __( 'All Snack Groups' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'snack_groups' ),
	);

	register_taxonomy( 'snack_groups', 'snack', $args );
}


// Populate Custom Taxonomy on plugin install


function snack_plugin_install() {

	$snack_groups = array(
		'Water',
		'Dairy',
		'Tea',
		'SoftDrink',
		'HipsterDrink',
		'EnergyDrink',
		'Beer',

		'Soup',
		'Cereals',
		'CerealBars',
		'Nuts',
		'Sweets',
		'Chocolate',

		'Organic',
		'SugarFree',
	);

	foreach ( (array) $snack_groups as $snack_group ) {
		$term = term_exists( $snack_group, 'snack_groups' );
		if ( $term == 0 || $term == null ) {
			wp_insert_term( $snack_group, 'snack_groups' );
		}
	}
}
register_activation_hook(__FILE__, 'snack_plugin_install');
