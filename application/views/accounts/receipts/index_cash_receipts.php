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
						<i class="fa fa-inr"></i>All Cash Receipts
					</div>
					<a class="btn btn-primary float-end" href="<?php echo site_url("accounts/create_receipt"); ?>" title="Create New Invoice"><i class="fa-solid fa-plus"></i> Generate New Receipt</a>
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
										<div class="px-1 w-100 text-nowrap">
											<div class="requirment d-flex justify-content-between">
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block">#4537</strong> 
													<span class="fs-8 fw-500 text-secondary">Lead ID</span>
												</p>
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block">BR-172</strong> 
													<span class="fs-8 fw-500 text-secondary">Voucher No</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Sent Status </p>
												<div>
													<span class="fs-7"> 
														<i class="fa-solid fa-envelope-circle-check text-primary"></i> 
														sent 1 Time 
													</span>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="d-flex justify-content-between w-100">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Dave Rajan HiteshKumar</strong>
													<span class="fs-8 fw-500 text-secondary">Customer Name</span>
												</p>
											</div>
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Bank</strong>
													<span class="fs-8 fw-500 text-secondary">Recipt Type</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 9404995141 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> davrajan4785@gmail.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">UPI/207381399354</strong> 
											<span class="fs-8 fw-500 text-secondary">Transfer Ref.</span>
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
										<strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i> 3000.00	</strong> 
											<span class="fs-8 fw-500 text-secondary">Amount</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-eye"></i> Clinet View
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
										<div class="px-1 w-100 text-nowrap">
											<div class="requirment d-flex justify-content-between">
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block">#7854</strong> 
													<span class="fs-8 fw-500 text-secondary">Lead ID</span>
												</p>
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block">BR-159</strong> 
													<span class="fs-8 fw-500 text-secondary">Voucher No</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Sent Status </p>
												<div>
													<span class="fs-7"> 
														<i class="fa-solid fa-envelope-circle-check text-primary"></i> 
														sent 0 Time 
													</span>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="d-flex justify-content-between w-100">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Shrikrushna Vitthal Chamate</strong>
													<span class="fs-8 fw-500 text-secondary">Customer Name</span>
												</p>
											</div>
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Bank</strong>
													<span class="fs-8 fw-500 text-secondary">Recipt Type</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 9682304509 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> shrikrushnaVitthal@gmail.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">20702165</strong> 
											<span class="fs-8 fw-500 text-secondary">Transfer Ref.</span>
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
										<strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i> 17050.00	</strong> 
											<span class="fs-8 fw-500 text-secondary">Amount</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-eye"></i> Clinet View
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
										<div class="px-1 w-100 text-nowrap">
											<div class="requirment d-flex justify-content-between">
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block">#4511</strong> 
													<span class="fs-8 fw-500 text-secondary">Lead ID</span>
												</p>
												<p class="fs-7 mb-2 mt-0"> 
													<strong class="d-block">BR-167</strong> 
													<span class="fs-8 fw-500 text-secondary">Voucher No</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<div class="p-1">
												<p class="fs-7 mb-2 mt-0 text-secondary">Sent Status </p>
												<div>
													<span class="fs-7"> 
														<i class="fa-solid fa-envelope-circle-check text-primary"></i> 
														sent 3 Time 
													</span>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100">
										<div class="d-flex justify-content-between w-100">
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Pravin Subhash Tayade</strong>
													<span class="fs-8 fw-500 text-secondary">Customer Name</span>
												</p>
											</div>
											<div class="px-2">
												<p class="fs-7 mb-2 mt-0 ">
													<strong class="d-block mb-1">Bank</strong>
													<span class="fs-8 fw-500 text-secondary">Recipt Type</span>
												</p>
											</div>
										</div>
										<div class="bg-light p-1 w-100">
											<span class="d-block mb-2 fs-7 ms-1">
												<i class="fa-solid fa-phone text-primary me-1"></i> 816992984 
											</span>
											<span class="d-block fs-7 ms-1">
												<i class="fa-solid fa-envelope text-primary me-1"></i> praveentybe54@gmail.com 
											</span>
										</div>
									</div>
								</td>
								<td>
									<div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
										<div class="px-2 mb-2">
											<strong class="d-block fs-7 mb-1">MMT/IMPS/206717296906</strong> 
											<span class="fs-8 fw-500 text-secondary">Transfer Ref.</span>
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
										<strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i> 13000.00</strong> 
											<span class="fs-8 fw-500 text-secondary">Amount</span>
										</div>
										<div class="bg-light p-1 w-100">
											<button class="btn btn-sm btn-success ms-2 mt-2">
												<i class="fa-solid fa-eye"></i> Clinet View
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
				<div class="table-responsive margin-top-20">
					<table class="table table-striped display white_space_fix">
					
						<thead>
							<tr>
								<th> # </th>
								<th> Lead Id </th>
								<th> Receipt</th>
								<th> Voucher No </th>
								<th> Customer Name</th>
								<th> Email  </th>
								<th> Contact </th>
								<th> Transfer Ref.</th>
								<th> Amount</th>
								<th> Sent</th>
								<th> Action </th>								
								<th> Agent </th>								
							</tr>
						</thead>
						
						<tbody>
						<div id="res"></div>
						<?php 
						if( isset($invoices_listing) && !empty( $invoices_listing ) ){
							$i = 1;
							foreach($invoices_listing as $invoice) {
								$rtype = ucfirst($invoice->receipt_type);
								$agent = get_user_name($invoice->agent_id);
								//client view
								$vid = base64_url_encode( $invoice->id );
								$voucher_number = base64_url_encode( $invoice->voucher_number );
								
								$client_v = "<a title='Client Reciept View' href=" . site_url("promotion/receipt/{$vid}/{$voucher_number}") . " class='btn btn-danger' target='_blank' ><i class='fa-solid fa-eye' aria-hidden='true'></i> Client View</a>";
								echo " 
								<tr data-id={$invoice->id}>
									<td> {$i} </td>
									<td> {$invoice->lead_id}</td>
									<td> {$rtype}</td>
									<td> {$invoice->voucher_number}</td>
									<td> {$invoice->customer_name}</td>
									<td> {$invoice->customer_email} </td>
									<td> {$invoice->customer_contact} </td>
									<td> {$invoice->transfer_ref}</td>
									<td> {$invoice->amount_received}</td>
									<td> {$invoice->sent_count} Times</td>
									<td><a href=" . site_url("accounts/update_receipt/{$invoice->id}") . " class='btn btn_pencil ajax_edit_hotel_table' title='Update Invoice' ><i class='fa-solid fa-pen-to-square'></i></a>
									<a href=" . site_url("accounts/view_receipt/{$invoice->id}") . " class='btn btn_eye' title='view' ><i class='fa-solid fa-eye'></i></a>
									{$client_v}
									<a href='javascript:void(0)' class='btn btn_trash ajax_delete_bank'><i class='fa-solid fa-trash-can'></i></a></td>
									<td> {$agent}</td>
								</tr>";
								$i++; 
							}
						}else{
							echo "<tr>";
							for( $colspan = 1 ; $colspan <= 12; $colspan++ ){
								echo $colspan == 1 ? "<td style='border-left:none;border-right:none'>No Data Found !</td>" : "<td style='border-left:none;border-right:none'></td>";
							}
							echo "</tr>";
						
						} ?>
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

<!-- Modal -->
<script type="text/javascript">
jQuery(document).ready(function($){
	$(".table").DataTable();
	$(document).on("click", ".ajax_delete_bank", function(){
		var res= $("#res");
		var bank_id = $(this).closest("tr").attr("data-id");
		if (confirm("Are you sure?")) {
			$.ajax({
				url: "<?php echo base_url(); ?>" + "accounts/delete_invoice?id=" + bank_id,
				type:"GET",
				data:bank_id,
				dataType: "json",
				cache: false,
				success: function(r){
					if(r.status = true){
						alert(r.msg);
						location.reload();
					}else{
						alert("Error! Please try again.");
					}
				}
			});	
		}   
	});
});
</script>