<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              Nilesh Dudakiya
 * @since             1.0.0
 * @package           User_Rating_Reviews
 *
 * @wordpress-plugin
 * Plugin Name:       user-rating-reviews
 * Plugin URI:        store.multidots.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nilesh Dudakiya
 * Author URI:        Nilesh Dudakiya
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       user-rating-reviews
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-user-rating-reviews-activator.php
 */
function activate_user_rating_reviews() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-user-rating-reviews-activator.php';
	User_Rating_Reviews_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-user-rating-reviews-deactivator.php
 */
function deactivate_user_rating_reviews() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-user-rating-reviews-deactivator.php';
	User_Rating_Reviews_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_user_rating_reviews' );
register_deactivation_hook( __FILE__, 'deactivate_user_rating_reviews' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-user-rating-reviews.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_user_rating_reviews() {

	$plugin = new User_Rating_Reviews();
	$plugin->run();

}
run_user_rating_reviews();

function user_rating_review()
{
    if(is_page('review')){   
        $dir = plugin_dir_path( __FILE__ );
        include($dir."display-user-information.php");
        die();
    }
}

add_action( 'wp', 'user_rating_review' );
?>