<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://wpcontained.com/
 * @since      1.0.0
 *
 * @package    Wpc_Settings_Shortcodes
 * @subpackage Wpc_Settings_Shortcodes/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpc_Settings_Shortcodes
 * @subpackage Wpc_Settings_Shortcodes/admin
 * @author     Werner Smit <werners@evine.co>
 */
class Wpc_Settings_Shortcodes_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpc-settings-shortcodes-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpc-settings-shortcodes-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_init() {



	}

	function wpcsscodes_add_admin_menu(  ) {

		add_menu_page( 'WPC Settings Shortcodes', 'WPC Settings Shortcodes', 'manage_options', 'wpc_settings_shortcodes', array($this, 'wpcsscodes_options_page') );

	}


	function wpcsscodes_settings_init(  ) {

		register_setting( 'wpcsscodes', 'wpcsscodes_settings' );

		add_settings_section(
			'wpcsscodes_wpcsscodes_section',
			__( 'Settings', 'wpcsscodes' ),
			array($this, 'wpcsscodes_settings_section_callback'),
			'wpcsscodes'
		);

		add_settings_field(
			'site_slogan',
			__( 'Site Slogan Text', 'wpcsscodes' ),
			array( $this, 'site_slogan_render'),
			'wpcsscodes',
			'wpcsscodes_wpcsscodes_section'
		);
/*
		add_settings_field(
			'wpcsscodes_textarea_field_1',
			__( 'Settings field description', 'wpcsscodes' ),
			array( $this, 'wpcsscodes_textarea_field_1_render'),
			'wpcsscodes',
			'wpcsscodes_wpcsscodes_section'
		);

		add_settings_field(
			'wpcsscodes_select_field_2',
			__( 'Settings field description', 'wpcsscodes' ),
			array( $this, 'wpcsscodes_select_field_2_render'),
			'wpcsscodes',
			'wpcsscodes_wpcsscodes_section'
		);
*/

	}


	function site_slogan_render(  ) {

		$options = get_option( 'wpcsscodes_settings' );
		?>
		<input type='text' name='wpcsscodes_settings[site_slogan]' value='<?php echo $options['site_slogan']; ?>'>
		<?php

	}


	function wpcsscodes_textarea_field_1_render(  ) {

		$options = get_option( 'wpcsscodes_settings' );
		?>
		<textarea cols='40' rows='5' name='wpcsscodes_settings[wpcsscodes_textarea_field_1]'>
			<?php echo $options['wpcsscodes_textarea_field_1']; ?>
	 	</textarea>
		<?php

	}


	function wpcsscodes_select_field_2_render(  ) {

		$options = get_option( 'wpcsscodes_settings' );
		?>
		<select name='wpcsscodes_settings[wpcsscodes_select_field_2]'>
			<option value='1' <?php selected( $options['wpcsscodes_select_field_2'], 1 ); ?>>Option 1</option>
			<option value='2' <?php selected( $options['wpcsscodes_select_field_2'], 2 ); ?>>Option 2</option>
		</select>

	<?php

	}


	function wpcsscodes_settings_section_callback(  ) {

		echo __( 'Enter settings below', 'wpcsscodes' );

	}


	function wpcsscodes_options_page(  ) {

		?>
		<form action='options.php' method='post'>

			<h2>WPC Settings Shortcodes</h2>

			<?php
			settings_fields( 'wpcsscodes' );
			do_settings_sections( 'wpcsscodes' );
			submit_button();
			?>

		</form>
		<?php

	}

}
