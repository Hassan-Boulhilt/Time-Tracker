<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.example.com
 * @since      1.0.0
 *
 * @package    Ttracker
 * @subpackage Ttracker/admin/partials
 */


//This file should primarily consist of HTML with a little bit of PHP. -->
// display the records page

function ttracker_display_page() {
	//require_once plugin_dir_path(__FILE__).'../class-ttracker-admin.php';	
	// check if user is allowed access
	 if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
     
	
	
		
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		
	    
        <?php ttracker_get_total_minutes();?><br />

                                          <!--<select name="list_cat2" id="list_cat2">
                                          
                      					  	
                      					  	$select_options = ttracker_options_select_cat();
                      					  	
                      					  foreach ( $select_options as $value => $option ) {
                      		
                      		                 $selected = selected( list_cat2,$value);
                      		                 
                      		
                      		                 echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
                      		              }	              
                      					 
                                           echo'</select>'; -->
                       
                     <?php
                    
                    echo'<div class ="list_cat">';	
	                    echo'<div class ="list_cat1">';	
							echo "<div>";esc_html__(ttracker_get_total_minutes_cat('Category A'));echo "</div>";
							echo "<div>";esc_html__(ttracker_get_total_minutes_cat('Category B'));echo "</div>";
							echo "<div>";esc_html__(ttracker_get_total_minutes_cat('Category C'));echo "</div>";
							
						echo'</div>';
						echo'<hr>';
						echo'<div class ="list_cat2">';
						    echo "<div>";esc_html__(ttracker_get_total_minutes_cat('Category D'));echo "</div>";
							echo "<div>";esc_html__(ttracker_get_total_minutes_cat('Category E'));echo "</div>";
							echo "<div>";esc_html__(ttracker_get_total_minutes_cat('Category F'));echo "</div>";
							
						echo'</div>';
                    echo'</div>';
                     ?>
        
        <div class="panel panel-primary">
				      <div class="panel-heading">TOTAL MINUTES / MONTHS / YEARS</div>
				        <div class="panel-body">
				    	<table id="example1" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>	            	
					                <th><?php esc_html_e('Years');?></th>
					                <th><?php esc_html_e('Jan');?></th>
                                                        <th><?php esc_html_e('Feb');?></th>
                                                        <th><?php esc_html_e('Mar');?></th>
                                                        <th><?php esc_html_e('Apr');?></th>
                                                        <th><?php esc_html_e('May');?></th>
					                <th><?php esc_html_e('Jun');?></th>	
					                <th><?php esc_html_e('Jul');?></th>
                                                        <th><?php esc_html_e('Aug');?></th>
                                                        <th><?php esc_html_e('Sep');?></th>
                                                        <th><?php esc_html_e('Oct');?></th>
                                                        <th><?php esc_html_e('Nov');?></th>
                                                        <th><?php esc_html_e('Dec');?></th>
                                                        <th><?php esc_html_e('Total');?></th>
                                                        <th><?php esc_html_e('Action');?></th>
					        </tr>
				        </thead>
				        <tbody>
			            <?php
			            // Fetch data from table about minutes per month and year

				            global $wpdb;
							$table = $wpdb->prefix.'ttracker';
//							$query = "SELECT YEAR(created_at), MONTHNAME(created_at), SUM(minutes) 
//						    FROM $table
//						    GROUP BY YEAR(created_at), MONTH(created_at)";
                                                        $query = "SELECT 
                                                                            
                                                                            SUM(IF(month = 'Jan', minutes, 0)) AS 'Jan',
                                                                            SUM(IF(month = 'Feb', minutes, 0)) AS 'Feb',
                                                                            SUM(IF(month = 'Mar', minutes, 0)) AS 'Mar',
                                                                            SUM(IF(month = 'Apr', minutes, 0)) AS 'Apr',
                                                                            SUM(IF(month = 'May', minutes, 0)) AS 'May',
                                                                            SUM(IF(month = 'Jun', minutes, 0)) AS 'Jun',
                                                                            SUM(IF(month = 'Jul', minutes, 0)) AS 'Jul',
                                                                            SUM(IF(month = 'Aug', minutes, 0)) AS 'Aug',
                                                                            SUM(IF(month = 'Sep', minutes, 0)) AS 'Sep',
                                                                            SUM(IF(month = 'Oct', minutes, 0)) AS 'Oct',
                                                                            SUM(IF(month = 'Nov', minutes, 0)) AS 'Nov',
                                                                            SUM(IF(month = 'Dec', minutes, 0)) AS 'Dec',
                                                                            SUM(minutes) AS total_yearly,
                                                                            YEAR as year
                                                                            FROM (
                                                                        SELECT DATE_FORMAT(created_at, '%b') AS month, SUM(minutes) as minutes,YEAR(created_at) as year
                                                                        FROM $table
                                                                        WHERE created_at <= NOW() and created_at >= Date_add(Now(),interval - 12 month)
                                                                        GROUP BY DATE_FORMAT(created_at, '%m-%Y')) as sub";
                                                        
						    $results = $wpdb->get_results( $query ,ARRAY_A);
                                                    
						    if(count($results) > 0){
                                                        
                                                        foreach ($results as $key => $value){
                                                         ?>
                                                                               <tr>
                                                                                            <th><?php echo$value['year'];?></th>
                                                                                            <th><?php echo$value['Jan'];?></th>
                                                                                            <th><?php echo$value['Feb'];?></th>
                                                                                            <th><?php echo$value['Mar'];?></th>
                                                                                            <th><?php echo$value['Apr'];?></th>
                                                                                            <th><?php echo$value['May'];?></th>
                                                                                            <th><?php echo$value['Jun'];?></th>	
                                                                                            <th><?php echo$value['Jul'];?></th>
                                                                                            <th><?php echo$value['Aug'];?></th>
                                                                                            <th><?php echo$value['Sep'];?></th>
                                                                                            <th><?php echo$value['Oct'];?></th>
                                                                                            <th><?php echo$value['Nov'];?></th>
                                                                                            <th><?php echo$value['Dec'];?></th>
                                                                                            <th><?php echo$value['total_yearly'];?></th>
                                                                                            <td id="btncen"><a href="#"class="btn btn-danger">Delete</a></td>	                
                                                                                 </tr>



                                                                                 <?php
                                                                         }

                                                                 }else{
                                                                         echo"<h3>No Records Were Found</h3>";
                                                                     }

          

			            ?>
			            </tbody>
					        <tfoot>
					            <tr>	            	
					               <th><?php esc_html_e('Years');?></th>
					                <th><?php esc_html_e('Jan');?></th>
                                                        <th><?php esc_html_e('Feb');?></th>
                                                        <th><?php esc_html_e('Mar');?></th>
                                                        <th><?php esc_html_e('Apr');?></th>
                                                        <th><?php esc_html_e('May');?></th>
					                <th><?php esc_html_e('Jun');?></th>	
					                <th><?php esc_html_e('Jul');?></th>
                                                        <th><?php esc_html_e('Aug');?></th>
                                                        <th><?php esc_html_e('Sep');?></th>
                                                        <th><?php esc_html_e('Oct');?></th>
                                                        <th><?php esc_html_e('Nov');?></th>
                                                        <th><?php esc_html_e('Dec');?></th>
                                                        <th><?php esc_html_e('Total');?></th>
                                                        <th><?php esc_html_e('Action');?></th>           
					            </tr>					          
					        </tfoot>
					    </table>
					    </div>
				    </div>					    
					
        
                    <div class="panel panel-primary">
				      <div class="panel-heading">TOTAL MINUTES / MONTH / YEAR</div>
				        <div class="panel-body">
				    	<table id="example2" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>	            	
					                <th><?php esc_html_e('Year');?></th>
					                <th><?php esc_html_e('Month');?></th>
					                <th><?php esc_html_e('Minutes');?></th>	
					                <th><?php esc_html_e('Action');?></th>	           
					        </tr>
				        </thead>
				        <tbody>
			            <?php
			            // Fetch data from table about minutes per month and year

				            global $wpdb;
							$table = $wpdb->prefix.'ttracker';
							$query = "SELECT YEAR(created_at), MONTHNAME(created_at), SUM(minutes) 
						    FROM $table
						    GROUP BY YEAR(created_at), MONTH(created_at)";
						    $results = $wpdb->get_results( $query ,ARRAY_A);
						    if(count($results) > 0){
	            	               foreach ($results as $key => $value){
	            	               	?>
					            		<tr>
							            	<td><?php echo $value['YEAR(created_at)']?></td>
							                <td><?php echo $value ['MONTHNAME(created_at)']?></td>    
							                <td><?php echo $value['SUM(minutes)']?></td>
							                <td id="btncen"><a href="#"class="btn btn-danger">Delete</a></td>	                
						                </tr>



					            		<?php
					                }

					        }else{
						        echo"<h3>No Records Were Found</h3>";
						    }
	            
          

			            ?>
			            </tbody>
					        <tfoot>
					            <tr>	            	
					                <th><?php esc_html_e('Year');?></th>
					                <th><?php esc_html_e('Month');?></th>
					                <th><?php esc_html_e('Minutes');?></th>	
					                <th><?php esc_html_e('Action');?></th>	           
					            </tr>					          
					        </tfoot>
					    </table>
					    </div>
				    </div>
					    
					<div class="panel panel-primary">
				    <div class="panel-heading">List of Hours</div>
				    <div class="panel-body">

		
	<table id="example3" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	            <tr>
	            	<th><?php esc_html_e('Main');?></th>
	                <th><?php esc_html_e('Categories');?></th>
	                <th><?php esc_html_e('Hour / Minutes');?></th>
	                <th><?php esc_html_e('Date Created');?></th>
	                <th><?php esc_html_e('Action');?></th>	                
	            </tr>
	        </thead>
	        <tbody>
            <?php
            // fetch data from table about categories and minutes and hours 
            global $wpdb;
            $table = $wpdb->prefix.'ttracker';
            $total_records = $wpdb->get_results("SELECT * FROM $table Order by main desc",ARRAY_A);
            if(count($total_records) > 0){
            	foreach ($total_records as $key => $value){
            		?>
            		<tr>
		            	<td><?php echo $value['main']?></td>
		                <td><?php echo $value['categories']?></td>
		                <td><?php echo sprintf("%02d", floor($value['minutes']/60))." h : ".sprintf("%02d",($value['minutes']%60))." m"?>&nbsp;&nbsp;<?php echo"(". $value['minutes']." m)" ?></td>
		                <td><?php echo $value['created_at']?></td>
		                <td id="btncen"><a href="#" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<a href="#"class="btn btn-danger ttraccker_del_btn" data-id="<?php echo $value['main']; ?>">Delete</a></td>	                
	                </tr>
            		<?php
                }

            }else{
            	echo"<h3>No Records Were Found</h3>";
            }
            
            ?>
	        </tbody>
	        <tfoot>
	            <tr>	            	
	                <th><?php esc_html_e('Main');?></th>
	                <th><?php esc_html_e('Categories');?></th>
	                <th><?php esc_html_e('Hour / Minutes');?></th>
	                <th><?php esc_html_e('Date Created');?></th>
	                <th><?php esc_html_e('Action');?></th>	           
	            </tr>
	        </tfoot>
	    </table>
    </div>
	</div>
		

        <?php
}
// Select a column and retieve the total minutes
function ttracker_get_total_minutes() {

	global $wpdb;
	$table = $wpdb->prefix.'ttracker';

	$query = "SELECT SUM(minutes) FROM $table WHERE MONTH(`created_at`)=MONTH( CURRENT_DATE )";

	$results = $wpdb->get_results( $query ,ARRAY_A);


	// display the results

	if ( null !== $results) {

		
		foreach ($results as $key=>$value):
			if($value['SUM(minutes)']){
				echo "<div class=titlem>Total Minutes This Month: ".$value['SUM(minutes)']."</div>";
			} else {
			   echo'<div class=titlem>No Records Yet.</div>';
			 }		
		endforeach;
	}

	

}
// Select a column and retieve the total minutes for categories
function ttracker_get_total_minutes_cat($cat) {
     
	global $wpdb;
	$table = $wpdb->prefix.'ttracker';
	$results = $wpdb->get_var( $wpdb->prepare( 
	"
		SELECT sum(minutes) 
		FROM $table 
		WHERE categories = %s
	", 
	$cat) );

	// display the results

	if ( null !== $results ) {		
		esc_html_e("$cat: ".$results." minutes.");
	} else {
		esc_html_e($cat.': No Records Yet.');
	}
}
// Fetch data from table about minutes per month and year

/*function ttracker_get_total_minutes_per_month(){
	global $wpdb;
	$table = $wpdb->prefix.'ttracker';
	$query = "SELECT YEAR(created_at), MONTHNAME(created_at), SUM(minutes) 
    FROM $table
    GROUP BY YEAR(created_at), MONTH(created_at)";
    $results = $wpdb->get_results( $query ,ARRAY_A);

    print_r($results);
}*/
// Schedule the interval before cleaning the entire table
/*function add_schedule_event_truncate_table(){
	    $time = true;
		global $wpdb;
		$table_name = $wpdb->prefix.'ttracker';
		$wpdb->query( 
		"CREATE EVENT IF NOT EXISTS monthly
        ON SCHEDULE        
        EVERY 10 MINUTE
        STARTS CURRENT_TIMESTAMP -- Time to start
        COMMENT 'Truncate Table After A Month'
        DO
        TRUNCATE $table_name");
	}*/
	/*function alter_schedule_event_truncate_table(){
	  
		global $wpdb;
		//$table_name = $wpdb->prefix.'ttracker';
		$wpdb->query( 
		"ALTER EVENT monthly
          DISABLE");
	}
	
		 //add_schedule_event_truncate_table();
		 alter_schedule_event_truncate_table();*/
  
    

	/*// select field options
function ttracker_options_select_cat() {
	
	return array(
		
		''               => esc_html__('Select a category','ttracker'),
		'Category A'     => esc_html__('Category A',       'ttracker'),
		'Category B'     => esc_html__('Category B',       'ttracker'),
		'Category C'     => esc_html__('Category C',       'ttracker'),
		'Category D'     => esc_html__('Category D',       'ttracker'),
		'Category E'     => esc_html__('Category E',       'ttracker'),
		'Category F'     => esc_html__('Category F',       'ttracker'),
		'Category G'     => esc_html__('Category G',       'ttracker'),
		
	);

}*/
