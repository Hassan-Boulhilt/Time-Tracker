<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://www.example.com
 * @since      1.0.0
 *
 * @package    Ttracker
 * @subpackage Ttracker/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ttracker
 * @subpackage Ttracker/includes
 * @author     Hassan Boulihlt <hboulhilt@gmail.com>
 */
  
class Ttracker_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	public static function deactivate() {
		require_once plugin_dir_path( __FILE__ ) . 'class-ttracker-database.php';
		timetracker_remove_table();
	}

}
