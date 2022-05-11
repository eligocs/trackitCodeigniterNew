<!-- Begin page-container -->
<div class="page-container">
	<!-- Begin page-content-wrapper -->
	<div class="page-content-wrapper">
		<!-- Begin page-content -->
		<div class="page-content">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
			?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-users"></i>All Confirmed Vouchers
					</div>
				</div>
			</div>

			<!-- Begin demo table design -->
			<div class="bg-white p-3 rounded-4 shadow-sm mb-4">
				<div class="table-responsive">
					<table class="table data-table-large">
						<tbody>
							<tr>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100 ">
											<div class="requirment d-flex justify-content-between">
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block mb-1">#5331</strong> 
													<span class="fs-8 fw-500 text-secondary">Iti ID</span>
												</p>
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block mb-1">VOU00-8</strong> 
													<span class="fs-8 fw-500 text-secondary">Voucher ID</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Tour Type</p>
												<div class="badge bg-success">
													<strong>Holiday</strong>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="w-100">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Rammohan Bachu</strong>
													<span class="fs-8 fw-500 text-secondary">Customer Name</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 08988225521 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> rammohanbachu@gmail.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
										<div class="px-2">
											<p class="fs-7 mb-2 mt-0 ">
												<strong class="d-block mb-1">Shimla-Manali Ex Delhi</strong>
												<span class="fs-8 fw-500 text-secondary">Package Name</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Agent</span>
											<a class="text-primary fw-bold" href="" title="View Agent">Mukesh Sharma</a>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">17 March, 2022</strong> 
											<span class="fs-8 fw-500 text-secondary">Travel Date</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-plus"></i> Generate Voucher
											</button>
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
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100 ">
											<div class="requirment d-flex justify-content-between">
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block mb-1">#5729</strong> 
													<span class="fs-8 fw-500 text-secondary">Iti ID</span>
												</p>
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block mb-1">VOU00-9	</strong> 
													<span class="fs-8 fw-500 text-secondary">Voucher ID</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Tour Type</p>
												<div class="badge bg-success">
													<strong>Holiday</strong>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="w-100">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Mutu Swami Ayer</strong>
													<span class="fs-8 fw-500 text-secondary">Customer Name</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 9601308090 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> mutuswamiayer457@gmail.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
										<div class="px-2">
											<p class="fs-7 mb-2 mt-0 ">
												<strong class="d-block mb-1">Charming Shimla & Exotic Manali Honeymoon Tour</strong>
												<span class="fs-8 fw-500 text-secondary">Package Name</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Agent</span>
											<a class="text-primary fw-bold" href="" title="View Agent">Akash Kumar</a>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">20 May, 2022</strong> 
											<span class="fs-8 fw-500 text-secondary">Travel Date</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-plus"></i> Generate Voucher
											</button>
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

			<!-- Begin portlet-body -->
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<div class="table-responsive">
					<table id="table_vouchers" class="table table-striped display">
						<thead>
							<tr>
								<th> # </th>
								<th> V.id </th>
								<th> Iti ID </th>
								<th> Type </th>
								<th> Name </th>
								<th> Contact </th>
								<th> Email </th>
								<th> Package Name </th>
								<th> Travel Date </th>
								<th> Agent </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
						<div id="res"></div>
							<!--DataTable Goes here-->
						</tbody>
					</table>
				</div>
			</div>
			<!-- End portlet-body -->
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
		$(document).on("click",".ajax_iti_status", function(){
			var iti_id = $(this).attr("data-id");
			$.ajax({
				url: "<?php echo base_url(); ?>" + "AjaxRequest/iti_status_popup",
				type:"POST",
				data:{ iti_id: iti_id },
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
//update iti del status
	jQuery(document).ready(function($){
		$(document).on("click", ".ajax_delete_voucher", function(){
			var id = $(this).attr("data-id");
			if (confirm("Are you sure?")) {
				$.ajax({
					url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_delete_voucher?id=" + id,
					type:"GET",
					data:id,
					dataType: 'json',
					cache: false,
					success: function(r){
						if(r.status = true){
							location.reload();
						//console.log("ok" + r.msg);
							//console.log(r.msg);
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
	var table;
	$(document).ready(function() {
		//Custom Filter
		$(document).on("change", 'input[name=filter]:radio', function() {
			var filter_val = $(this).val();
			$("#filter_val").val( filter_val );
			table.ajax.reload(null,true); 
		});
		//datatables
		table = $('#table_vouchers').DataTable({ 
			"aLengthMenu": [[10,25, 50, 100, -1], [10, 25, 50, 100, 'All']],
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
			language: {
				search: "<strong>Search By Customer Name/Iti ID:</strong>",
				searchPlaceholder: "Search..."
			},
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('vouchers/ajax_voucher_list')?>",
				"type": "POST",
				"data": function ( data ) {
					data.filter = $("#filter_val").val();
				} 
				/* beforeSend: function(){
					console.log("Please wait...");
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