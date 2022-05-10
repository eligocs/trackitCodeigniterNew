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
						<i class="fa-solid fa-taxi"></i> All Cab Bookings
					</div>
					<a class="btn btn-primary float-end" href="<?php echo site_url("itineraries"); ?>" title="Book Vehicle"><i class="fa-solid fa-taxi"></i> Book Cab</a>

					<!-- Show hide filter button -->
					<button  class="btn float-end me-2 p-2 " title="Filter Cab Bookings" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
						<i class="fa-solid fa-filter fs-5"></i>
					</button>
				</div>
			</div>
			<!--Begin filter section-->
			<div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
				<form id="form-filter" class="form-horizontal">
					<div class="actions row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Filter: </label>
								<input type="text" autocomplete="off" class="form-control" id="daterange" name="dateRange" title="Travel date filter" placeholder='Travel date' />
								<input type="hidden" name="date_from" id="date_from">
								<input type="hidden" name="date_to" id="date_to">
							</div>
						</div>
						<div class="col-md-8">
							<div class="radio_filter_btns" data-toggle="buttons">
								<label for="" class="control-label d-block">&nbsp;</label>
								<label class="btn btn-default custom_active active"><input type="radio" name="filter" value="all" checked="checked" id="all"/>All</label>
								<label class="btn btn-default custom_active"><input type="radio" name="filter" value="upcomming" id="upcomming" />Upcomming</label>
								<label class="btn btn-default custom_active"><input type="radio" name="filter" value="past" id="past" />Past</label>
								<label class="btn btn-default custom_active"><input type="radio" name="filter" value="approved" id="approved" />Approved</label>
								<label class="btn btn-default custom_active"><input type="radio" name="filter" value="declined" id="declined" />Declined</label>
								<label class="btn btn-default custom_active"><input type="radio" name="filter" value="cancel" id="cancel" />Cancel</label>
								<label class="btn btn-default custom_active"><input type="radio" name="filter" value="pending" id="pending" />Pending</label>
								<!--label class="btn btn-default custom_active"><input type="radio" name="filter" value="pending_gm" id="pending_gm" />Pending GM</label-->
							</div>
						</div>
					</div>
					<input type="hidden" name="filter_val" id="filter_val" value="all">
				</form><!--End filter section-->	
			</div>
			<!-- End filter section -->
			
			<!-- Begin Portlet-body -->
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<div class="table-responsive">
					<table id= "vehicles_booking" class="table table-striped display">
						<thead>
							<tr>
								<th> # </th>
								<th> Booking ID </th>
								<th> Itinerary ID </th>
								<th> Transporter Name </th>
								<th> Cab Catergory</th>
								<th> Total Cabs</th>
								<th> Travel Date </th>
								<th> Total Cost </th>
								<th> Sent Status</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<!--datatables goes here-->
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- End page-content -->
	</div>
	<!-- End page-content-wrapper -->
</div>
<!-- End page-container -->


<div id="myModal" class="modal" role="dialog"></div>
<!-- Modal -->
<script type="text/javascript">
	jQuery(document).ready(function($){
	$(document).on("click",".ajax_delete_booking",function(){
		var id = $(this).attr("data-id");
		if (confirm("Are you sure?")) {
			$.ajax({
				url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_delete_cab_booking?id=" + id,
				type:"GET",
				data:id,
				dataType: 'json',
				cache: false,
				success: function(r){
					if(r.status = true){
						location.reload();
						console.log("ok")
					}else{
						alert("Error! Please try again.");
					}
				},
			});	
		}   
	});
});
jQuery(document).ready(function($){
	var ajaxReq;
	$(document).on("click", ".ajax_booking_status", function(){
		var iti_id = $(this).attr("data-id");
		if (ajaxReq) {
				ajaxReq.abort();
			}
			ajaxReq = $.ajax({
			url: "<?php echo base_url(); ?>" + "AjaxRequest/cab_booking_status",
			type:"POST",
			data:{ id: iti_id },
			dataType: "json",
			cache: false,
			beforeSend: function(){
				/*console.log("Please wait.......");*/
			},
			success: function(r){
				if(r.status = true){
					$( "#myModal" ).html('<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">Close</button><h4 class="modal-title"> '  + r.s +' </h4></div><div class="modal-body"> <p>' + r.data + '</p></div><div class="modal-footer"></div></div></div>').fadeIn();
					//console.log("ok" + r.data);
				}else{
					console.log("Error.......");
				}
			},
			error: function(){
				console.log("error");
			}
		});
	});
	jQuery(document).on("click", ".close",function(){
		jQuery("#myModal").fadeOut();
	});
});
</script>
<script type="text/javascript">
	var table;
	$(document).ready(function() {
		$("#daterange").daterangepicker({
		locale: {
			format: 'YYYY-MM-DD'
		},
		showDropdowns: true,
		minDate: new Date(2016, 10 - 1, 25),
		//singleDatePicker: true,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'Next 30 Days': [moment(), moment().add(30, 'days')],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
				.endOf('month')
			],
			'Last Three Month': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1,
				'month').endOf('month')],
		},
		autoUpdateInput: false,            
	},
	function(start, end, label) {
		$('#daterange').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
		//$('#daterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		$("#date_from").val(start.format('YYYY-MM-DD'));
		$("#date_to").val(end.format('YYYY-MM-DD'));            
		table.ajax.reload(null,true); 
	});
	//Custom Filter
	$(document).on("change", 'input[name=filter]:radio', function() {
		var filter_val = $(this).val();
		$("#filter_val").val( filter_val );
		table.ajax.reload(null,true); 
	});
	
    //datatables
    table = $('#vehicles_booking').DataTable({ 
		"aLengthMenu": [[10,25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		language: {
			search: "<strong>Search By Itinerary ID:</strong>",
			searchPlaceholder: "Search..."
		},
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('vehiclesbooking/ajax_cab_booking_list')?>",
            "type": "POST",
			"data": function ( data ) {
				data.filter = $("#filter_val").val();
				data.date_from = $("#date_from").val();
   				   data.date_to = $("#date_to").val();
			} 
			// ajax error
				/* error: function(jqXHR, textStatus, errorThrown){
				  console.log(jqXHR);
				  console.log(textStatus);
				  console.log(errorThrown);
				} */
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