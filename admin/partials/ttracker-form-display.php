<?php 


function ttracker_display_form_page(){
	// check if user is allowed access
	 if ( !current_user_can( 'manage_options' ) ) return;
	
	?>
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <div class="container-fluid">
        <div class="panel panel-primary">
        <div class="panel-heading"><?php esc_html_e('Welcome Admin');?></div>
        <div class="panel-body">
        	<div class="container">
			  <h2><?php esc_html_e('Fill Your Track Time');?></h2>
			  <form class="form-horizontal" action="#" method="POST" id="ttracker_form">
			    <div class="form-group">
			      <label class="control-label col-sm-2" for="minutes"><?php esc_html_e('Minutes:');?></label>
			      <div class="col-sm-2">
			        <input type="number" class="form-control" min="0" id="minutes" name="minutes" required>
			      </div>
			    </div>
			     <div class="form-group">
			      <label class="control-label col-sm-2" for="hours"><?php esc_html_e('Hours:');?></label>
			      <div class="col-sm-2">
			        <input type="number" class="form-control" min="0" id="hours" name="hours" required>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-sm-offset-2 col-sm-10">
					  <select name="list_cat"class="custom-select"required>
					  	<?php
					  	// iterate innto element select list and fill in it values and lables
					  	$select_options = ttracker_options_select();
					  foreach ( $select_options as $value => $option ) {
		
		                 $selected = selected( list_cat2,$value);
		
		                 echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		              }
					  ?>
					  </select>
				  </div>
				</div>
				<?php wp_nonce_field( 'my_nonce' ); ?>
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-primary"><?php esc_html_e('Submit');?></button>
			      </div>
			    </div>
			  </form>
			</div>

        </div>
        </div>
    </div>
        <?php
 }
 // select field options
function ttracker_options_select() {
	
	return array(
		
		''               => esc_html__('Select a category','ttracker'),
		'Category A'     => esc_html__('Category A',       'ttracker'),
		'Category B'     => esc_html__('Category B',       'ttracker'),
		'Category C'     => esc_html__('Category C',       'ttracker'),
		'Category D'     => esc_html__('Category D',       'ttracker'),
		'Category E'     => esc_html__('Category E',       'ttracker'),
		'Category F'     => esc_html__('Category F',       'ttracker'),
		
	);
	
}