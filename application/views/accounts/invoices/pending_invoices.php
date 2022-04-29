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
						<i class="fa-solid fa-file-circle-exclamation"></i> All Pending Invoices
					</div>
					<a class="btn btn-primary float-end" href="<?php echo site_url("accounts/invoices"); ?>" title="All Invoice"><i class="fa-solid fa-check"></i> Confirmed Invoices</a>
				</div>
			</div>
			<!-- Begin portlet-body -->
			<div class="portlet-body">
				<div class="bg-white p-3 rounded-4 shadow-sm">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr class="text-nowrap">
									<th> # </th>
									<th> Lead Id </th>
									<th> Name </th>
									<th> Contact </th>
									<th> Package </th>
									<th> Checkout </th>
									<th> Agent </th>								
									<th> Action </th>
								</tr>
							</thead>
							
							<tbody>
							<div id="res"></div>
							<?php 
							if( isset($pending_invoices) && !empty( $pending_invoices ) ){
								$i = 1;
								foreach($pending_invoices as $invoice) {
									$agent = get_user_name($invoice->agent_id);
									echo " 
									<tr class='text-nowrap'>
										<td> {$i} </td>
										<td> {$invoice->customer_id}</td>
										<td> {$invoice->customer_name}</td>
										<td> {$invoice->customer_contact}</td>
										<td> {$invoice->package_name}</td>
										<td> {$invoice->t_end_date}</td>
										<td> {$agent}</td>
										<td>
											<a data-id='{$invoice->iti_id}' class='btn btn-success invoice' target='_blank' title='Create Invoice' ><i class='fa fa-plus'></i> Create Invoice
											</a>
											
											<a href=" . site_url("itineraries/view/{$invoice->iti_id}/{$invoice->temp_key}") . " class='btn btn-success' target='_blank' title='Create Invoice' ><i class='fa-solid fa-eye'></i> View Iti
											</a>
										</td>
									</tr>";
									$i++; 
								}
							}else{
								echo "<tr><td colspan='8'>No Invoice Found !</td></tr>";
							} ?>
							</tbody>
						</table>
					</div>
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
	$(document).on("click", ".invoice", function(){
		var userid = $(this).data("id");
			$.ajax({
				url: "<?php echo base_url(); ?>" + "accounts/invoice_create",
				type:"Post",
				data:{					
					userid:userid}
					,
				dataType: "json",
				cache: false,
				success: function(r){
					if(r.status = true){
						window.location.href = r.data;
					}else{
						alert("Error! Please try again.");
					}
				}
			});	   
	});
});
</script>