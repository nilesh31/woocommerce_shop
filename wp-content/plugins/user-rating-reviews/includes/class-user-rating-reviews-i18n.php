<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       Nilesh Dudakiya
 * @since      1.0.0
 *
 * @package    User_Rating_Reviews
 * @subpackage User_Rating_Reviews/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    User_Rating_Reviews
 * @subpackage User_Rating_Reviews/includes
 * @author     Nilesh Dudakiya <nileshdudakiya.multidots@gmail.com>
 */
class User_Rating_Reviews_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'user-rating-reviews',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
