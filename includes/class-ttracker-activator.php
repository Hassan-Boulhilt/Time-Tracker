<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.example.com
 * @since      1.0.0
 *
 * @package    Ttracker
 * @subpackage Ttracker/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ttracker
 * @subpackage Ttracker/includes
 * @author     Hassan Boulihlt <hboulhilt@gmail.com>
 */
class Ttracker_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	
	public static function activate() {
		require_once plugin_dir_path( __FILE__ ) . 'class-ttracker-database.php';
		timetracker_create_table();
		
	}
	
}