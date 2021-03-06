<?php  if($m_user){ 	$muser = $m_user[0];		?>
<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!--Show success message if hotel edit/add -->
			<?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
			?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="fa fa-users"></i>Name: <strong><?php echo $muser->name; ?></strong></div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("reference_customers"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<h3>User Details</h3>
				<div class="table-responsive">	
					<table class="table table-condensed table-hover">	
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl"><strong>Full Name: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo $muser->name; ?></div></td>
						</tr>
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl"><strong>Email: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo $muser->email; ?></div></td>
						</tr>	
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl"><strong>Contact Number: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo $muser->contact; ?></div></td>
						</tr>	
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl"><strong>State: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo get_state_name($muser->state); ?></div></td>
						</tr>	
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl"><strong>City: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php echo get_city_name($muser->city); ?></div></td>
						</tr>	
					</table>	
				</div>	
				<!--Edit Button-->
				<?php if( !is_salesteam()){ ?>
				<div class="text-center">
					<!-- btn Edit -->
					<a title='Edit user' href="<?php echo site_url("reference_customers/edit/{$muser->id}"); ?>" class="btn btn-outline-secondary" ><i class="fa-solid fa-pen-to-square"></i> Edit</a>
					<strong class="mx-3"> OR </strong>
					<!-- Add btn -->
					<a class="btn btn-outline-secondary"  href="<?php echo site_url("reference_customers/add"); ?>" title="add user">
						<i class="fa-solid fa-plus"></i> Add new
					</a>
				</div>	
				<?php } ?>
			</div>	
			<a class="btn btn-danger mt-3" href="#" id="add_call_btn" title="Back"><i class="fa-solid fa-phone"></i> Add Call Info</a>
					<div class="row">
						<div class="col-md-9 call_log" id="call_log_section" style="display: none;">
							<div class="bg-white p-3 mt-4 rounded-4 shadow-sm">
								<form id="call_detais_form" novalidate="novalidate">

								<div class="call_type_seciton">
									<label class="radio-inline control-label me-3 mb-3">
										<input data-id="picked_call_panel" required="" id="picked_call" class="radio_toggle me-2 form-check-input" type="radio" name="callType" value="Picked call" aria-required="true">Picked call
									</label>
									<label class="radio-inline control-label me-3 mb-3">
										<input class="radio_toggle me-2 form-check-input" data-id="call_not_picked_panel" required="" id="call_not_picked" type="radio" name="callType" value="Call not picked" aria-required="true">Call not picked
									</label>
									<label class="radio-inline control-label me-3 mb-3">
										<input class="radio_toggle me-2 form-check-input" data-id="close_lead_panel" required="" id="close_lead" type="radio" name="callType" value="8" aria-required="true">Decline
									</label>
								</div>	

								<div id="panel_detail_section" style="display: none;">
									<div class="row">
										<div class="call_type_res col-md-6 my-2" id="picked_call_panel">
											<!--picked call panel-->
											<div>
												<div class="checkbox1">
													<label class="control-label">
														<input id="nxtCallCk" type="radio" class="book_query form-check-input" name="book_query" required="" value="" aria-required="true"> Next calling time and date <sup class="text-danger">*</sup>
													</label>
												</div>
												<div id="next_call_cal">
													<input size="16" required="" type="text" value="" name="nextCallTime" readonly="" class="form-control form_datetime" aria-required="true">  
												</div>	
											</div>	
											<!--Quotation Type Holidays/Accommodation/Cab-->
										</div><!--end picked call panel-->
										<div class="call_type_res" id="call_not_picked_panel"><!--call_not_picked panel-->
											<div class="col-md-12">
												<label class="radio-inline control-label me-3">
													<input required="" type="radio" name="callSummaryNotpicked" class="call_type_not_answer form-check-input me-2" value="Switched off" aria-required="true">Switched off
												</label>
												<label class="radio-inline control-label me-3">
													<input required="" type="radio" name="callSummaryNotpicked" class="call_type_not_answer form-check-input me-2" value="Not reachable" aria-required="true">Not reachable
												</label>
												<label class="radio-inline control-label me-3">
													<input required="" type="radio" name="callSummaryNotpicked" class="call_type_not_answer form-check-input me-2" value="Not answering" aria-required="true">Not answering
												</label>
												<label class="radio-inline control-label me-3">
													<input required="" type="radio" name="callSummaryNotpicked" class="call_type_not_answer form-check-input me-2" value="Number does not exists" aria-required="true">Number does not exists
												</label>
												
												<div class="col-md-6 hide">
													<div class="row">
														<div class="col-md-">
															<div class="form-group">
															<label for="comment">Comment<span style="color:red;">*</span>:</label>
															<textarea required="" class="form-control" rows="3" name="comment" id="comment" aria-required="true"></textarea>
															</div> 
														</div>
													</div>	
												</div>	
											
												<div class="nxt_call">
													<div class="row">
														<div class="form-group col-md-6 my-2">
															<label class="control-label">Next calling time and date<span style="color:red;">*</span>:</label> 
															<input size="16" required type="text" value="" readonly name="nextCallTimeNotpicked" class="form-control form_datetime"> 
														</div>

														<div class="form-group col-md-6 my-2">
															<label class="control-label">Lead prospect<span style="color:red;">*</span></label>
															<select required class="form-control" name="txtProspectNotpicked">
																<option value="Hot">Hot</option>
																<option value="Warm">Warm</option>
																<option value="Cold">Cold</option>
															</select>
														</div>
													</div>	
												</div>	
											</div>
										</div>
										<!--end call not picked panel-->	
										<!--close_lead_panel panel-->
										<div class="call_type_res" id="close_lead_panel">
											<div class="row">
												<div class="form-group col-md-6 my-2">
													<label for="" class="control-label"> Select Decline Reason :</label>
													<select required="" class="form-control" name="decline_reason" aria-required="true">
														<option value="">Select Reason</option>
														<option value="Booked with someone else">Booked with someone else</option>
														<option value="Not interested">Not interested</option>
														<option value="Not answering call from 1 week">Not answering call from 1 week</option>
														<option value="Plan cancelled">Plan cancelled</option>
														<option value="Wrong number">Wrong number</option>
														<option value="Denied to post lead">Denied to post lead</option>
														<option value="Other">Other</option>
													</select>
												</div>
												
												<div class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label" for="comment">Decline Comment:</label>
														<textarea class="form-control" rows="3" name="decline_comment" id="decline_comment"></textarea>
													</div> 
												</div>
											</div>
										</div>
										<!--end close_lead_panel-->	
										
										<div class="col-md-6 my-2">
											<div class="form-group">
											<label class="control-label" for="comment">Call summary <sup class="text-danger">*</sup></label>
											<textarea required class="form-control" rows="3" name="callSummary" id="callSummary"></textarea>
											</div> 
										</div>
										<div class="col-md-6 my-2">
											<div class="form-group">
												<label class="control-label">Lead prospect <sup class="text-danger">*</sup></label>
												<select required class="form-control" name="txtProspect">
													<option value="Hot">Hot</option>
													<option value="Warm">Warm</option>
													<option value="Cold">Cold</option>
												</select>
											</div>
										</div>
										<input type="hidden" name="customer_id" value="<?php echo $muser->id; ?>">
										<input type="hidden" name="agent_id" value="<?php echo $user_id; ?>">
										<div class="mt-3">
											<button type="submit" id="submit_frm" class="btn green uppercase submit_frm">Submit</button>
											<button class="btn red uppercase cancle_bnt">Cancel</button>
										</div>
										
										<div id="resp"></div>
									</div>
									</form>
								</div>
							</div>
						</div>
						<?php if( !empty( $followUpData ) ){ ?>
						<!--div class="panel-group accordion call-time" id="accordion3"--->
						<?php
						$count = 1;
						foreach( $followUpData as $callDetails ){ ?>
						<?php $c_type = $callDetails->callType; 
							if( $c_type == 9 ){
								$callType_status = "Approved";
							}elseif( $c_type == 8 ){
								$callType_status = "Decline";
							}else{
								$callType_status = $c_type;
							}
						?>
						<div class="col-md-3">
							<div class="bg-white p-3 rounded-4 shadow-sm mt-3">
								<div class="mt-element-list">			 
									<div class="mt-list-container list-todo" id="accordion1" role="tablist" aria-multiselectable="true">
										<div class="list-todo-line"></div>
										<ul>
											<li class="mt-list-item">
												<div class="list-todo-icon bg-white font-green-meadow">
													<i class="fa fa-clock-o"></i>
												</div>
												<div class="list-todo-item green-meadow">
													<a class="list-toggle-container" data-toggle="collapse" data-parent="#accordion1" onclick=" " href="#task-<?php echo $count;?>" aria-expanded="false">
														<div class="list-toggle done uppercase">
															<div class="list-toggle-title bold">Call Time: <?php echo $callDetails->currentCallTime;?></div>
															
														</div>
													</a>
													<div class="task-list panel-collapse collapse" id="task-<?php echo $count;?>">
														<ul>
															<li class="task-list-item done">
																<div class="task-icon"><a href="javascript:;"><i class="fa fa-phone"></i></a></div>
						
																<div class="task-content">
																	<h4 class="uppercase bold">
																		<a href="javascript:;"><?php echo $callType_status;?></a>
																	</h4>
															<p><strong>Call summary:</strong> <?php echo $callDetails->callSummary;?></p>
															<p><strong>Next Call Time:</strong> <?php echo $callDetails->nextCallDate;?></p>
															<p><strong><?php echo $callDetails->customer_prospect;?></strong></p>
															<p><strong>Comment:</strong> <?php echo $callDetails->comment;?></p>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>		
					</div>
				<?php $count++; ?>
			<?php } ?>
			<?php } ?>
		</div>
	<!--div class="panel-group accordion call-time" id="accordion3"--->
					
	</div>
<?php  }else{ redirect("reference_customers"); } ?>		
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
	$("#travel_date").datepicker({ startDate: "-2d" , format: "mm/dd/yyyy",});
	//reset all fields
	function resetForm(){
		$("#call_detais_form").find("input[type=text],input[type=number], textarea,select, .comment").val("");
		$("#call_detais_form").find('input:checkbox').removeAttr('checked');
		$("#call_detais_form").find('.call_type_not_answer').removeAttr('checked');
		$("#call_detais_form").find('#readyQuotation').removeAttr('checked');
		$("#call_detais_form").find('.quotation_type').removeAttr('checked');
		$("#call_detais_form").find('#nxtCallCk').removeAttr('checked');
		$(".nxt_call").hide();
	}
	
	//radio button calltype on change function
	$(document).on("change", ".radio_toggle", function(e){
		e.preventDefault();
		var _this = $(this);
		var section_id = _this.attr("data-id");
		$("#panel_detail_section").show().find("#"+section_id).slideDown();
		$('.call_type_res').not('#' + section_id).hide();
		$("#customer_info_panel").hide();
		//reset form
		resetForm();
	});
	
	$(document).on("click", "#add_call_btn", function(e){
		e.preventDefault();
		$("#call_log_section").slideDown();
		$(this).fadeOut();
	});
	
	//on cancle btn click
	$(document).on("click", ".cancle_bnt", function(e){
		e.preventDefault();
		$("#call_log_section").slideUp();
		$("#add_call_btn").fadeIn();
		$("#panel_detail_section").hide();
		$("#customer_info_panel").hide();
		//reset form
		$("#call_detais_form").find('.radio_toggle').removeAttr('checked');
		resetForm();
	});
	
	//on picked call select
	var date = new Date();
	date.setDate(date.getDate());
	$(".form_datetime").datetimepicker({
		format: "yyyy-mm-dd HH:ii P",
		showMeridian: true,
		startDate: date,
	});
	//show book Query
	$(document).on("change", ".book_query", function(e){
		e.preventDefault();
		var _this = $(this);
		if( _this.val() == 9 ){
			$("#next_call_cal").hide();
			$(".form_datetime").val("");
			$("#quotation_type_section").slideDown();
		}else{
			$("#next_call_cal").show();
			$("#quotation_type_section").hide();
			$("#customer_info_panel").hide();
			$("#call_detais_form").find('.quotation_type').removeAttr('checked');
		}
	});	
	//show book Query
	$(document).on("change", ".quotation_type", function(e){
		e.preventDefault();
		var _this = $(this);
		if( _this.val() == "holidays" ){
			$(".hide_accommodation").show();
			$("#customer_info_panel").slideDown();
		}else if( _this.val() == "accommodation" ){
			$(".hide_accommodation input, .hide_accommodation select").val("");
			$(".hide_accommodation").hide();
			$("#customer_info_panel").slideDown();
		}else{
			$("#customer_info_panel").slideDown();
		}
	});
	
	/* $(document).on('click','#nxtCallCk', function() {
		var isChecked = $('#nxtCallCk').prop('checked');
		if ( isChecked ) {
			$("#next_call_cal").show();
		}else{
			$("#next_call_cal").hide();
			$(".form_datetime").val("");
		}	
    }); */
	
	//show next call section if call not picked and number does not exists
	$(".call_type_not_answer").click(function(){
		var _this_val = $(".call_type_not_answer:checked").val();			
		
		if( $(this).is(':checked') && _this_val != "Number does not exists" ) { 
			$(".nxt_call").show();
		}else{
			$(".nxt_call").hide();
		}
	});
	//validate form
	var newrequest;
	$("#call_detais_form").validate({
		submitHandler: function(form, event) {
			event.preventDefault();
			$("#submit_frm").attr("disabled", "disabled");
			var formData = $("#call_detais_form").serializeArray();
			var resp = $("#resp");
			console.log(formData);
			
				//Get call type value
				var callType = $('input[name=callType]:checked').val();
				console.log(callType);
				if ( newrequest ) {
					newrequest.abort();
					console.log("already sent");
					//return false;
				}
				
				newrequest = $.ajax({
				type: "POST",
				url: "<?php echo base_url('reference_customers/updateCustomerFollowup'); ?>",
				dataType: 'json',
				data: formData,
				beforeSend: function(){
					resp.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
				},
				success: function(res) {
					if (res.status == true){
						console.log(res);
						if( res.approved == "holidays" ){
							resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							$("#pakcageModal").show();
							$("#continue_package").removeClass("disabledBtn");
							$("#readyForQuotation").removeClass("disabledBtn");
							$("#call_detais_form")[0].reset();
							$("#call_detais_form").hide();
							//location.reload(); 
						}else if( res.approved == "accommodation" ){
							resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							window.location.href = "<?php echo site_url();?>itineraries/add_accommodation/" + res.customer_id + "/" + res.temp_key;
						}else{
							location.reload(); 
						}
						//$("#call_detais_form")[0].reset();
					}else{
						//resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
						console.log("error");
					}
				},
				error: function(e){
					console.log(e);
				}
			});
			return false;
		} 
	});	
	
});
</script>
