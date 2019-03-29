<?php
/**
/**
 * A plugin to create snacks that you can virtually buy and
 * who can easily added in a custom post type via gutenberg block
 *
 * @package     SnackIT
 * @author      Rita Best & Anja Deubzer
 * @license     GPL2+
 *
 * @wordpress-plugin
 * * Plugin Name: SnackIT Products
 * Plugin URI: https://snackit.ritapbest.io/snack-it.zip
 * Description: Set's up a custom post type, a block for easy adding and a overview page with custom admin columns
 * Version: 1.0
 * Author: Rita Best & Anja Deubzer
 * Author URI: https://snackit.ritapbest.io/
 * Text Domain: snackit
 * Domain Path: /languages
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html

 */


//  Exit if accessed directly.
defined('ABSPATH') || exit;


// Only load if Gutenberg is available.
if ( ! function_exists( 'register_block_type' ) ) {
	return;
}

/***********************************
 * 1. The Custom Post Type 'snack' for the SnackIT app
 ***********************************/

include __DIR__ . '/lib/create_post_type_snack.php';




/***********************************
 * 2. The Block 'xy' for the custom post type 'snack'
 ***********************************/

include __DIR__ . '/lib/gutenberg_block_snack.php';




/***********************************
 * 3. The custom fields for the custom post type 'snack'
 *
 * a) snack_price
 * b) snack_size
 * c) snack_description
 * d) active (yes/no)
 *
 ***********************************/

include __DIR__ . '/lib/register_snack_meta.php';




/***********************************
 * 4. Additional admin columns for custom post type 'snack'
 *
 * a) image
 * b) price column
 * c) sold snacks in total/this month ?!
 * d) active (yes/no)
 *
 ***********************************/

include __DIR__ . '/lib/snack_admin_columns.php';



/***********************************
 * 5. Additional meta fields for 'user'
 *
 * a) number of bought snacks
 * b) balance
 *
 ***********************************/

include __DIR__ . '/lib/register_user_meta.php';



/***********************************
 * 6. Additional admin columns for 'user'
 *
 * a) number of bought snacks
 * b) balance
 *
 ***********************************/

include __DIR__ . '/lib/user_admin_columns.php';


/***********************************
 * 7. Plugins Settings Page
 *
 * a) number of bought snacks
 * b) ranking
 *
 *
 ***********************************/

//include __DIR__ . '/lib/user_admin_columns.php';