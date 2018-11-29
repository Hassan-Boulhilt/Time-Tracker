<?php


 class TtrackerTable {
	public static function return_name_table(){
		global $wpdb;
		return $wpdb->prefix."ttracker"; // return table ttracker
	}
}