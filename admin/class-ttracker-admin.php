<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.example.com
 * @since      1.0.0
 *
 * @package    Ttracker
 * @subpackage Ttracker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ttracker
 * @subpackage Ttracker/admin
 * @author     Hassan Boulihlt <hboulhilt@gmail.com>
 */
class Ttracker_Admin {
    static $str;
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
		 * defined in Ttracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ttracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// //Enqueue bootsrap
		wp_enqueue_style( 'ttracker_bootsratp_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', $this->version, 'all');			
		//Enqueue datatable css
		wp_enqueue_style( 'ttracker_datatables_css', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', $this->version, 'all');

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ttracker-admin.css', array(), $this->version, 'all' );
		
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
		 * defined in Ttracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ttracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_script('ttracker_jquery',plugin_dir_url(__FILE__).'js/jquery-3.3.1.min.js',$this->version, true);		
		wp_enqueue_script('ttracker_jquery_validate','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js',$this->version, true);
		wp_enqueue_script('ttracker_datatables_js',plugin_dir_url(__FILE__).'js/jquery.dataTables.min.js',$this->version, true);
		wp_enqueue_script( 'ttracker_custome', plugin_dir_url( __FILE__ ) . 'js/custome.js',$this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ttracker-admin.js', array( 'jquery' ), $this->version, true );
		wp_localize_script("ttracker_custome","ttracker_ajax_url",admin_url( "admin-ajax.php"));
		/*wp_localize_script("ttracker_custome","ttracker_cat_ajax_url",admin_url( "admin-ajax.php"));*/



		




	}
	// add top-level administrative menu
	public function ttracker_menus() {
		require_once plugin_dir_path( __FILE__) .'/partials/ttracker-admin-display.php';
		require_once plugin_dir_path( __FILE__) .'/partials/ttracker-form-display.php';
		/* 
		
		add_menu_page(
			string   $page_title, 
			string   $menu_title, 
			string   $capability, 
			string   $menu_slug, 
			callable $function = '', 
			string   $icon_url = '', 
			int      $position = null 
		)
		
		*/
		$page_title = esc_html__('Time Tracker', 'ttracker-menu');
	    $menu_title = esc_html__('Time Tracker', 'ttracker-menu');
	    $capability = 'manage_options';
	    $menu_slug  = 'ttracker-menu';
	    $function   = 'ttracker_display_page';
	    $icon_url   = 'dashicons-clock';
	    $position   = null;
		
		add_menu_page(
			$page_title,
			$menu_title,
			$capability,
			$menu_slug,
			$function,
			$icon_url,
			$position
		);
		/*
	
		add_submenu_page(
			string   $parent_slug,
			string   $page_title,
			string   $menu_title,
			string   $capability,
			string   $menu_slug,
			callable $function = ''
		);
		
		*/
		$parent_slug = "ttracker-menu";
		$page_title = esc_html__("Time Tracker Form", "ttracker-menu");
		$menu_title = esc_html__("Time Tracker Form", "ttracker-menu");
		$capability = "manage_options";
		$menu_slug  = "ttracker-sub-menu";
		$function   = "ttracker_display_form_page";
		
		add_submenu_page(
			$parent_slug,
			$page_title,
			$menu_title,
			$capability,
			$menu_slug,
			$function
		);
	
		
	}
	// Ajax handler for submit form
	public function ttracker_ajax_handler(){
	
			
	                // Global daatabase parametres
			global $wpdb;
			$table_name = $wpdb->prefix.'ttracker';		
			$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
				if(!empty($param) && $param == "save_data"){
                                                // check nonce
	                                        check_ajax_referer('my_nonce');
					// retrieve data from $_request

					$minutes = isset($_REQUEST['minutes']) ? $_REQUEST['minutes'] : "";
					$hours = isset($_REQUEST['hours']) ? $_REQUEST['hours'] : "";
					$list_cat = isset($_REQUEST['list_cat']) ? $_REQUEST['list_cat'] : "";
					$total_minutes  = $hours * 60 + $minutes;

					//Insert data into table

						$wpdb->query( $wpdb->prepare( 
						"INSERT INTO $table_name
						(minutes, categories)
						VALUES (%d, %s)", $total_minutes, $list_cat) );	

				    if($wpdb->insert_id > 0){
				    	echo json_encode(array(
				    		"status"  => 1,
				    		"message" => "Values were been inserted succefully"
				    	));
				    }else{
				    	echo json_encode(array(
				    		"status" => 0,
				    		"message" => "Failed to insert values!"
				    	));
				    }		
			    }elseif(!empty($param) && $param == "delete_record" ){
                                
                                $data_main = isset($_REQUEST['id'])?intval($_REQUEST['id']):0;
                                
                                $is_exists = $wpdb->get_row(
                                        $wpdb->prepare(
                                                "SELECT * FROM $table_name WHERE main = %d",$data_main
                                                ),ARRAY_A
                                        );
                                if(!empty($is_exists)){
                                     
                                    $wpdb->delete($table_name,array(
                                        "main" => $data_main
                                          
                                            
                                    ));
                                    echo json_encode(array(
				    		"status"  => 1,
				    		"message" => "Record has deleted succefully"));
                                }else{
                                    echo json_encode(array(
				    		"status" => 0,
				    		"message" => "No Record Found!"
				    	));
                                }
                            }
		    wp_die();
	}
	/*public function ttracker_cat_ajax_handler(){
	
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
				if(!empty($param) && $param == "get_cat"){					
					// retrieve data from $_request
					self::$str =isset($_REQUEST['str'])?$_REQUEST['str']:"";
					echo self::$str;
					print_r($_REQUEST);

				}
			wp_die();

	}*/
	
	

	
}

