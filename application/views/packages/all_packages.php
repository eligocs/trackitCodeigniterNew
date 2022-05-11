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
						<i class="fa fa-users"></i>All Packages
					</div>
				    <a class="btn btn-primary float-end" href="<?php echo site_url("packages/add"); ?>" title="Add Package"><i class="fa-solid fa-plus"></i> Add Package</a>

					<!-- Show hide filter button -->
                    <button  class="btn float-end me-2 p-2 " title="Filter Packages" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
				</div>
			</div>

			<!--Begin filter section-->
			<div class="cat_wise_filter bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
				<form class="mb-0" role="form" id="filter_frm" method="post">
					<div class="row">
						<div class="col-md-6 col-lg-4 col-sm-6 my-2">
							<label class="control-label">State</label>
							<div class="form-group">
								<select name='state' class='form-control' id='stateID'>
									<option value="">All States</option>
									<?php $state_list = get_indian_state_list(); 
									if( $state_list ){
										foreach($state_list as $state){
											echo '<option value="'.$state->id.'">'.$state->name.'</option>';
										}
									} ?>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-lg-4 col-sm-6 my-2">
							<label class="control-label">Package Category </label>
							<div class="form-group">
								<select name="p_cat_id" id="cat_id" class="form-control">
									<option value="">All Package Category</option>
									<?php 
									$cats = get_package_categories();
									if( $cats ){
									foreach($cats as $cat){
										echo '<option value = "'.$cat->p_cat_id .'" >'.$cat->package_cat_name.'</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-lg-4 my-2">
							<label class="control-label d-none d-lg-block" for="">&nbsp;</label>
							<button type="submit" class="btn btn-success uppercase add_user"><i class="fa-solid fa-filter"></i> Filter</button>
							<a href="javascript:void(0);" class="btn btn-success uppercase reset_filter"><i class="fa fa-refresh"></i> Reset</a>
						</div>
					</div>
				</form>
				<div class="res"></div>
			</div>
			<!-- End filter section -->

			<!-- Begin demo table design -->
			<div class="bg-white p-3 rounded-4 shadow-sm mb-4">
				<div class="table-responsive">
					<table class="table data-table-large">
						<tbody>
							<tr>
								<td class="tour_thumbnail">
									<div>
										<img src="./site/images/tour_thumbnail.jpg" class="img-thumbnail">
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100 ">
											<p class="fs-7 mb-2 mt-0"> 
												<strong class="d-block">Shimla and Manali Group Tour</strong> 
												<span class="fs-8 fw-500 text-secondary">Package Name</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-1 mt-0 text-secondary"> Category </p>
												<div>
													<strong class="fs-7">Honeymoon Package by Volvo</strong>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100">
											<p class="fs-7 mb-2 mt-0"> 
												<strong class="d-block">Andhra Pradesh</strong> 
												<span class="fs-8 fw-500 text-secondary">Package State</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Puplish Status</span>
											<span class="badge bg-danger">
												<strong>Draft</strong>
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">Abhishek Sharma</strong> 
											<span class="fs-8 fw-500 text-secondary">Created by</span>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Created On</span>
											<span class="fs-7"><strong>02-May-2022 11:48 PM</strong></span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-2 mb-2">
										<strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i> 3000.00	</strong> 
											<span class="fs-8 fw-500 text-secondary">Package Cost</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-file-pdf"></i> PDF
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
								<td class="tour_thumbnail">
									<div>
										<img src="./site/images/logo1651577144.png" class="img-thumbnail">
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100 ">
											<p class="fs-7 mb-2 mt-0"> 
												<strong class="d-block">Golden Himachal Tour With Amritsar</strong> 
												<span class="fs-8 fw-500 text-secondary">Package Name</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-1 mt-0 text-secondary"> Category </p>
												<div>
													<strong class="fs-7">Honeymoon Package by Cab</strong>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-1 w-100">
											<p class="fs-7 mb-2 mt-0"> 
												<strong class="d-block">Himachlal Pradesh</strong> 
												<span class="fs-8 fw-500 text-secondary">Package State</span>
											</p>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Puplish Status</span>
											<span class="badge bg-success">
												<strong>Published</strong>
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">Mr.Admin</strong> 
											<span class="fs-8 fw-500 text-secondary">Created by</span>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block fs-7 mb-2 text-muted">Created On</span>
											<span class="fs-7"><strong>05-May-2022 03:26 PM</strong></span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="px-2 mb-2">
										<strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i> 25000.00	</strong> 
											<span class="fs-8 fw-500 text-secondary">Package Cost</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-file-pdf"></i> PDF
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

			<!-- Begin data-table section -->
			<div class="bg-white p-3 rounded-4 shadow-sm">
				<div class="table-responsive">
					<table id="packages" class="table table-striped display">
						<thead>
							<tr>
								<th> # </th>
								<th> Package ID </th>
								<th> Package Name </th>
								<th> State </th>
								<th> Category </th>
								<th> Publish Status</th>
								<th> Package Created</th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
							<div class="loader"></div>
							<div id="res"></div>
							<!--DataTable Goes here-->
						</tbody>
					</table>
				</div>
			</div>
			<!-- End data-table section -->
      </div>
	  <!-- End page-content -->
   </div>
   <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->
</div>

<div id="myModal" class="modal" role="dialog"></div>
<!-- Modal -->
<script type="text/javascript">
   //update package del status
   jQuery(document).ready(function($){
   	$(document).on("click", ".ajax_delete_package", function(){
   		var id = $(this).attr("data-id");
   		if (confirm("Are you sure?")) {
   			$.ajax({
   				url: "<?php echo base_url(); ?>" + "packages/update_del_status_package?id=" + id,
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
   	//delete permanently Draft Itineraries
   	$(document).on("click", ".delete_package_permanent", function(){
   		var id = $(this).attr("data-id");
   		if (confirm("Are you sure?")) {
   			$.ajax({
   				url: "<?php echo base_url(); ?>" + "packages/delete_package_permanently?id=" + id,
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
   	var table;
   	var tableFilter;
   	
   	//Reset filter
   	$(document).on("click", ".reset_filter" ,function(e){
   		e.preventDefault();
   		$("form#filter_frm").find("input,select").val("");
   		table.ajax.reload(null,true);
   	});
   	
   	
   	$("#filter_frm").submit(function(e){
   		e.preventDefault();
   		table.ajax.reload(null,true);
   	});
   	
   	//datatables
   	table = $('#packages').DataTable({ 
   		"aLengthMenu": [[10,25, 50, 100, -1], [10, 25, 50, 100, 'All']],
   		"processing": true, //Feature control the processing indicator.
   		"serverSide": true, //Feature control DataTables' server-side processing mode.
   		"order": [], //Initial no order.
   		language: {
   			search: "<strong>Search By Package Id/Package Name:</strong>",
   			searchPlaceholder: "Search..."
   		},
   		// Load data for the table's content from an Ajax source
   		"ajax": {
   			"url": "<?php echo site_url('packages/ajax_packages_list')?>",
   			"type": "POST",
   			"data": function ( data ) {
   				//console.log($("#cat_id").val());
   				data.state_id = $("#stateID").val();
   				data.cat_id = $("#cat_id").val();
   			},
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