<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://wpcontained.com/
 * @since      1.0.0
 *
 * @package    Wpc_Settings_Shortcodes
 * @subpackage Wpc_Settings_Shortcodes/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wpc_Settings_Shortcodes
 * @subpackage Wpc_Settings_Shortcodes/includes
 * @author     Werner Smit <werners@evine.co>
 */
class Wpc_Settings_Shortcodes_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wpc-settings-shortcodes',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
