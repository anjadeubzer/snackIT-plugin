<?php
/***********************************
 * 7. Plugins Settings Page
 *
 * a) number of bought snacks
 * b) ranking
 *
 *
 ***********************************/


//  Exit if accessed directly.
defined('ABSPATH') || exit;

function add_extra_user_column($columns) {
	return array_merge( $columns,
		array('user_balance' => __('Balance')) );
}
add_filter('manage_users_columns' , 'add_extra_user_column');