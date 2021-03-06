<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://wpcontained.com/
 * @since      1.0.0
 *
 * @package    Wpc_Settings_Shortcodes
 * @subpackage Wpc_Settings_Shortcodes/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpc_Settings_Shortcodes
 * @subpackage Wpc_Settings_Shortcodes/public
 * @author     Werner Smit <werners@evine.co>
 */
class Wpc_Settings_Shortcodes_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_shortcode('wpc-settings', array($this, 'wpc_get_setting'));

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpc_Settings_Shortcodes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpc_Settings_Shortcodes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpc-settings-shortcodes-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpc_Settings_Shortcodes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpc_Settings_Shortcodes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpc-settings-shortcodes-public.js', array( 'jquery' ), $this->version, false );

	}

	public function wpc_get_setting( $atts ) {

		$setting_value = '';

		$atts = shortcode_atts( array(
				'setting' => ''
			), $atts, 'wpc-settings' );

			if (isset($atts['setting']) && $atts['setting'] != '') {
				$options = get_option( 'wpcsscodes_settings' );


				$setting_value = $options[$atts['setting']];
			}

			return $setting_value;
	}

}
