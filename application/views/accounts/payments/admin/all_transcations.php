<!-- Begin page-container -->
<div class="page-container">
   <!-- Begin page-content-wrapper -->
   <div class="page-content-wrapper">
      <!-- Begin page-content -->
      <div class="page-content">
         <?php $message = $this->session->flashdata('success'); 
            if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
            ?>
         <div class="portlet box blue">
            <div class="portlet-title">
               <div class="caption">
                  <i class="fa fa-inr"></i>All Online Transactions
               </div>
               <a class="btn btn-primary float-end" href="<?php echo site_url("accounts/create_payment_link"); ?>" title="All Invoice"><i class="fa-solid fa-plus"></i> Create Payment Link</a>
               <!-- Show hide filter button -->
               <button  class="btn float-end me-2 p-2" title="Filter Online Transactions" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
               </button>
            </div>
         </div>
         <!-- Begin Portlet-body -->
         <div class="portlet-body">
            <!--start filter section-->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
               <form id="form-filter" class="form-horizontals mb-0">
                  <div class="actions custom_filter">
                     <div class="row">
                        <!--Calender-->
                        <div class=" col-md-4 my-2">	
                           <div class="form-group">
                              <label for="" class="control-label"><strong>Select Transactions Date: </strong></label>
                              <input type="text" autocomplete="off" class="form-control" id="daterange" name="dateRange" value="" required />
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="filter_box">
                              <label for="" class="control-label">&nbsp;</label>
                              <select class="form-control" name="" id="" required>
                                 <option value="" selected disabled>Select Transaction Type</option>
                                 <option name="filter" value="all" id="all">All</option>
                                 <option name="filter" value="1" id="approved">Success</option>
                                 <option name="filter" value="fail" id="">Success</option>
                              </select>
                           </div>
                           <!-- <strong>&nbsp; </strong><br>
                           <div class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default btn-primary custom_active"><input type="radio" name="filter" value="all" id="all"/>All</label>
                              <label class="btn btn-default btn-success custom_active"><input type="radio" name="filter" value="1" id="approved" />SUCCESS</label>
                              <label class="btn btn-default purple custom_active"><input type="radio" name="filter" value="fail" id="" />FAIL</label>
                           </div> -->
                           <input type="hidden" id="filter_val" value="" >
                           <input type="hidden" name="date_from" id="date_from" value="" >
                           <input type="hidden" name="date_to" id="date_to" value="">
                           
                        </div>
                        <div class="col-md-3 my-2">
                           <label for="" class="control-label d-block">&nbsp;</label>
                           <input type="submit" class="btn btn-success" value="Filter">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!--End filter section-->	
            <!-- Begin data-table Section -->
            <div class="bg-white p-3 rounded-4 shadow-sm">
               <div class="table-responsive">
                  <table class="table table-striped display">
                     <thead>
                        <tr>
                           <th> # </th>
                           <th> ORDER ID</th>
                           <th> Lead Id </th>
                           <th> Name </th>
                           <th> Contact </th>
                           <th> Email </th>
                           <th> Tra. ID </th>
                           <th> Amount </th>
                           <th> Status</th>
                           <th> Tra. Date</th>
                           <th> Action </th>
                        </tr>
                     </thead>
                     <tbody>
                     <div id="res"></div>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- End data-table Section -->
         </div>
         <!-- End Portlet-body -->
      </div>
      <!-- End page-content -->
   </div>
   <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
   jQuery(document).ready(function($){
   	//$(".table").DataTable();
   	//Date range
   	$("#daterange").daterangepicker({
   		locale: {
   		  format: 'YYYY-MM-DD'
   		},
   		autoUpdateInput: false,
   		showDropdowns: true,
   		minDate: new Date(2016, 10 - 1, 25),
   		//singleDatePicker: true,
   		ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
           },
   	},
   	
   	function(start, end, label) {
   		$('#daterange').val( start.format('D MMMM, YYYY') + ' to ' +  end.format('D MMMM, YYYY'));
   		$("#date_from").attr( "data-date_from", start.format('YYYY-MM-DD') );
   		$("#date_to").attr( "data-date_to", end.format('YYYY-MM-DD') );
   		$("#todayStatus").val("");
   		console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
   	});
   	
   	//data table
   	var table;
   	var tableFilter;
   		//Custom Filter
   		$("#form-filter").validate({
   			rules: {
                   filter: {required: true},
                   dateRange: {required: true},
               },
   		});
   		$("#form-filter").submit(function(e){
   			e.preventDefault();
   			table.ajax.reload(null,true);
   		});
   		
   		$(document).on("change", 'input[name=filter]:radio', function() {
   			var filter_val = $(this).val();
   			$("#filter_val").val( filter_val );
   			//console.log(filter_val);
   		});
   		
   		//Get all itineraries by agent 
   		$(document).on("change", '#sales_user_id', function() {
   			table.ajax.reload(null,true);
   		});
   		
   		//On page loaddatatables
   		table = $('.table').DataTable({ 
   		"aLengthMenu": [[10,25, 50, 100, -1], [10, 25, 50, 100, 'All']],
   		"processing": true, //Feature control the processing indicator.
   		"serverSide": true, //Feature control DataTables' server-side processing mode.
   		"order": [], //Initial no order.
   		"createdRow": function( row, data, dataIndex){
   			//console.log( dataIndex );
   			/*var iti_status = data.slice(-1)[0];
   			
   			if( iti_status ==  'NOT PROCESS')
   				$(row).addClass('yellow_row');
   			else if( iti_status ==  'APPROVED' )
   				$(row).addClass('green_row');	
   			else if( iti_status ==  'DECLINED' )
   				$(row).addClass('red_row');	
   			if( iti_status ==  'ON HOLD')
   				$(row).addClass('hold_row');	*/
   		},
   		language: {
   			search: "<strong>Search By Order ID/Customer:</strong>",
   			searchPlaceholder: "Search..."
   		},
   		// Load data for the table's content from an Ajax source
   		"ajax": {
   			"url": "<?php echo site_url('accounts/ajax_all_online_transactions')?>",
   			"type": "POST",
   			"data": function ( data ) {
   				data.filter 	= $("#filter_val").val();
   				data.date_from 		= $("#date_from").attr("data-date_from");
   				data.date_to 		= $("#date_to").attr("data-date_to");
   			},
   			beforeSend: function(){
   				console.log("sending....");
   			}
   		},
   		//Set column definition initialisation properties.
   		"columnDefs": [
   		{ 
   			"targets": [ 0 ], //first column / numbering column
   			"orderable": false, //set not orderable
   		},
   		],
   
   	});
   	  
   });
</script>