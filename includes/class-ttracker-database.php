<?php // TimeTracker - Database settings


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


$data_version = '1.0';
function timetracker_create_table(){
	       require_once plugin_dir_path( __FILE__ ) . 'class-ttracker-table.php';
			global $wpdb;
			// require our file that conatin the function dbDelta() to create our table
			require_once( ABSPATH. 'wp-admin/includes/upgrade.php');
			$table_name = TtrackerTable::return_name_table();
		    
		    $data_version = 1.0;
	    	// Create our table
	    	$query = "CREATE TABLE $table_name (
			 main int(11) NOT NULL AUTO_INCREMENT,
			 categories varchar(255) NOT NULL,
			 minutes varchar(255) NOT NULL,
			 created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			 PRIMARY KEY (main)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8";
			dbDelta( $query );
		     // add optional version of our table for next updates if necessary
		     add_option('ttracker_version','$data_version');	
}
function timetracker_remove_table() {
	        require_once plugin_dir_path( __FILE__ ) . 'class-ttracker-table.php';
		     global $wpdb;
		     $table_name = TtrackerTable::return_name_table();
		     $query = "DROP TABLE IF EXISTS $table_name";
		     $wpdb->query($query);
		     delete_option("$data_version");
}
