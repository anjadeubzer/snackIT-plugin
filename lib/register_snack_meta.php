<?php
/***********************************
 * 3. The custom fields for the custom post type 'snack'
 *
 * a) snack_price
 * b) snack_size
 * c) snack_description
 * d) active (yes/no)
 *
 ***********************************/


//  Exit if accessed directly.
defined('ABSPATH') || exit;


// register custom meta fields for the snackit custom post type
add_action( 'init', 'register_snack_meta' );


function register_snack_meta() {

	register_meta( 'post', 'snack_price', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'integer',
		'description' => 'Please enter in cents (100 == 1euro)',
		'object_subtype' => 'snack',
	) );

	register_meta( 'post', 'snack_brand', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'string',
		'description' => 'zb. Haribo, CocaCola, etc.',
		'object_subtype' => 'snack',
	) );

	register_meta( 'post', 'snack_size', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'string',
		'description' => 'Please enter "500 ml" or "80 gramm"',
		'object_subtype' => 'snack',
	) );

	register_meta( 'post', 'snack_description', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'string',
		'description' => 'Description of the Snack',
		'object_subtype' => 'snack',
	) );

	register_meta( 'post', 'snack_active', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'boolean',
		'description' => 'Show on Frontend',
		'object_subtype' => 'snack',
	) );

}
