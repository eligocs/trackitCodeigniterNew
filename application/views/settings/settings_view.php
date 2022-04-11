<link href="<?php echo base_url();?>site/assets/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>site/assets/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>site/assets/js/components-editors.js" type="text/javascript"></script>
<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12 custom_card">
								<div class="portlet light ">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">General settings</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">General Settings</a>
											</li>
											<li class="">
												<a href="#tab_1_2" data-toggle="tab">Company Info</a>
											</li>
											
											<li class="">
												<a href="#tab_1_3" data-toggle="tab">Login System Settings</a>
											</li>
											<li class="">
												<a href="#tab_1_4" data-toggle="tab">Agent Discount Settings</a>
											</li>
											
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- form updateGeneralSettings -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" class="form-horizontal form-bordered" id="updateGeneralSettings">
													<div>
														<!-- Site Info -->
														<h4>Site Info: </h4>
														<div class="row form-group align-items-center">
															<label class="control-label col-md-3 text-end my-2"><strong>Site Title:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" class="form-control" name="inp[site_title]" value="<?php if($settings!= NULL){ echo $settings[0]->site_title; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Site Link:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" class="form-control" name="inp[site_link]" value="<?php if($settings!= NULL){ echo $settings[0]->site_link; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Admin Email*:</strong></label>
															<div class="col-md-9 my-2">
																<input type="email" class="form-control" name="inp[admin_email]" value="<?php if($settings!= NULL){ echo $settings[0]->admin_email; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Super Manager Email:</strong></label>
															<div class="col-md-9 my-2">
																<input type="email" class="form-control" name="inp[super_manager_email]" value="<?php if($settings!= NULL){ echo $settings[0]->super_manager_email; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Manager Email:</strong></label>
															<div class="col-md-9 my-2">
																<input type="email" class="form-control" name="inp[manager_email]" value="<?php if($settings!= NULL){ echo $settings[0]->manager_email; }?>"/>
															</div>	
														</div>
														<!-- End Site Info: -->
														<hr>
														<!-- Online Payments: -->
														<h4>Online Payments:</h4>
														<div class="form-group row">
															<label class="control-label col-md-3">Accept Online Payments:</label>
															<div class="col-md-9">
																<input type="checkbox" title="Enable/disable online payments" class="form-control" name="inp[online_payments]"  <?php if( $settings != NULL && !empty( $settings[0]->online_payments == "1" ) ) echo "checked"; ?>  />
															</div>	
														</div>
														<!-- End Online Payments: -->
														<hr>
														<!-- Tax -->
														<h4>Tax:</h4>
														<div class="form-group row align-items-center">
															<label class="control-label col-md-3 text-end"><strong>Tax (%):</strong></label>
															<div class="col-md-9">
																<input type="number" title="Tax in percenage" class="form-control numberFilter" name="inp[tax]" value="<?php if($settings!= NULL){ echo $settings[0]->tax; }?>"/>
															</div>	
														</div>				
														<!--End Tax  -->
														<hr>
														<!-- Service Team Details -->
														<h4>Service Team Details: </h4>
														<div class="row align-items-center">
															<label class="control-label col-md-3 text-end my-2"><strong>Name:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" placeholder="Service team person name. Eg: Mukesh Chauhan" class="form-control" name="inp[sales_team_name]" value="<?php if($settings!= NULL){ echo $settings[0]->sales_team_name; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Service Team Contact:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" placeholder="Service team contact. Eg: 88888888,999999999" class="form-control" name="inp[sales_team_contact]" value="<?php if($settings!= NULL){ echo $settings[0]->sales_team_contact; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Service Team Email:</strong></label>
															<div class="col-md-9 my-2">
																<input type="email" class="form-control" name="inp[sales_email]" value="<?php if($settings!= NULL){ echo $settings[0]->sales_email; }?>"/>
															</div>	
														</div>
														<!-- End Service Team Details -->
														<hr>
														<!-- Hotel Booking Team Details -->
														<h4>Hotel Booking Team Details: </h4>
														<div class="row form-group align-items-center">
															<label class="control-label col-md-3 text-end my-2"><strong>Name:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" class="form-control"  placeholder="Hotel team name. Eg: Sakshi Negi"  name="inp[hotel_team_name]" value="<?php if($settings!= NULL){ echo $settings[0]->hotel_team_name; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Contact:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" placeholder="Hotel team contact. Eg: 88888888,999999999" class="form-control" name="inp[hotel_team_contact]" value="<?php if($settings!= NULL){ echo $settings[0]->hotel_team_contact; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Hotel Team Email:</strong></label>
															<div class="col-md-9 my-2">
																<input type="email" class="form-control" name="inp[hotel_email]" value="<?php if($settings!= NULL){ echo $settings[0]->hotel_email; }?>"/>
															</div>
														</div>	
														<!-- End Hotel Booking Team Details -->
														<hr>
														<!-- Vehicle Booking Team Details: -->
														<h4>Vehicle Booking Team Details: </h4>
														<div class="row form-group align-items-center">
															<label class="control-label col-md-3 text-end my-2"><strong>Name:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text" class="form-control" placeholder="Vehicle booking team name. Eg: Ravi " name="inp[vehicle_team_name]" value="<?php if($settings!= NULL){ echo $settings[0]->vehicle_team_name; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Vehicle Booking Team Contact:</strong></label>
															<div class="col-md-9 my-2">
																<input type="text"  placeholder="Vehicle booking team contact. Eg: 88888888,999999999" class="form-control" name="inp[vehicle_team_contact]" value="<?php if($settings!= NULL){ echo $settings[0]->vehicle_team_contact; }?>"/>
															</div>	
															<label class="control-label col-md-3 text-end my-2"><strong>Vehicle Booking Email:</strong></label>
															<div class="col-md-9 my-2">
																<input type="email" class="form-control" name="inp[vehicle_email]" value="<?php if($settings!= NULL){ echo $settings[0]->vehicle_email; }?>"/>
															</div>	
														</div>
														<!-- End Vehicle Booking Team Details: -->
														<hr>
														<!-- Submit site info -->
														<div class="form-group">
															<div class="form-actions">
																<div class="row">
																	<div class="col-md-12 ">
																		<input type="hidden" name="inp[id]" value="<?php if($settings!= NULL){ echo $settings[0]->id; }?>"/>	
																		<input type="hidden" name="type" value="<?php if($settings!= NULL){ echo "Update"; } else { echo "Add";}?>"/>
																		<button type="submit" class="btn green"> <i class="fa fa-check"></i> Submit</button>
																	
																	</div>
																</div>
															</div>
														</div>
														<!-- End Submit site info -->
													</div>
												</form>
												<div id="res"></div>
											</div>
											<!-- End form updateGeneralSettings	 -->
											<!--company info tab -->
											<div class="tab-pane" id="tab_1_2">
												<form role="form" class="form-horizontal form-bordered" id="updatecompanyinfo">
													<h4>Company Info: </h4>
													<div class="row form-group align-items-center">
														<label class="control-label col-md-3 text-end my-2"><strong>Company Email:</strong></label>
														<div class="col-md-9 my-2">
															<input type="text" required placeholder="Enter Company Emails. eg: info@trackitinerary.com" class="form-control" name="inp[company_email]" value="<?php if($settings!= NULL){ echo $settings[0]->company_email; }?>"/>
														</div>	
														<label class="control-label col-md-3 text-end my-2"><strong>Company Contact:</strong></label>
														<div class="col-md-9 my-2">
															<input type="text" required placeholder="Enter Company Contact Numbers.eg: 89898989,98989898" class="form-control" name="inp[company_contact]" value="<?php if($settings!= NULL){ echo $settings[0]->company_contact; }?>"/>
														</div>	
														<label class="control-label col-md-3 text-end my-2"><strong>Company Info:</strong></label>
														<div class="col-md-9 my-2">
															<textarea id="summernote_1" required name="inp[company_info]"><?php if($settings!= NULL){ echo $settings[0]->company_info; } ?></textarea>
														</div>	
														<label class="control-label col-md-3 text-end my-2"><strong>Who We Are:</strong></label>
														<div class="col-md-9 my-2">
															<textarea id="summernote_2" required name="inp[who_we_are]"><?php if($settings!= NULL){ echo html_entity_decode($settings[0]->who_we_are); } ?></textarea>
														</div>	
														<label class="control-label col-md-3 text-end my-2"><strong>What We Do:</strong></label>
														<div class="col-md-9 my-2">
															<textarea id="summernote_3" required name="inp[what_we_do]"><?php if($settings!= NULL){ echo html_entity_decode($settings[0]->what_we_do); } ?></textarea>
														</div>	
														<label class="control-label col-md-3 text-end my-2"><strong>Why Choose Us:</strong></label>
														<div class="col-md-9 my-2">
															<textarea id="summernote_4" required name="inp[why_choose_us]"><?php if($settings!= NULL){ echo html_entity_decode($settings[0]->why_choose_us); } ?></textarea>
														</div>	
														<label class="control-label col-md-3 text-end my-2"><strong>Tagline:</strong></label>
														<div class="col-md-9">
															<textarea class="form-control" required name="inp[tagline]"><?php if($settings!= NULL){ echo html_entity_decode($settings[0]->tagline); } ?></textarea>
														</div>	
													</div>
													<hr>
													<div class="form-group">
														<div class="form-actions">
															<div class="row">
																<div class="col-md-offset-2 col-md-10">
																	<input type="hidden" name="inp[id]" value="<?php if($settings!= NULL){ echo $settings[0]->id; }?>"/>	
																	<input type="hidden" name="type" value="<?php if($settings!= NULL){ echo "Update"; } else { echo "Add";}?>"/>
																	<button type="submit" class="btn green">
																		<i class="fa fa-check"></i> Submit</button>
																</div>
															</div>
														</div>
													</div>
													<div id="res_cmp"></div>
												</form>
											</div>
											<!--end company info tab-->	
											
											<!--Login system tab -->
											<div class="tab-pane" id="tab_1_3">
												<h4>Standard Login Time Settings: </h4>
												<form role="form" class="form-horizontal form-bordered" id="updateLoginInfo">
													<?php
														$s_login_data_setting = unserialize( $settings[0]->standard_login); 
														$activated = isset( $s_login_data_setting['activated'] ) && !empty($s_login_data_setting['activated']) ? 1 : 0;
														$time = isset($s_login_data_setting['time']) && !empty( $s_login_data_setting['time'] ) ? $s_login_data_setting['time'] : 0;
														$roles = isset($s_login_data_setting['role']) && !empty( $s_login_data_setting['role'] ) ? $s_login_data_setting['role'] : 0;
													?>
													<div class="col-md-12">
														<div class="mt-4 offset-1">
															<div class="form-group">
																<h5>Enable Standard Login:</h5>
																<div class="form-check">
																	<label class="control-label">
																		<input type="checkbox" <?php if( $settings!= NULL && !empty( $activated ) ) echo "checked"; ?> name="standard_login[activated]" class=" form-check-input" /> Enable/Disable
																	</label>
																</div>	
															</div>
															
															<?php $get_all_roles = get_all_users_role(); ?>
															<div class="form-group my-3">
																<h5>User Roles:</h5>
																<div class="d-flex justify-content-between w-50">
																	<?php if( $get_all_roles ){
																		foreach( $get_all_roles as $role ){ 
																			if( $role->role_id == 99 || $role->role_id == 98 ) continue;
																			//96 = sales team required
																			$read_only = $role->role_id == 96 ? "onclick='return false;' checked" : "";
																			$checked = $role->role_id != 96 && !empty($roles) && in_array($role->role_id, $roles ) ? "checked" : "";
																			?>
																			<label class="control-label"> 
																				<input type="checkbox" name="standard_login[role][]" class="form-check-input" value="<?php echo $role->role_id; ?>" <?php echo $read_only . $checked; ?>/> <?php echo ucwords( $role->role_name ); ?> 
																			</label>
																		<?php }
																	} ?>
																</div>	
															</div>
															
															<div class="form-group my-3">
																<label class="control-label col-md-3">Login Time:</label>
																<div class="col-md-9">
																	<select name="standard_login[time]" class="form-control">
																		<option <?php echo $time == "09:00 AM-09:30 AM" ? "selected" : "" ; ?> value="09:00 AM-09:30 AM">09:00 AM - 09:30 AM </option>
																		<option <?php echo $time == "09:00 AM-09:45 AM" ? "selected" : "" ; ?> value="09:00 AM-09:45 AM">09:00 AM - 09:45 AM </option>
																		<option <?php echo $time == "09:30 AM-09:45 AM" ? "selected" : "" ; ?> value="09:30 AM-09:45 AM" >09:30 AM - 09:45 AM </option>
																		<option <?php echo $time == "09:30 AM-10:00 AM" ? "selected" : "" ; ?> value="09:30 AM-10:00 AM">09:30 AM - 10:00 AM </option>
																		<option <?php echo $time == "09:30 AM-10:15 AM" ? "selected" : "" ; ?> value="09:30 AM-10:15 AM">09:30 AM - 10:15 AM </option>
																		<option <?php echo $time == "09:30 AM-09:30 AM" ? "selected" : "" ; ?> value="10:30 AM-10:30 AM">09:30 AM - 10:30 AM </option>
																	</select>
																</div>	
															</div>
															
															<hr>
														</div>

														<div class="form-group">
															<div class="form-actions">
																<div class="row">
																	<div class="col-md-offset-2 col-md-10">
																		<input type="hidden" name="inp[id]" value="<?php if($settings!= NULL){ echo $settings[0]->id; }?>"/>	
																		<input type="hidden" name="type" value="<?php if($settings!= NULL){ echo "Update"; } else { echo "Add";}?>"/>
																		<button type="submit" class="btn green">
																			<i class="fa fa-check"></i> Update</button>
																	</div>
																</div>
															</div>
														</div>
														
														<div id="res_login"></div>
													</div>	
												</form>
											</div>
											<!--end login info setting-->	

											<div class="tab-pane" id="tab_1_4">
												<h4>Agent Discount Price: </h4>
												<form role="form" class="form-horizontal form-bordered" id="updateAgentDiscount">
													<?php
														$s_login_data_setting = unserialize( $settings[0]->standard_login); 
														$activated = isset( $s_login_data_setting['activated'] ) && !empty($s_login_data_setting['activated']) ? 1 : 0;
														$time = isset($s_login_data_setting['time']) && !empty( $s_login_data_setting['time'] ) ? $s_login_data_setting['time'] : 0;
														$roles = isset($s_login_data_setting['role']) && !empty( $s_login_data_setting['role'] ) ? $s_login_data_setting['role'] : 0;
													?>
													<div class="row">
														<div class="form-group col-md-6 my-2">
															<label class="control-label col-md-3">Select Discount Price:</label>
															<select  name="agent_discount" class="form-control">
																<option value="">Select</option>
																<?php 
																	for( $i=1 ; $i <=50 ; $i++ ){
																		echo "<option value='{$i}'>{$i}</option>";
																	}
																?>
															</select>
														</div>
														<div class="form-group col-md-12 my-2">
															<div class="form-actions">
																<input type="hidden" name="inp[id]" value="<?php if($settings!= NULL){ echo $settings[0]->id; }?>"/>	
																<input type="hidden" name="type" value="<?php if($settings!= NULL){ echo "Update"; } else { echo "Add";}?>"/>
																<button type="submit" class="btn green"> <i class="fa fa-check"></i> Update</button>
															</div>
														</div>
														<div id="res_price"></div>
													</div>	
												</form>
											</div><!--end login info setting-->	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Ajax Update Settings 
jQuery(document).ready(function($) {
	$("#updateGeneralSettings").validate({
		rules: {
			admin_email: {
				required: true,
			},
		},
		submitHandler: function(form) {
			var ajaxReq;
			var response = $("#res");
			var formData = $("#updateGeneralSettings").serializeArray();
			if (confirm("Are you sure to save changes ?")) {
				if (ajaxReq) {
					ajaxReq.abort();
				}
				ajaxReq = jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "Settings/ajax_updateGeneralsettings",
					dataType: 'json',
					data: formData,
					beforeSend: function(){
						response.show().html('<p class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
					},
					success: function(res) {
						if (res.status == true){
							response.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							//console.log("done");
							//location.reload();
							setTimeout(function() { response.fadeOut('fast'); }, 2000); // <-- time in milliseconds
						}else{
							response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
							//console.log("error");
						}
					},
					error: function(){
						response.html('<div class="alert alert-danger"><strong>Error! </strong>Please Try again later! </div>');
					}
				});
			}	
		}
	});	
	
	/* update company info */
	$("#updatecompanyinfo").validate({
		submitHandler: function(form) {
			var ajaxReq;
			var response = $("#res_cmp");
			var formData = $("#updatecompanyinfo").serializeArray();
			if (confirm("Are you sure to save changes ?")) {
				if (ajaxReq) {
					ajaxReq.abort();
				}
				ajaxReq = jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "Settings/ajax_updateCompanyInfo",
					dataType: 'json',
					data: formData,
					beforeSend: function(){
						response.show().html('<p class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
					},
					success: function(res) {
						if (res.status == true){
							response.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							//console.log("done");
							//location.reload();
							setTimeout(function() { response.fadeOut('fast'); }, 2000); // <-- time in milliseconds
						}else{
							response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
							//console.log("error");
						}
					},
					error: function(){
						response.html('<div class="alert alert-danger"><strong>Error! </strong>Please Try again later! </div>');
					}
				});
			}	
		}
	});	
	
	
	/* update company info */
	$("#updateLoginInfo").validate({
		submitHandler: function(form) {
			var ajaxReq;
			var response = $("#res_login");
			var formData = $("#updateLoginInfo").serializeArray();
			if (confirm("Are you sure to save changes ?")) {
				if (ajaxReq) {
					ajaxReq.abort();
				}
				ajaxReq = jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "Settings/ajax_updateLoginInfo",
					dataType: 'json',
					data: formData,
					beforeSend: function(){
						response.show().html('<p class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
					},
					success: function(res) {
						if (res.status == true){
							response.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							//console.log("done");
							//location.reload();
							setTimeout(function() { response.fadeOut('fast'); }, 2000); // <-- time in milliseconds
						}else{
							response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
							//console.log("error");
						}
					},
					error: function(){
						response.html('<div class="alert alert-danger"><strong>Error! </strong>Please Try again later! </div>');
					}
				});
			}	
		}
	});	


	$("#updateAgentDiscount").validate({
		submitHandler: function(form) {
			var ajaxReq;
			var response = $("#res_price");
			var formData = $("#updateAgentDiscount").serializeArray();
			if (confirm("Are you sure to save changes ?")) {
				if (ajaxReq) {
					ajaxReq.abort();
				}
				ajaxReq = jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "Settings/updateAgentDiscount",
					dataType: 'json',
					data: formData,
					beforeSend: function(){
						response.show().html('<p class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
					},
					success: function(res) {
						if (res.status == true){
							response.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							//console.log("done");
							//location.reload();
							// setTimeout(function() { response.fadeOut('fast'); }, 2000); // <-- time in milliseconds
						}else{
							response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
							//console.log("error");
						}
					},
					error: function(){
						response.html('<div class="alert alert-danger"><strong>Error! </strong>Please Try again later! </div>');
					}
				});
			}	
		}
	});	


	//tax field filter
	$(".numberFilter").on('keyup keypress', function(e){
		if(this.value.length==3) return false;
		
		var keyCode = e.keyCode || e.which;
		if (keyCode != 8) {
            //if not a number
            if (keyCode < 48 || keyCode > 57) {
                     //disable key press
                     return false;
                 } //end if
                 else {
                     // enable keypress
                     return true;
                 } //end else
             } //end if
             else {
                // enable keypress
                 return true;
             } //end else
				 
	});
});
</script>