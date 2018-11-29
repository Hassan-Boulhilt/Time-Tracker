$(document).ready(function() {
    $('#example1').DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
    // delete a record fromtable list
    
    $('#ttracker_form').validate({
        submitHandler: function() {
            // save our hours and minutes and catgeries into variable data
            var data = $('#ttracker_form').serialize() + "&action=ttracker_request&param=save_data";
            //console.log(data)
            $.post(ttracker_ajax_url, data, function(response) {
                // retrieve the response passed from function ttracker_ajax_handler() in class-ttracker-admin acrosse server
                var data_response = $.parseJSON(response);
                // if sucess 
                if (data_response.status == 1) {
                    //alert ok
                    alert(data_response.message);

                } else {
                    // else failed
                    alert(data_response.message);

                }
                // reload the page
                location.reload();
                // reset form
                $('#ttracker_form').each(function() {
                    this.reset();
                });
            });

        }
    });
    
    // /* $('#list_cat2').change(function(event) {
    //   	var str = $('#list_cat2').val();
    //   	  /* Act on the event */
    //   	     var data_cat = "str="+str+"&action=ttracker_req_cat&param=get_cat";

    //   	     $.post( ttracker_cat_ajax_url, data_cat, function (response){
    //   	     		console.log(response);

    //   	   });
    //     });*/ 

});