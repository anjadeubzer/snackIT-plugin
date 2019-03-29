<?php

/***********************************
 * 4. Additional admin columns for custom post type 'snack'
 *
 * a) image
 * b) price column
 * c) sold snacks in total/this month ?!
 * d) active (yes/no)
 *
 ***********************************/


//  Exit if accessed directly.
defined('ABSPATH') || exit;


// Add the custom columns to the book post type:
add_filter( 'manage_snack_posts_columns', 'snackit_set_custom_snack_columns' );
function snackit_set_custom_snack_columns($columns) {
//	unset( $columns['tags'] );

	$columns = array(
		'cb' => $columns['cb'],
		'image' => __( 'Image' ),
		'title' => __( 'Title' ),
		'snack_price' => __( 'Price', 'snackit' ),
		'snack_size' => __( 'Size', 'snackit' ),
		'taxonomy-snack_groups'  => __( 'Snack Group' ),
		'taxonomy-snack_groups'  => __( 'Snack Group' ),
		'date'  => __( 'Date' ),
	);

	return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_snack_posts_custom_column' , 'snackit_custom_snack_column', 10, 2 );
function snackit_custom_snack_column( $column, $post_id ) {
	switch ( $column ) {

		case 'snack_price' :
			echo get_post_meta( $post_id , 'snack_price' , true );
			break;

		case 'snack_size' :
			echo get_post_meta( $post_id , 'snack_size' , true );
			break;

	}
}