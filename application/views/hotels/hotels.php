<!-- Begin page-container -->
<div class="page-container">
	<!-- Begin page-content-wrapper -->
	<div class="page-content-wrapper">
		<!-- Begin page-content -->
		<div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"> <i class="fa-solid fa-hotel"></i> All Hotels </div>
					<a class="btn btn-primary float-end" href="<?php echo site_url("hotels/add"); ?>" title="add hotel"><i class="fa-solid fa-plus"></i> Add Hotel</a>
					
					<!-- Show hide filter button -->
                    <button  class="btn float-end me-2 p-2" title="Filter" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
				</div>
			</div>	
			<!--Show success message if hotel edit/add -->
			<?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
			?>
			<!-- Begin portlet-body -->
			<div class="portlet-body">
				<!-- Begin filter_collapse -->
				<div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
					<form id="form-filter" class="form-horizontal mb-0">
						<div class="actions custom_filter form-inline">
							<!--strong>Filter: </strong-->
							<div class="row" data-toggle="buttons">
								<!--label class="control-label">Select State*</label-->
								<div class="col-md-3 my-2">
									<select title="Select State" data-toggle="tooltip" required name="state" class="form-control state form-select">
										<option value="">Choose state</option>
										<?php $states = get_indian_state_list();
										if($states){
											foreach( $states as $s ){
												echo '<option value="'. $s->id . '">' . $s->name . '</option>';
											}
										}
										?>
									</select>
								</div>
								<!--label class="control-label">Select City*</label-->
								<div class="col-md-3 my-2">
									<select required title="Select City form-select" data-toggle="tooltip" name="city" class="form-control city">
										<option value="">Select City</option>
									</select>
								</div>
								<!--label class="control-label">Select Hotel Category*</label-->
								<div class="col-md-3 my-2">
									<select required title="Select Hotel Category form-select"  name="hotel_cat" class="form-control hotel_cat">
										<option value="all">All category</option>
										<?php $h_category = hotel_categories();
										if($h_category){
											foreach( $h_category as $cat ){
												echo '<option value="'. $cat->id . '">' . $cat->name . '</option>';
											}
										}
										?>
									</select>
								</div>
								<!--End-->
								<div class="col-md-3 my-2">
									<input type="hidden" id="city_id" value="" />
									<input type="hidden" id="hotel_cat" value="all" />
									<input type="submit" class="btn btn-success" value="Filter">
									<input type="button" class="btn btn-success clearFilter" value="Clear Filter">
								</div>
							</div>	
						</div>
					</form>
				</div> 
				<!-- End filter_collapse -->

				<!-- Begin demo table design -->
			<div class="bg-white p-3 rounded-4 shadow-sm mb-4">
				<div class="table-responsive">
					<table class="table data-table-large">
						<tbody>
							<tr>
								<td class="tour_thumbnail">
									<div>
										<a href="#" title="wwww.SnowPeakRetreatCottagesManali">
											<img src="./site/images/snowpeakresort.jpg" class="img-thumbnail">
										</a>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100 ">
											<p class="fs-7 mb-2 mt-0"> 
												<strong class="d-block mb-1">Snow Peak Retreat & Cottages Manali</strong> 
												<span class="fs-8 fw-500 text-secondary">Hotel Name</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Hotel Category</p>
												<div class="badge bg-dark-purpule">
													<strong>3 <i class="fa-solid fa-star"></i></strong>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="w-100 d-flex justify-content-between">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Himachal Pradesh</strong>
													<span class="fs-8 fw-500 text-secondary">Hotel State</span>
												</p>
											</div>
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Manali</strong>
													<span class="fs-8 fw-500 text-secondary">Hotel City</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 08988225521 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> info@snowpeakretreatmanali.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
										<div class="px-2">
											<address class="fs-7 mb-1 mt-0 fw-bold">
												Near Hadimba Devi Temple Nasogi village, road, Manali, Himachal Pradesh 175131
											</address>
											<!-- <span class="fs-8 fw-500 text-secondary">Hotel City</span> -->
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Rooms Categories</span>
											<span class="badge bg-info"><strong>Deluxe</strong></span>
											<span class="badge bg-yellow-soft"><strong>Super Deluxe</strong></span>
											<span class="badge bg-yellow-gold"><strong>Luxury</strong></span>
										</div>
									</div>
								</td>
								<td>
									<div class="dropdown">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td class="tour_thumbnail">
									<div>
										<a href="#" title="wwww.holidayheavenmanali">
											<img src="./site/images/holidayheavenmanali.jpg" class="img-thumbnail">
										</a>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100 ">
											<p class="fs-7 mb-2 mt-0"> 
												<strong class="d-block mb-1">Hotel Holiday Heaven Manali</strong> 
												<span class="fs-8 fw-500 text-secondary">Hotel Name</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Hotel Category</p>
												<div class="badge bg-dark-purpule">
													<strong>4 <i class="fa-solid fa-star"></i></strong>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="w-100 d-flex justify-content-between">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Himachal Pradesh</strong>
													<span class="fs-8 fw-500 text-secondary">Hotel State</span>
												</p>
											</div>
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Manali</strong>
													<span class="fs-8 fw-500 text-secondary">Hotel City</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 7018207025 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> info@hotelholidayheavenmanali.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
										<div class="px-2">
											<address class="fs-7 mb-1 mt-0 fw-bold">
												Near Club House Gulaba Nasogi village, road, Manali, Himachal Pradesh 177845
											</address>
											<!-- <span class="fs-8 fw-500 text-secondary">Hotel City</span> -->
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Rooms Categories</span>
											<span class="badge bg-danger"><strong>Standard</strong></span>
											<span class="badge bg-info"><strong>Deluxe</strong></span>
											<span class="badge bg-yellow-gold"><strong>Luxury</strong></span>
											<span class="badge bg-dark-purpule"><strong>Super Luxury</strong></span>
										</div>
									</div>
								</td>
								<td>
									<div class="dropdown">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>            
			<!-- End end demo table design -->

				<!-- Begin data-table section -->
				<div class="table-responsive bg-white p-3 rounded-4 shadow-sm">
					<table id="hotels" class="table table-striped display white_space_fix">
						<thead>
							<tr>
								<th> # </th>
								<th> Hotel Name</th>
								<th> Category </th>
								<th> State </th>
								<th> City </th>
								<th> Address </th>
								<th> Email </th>
								<th> Contact </th>
								<th> Action </th>
								
							</tr>
						</thead>
						<tbody>
							<!--Get datatable-->
						</tbody>
					</table>
				</div>
				<!-- End data-table section -->
			</div>
			<!-- End portlet-body -->
		</div>
		<!-- End page-content -->
	</div>
	<!-- End page-content-wrapper -->
</div>
<!-- END page-container -->



<!-- Modal -->
 <script type="text/javascript">
 jQuery(document).ready(function($){
	/*get cities from state*/
	$(document).on('change', 'select.state', function() {
        var selectState = $(".state option:selected").val();
		var _this = $(this);
		_this.parent().append('<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
		$.ajax({
            type: "POST",
            url: "<?php echo base_url('AjaxRequest/hotelCityData'); ?>",
            data: { state: selectState } 
        }).done(function(data){
			$(".bef_send").hide();
            $(".city").html(data);
			$(".city").removeAttr("disabled");
		}).error(function(){
			$("#city_list").html("Error! Please try again later!");
		});
    });
  });
	
 </script>
<script type="text/javascript">
jQuery(document).ready(function($){
	$(document).on("click", ".ajax_delete_hotel", function(){
		var hotel_id = $(this).attr("data-id");
		if (confirm("Are you sure?")) {
			$.ajax({
				url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_deleteHotel?id=" + hotel_id,
				type:"GET",
				data:hotel_id,
				dataType: "json",
				cache: false,
				success: function(r){
					if(r.status = true){
						location.reload();
					  //console.log("ok" + r.msg);
					}else{
						alert("Error! Please try again.");
					}
				}
			});	
		}   
	});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	var table;
	
	//on change city
	$(document).on('change', 'select.city', function() {
		var filter_val = $(this).val();
		$("#city_id").val(filter_val);
	});
	
	//Clear filter
	$(document).on('click', '.clearFilter', function(e) {
		e.preventDefault();
		$("#hotel_cat").val("all");
		$('#city_id, .city, .state').val("");
		table.ajax.reload(null,true);
	});
	
	
	//on change Hotel Category
	$(document).on('change', 'select.hotel_cat', function() {
		var filter_val = $(this).val();
		$("#hotel_cat").val(filter_val);
	});
	//Filter submit
	$("#form-filter").validate();
	$("#form-filter").submit(function(e){
		console.log( $("#hotel_cat").val() );
		e.preventDefault();
		table.ajax.reload(null,true);
	});
		
    //data tables
    table = $('#hotels').DataTable({ 
		"aLengthMenu": [[10,25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		language: {
			search: "<strong>Search By Hotel Name/Address:</strong>",
			searchPlaceholder: "Search..."
		},
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hotels/ajax_hotel_list')?>",
            "type": "POST",
			"data": function ( data ) {
				data.city = $('#city_id').val();
				data.hotel_cat = $('#hotel_cat').val();
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