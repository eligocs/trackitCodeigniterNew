z<?php if($invoice){ 	$invoice = $invoice[0];		?>
<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="fa fa-users"></i>
						<strong>Lead: <span class=""><?php echo $invoice->lead_id; ?></span></strong>
						<strong>Voucher Number: <span class=""><?php echo $invoice->voucher_number; ?></span></strong>
					</div>
					<?php if( $invoice->receipt_type == "cash" ){ ?>
						<a class="btn btn-outline-primary float-end" href="<?php echo site_url("accounts/cash_receipts"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
					<?php }else{ ?>
						<a class="btn btn-outline-primary float-end" href="<?php echo site_url("accounts/receipts"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
					<?php } ?>	
				</div>
			</div>
			<?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
			?>
			
			<?php 
				//get customer info
				$get_cus_info 	= get_customer_account( $invoice->lead_id );
				$customer_name 	= isset( $get_cus_info[0]->customer_name ) ? $get_cus_info[0]->customer_name : "";
				$customer_email = isset( $get_cus_info[0]->customer_email ) ? $get_cus_info[0]->customer_email : "";
				$customer_contact = isset( $get_cus_info[0]->customer_contact ) ? $get_cus_info[0]->customer_contact : "";
			?>
		
			<div class="bg-white p-3 portlet-body rounded-4 shadow-sm">
				<div class="form-group ">
					<?php $hotelbooking_sent = $invoice->sent_count; ?>
					<div  class="d-flex justify-content-between mb-4">
						<?php 
						echo '<a id="hotel_email_sent" href="#" class="btn green uppercase "><i class="fa-solid fa-paper-plane"></i> Send</a>';
						echo "<div> <sapn class='badge bg-purple-wisteria fs-7 fw-normal p-2'>Receipt Sent " . $hotelbooking_sent . " Times.</sapn> </div>";
						?>
					</div>
					<div id="response" class="sam_res"></div>
				</div>

				<h3>Receipt Details</h3>
				<div class="table-responsive">	
					<table class="table table-condensed table-bordered table-hover">
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Name: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo $customer_name; ?></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Email: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo $customer_email; ?></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Mobile Number:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo $customer_contact; ?></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Receipt Type:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->receipt_type; ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Account Name:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo get_cash_bank_account_name($invoice->account_type_id); ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Voucher Number:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->voucher_number; ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Voucher Date:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo date("d/m/Y", strtotime($invoice->voucher_date)); ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Transfer Type:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->transfer_type; ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Transfer Ref:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->transfer_ref; ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Transfer Date:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo date("d/m/Y", strtotime($invoice->transfer_date)); ?></strong></div></td>
						</tr>
						
						<tr class='green'>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Amount:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->amount_received; ?></strong></div></td>
						</tr>
						
						<tr class='red'>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Sent To Client:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->sent_count; ?> Times</strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Narration:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->narration; ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Updated By:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo get_user_name($invoice->agent_id); ?></strong></div></td>
						</tr>
						
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Created:</strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><strong><?php echo $invoice->created; ?></strong></div></td>
						</tr>
					</table>
				</div>	
				<div class="text-center">
				   <a title='Edit User' href="<?php echo site_url("accounts/update_receipt/{$invoice->id}"); ?>" class="btn btn-outline-secondary" ><i class="fa-solid fa-pen-to-square"></i> Update Receipt</a>
				</div>	
			</div>	
		</div>
  	</div>
</div>

<!--Sent Hotel Booking Mail Modal-->
<div class="modal fade" id="sendInvoiceModal" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Send Receipt</h4>
		</div>
		<div class="modal-body">
			<form id="senthotelBookForm">
				<div class="row">
					<div class="col-12 my-2">
						<div class="form-group">
							<label class="control-label" for="email">Client Email:</label>
							<input required type="text" readonly name="customer_email" value="<?php echo $customer_email; ?>" class="form-control" id="email" placeholder="Enter customer email" >
						</div>
					</div>
					<!--CC Email Address-->
					<div class="col-12 my-2">
						<div class="form-group">
							<label class="control-label" for="cc_email">CC Email:</label>
							<input type="text" value="" class="form-control" id="cc_email" placeholder="Enter CC Email.eg. admin@trackitinerary.org" name="cc_email">
						</div>
					</div>
					<!--BCC Email Address-->
					<div class="col-12 my-2">
						<div class="form-group">
							<label class="control-label" for="bcc_email">BCC Email:</label>
							<input type="text" value="" class="form-control" id="bcc_email" placeholder="Enter BCC email eg. manager@trackitinerary.org" name="bcc_email">
						</div>
					</div>
					<div class="col-12 my-2">
						<div class="form-group">
							<label class="control-label" for="sub">Subject:</label>
							<input type="text" required class="form-control" id="sub" placeholder="Final Invoice Subject" name="subject" value="" >
						</div>
					</div>
					<div class="col-12 my-2">
						<input type="hidden" name="id" value="<?php echo $invoice->id; ?>">
						<input type="hidden" name="lead_id" value="<?php echo $invoice->lead_id; ?>">
						<button type="submit" id="sentIti_btn" class="btn btn-primary">Send Receipt</button>
						<div id="mailSentResponse" class="sam_res"></div>
					</div>
				</div>
			</form>
		</div>
	  </div>
	</div>
</div>
<div class="loader"></div>
<?php }else{
	redirect(404);
} ?>	

<script>
jQuery( document ).ready(function($){
	
	$("#hotel_email_sent").click(function(e){
		e.preventDefault();
		//open modal 
		$('#sendInvoiceModal').modal('show');
	});
	
	$("#senthotelBookForm").validate({
		submitHandler: function(form) {
			$("#sentIti_btn").attr("disabled", "disabled");
			var ajaxReq;
			var resp = $("#mailSentResponse");
			var formData = $("#senthotelBookForm").serializeArray();
			if (ajaxReq) {
				ajaxReq.abort();
			}
			ajaxReq = $.ajax({
				type: "POST",
				url: "<?php echo base_url('accounts/ajax_send_receipt'); ?>" ,
				dataType: 'json',
				data: formData,
				beforeSend: function(){
					resp.html("<div class='alert alert-info'><strong>Please wait</strong> sending mail.....</div>");
				},
				success: function(res) {
					if (res.status == true){
						resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
						//console.log(res.msg);
						alert(res.msg);
						location.reload();
					}else{
						resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
						console.log("error");
					}
				},
				error: function(e){
					//console.log(e);
					resp.html('<div class="alert alert-danger"><strong>Error!</strong> Please Reload Page and Try again later! </div>');
				}
			});
		}	
	}); 
});
</script>
