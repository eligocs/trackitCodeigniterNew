<div class="page-container itinerary-view">
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php if( !empty($itinerary[0] ) ){ 			
				$iti = $itinerary[0];
				
				$terms = get_terms_condition();
				$online_payment_terms	 	= isset($terms[0]) && !empty($terms[0]->bank_payment_terms_content) ? unserialize($terms[0]->bank_payment_terms_content) : "";
				$advance_payment_terms		= isset($terms[0]) && !empty($terms[0]->advance_payment_terms) ? unserialize($terms[0]->advance_payment_terms	) : "";
				$cancel_tour_by_client 		= isset($terms[0]) && !empty($terms[0]->cancel_content) ? unserialize( $terms[0]->cancel_content) : "";
				$terms_condition			= isset($terms[0]) && !empty($terms[0]->terms_content) ? unserialize($terms[0]->terms_content) : "";
				$disclaimer 				= isset($terms[0]) && !empty($terms[0]->disclaimer_content) ? htmlspecialchars_decode($terms[0]->disclaimer_content) : "";
				$greeting 					= isset($terms[0]) && !empty($terms[0]->greeting_message) ? $terms[0]->greeting_message : "";
				$amendment_policy			= isset($terms[0]) && !empty($terms[0]->amendment_policy) ? unserialize( $terms[0]->amendment_policy) : "";
				$book_package_terms			= isset($terms[0]) && !empty($terms[0]->book_package) ? unserialize( $terms[0]->book_package) : "";
				$signature					= isset($terms[0]) && !empty($terms[0]->promotion_signature) ?  htmlspecialchars_decode($terms[0]->promotion_signature) : "";
				$payment_policy				= isset($terms[0]) && !empty($terms[0]->payment_policy) ? unserialize($terms[0]->payment_policy) : "";
				
				//Get customer info
				$get_customer_info = get_customer( $iti->customer_id ); 
				$customer_name = $customer_contact = $customer_email = $ref_name = $ref_contact = "";
				
				if( $get_customer_info ){
					$cust = $get_customer_info[0];
					$customer_name 		= $cust->customer_name;
					$customer_contact 	= $cust->customer_contact;
					$customer_email		= $cust->customer_email;
					
					$cus_type 			= get_customer_type_name($cust->customer_type);
					if( $cust->customer_type == 2 ){
						$ref_name = "< Ref. Name: " . $cust->reference_name;
						$ref_contact = " Ref. Contact: " . $cust->reference_contact_number . " >";
					}
				}	
				?>
				
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption"><i class="fa fa-users"></i><strong class='green'>Customer Name: </strong><?php echo $customer_name; ?> 
						<?php if( is_admin_or_manager() ){ ?>
							<strong class='green'>Customer Type: </strong><span class='red'><?php echo $cus_type; ?></span> <?php echo $ref_name . $ref_contact; ?>
						<?php } ?>
						{ Package Type: <strong class="red"> <?php echo check_iti_type( $iti->iti_id ); ?></strong> }
						</div>
						<a class="btn btn-success pull-right" href="<?php echo site_url("itineraries"); ?>" title="Back">Back</a>
					</div>
				</div>
				<!-- Declined Reason -->
				<div class="well well-sm">
					<p class="red text-center">Declined Reason: <strong><?php echo $iti->followup_status; ?></strong></p>
					<p class="red text-center">Declined Comment: <strong><?php echo $iti->decline_comment; ?></strong></p>
				</div>
				
				<div class="row2">
					<?php // echo $greeting; ?>
					<div class="well well-sm"><h3>Package Overview</h3></div>
					<div class="table-responsive">
						<table class="table table-bordered ">
							<tbody>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Name of Package</strong></td>
									<td width="33%"><strong>Routing</strong></td>
									<td width="33%"><strong>Duration</strong></td>
								</tr>
								<tr>
									<td><?php echo $iti->package_name; ?></td>
									<td><?php echo $iti->package_routing; ?></td>
									<td><?php echo $iti->duration; ?></td>
								</tr>
								
								<tr class="thead-inverse">
									<td><strong>No of Travellers</strong></td>
									<td><strong>Cab</strong></td>
									<td><strong>Quotation Date</strong></td>
								</tr>
								<tr>
									<td><div class="traveller-info">
										<?php
										echo "<strong> Adults: </strong> " . $iti->adults; 
										if( !empty( $iti->child ) ){
											echo "  <strong> No. of Child: </strong> " . $iti->child; 
											echo " (" . $iti->child_age .")"; 
										}
										?>
										</div>
									</td>
									<td><?php echo get_car_name($iti->cab_category); ?></td>
									<td><?php echo display_date_month_name($iti->quatation_date); ?></td>
								</tr>
								<tr class="thead-inverse">
									<td><strong>Customer Name</strong></td>
									<td><strong>Contact</strong></td>
									<td><strong>Customer Email</strong></td>
								</tr>
								<tr>
									<td><?php echo $customer_name; ?></td>
									<td><?php echo $customer_contact; ?></td>
									<td><?php echo $customer_email; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>
					<hr>
					
					<!--If Flight Exists-->
					<?php if( isset( $flight_details ) && !empty( $flight_details ) && $iti->is_flight == 1 ){ ?>
					<?php $flight = $flight_details[0]; ?>
						<div class="well well-sm"><h3>Flight Details</h3></div>
						<div class="table-responsive">
						<table class="table table-bordered ">
							<tbody>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Trip Type</strong></td>
									<td width="33%"><strong>Flight Name</strong></td>
									<td width="33%"><strong>Class</strong></td>
								</tr>
								<tr>
									<td><?php echo ucfirst($flight->trip_type); ?></td>
									<td><?php echo $flight->flight_name; ?></td>
									<td><?php echo $flight->flight_class; ?></td>
								</tr>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Departure City</strong></td>
									<td width="33%"><strong>Arrival city</strong></td>
									<td width="33%"><strong>No. of Passengers</strong></td>
								</tr>
								<tr>
									<td><?php echo $flight->dep_city; ?></td>
									<td><?php echo $flight->arr_city; ?></td>
									<td><?php echo $flight->total_passengers; ?></td>
								</tr>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Arrival Date/Time</strong></td>
									<td width="33%"><strong>Departure Date/Time</strong></td>
									<td width="33%"><strong>Return Date/Time</strong></td>
								</tr>
								<tr>
									<td><?php echo $flight->arr_time; ?></td>
									<td><?php echo $flight->dep_date; ?></td>
									<td><?php echo $flight->return_date; ?></td>
								</tr>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Return Arrival Date/Time</strong></td>
									<td width="33%"><strong>Price</strong></td>
								</tr>
								<tr>
									<td><?php echo $flight->return_arr_date; ?></td>
									<td><?php echo $flight->flight_price; ?></td>
								</tr>
							</tbody>
						</table>
						<div class="clearfix"></div>
					<hr>
					<?php } ?>
					<!--End Flight Section-->
					<!--If Train Exists-->
					<?php if( isset( $train_details ) && !empty( $train_details ) && $iti->is_train == 1 ){ ?>
					<?php $train = $train_details[0]; ?>
						<div class="well well-sm"><h3>Train Details</h3></div>
						<div class="table-responsive">
						<table class="table table-bordered ">
							<tbody>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Trip Type</strong></td>
									<td width="33%"><strong>Train Name</strong></td>
									<td width="33%"><strong>Train Number</strong></td>
								</tr>
								<tr>
									<td><?php echo ucfirst($train->t_trip_type); ?></td>
									<td><?php echo $train->train_name; ?></td>
									<td><?php echo $train->train_number; ?></td>
								</tr>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Departure City</strong></td>
									<td width="33%"><strong>Arrival city</strong></td>
									<td width="33%"><strong>No. of Passengers</strong></td>
								</tr>
								<tr>
									<td><?php echo $train->t_dep_city; ?></td>
									<td><?php echo $train->t_arr_city; ?></td>
									<td><?php echo $train->t_passengers; ?></td>
								</tr>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Arrival Date/Time</strong></td>
									<td width="33%"><strong>Departure Date/Time</strong></td>
									<td width="33%"><strong>Return Date/Time</strong></td>
									
								</tr>
								<tr>
									<td><?php echo $train->t_arr_time; ?></td>
									<td><?php echo $train->t_dep_date; ?></td>
									<td><?php echo $train->t_return_date; ?></td>
								</tr>
								<tr class="thead-inverse" >
									<td width="33%"><strong>Return Arrival Date/Time</strong></td>
									<td width="33%"><strong>Price</strong></td>
									<td width="33%"><strong>Class</strong></td>
								</tr>	
								<tr>
									<td><?php echo $train->t_return_arr_date; ?></td>
									<td><?php echo $train->t_cost; ?></td>
									<td><?php echo $train->train_class; ?></td>
								</tr>
							</tbody>
						</table>
						<div class="clearfix"></div>
					<hr>
					<?php } ?>
					<!--End Flight Section-->
					
					<div class="well well-sm"><h3>Day Wise Itinerary</h3></div>
					<div class="table-responsive2">
						<table class="table table-bordered">
							<tbody>
								<?php //$day_wise = $iti->daywise_meta; 
								$tourData = unserialize($iti->daywise_meta);
								$count_day = count( $tourData );
								if( $count_day > 0 ){
									//print_r( $tourData );
									for ( $i = 0; $i < $count_day; $i++ ) {
									echo "<tr><td width='10%'>";
										$day = $i+1;
										echo "<span class=''><strong>Day: ".$tourData[$i]['tour_day']."</strong> </span>";
										echo "</td><td width='80%'>";
										echo "<!--<div class='some-space'></div>--><strong>" . $tourData[$i]['tour_name'] . "</strong><br>"; 
										echo "<strong>Tour Date:</strong><em> " .display_date_month($tourData[$i]['tour_date']) . "</em><br>"; 
										echo "<strong>Meal Plan:</strong><em> " .$tourData[$i]['meal_plan'] . "</em><br>"; 
										echo "<strong>Tour Description:</strong><em> " .$tourData[$i]['tour_des'] . "</em><br>"; 
										echo "<strong>Distance:</strong><em> " .$tourData[$i]['tour_distance'] . " KMS</em><br>";
										//hot destination
										if( isset($tourData[$i]['hot_des'] ) && !empty( $tourData[$i]['hot_des'] ) ){
											$hot_dest = '';
											$htd = explode(",", $tourData[$i]['hot_des']);
											foreach($htd as $t) {
												$t = trim($t);
												$hot_dest .= "<span>" . $t . "</span>";
											}
											echo '<div class="hot_des_view "><strong>Attraction: </strong>' . $hot_dest . '</div>';
										}	
										echo "</td>";
									echo "</tr>";
									}
								}	?>
							</tbody>
						</table>
					</div>	
						<hr>
					<div class="well well-sm"><h3>Inclusion & Exclusion</h3></div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="thead-default">
								<tr class="thead-inverse">
									<th  width="50%"> Inclusion</th>
									<th  width="50%"> Exclusion</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$inclusion = unserialize($iti->inc_meta); 
								$count_inc = count( $inclusion );
								$exclusion = unserialize($iti->exc_meta); 
								$count_exc = count( $exclusion );
								echo "<tr><td><ul>";
								if( $count_inc > 0 ){
									for ( $i = 0; $i < $count_inc; $i++ ) {
										echo "<li>" . $inclusion[$i]["tour_inc"] . "</li>";
									}	
								}
								echo "</ul></td><td><ul>";
								if( $count_exc > 0 ){
									for ( $i = 0; $i < $count_exc; $i++ ) {
										echo "<li>" . $exclusion[$i]["tour_exc"] . "</li>";
									}	
								}
								echo "</ul></td></tr>";
								?>
							</tbody>
						</table>
					</div>	
					<?php 
					//check if special inclusion exists
					$sp_inc = unserialize($iti->special_inc_meta); 
					$count_sp_inc = count( $sp_inc );
					if( !empty($sp_inc) ){
						echo '<div class="well well-sm"><h3>Special Inclusions</h3></div>';
						echo "   <ul class='inclusion'>";
						if( $count_sp_inc > 0 ){
							for ( $i = 0; $i < $count_sp_inc; $i++ ) {	
								echo "<li>" . $sp_inc[$i]["tour_special_inc"] . "</li>";
							}	
						}
						echo "</ul>";
					}
					?>
					<?php 
					//check if benefits
					$benefits_m = unserialize($iti->booking_benefits_meta); 
					$count_bn_inc = count( $benefits_m );
					if( !empty($benefits_m) ){
						echo '<div class="well well-sm"><h3>Benefits of Booking With Us</h3></div>';
						echo "   <ul class='inclusion'>";
						if( $count_bn_inc > 0 ){
							for ( $i = 0; $i < $count_bn_inc; $i++ ) {	
								echo isset($benefits_m[$i]["benefit_inc"]) ? "<li>" . $benefits_m[$i]["benefit_inc"] . "</li>" : "";
							}	
						}
						echo "</ul>";
					}
					?>
					<hr>					
					<div class="well well-sm"><h3>Hotel Details</h3></div>
					<?php $hotel_meta = unserialize($iti->hotel_meta); 
					if( !empty( $hotel_meta ) ){
						$count_hotel = count( $hotel_meta ); ?>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead class="thead-default">
									<tr class="thead-inverse">
										<th> Hotel Category</th>
										<th> <?= totalHotelCategory()[0]->hotel_category_name ?></th>
										<th> <?= totalHotelCategory()[1]->hotel_category_name ?></th>
										<th> <?= totalHotelCategory()[2]->hotel_category_name ?> </th>
										<th> <?= totalHotelCategory()[3]->hotel_category_name ?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									/* print_r( $hotel_meta ); */
									if( $count_hotel > 0 ){
										for ( $i = 0; $i < $count_hotel; $i++ ) {
											echo "<tr><td><strong>" .$hotel_meta[$i]["hotel_location"] . "</strong></td><td>";
												$hotel_standard =  $hotel_meta[$i]["hotel_standard"];
												echo $hotel_standard;
											echo "</td><td>";
												$hotel_deluxe =  $hotel_meta[$i]["hotel_deluxe"];
												echo $hotel_deluxe;
											echo "</td><td>";
												$hotel_super_deluxe =  $hotel_meta[$i]["hotel_super_deluxe"];
												echo $hotel_super_deluxe;
											echo "</td><td>";
												$hotel_luxury =  $hotel_meta[$i]["hotel_luxury"];
												echo $hotel_luxury;
											echo "</td></tr>";
										} 	
										//Rate meta
										$rate_meta = unserialize($iti->rates_meta);
										$strike_class = !empty( $discountPriceData ) ? "strikeLine" : " ";
										//print_r( $rate_meta );
										if( !empty( $rate_meta ) ){
											$standard_rates = !empty( $rate_meta["standard_rates"]) ? number_format($rate_meta["standard_rates"]) . "/-" : "<strong class='red'>On Request</strong>";
											$deluxe_rates = !empty( $rate_meta["deluxe_rates"]) ? number_format($rate_meta["deluxe_rates"]) . "/-" : "<strong class='red'>On Request</strong>";
											$super_deluxe_rates = !empty( $rate_meta["super_deluxe_rates"]) ? number_format($rate_meta["super_deluxe_rates"]) . "/-" : "<strong class='red'>On Request</strong>";
											$rate_luxry = !empty( $rate_meta["luxury_rates"]) ? number_format($rate_meta["luxury_rates"]) . "/-" : "<strong class='red'>On Request</strong>";
											
											echo "<tr class='{$strike_class}'><td>Price</td>
													<td>
														<strong>" . $standard_rates . "</strong>
													</td>
													<td>
														<strong>" . $deluxe_rates . "</strong>
													</td>
													<td>
														<strong>" . $super_deluxe_rates . "</strong>
													</td>
													<td>
														<strong>" . $rate_luxry . "</strong>
													</td></tr>";
										}else{
											echo "<tr><td><strong class='red'>Price</strong></td>
													<td>
														<strong class='red'> Coming Soon </strong>
													</td>
													<td>
														<strong class='red'> Coming Soon</strong>
													</td>
													<td>
														<strong class='red'> Coming Soon </strong>
													</td>
													<td>
														<strong class='red'> Coming Soon </strong>
													</td></tr>";
										}
										//discount data
										if( !empty( $discountPriceData ) ){
											foreach( $discountPriceData as $price ){
												$s_price = !empty( $price->standard_rates) ? number_format($price->standard_rates) . "/-" : "<strong class='red'>N/A</strong>";
												$d_price = !empty( $price->deluxe_rates) ? number_format($price->deluxe_rates) . "/-" : "<strong class='red'>N/A</strong>";
												$sd_price = !empty( $price->super_deluxe_rates) ? number_format($price->super_deluxe_rates) . "/-"  : "<strong class='red'>N/A</strong>";
												$l_price = !empty( $price->luxury_rates) ? number_format($price->luxury_rates) . "/-"  : "<strong class='red'>N/A</strong>";
												
												$count_price = count( $discountPriceData );
												$strike_class = ($price !== end($discountPriceData) && $count_price > 1 ) ? "strikeLine" : "";
											echo "<tr class='{$strike_class}'><td>Price</td><td><strong>" . $s_price . "</strong></td>";
												echo "<td><strong>" . $d_price . "</strong></td>";
												echo "<td><strong>" . $sd_price . "</strong></td>";
												echo "<td><strong>" . $l_price . "</strong></td></tr>";
											}
										} 	
									} ?>
								</tbody>
							</table>
						</div>
					<?php } ?>	
	<hr>					
					<div class="well well-sm"><h3>Notes:</h3></div>
					<ul>
					<?php $hotel_note_meta = unserialize($iti->hotel_note_meta); 
					$count_hotel_meta = count( $hotel_note_meta );
					
					if( $count_hotel_meta > 0 ){
						for ( $i = 0; $i < $count_hotel_meta; $i++ ) {
							echo "<li>" . $hotel_note_meta[$i]["hotel_note"] . "</li>";
						}	
					} ?>
					</ul>
				
						<hr>
						
					<div class="well well-sm"><h3>Bank Details: Cash/Cheque at Bank or Net Transfer</h3></div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="thead-default">
								<tr class="thead-inverse">
									<th> Bank Name</th>
									<th> Payee Name</th>
									<th> Account Type</th>
									<th> Account Number</th>
									<th> Branch Address</th>
									<th> IFSC Code</th>
								</tr>
							</thead>
							<tbody>
								<?php $banks = get_all_banks(); 
									if( $banks ){
										foreach( $banks as $bank ){ 
											echo "<tr>";
												echo "<td>" . $bank->bank_name . "</td>";
												echo "<td>" . $bank->payee_name . "</td>";
												echo "<td>" . $bank->account_type . "</td>";
												echo "<td>" . $bank->account_number . "</td>";
												echo "<td>" . $bank->branch_address . "</td>";
												echo "<td>" . $bank->ifsc_code . "</td>";
											echo "</tr>";
										 }
									}
									?>
							</tbody>
						</table>
					</div>
					<?php
						//bank payment terms
						$count_bank_payment_terms	= count( $online_payment_terms ); 
						$count_bankTerms			= $count_bank_payment_terms-1; 
						if(isset($online_payment_terms["heading"]) ) { 
							echo "<div class='well well-sm'><h3>" . $online_payment_terms["heading"] . "</h3></div>"; 
						}
						if( $count_bankTerms > 0 ){
							echo "<ul class='client_listing'>";
								for ( $i = 0; $i < $count_bankTerms; $i++ ) { 
									echo "<li>" . $online_payment_terms[$i]["terms"] . "</li>";
								}
							echo "</ul>";
						}
							//how to book section
							$count_book_package	= count( $book_package_terms );
							if(isset($book_package_terms["heading"]) ) { 
								echo "<div class='well well-sm'><h3>". $book_package_terms["heading"]  ."</h3></div>";
							}
							if(isset($book_package_terms["sub_heading"]) ) { 
								echo "<h5>". $book_package_terms["sub_heading"]  ."</h5>";
							}							
							if( $count_book_package > 0 ){
								echo '<div class="table-responsive">
											<table class="table table-bordered tbl_policy_view">
												<thead class="thead-default">
													<tr>
														<th colspan=3> Booking Policy </th>
													</tr>
												</thead>
												<tbody>';
												$counter = 1;
									for ( $i = 0; $i < $count_book_package-2; $i++ ) { 
										$book_title = isset($book_package_terms[$i]["hotel_book_terms"]) ? $book_package_terms[$i]["hotel_book_terms"] : "";
										$book_val = isset($book_package_terms[$i]["hotel_book_terms_right"]) ? $book_package_terms[$i]["hotel_book_terms_right"] : "";
										echo "<tr>
											<td>" . $counter . "</td>
											<td>" . $book_title . "</td>
											<td>" . $book_val . "</td>
										</tr>";
										$counter++;
									}
								echo "</tbody></table></div>";
							}	
							
							// advance payment section 
							$count_ad_pay	= count( $advance_payment_terms );
							if(isset($advance_payment_terms["heading"]) ) { 
								echo "<div class='well well-sm'><h3>". $advance_payment_terms["heading"]  ."</h3></div>";
							}						
							if( $count_book_package > 0 ){
								echo "<ul class='client_listing'>";
									for ( $i = 0; $i < $count_ad_pay-1; $i++ ) { 
										echo "<li>" . $advance_payment_terms[$i]["terms"] . "</li>";
									}
								echo "</ul>";
							}
							
							//PAYMENT POLICY
							if(isset($payment_policy["heading"]) ) { 
								echo "<div class='well well-sm'><h3>". $payment_policy["heading"]  ."</h3></div>";
							}	
							$count_payment_policy	= count( $payment_policy );
							if( $count_payment_policy > 0 ){
								echo '<div class="table-responsive">
											<table class="table table-bordered tbl_policy_view">
												<thead class="thead-default">
													<tr>
														<th colspan=3> Payment Policy </th>
													</tr>
												</thead>
												<tbody>';
									$counter_pay = 1;
									for ( $i = 0; $i < $count_payment_policy-1; $i++ ) { 
										$book_title = isset($payment_policy[$i]["pay_policy"]) ? $payment_policy[$i]["pay_policy"] : "";
										$book_val = isset($payment_policy[$i]["pay_policy_right"]) ? $payment_policy[$i]["pay_policy_right"] : "";
										echo "<tr>
											<td>" . $counter_pay . "</td>
											<td>" . $book_title . "</td>
											<td>" . $book_val . "</td>
										</tr>";
										$counter_pay++;
									}
								echo "</tbody></table></div>";
							}								
							//end payment policy
							
							//AMENDMENT POLICY section	
							if(isset($amendment_policy["heading"]) ) { 
								echo "<div class='well well-sm'><h3>". $amendment_policy["heading"]  ."</h3></div>";
							}	
							$count_amendment_policy	= count( $amendment_policy );
							
							if( $count_amendment_policy > 0 ){
								echo '<div class="table-responsive">
											<table class="table table-bordered tbl_policy_view">
												<thead class="thead-default">
													<tr>
														<th colspan=3> Amendment Policy </th>
													</tr>
												</thead>
												<tbody>';
									$counter_a = 1;
									for ( $i = 0; $i < $count_amendment_policy-1; $i++ ) { 
										$book_title = isset($amendment_policy[$i]["amend_policy"]) ? $amendment_policy[$i]["amend_policy"] : "";
										$book_val = isset($amendment_policy[$i]["amend_policy_right"]) ? $amendment_policy[$i]["amend_policy_right"] : "";
										echo "<tr>
											<td>" . $counter_a . "</td>
											<td>" . $book_title . "</td>
											<td>" . $book_val . "</td>
										</tr>";
										$counter_a++;
									}
								echo "</tbody></table></div>";
							}
							
							//refund policy
							if(isset($amendment_policy["heading"]) ) { 
								echo "<div class='well well-sm'><h3>". $cancel_tour_by_client["heading"]  ."</h3></div>";
							}
							
							$count_cancel_content	= count( $cancel_tour_by_client );
							
							if( $count_cancel_content > 0 ){
								echo '<div class="table-responsive">
											<table class="table table-bordered tbl_policy_view">
												<thead class="thead-default">
													<tr>
														<th colspan=3> Cancellation and Refund Policy </th>
													</tr>
												</thead>
												<tbody>';
									$counter_ra = 1;
									for ( $i = 0; $i < $count_cancel_content-1; $i++ ) { 
										$book_title = isset($cancel_tour_by_client[$i]["cancel_terms"]) ? $cancel_tour_by_client[$i]["cancel_terms"] : "";
										$book_val = isset($cancel_tour_by_client[$i]["cancel_terms_right"]) ? $cancel_tour_by_client[$i]["cancel_terms_right"] : "";
										echo "<tr>
											<td>" . $counter_ra . "</td>
											<td>" . $book_title . "</td>
											<td>" . $book_val . "</td>
										</tr>";
										$counter_ra++;
									}
								echo "</tbody></table></div>";
							}
							
							//terms and condition
							if(isset($terms_condition["heading"]) ) { 
								echo "<div class='well well-sm'><h3>". $terms_condition["heading"]  ."</h3></div>";
							}
							$count_cancel_content	= count( $terms_condition );
							if( $count_cancel_content > 0 ){
								echo "<ul class='client_listing'>";
									for ( $i = 0; $i < $count_cancel_content-1; $i++ ) { 
										echo "<li>" . $terms_condition[$i]["terms"] . "</li>";
									}
								echo "</ul>";
							}
						?>	
						<hr>
						
						<?php
						$agent_id = $iti->agent_id;
						$user_info = get_user_info($agent_id);
						if($user_info){
							$agent = $user_info[0];
							echo "<strong>Regards</strong><br>";
							echo "<strong> " . $agent->first_name . " " . $agent->last_name . "</strong><br>";
							echo "<strong>Call Us : </strong> " . $agent->mobile . "<br>";
							echo "<strong>Email : </strong> " . $agent->email . "<br>";
							echo "<strong>Timing : </strong> " . $agent->in_time . " To " . $agent->out_time . "<br>";
							echo "<strong>Website : </strong> " . $agent->website;
						}	
						?>
					<hr>
					<div class="signature"><?php echo $signature; ?></div>
					<hr>
					<div class="clearfix"></div>
					
					<!--Comments Section -->
				
					</div>
				</div>
				
		</div>
	</div>
	<!-- END CONTENT BODY -->
</div>
<?php }else{
		redirect("dashboard");
	} ?>