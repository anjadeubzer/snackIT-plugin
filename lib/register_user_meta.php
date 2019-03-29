<?php

/***********************************
 * 5. Additional meta fields for 'user'
 *
 * a) number of bought snacks
 * b) user_balance
 *
 ***********************************/


//  Exit if accessed directly.
defined('ABSPATH') || exit;


// register custom meta field 'user_balance' for the user
add_action( 'init', 'register_user_meta' );


function register_user_meta() {

	register_meta( 'user', 'user_balance', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'integer',
		'description' => 'stored in cents (100 == 1euro)',
	) );

}


function add_balance_to_userprofile( $user ) {    ?>
	<table class="form-table">
		<tr>
			<th>
				<label for="user_balance"><?php _e('Your balance', 'snackit'); ?>
				</label></th>
			<td>
				<input type="text" name="user_balance" id="user_balance" value="<?php echo esc_attr( get_the_author_meta( 'user_balance', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please zero your balance directly at xy direction.', 'snackit'); ?></span>
			</td>
		</tr>
	</table>
<?php }
function save_custom_userprofile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
		return FALSE;
	update_usermeta( $user_id, 'company_name', $_POST['company_name'] );
	update_usermeta( $user_id, 'user_phone', $_POST['user_balance'] );
}
add_action( 'show_user_profile', 'add_balance_to_userprofile' );
add_action( 'edit_user_profile', 'add_balance_to_userprofile');
add_action( 'personal_options_update', 'save_custom_userprofile_fields' );
add_action( 'edit_user_profile_update', 'save_custom_userprofile_fields' );