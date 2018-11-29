<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.example.com
 * @since      1.0.0
 *
 * @package    Ttracker
 * @subpackage Ttracker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ttracker
 * @subpackage Ttracker/public
 * @author     Hassan Boulihlt <hboulhilt@gmail.com>
 */
class Ttracker_Public {

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
		 * defined in Ttracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ttracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// //Enqueue bootsrap
		// wp_enqueue_style( 'ttracker_bootsratp_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', $this->version, 'all');
		// wp_enqueue_style( 'ttracker_bootsratp_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', $this->version, 'all');
		// //Enqueue datatable css
		// wp_enqueue_style( 'ttracker_datatables_css', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', $this->version, 'all');

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
		 * defined in Ttracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ttracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// wp_enqueue_script('ttracker_jquery_slim','https://code.jquery.com/jquery-3.0.0.slim.min.js',$this->version, true);		
		// wp_enqueue_script('ttracker_jquery_validate','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js',$this->version, true);
		// wp_enqueue_script('ttracker_datatables_js',plugin_dir_url(__FILE__).'js/jquery.dataTables.min.js',$this->version, true);
		// wp_enqueue_script( 'ttracker_custome', plugin_dir_url( __FILE__ ) . 'js/custome.js',$this->version, true );
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ttracker-admin.js', array( 'jquery' ), $this->version, true );


	}

}
