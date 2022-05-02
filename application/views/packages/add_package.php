<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Create Package</div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("packages"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
			<div class="" id="form_wizard_1">
				<div class="portlet-body form bg-white p-3 rounded-4 shadow-sm">
					<form id="itiForm_form">
						<div class="form-horizontal" id="itiForm_form">
							<!--end Section Customer Section-->
							<div class="form-wizard">
								<div class="form-body">
									<ul class="nav nav-pills nav-justified steps">
										<li>
											<a href="#tab1" data-toggle="tab" class="step">
												<span class="number"> 1 </span>
												<span class="desc">
													<i class="fa fa-check"></i> Package Overview </span>
											</a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab" class="step">
												<span class="number"> 2 </span>
												<span class="desc">
													<i class="fa fa-check"></i> Day Wise Itineray </span>
											</a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number"> 3 </span>
												<span class="desc">
													<i class="fa fa-check"></i> Inclusion & Exclusion </span>
											</a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab" class="step">
												<span class="number"> 4 </span>
												<span class="desc">
													<i class="fa fa-check"></i> Hotel Details </span>
											</a>
										</li>
										<li>
											<a href="#tab7" data-toggle="tab" class="step">
												<span class="number"> 5 </span>
												<span class="desc">
													<i class="fa fa-check"></i> Submit Itineray </span>
											</a>
										</li>
									</ul>
									<div id="bar" class="progress progress-striped" role="progressbar">
										<div class="progress-bar progress-bar-success"> </div>
									</div>
									<div class="tab-content">
										<div class="alert alert-danger display-none">
											<button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
										<div class="tab-pane active" id="tab1">
											<h3 class="block">Provide Package details</h3>
											<div class="row card_border_blue mt-4 row">
												<div  class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label">State
															<span class="required"> * </span>
														</label>
														<div class="col-md-11">
															<?php $state_list = get_indian_state_list(); 
															if( $state_list ){
																echo "<select name='state' class='form-control' id='state'>";
																	echo '<option value="">Select State</option>';
																	foreach($state_list as $state){
																		echo '<option value="'.$state->id.'">'.$state->name.'</option>';
																	}
																echo "</select>";
															}else{ ?>
																<input type="text" placeholder="State Name" name="state" class="form-control" value="" /> 
															<?php } ?>
														</div>
													</div>
												</div>
												<div  class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label">Package Name
															<span class="required"> * </span>
														</label>
														<div class="col-md-11">
															<input type="text" class="form-control" name="package_name" placeholder="Enter Package Name."/>
														</div>
													</div>
												</div>
												<div  class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label">Duration
															<span class="required"> * </span>
														</label>
														<div class="col-md-11">
															<input type="text" required class="form-control" id="package_duration" name="package_duration" placeholder="Enter Package Duration eg. 3 Nights and 4 days." value=""/>
														</div>
													</div>
												</div>
												<div  class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label">Package Category
															<span class="required"> * </span>
														</label>
														<div class="col-md-11">
															<select name="p_cat_id" required class="form-control">
																<option value="">Select Package Category</option>
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
												</div>									
												<div  class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label">Routing
															<span class="required"> * </span>
														</label>
														<div class="col-md-11">
															<input type="text" required value= "" class="form-control" name="package_routing" placeholder="Enter Package Routing." />
														</div>
													</div>
												</div>
												<div  class="col-md-6 my-2">
													<div class="form-group row">
														<label class="control-label">No. of Persons
															<span class="required"> * </span>
														</label>
														<div class="col-md-3 mb-3 mb-md-0">
															<input type="text" required class="form-control" name="adults" value="" placeholder="Adults" />
														</div>
														<div class="col-md-3 mb-3 mb-md-0">
															<input type="text" class="form-control" name="child" value="" placeholder="Children" />
														</div>
														<div class="col-md-5">
														<input type="text" class="form-control" name="child_age" value="" placeholder="Child Age: eg. 12,15,18." />
														</div>
														
													</div>
												</div>
												<div  class="col-md-6 my-2">
													<div class="form-group">
														<label class="control-label">Cab
															<span class="required"> * </span>
														</label>
														<div class="col-md-11">
															<select required name="cab_category" class="form-control">
																<option value="">Choose Car Category</option>
																<?php $cars = get_car_categories(); 
																	if( $cars ){
																		foreach($cars as $car){
																			echo '<option value = "'.$car->id .'" >'.$car->car_name.'</option>';
																		}
																	}
																?>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Day Wise Itineray -->
										<div class="tab-pane" id="tab2">
											<h3 class="block">Day Wise Itineray</h3>
											<div class="mt-repeater">
												<div data-repeater-list="tour_meta">
													<div data-repeater-item class="mt-repeater-item daywise_section">
														<div class="row card_border_blue">
															<div class="col-md-2 my-2">
																<div class="mt-repeater-input form-group">
																	<label class="control-label">Day</label><span class="required"> * </span>

																	<input required  placeholder="Day 1" type="text" name="tour_day" class="form-control" value="" /> 
																</div>
																<input readonly="readonly" class="input-group form-control" size="16" type="hidden" value="" name="tour_date"  />
															</div>
															<div class="col-md-8 my-2">
																<div class="mt-repeater-input form-group t_title">
																	<label class="control-label">Tour Title</label><span class="required"> * </span>
																	
																	<input required  placeholder="Shimla local sight" type="text" name="tour_name" class="form-control" value="" /> 
																</div>
															</div>
															<div class="col-md-2 my-2">
																<div class="mt-repeater-input form-group">
																	<label class="control-label">Distance</label><span class="required"> * </span>
																	
																	<input required  placeholder="100 Km" type="number" name="tour_distance" class="form-control tour_distant" value="" /> 
																</div>
															</div>
															<div class="col-md-12 my-2">
																<div class="mt-repeater-input mt-repeater-textarea t_des"> 		<label class="control-label">Tour Description</label>
																	<span class="required"> * </span>
																	<textarea required="required" name="tour_des" class="form-control" rows="2"></textarea>
																				
																</div>
															</div>
															<div class="col-md-4 my-2">
																<div class="mt-repeater-input form-group">
																	<label class="control-label">Meal Plan</label><span class="required"> * </span>
																	
																	<select required name="meal_plan" class="form-control">
																		<option value="">Choose Meal Plan</option>
																		<option value="Breakfast Only">Breakfast Only</option>
																		<option value="Breakfast & Dinner">Breakfast & Dinner</option>
																		<option value="Breakfast, Lunch & Dinner">Breakfast, Lunch & Dinner</option>
																		<option value="Dinner Only">Dinner Only</option>
																		<option value="No">No Meal Plan</option>
																	</select>
																</div>
															</div>
															<div class="col-md-8 my-2">
																<div class="mt-repeater-input">
																	<label class="control-label">Attraction</label>
																	<div class="hot_des" style="float:none;">
																		<input type="hidden" value="" class="tags_values" name="hot_des">
																		<input type="text" value="" class="form-control" placeholder="Add a attraction points" />
																	</div>
																</div>
															</div>
														</div> 
														<!-- row close-->	
														<!-- jQuery Repeater Container -->
														<div class="mt-repeater-input del_rep">
															<a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete my-3" style="position:relative;">
															<i class="fa-solid fa-trash-can"></i></a>
														</div>
													</div>
												</div>
												<a href="javascript:;" data-repeater-create class="btn btn-primary mt-repeater-add addrep"><i class="fa-solid fa-plus"></i></a>
											</div>
										</div>
										<!-- Inclusion & Exclusion -->
										<div class="tab-pane" id="tab3">
											<h6 class="fs-6">Inclusion & Exclusion</h6>
											<div class="row">
												<!-- Begin Inclusions -->
												<div class="col-md-6 my-3">
													<div class="mt-repeater-inc tour_field_repeater">
														<h3>Inclusion</h3>
														<div class="repeater_wrapper" data-repeater-list="inc_meta">
															<div data-repeater-item class="mt-repeater-inc-item form-group">
																<div class="mt-repeater-inc-cell row mb-3">
																	<div class="mt-repeater-inc-input col-sm-12 position-relative">
																		<input required type="text" name="tour_inc" class="form-control" value="" /> 
																		<div class="mt-repeater-inc-input">
																		    <a href="javascript:;" title="delete" data-repeater-delete class="btn btn-danger mt-repeater-delete delete_repeater"> <i class="fa-solid fa-trash-can"></i> </a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<a href="javascript:;" data-repeater-create class="btn btn-primary mt-repeater-inc-add">
														<i class="fa-solid fa-plus"></i></a>
													</div>
													
												</div>	
												<!-- End Inclusions -->

												<!-- Begin Exclusions -->
												<div class="col-md-6 my-3">
													<?php $terms = get_terms_condition();
														if( $terms ){
															$terms = $terms[0];
															$hotel_exc = unserialize($terms->hotel_exclusion);
															$hotel_notes = unserialize($terms->hotel_notes);
															$rates_dates_notes = unserialize($terms->rates_dates_notes);
														}else{
															$hotel_exc = "";
															$hotel_notes = "";
															$rates_dates_notes = "";
														}
													?>	
													<div class="mt-repeater-exc tour_field_repeater">
														<h3>Exclusion</h3>
														<div class="repeater_wrapper" data-repeater-list="exc_meta">  
															<?php $count_hotel_exc	= count( $hotel_exc );
															if( !empty($hotel_exc ) ){ ?>
																<?php for ( $i = 0; $i < $count_hotel_exc; $i++ ) { ?>
																	<div data-repeater-item class="mt-repeater-exc-item form-group row mb-3">
																		<!-- jQuery Repeater Container -->
																		<div class="mt-repeater-exc-input col-sm-12 position-relative">
																			<input required type="text" name="exc_meta[<?php echo $i; ?>][tour_exc]" class="form-control" value="<?php echo $hotel_exc[$i]["hotel_exc"] ;?>" /> 
																			<div class="mt-repeater-exc-input">
																			    <a title="delete" href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete delete_repeater"> <i class="fa-solid fa-trash-can"></i> </a>
																			</div>
																		</div>
																	</div>
																<?php } ?>
															<?php }else{ ?>	
																<div data-repeater-item class="mt-repeater-exc-item form-group row mb-3">
																	<!-- jQuery Repeater Container -->
																	<div class="mt-repeater-exc-input col-sm-12 position-relative">
																		<input required type="text" name="tour_exc" class="form-control" value="" /> 
																		<div class="mt-repeater-exc-input">
																		    <a title="delete" href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete delete_repeater"> <i class="fa-solid fa-trash-can"></i> </a>
																		</div>
																	</div>
																</div>
															<?php } ?>	
														</div>
														<a href="javascript:;" data-repeater-create class="btn btn-primary mt-repeater-add">
														<i class="fa-solid fa-plus"></i></a>
													</div>
												</div>
												<!-- End Exclusions -->

												<hr class="mt-4">

												<!-- Begin Special Inclusions Section-->
												<div class="col-md-12">
													<div class="mt-repeater-spinc tour_field_repeater_sp">
														<h3>Special Inclusions</h3>
														<div class="repeater_wrapper" data-repeater-list="special_inc_meta">
															<div data-repeater-item class="mt-repeater-spinc-item form-group">
																<div class="mt-repeater-spinc-cell row my-3">
																	<div class="mt-repeater-spinc-input col-sm-12 position-relative">
																		<input required type="text" name="tour_special_inc" class="form-control" value="" /> 
																		<div class="mt-repeater-spinc-input">
																		    <a href="javascript:;" title="delete" data-repeater-delete class="btn btn-danger mt-repeater-delete delete_repeater"> <i class="fa-solid fa-trash-can"></i></a>
																		</div>
																	</div>
																</div>
															</div>
														</div><br>
														<a href="javascript:;" data-repeater-create class="btn btn-primary mt-repeater-spinc-add">
														<i class="fa-solid fa-plus"></i></a>
													</div>
												</div>	
												<!-- End Special Inclusions Section -->
											</div>
										</div>
										<!-- Begin Hotel Details -->
										<div class="tab-pane" id="tab4">
											<h3 class="block">Hotel Details</h3>
											<h4 class="fs-7 mb-0">Choose Hotel By Categories:</h4>
											<div class="mt-repeater-hotel tour_field_repeater">
												<div data-repeater-list="hotel_meta">
													<div data-repeater-item class="mt-repeater-hotel-item border-bottom mb-3 pb-4">
														<div class="row">
															<div class='mt-repeater-hotel-input  col-xxl-3 col-md-12 my-2' >
																<label><strong>Hotel Location:</strong></label>
																<input required type="text" name='hotel_location' class='form-control' placeholder="Eg. Shimla/Manali">
															</div>
															<div class='mt-repeater-hotel-input standard col-xxl-2 col-md-3 my-2' >
																<label><strong>Standard:</strong></label>
																<textarea name="hotel_standard" required class='form-control'></textarea>
															</div>
															
															<div class='mt-repeater-hotel-input deluxe col-xxl-2 col-md-3 my-2' >
																<label><strong>Deluxe:</strong></label>
																<textarea name="hotel_deluxe" required class='form-control'></textarea>
															</div>
															<div class='mt-repeater-hotel-input super_deluxe col-xxl-2 col-md-3 my-2' >
																<label><strong>Super Deluxe:</strong></label>
																<textarea name="hotel_super_deluxe" required class='form-control'></textarea>
															</div>
															<div class='mt-repeater-hotel-input luxury col-xxl-2 col-md-3 my-2' >
																<label><strong>Luxury:</strong></label>
																<textarea name="hotel_luxury" required class='form-control'></textarea>
															</div>
															<div class="mt-repeater-hotel-input col-md-1 my-2">
																<label for="" class="control-label d-none d-xxl-block">&nbsp;</label>
																<a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</div> <!-- row -->
													</div>
												</div>
												<p></p>
												<a href="javascript:;" data-repeater-create class="btn btn-primary mt-repeater-hotel-add">
												<i class="fa-solid fa-plus"></i> Add Hotel</a>
											</div>		
											<hr>				
											<div class="mt-repeater-hotel-note tour_field_repeater">
												<div class="repeater_wrapper" data-repeater-list="hotel_note_meta">
													<label class="control-label">Add Hotel Note*: </label>
													<?php $count_hotel_notes = count( $hotel_notes );
													if( !empty( $hotel_notes ) ){ ?>
													<?php for ( $i = 0; $i < $count_hotel_notes; $i++ ) { ?>
													<div data-repeater-item class="mt-repeater-hotel-note-item form-group row mb-3">
														<!-- jQuery Repeater Container -->
														<div class="mt-repeater-hotel-note-input col-12 position-relative">
															<div class="mt-repeater-hotel-note-input">
																<input required type="text" name="hotel_note_meta[<?php echo $i; ?>][hotel_note]" class="form-control" value="<?php echo $hotel_notes[$i]["hotel_notes"] ;?>" /> 
																<div class="mt-repeater-hotel-note-input">
																	<a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete delete_repeater"> <i class="fa-solid fa-trash-can"></i></a>
																</div>
															</div>
														</div>
													</div>
													<?php } ?>	
													<?php }else{ ?>
														<div data-repeater-item class="mt-repeater-hotel-note-item form-group row mb-3">
															<!-- jQuery Repeater Container -->
															<div class="mt-repeater-hotel-note-input col-12 position-relative">
																<div class="mt-repeater-hotel-note-input">
																	<input required type="text" name="hotel_note" class="form-control" value="" /> 
																	<div class="mt-repeater-hotel-note-input">
																       <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete delete_repeater"> <i class="fa-solid fa-trash-can"></i></a>
																	</div>
																</div>
															</div>
														</div>
													<?php } ?>	
												</div>
												<a href="javascript:;" data-repeater-create class="btn btn-primary mt-repeater-hotel-note">
												<i class="fa-solid fa-plus"></i> Add Note</a>
											</div>
										</div>
										<!-- End Hotel Details -->
										<div class="tab-pane" id="tab7">
											<div class="verify_msg">
												<p>You can review your inputs by clicking on Back Button. To save this itinerary Click on Submit Button.</p>
											</div>
										
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9 text-right">
											<a href="javascript:;" class="btn default button-previous">
												<i class="fa fa-angle-left"></i> Back </a>
											<a href="javascript:;" class="btn btn_blue_outline button-next"> Save & Continue
												<i class="fa fa-angle-right"></i>
											</a>
											<a href="javascript:;" id="SubmitForm" class="btn green button-submit">Submit</a>
											<!--input type="submit" class="btn green button-submit" value="Submit"-->
											
										</div>
									</div>
								</div>
							</div>
							<?php 
								$rand = getTokenKey(8); 
								$date = date("Ymd"); 
								$time = time(); 
								$unique_key = $rand . "_" . $date . "_" . $time; 
							?>
							<input id="unique_key" type="hidden" name="temp_key" value="<?php echo $unique_key; ?>">
							<input id="agent_id" type="hidden" name="agent_id" value="<?php echo $user_id; ?>">
						</div>
					</form>	
					<div id="res"></div>
				</div>
				<!-- END CONTENT BODY -->
			</div>
			<!-- Modal -->
 		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
	//submit form
	$("#SubmitForm").click(function(){
		var formData = $('#itiForm_form').serializeArray();
		var resp = $("#res");
		var ajaxReq;
		if (ajaxReq) {
			ajaxReq.abort();
		}
		ajaxReq = $.ajax({
			type: "POST",
			url: "<?php echo base_url('packages/addPackage'); ?>",
		   data: formData,
		   dataType: "json",
			beforeSend: function(){
				resp.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
			},
			success: function(res) {
				if (res.status == true){
					resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
					//console.log("done");
					$('#itiForm_form')[0].reset();
					//console.log(res.msg);
					window.location.href = "<?php echo site_url('packages/view/');?>" + res.package_id + "/" + res.temp_key; 
					
				}else{
					resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
					//console.log("error");
				}
			},
			error: function(e){
				console.log(e);
				resp.html('<div class="alert alert-danger"><strong>Error!</strong> Please Try again later! </div>');
			}
		});
		//add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
	});
	//tour date picker on daywise itinerary
	$(document).on("click", '.tour_dt', function(){
		$(this).datepicker({startDate: '-1d', format: "dd/mm/yyyy"}).datepicker('show');
	});
	
	//set quotation defalut date
	$('.quatation_date').datepicker({startDate: 'now'});
	$('.quatation_date').datepicker('setDate', new Date());
	
	FormWizard.init();	
}); 
var FormWizard = function () {
    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }
            var form = $('#itiForm_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);
			var ajaxReq;
            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //package
                    package_name: {required: true},
                },
                errorPlacement: function (error, element) { // render error placement for each input type
                    error.insertAfter(element); // for other inputs, just perform default behavior
                },
                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },
                highlight: function (element) { // hightlight error inputs
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                },
            });
			var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                   
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    return false;
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
					var ajaxReq;
					var response = $("#res");
					success.hide();
                    error.hide();
					if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, index);
					
					 //Custom jquery
					var total = navigation.find('li').length;
					var currentIndex = index;
					
					//add hot destination on daywise iti
					if( currentIndex == 2 ){
						$(".hot_des").each(function(){
							var t_values = $(this).find(".tags_values");
							var spans = $(this).find("span");
							var tag_text_arr = $.map(spans, function(elem, index){
								return $( elem ).text();
							}).join(",");
							t_values.val(tag_text_arr);
						});
					}
					
				 	//get value for second step
					var formData 	= $('#itiForm_form').serializeArray();
					//Push step to form data
					var step = { name: "step",  value: currentIndex };
					formData.push(step);
					
					//check for ajax request
					if (ajaxReq) {
						ajaxReq.abort();
					}
					ajaxReq = $.ajax({
						type: "POST",
						url: "<?php echo base_url('packages/ajax_savedata_stepwise'); ?>",
						data: formData,
						dataType: "json",
						beforeSend: function(){
							//response.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
						},
						success: function(res) {
							if (res.status == true){
								//$('#form_wizard_1').find('.button-next').show();
								console.log("save");
								//response.html("");
							}else{
								//response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
								console.log("error"+ res.msg);
							}
						},
						error: function(e){
							//response.html('<div class="alert alert-danger"><strong>Error! </strong>Please try again.</div>');
							console.log("error");
						}
					});   
				},
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();
                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
					//check if step is 2
					var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }, 
				
            });
            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').hide(); 
        }
    };
}();

</script>

<script type="text/javascript">
var FormRepeater = function () {
    return {
        //main function to initiate the module
        init: function () {
			/*Day wise itinerary */
			jQuery('.mt-repeater').each(function(){
				var nexti = 1;
				
				$(this).find(".del_rep").hide();
				$(this).repeater({
					show: function () {
						var tour_data = $(this).prev(".mt-repeater-item").repeaterVal();
						var count_daywise_div	 = $('.daywise_section').length;
						var c_day = count_daywise_div-1;
						//console.log("day " + c_day);
						//console.log(tour_data);
						var resultData	  = $("#tour_data_preview");
						var tour_day 	  = tour_data["tour_meta"][0]["tour_day"];
						var tour_name 	  = tour_data["tour_meta"][0]["tour_name"];
						var tour_des 	  = tour_data["tour_meta"][0]["tour_des"];
						var tour_date 	  = tour_data["tour_meta"][0]["tour_date"];
						var tour_distant  = $(this).prev(".mt-repeater-item").find(".tour_distant").val();
						var meal_plan  	  = tour_data["tour_meta"][0]["meal_plan"];
						//console.log("Tour: " + tour_name);
						resultData.append("<div class='day_wise_preview' id=day_" + c_day  + "><strong class='day_pr'> Day: <span class='dd'>" + tour_day + "</span> </strong><h2>" + tour_name + "</h2><br>Tour Description: " + tour_des + "</div><br>Tour Date: " + tour_date + "</div><br>Meal Plan: " + meal_plan + "</div><br>Tour Distant: " + tour_distant + " Kilometer </div>" );
						
						//end set preview
						
						var ddd = $(this).prev(".mt-repeater-item").find(".sta_d").text();
						$(this).find(".sta_d").text(+ddd + +1);
						$(this).find(".del_rep").show();
	                	$(this).show();
						nexti++;
					},
		            hide: function (deleteElement) {
		                if(confirm('Are you sure you want to delete this element?')) {
							var get_current_div = $(this).find(".sta_d").text();
							//remove day from preview
							var rem_div = $("#tour_data_preview").find("#day_" + get_current_div );
							var nextDayDiv = rem_div.nextAll( ".day_wise_preview" );
							nextDayDiv.each(function(){
								var z=1;
								/*substract day*/
								var nexD = $(this).find(".dd").text(), ss = 1;
								var dSub = nexD - ss;
								$(this).find(".dd").text(dSub);
								$(this).attr("id", "day_" + dSub);
								ss++;
								console.log(nexD);
							});
							rem_div.remove();
							//console.log( get_current_div );
							nexti--;
						    $(this).slideUp(deleteElement);
							var nextDiv = $(this).nextAll(".mt-repeater-item");
							nextDiv.each(function(){
								var z=1;
								/*substract day*/
								var nexD = $(this).find(".sta_d").text(), ss = 1;
								var dSub = nexD - ss;
								$(this).find(".sta_d").text(dSub);
								ss++;
							});
						}
		            },
		            ready: function (setIndexes) {
						
		            },
				});
			});
			/* Tour field repeater */
			jQuery('.tour_field_repeater').each(function(){
				$(this).find(".mt-repeater-delete:eq( 0 )").hide();
				$(this).repeater({
					show: function () {
						$(this).find(".mt-repeater-delete:eq( 0 )").show();
	                	$(this).show();
                	},
		            hide: function (deleteElement) {
		                if(confirm('Are you sure you want to delete this element?')) {
		                    $(this).slideUp(deleteElement);
		                }
		            },

		            ready: function (setIndexes) {

		            }

        		});
        	});
			/* Special inc Tour field repeater */
			jQuery('.tour_field_repeater_sp').each(function(){
				$(this).repeater({
					show: function () {
						$(this).show();
                	},
		            hide: function (deleteElement) {
		                if(confirm('Are you sure you want to delete this element?')) {
		                    $(this).slideUp(deleteElement);
		                }
		            },

		            ready: function (setIndexes) {

		            }

        		});
        	});
        }
    };
}();

jQuery(document).ready(function($) {
	FormRepeater.init();
});
</script>   

<script type="text/javascript">
	$(function(){ 
		// ::: TAGS BOX
		$(document).on("focusout", ".hot_des input",function() {
			//var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
			var txt = this.value;
			if(txt){
				$("<span/>", {text:txt.toLowerCase(), insertBefore:this});
			}	
			this.value = "";
		});
		$(document).on("keyup", ".hot_des input",function(ev) {
			// if: comma|enter (delimit more keyCodes with | pipe)
			if(/(188|13)/.test(ev.which)) $(this).focusout(); 
		});
		$(document).on("click", ".hot_des span", function() {
			$(this).remove(); 
		});
	});
</script>