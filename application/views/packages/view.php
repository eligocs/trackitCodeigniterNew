<div class="page-container itinerary-view">
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php if( !empty($package[0] ) ){ 			
            $pack = $package[0];
            $terms = get_terms_condition();
            if( $terms ){
            	$terms = $terms[0];
            	$online_payment_terms	 	= unserialize($terms->bank_payment_terms_content);
            	$advance_payment_terms		= unserialize($terms->advance_payment_terms	);
            	$cancel_tour_by_client 		= unserialize( $terms->cancel_content);
            	$terms_condition			= unserialize($terms->terms_content);
            	$disclaimer 				= htmlspecialchars_decode($terms->disclaimer_content);
            	$greeting 					= $terms->greeting_message;
            	$amendment_policy			= unserialize( $terms->amendment_policy);
            	$book_package_terms			= unserialize( $terms->book_package);
            	$signature					=  htmlspecialchars_decode($terms->promotion_signature);
            	
            }else{
            	$greeting = "";
            	$advance_payment_terms		= "";
            	$online_payment_terms = "";
            	$cancel_tour_by_client = "";
            	$terms_condition = "";
            	$disclaimer = "";
            	$amendment_policy		= "";
            	$book_package_terms		= "";
            	$signature					=  "";
            } 
            ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-users"></i>View Package ( State: <strong class=''>
                            <?php echo get_state_name($pack->state_id); ?></strong> )</div>
                    <a class="btn btn-success pull-right" href="<?php echo site_url("packages"); ?>"
                        title="Back">Back</a>
                    <a title='Edit'
                        href=" <?php echo site_url("packages/edit/{$pack->package_id}/{$pack->temp_key}") ; ?> "
                        class='btn btn-outline-warning mt-1 me-2 float-end'><i class='fa-solid fa-pen-to-square'
                            aria-hidden='true'></i> Edit Iti</a>
                </div>
            </div>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <h3 class="custom_title">Package Overview</h3>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr class="thead-inverse">
                                    <td width="33%"><strong>Name of Package</strong></td>
                                    <td width="33%"><strong>Routing</strong></td>
                                    <td width="33%"><strong>Duration</strong></td>
                                </tr>
                                <tr>
                                    <td><?php echo $pack->package_name; ?></td>
                                    <td><?php echo $pack->package_routing; ?></td>
                                    <td><?php echo $pack->duration; ?></td>
                                </tr>
                                <tr class="thead-inverse">
                                    <td><strong>No of Travellers</strong></td>
                                    <td><strong>Cab</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="traveller-info">
                                            <?php
                                    echo "<strong> Adults: </strong> " . $pack->adults; 
                                    if( !empty( $pack->child ) ){
                                       echo "  <strong> No. of Child: </strong> " . $pack->child; 
                                       echo " (" . $pack->child_age .")"; 
                                    }
                                    ?>
                                        </div>
                                    </td>
                                    <td><?php echo get_car_name($pack->cab_category); ?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                           
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <h3 class="custom_title">Day Wise Itinerary</h3>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <?php 
                              $tourData = unserialize($pack->daywise_meta);
                              $count_day = count( $tourData );
                              if( $count_day > 0 ){
                                 //print_r( $tourData );
                                 for ( $i = 0; $i < $count_day; $i++ ) {
                                 echo "<tr><td width='10%'>";
                                    $day = $i+1;
                                    echo "<span class=''><strong>Day: " . $tourData[$i]['tour_day'] . "</strong> </span>";
                                    echo "</td><td width='80%'>";
                                    echo "<strong>" . $tourData[$i]['tour_name'] . "</strong><br>"; 
                                    echo "<strong>Tour Date:</strong><em> " .$tourData[$i]['tour_date'] . "</em><br>"; 
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
                    </div>
                </div>
               
                <div class="portlet box blue margin-top-50">
                    <div class="portlet-title">
                        <h3 class="custom_title">Inclusion & Exclusion</h3>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-bordered inclusions_table">
                                <thead class="thead-default">
                                    <tr class="thead-inverse">
                                        <th width="50%"> Inclusion</th>
                                        <th width="50%"> Exclusion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                              $inclusion = unserialize($pack->inc_meta); 
                              $count_inc = count( $inclusion );
                              $exclusion = unserialize($pack->exc_meta); 
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
                    </div>
                </div>
                <?php 
               //check if special inclusion exists
               $sp_inc = unserialize($pack->special_inc_meta); 
               $count_sp_inc = !empty($sp_inc) ? count( $sp_inc ) : '';
               
               if( !empty($sp_inc) ){
               	echo '<div class="portlet box blue margin-top-50"><div class="portlet-title"><h3 class="custom_title">Special Inclusions</h3></div>';
               	echo "<div class='portlet-body'><ul class='inclusion'>";
               	if( $count_sp_inc > 0 ){
               		for ( $i = 0; $i < $count_sp_inc; $i++ ) {	
               			echo "<li>" . $sp_inc[$i]["tour_special_inc"] . "</li>";
               		}	
               	}
               	echo "</ul> </div> </div>";
               }
               ?>
                <div class="portlet box blue margin-top-50">
                    <div class="portlet-title">
                        <h3 class="custom_title">Hotel Details</h3>
                    </div>
                    <?php $hotel_meta = unserialize($pack->hotel_meta); 
                  if( !empty( $hotel_meta ) ){
                     $count_hotel = count( $hotel_meta ); ?>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-default">
                                    <tr class="thead-inverse">
                                        <th> Hotel Category</th>
                                        <th> Standard (1 Star)</th>
                                        <th> Deluxe (2 Star)</th>
                                        <th> Super Deluxe (3 Star)</th>
                                        <th> Luxury (4 Star)</th>
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
                           } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="portlet box blue margin-top-50">
                    <div class="portlet-title">
                        <h3 class="custom_title">Notes:</h3>
                    </div>
                    <div class="portlet-body">
                        <ul>
                            <?php $hotel_note_meta = unserialize($pack->hotel_note_meta); 
                     $count_hotel_meta = count( $hotel_note_meta );
                     
                     if( $count_hotel_meta > 0 ){
                        for ( $i = 0; $i < $count_hotel_meta; $i++ ) {
                           echo "<li>" . $hotel_note_meta[$i]["hotel_note"] . "</li>";
                        }	
                     } ?>
                        </ul>
                    </div>
                </div>
                <div class="portlet box blue margin-top-50">
                    <div class="portlet-title">
                        <h3 class="custom_title">Bank Details: Cash/Cheque at Bank or Net Transfer</h3>
                    </div>
                    <div class="portlet-body">
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
                    </div>
                </div>
                <?php
               //bank payment ters
               $count_bank_payment_terms	= count( $online_payment_terms ); 
               $count_bankTerms			= $count_bank_payment_terms-1; 
               if(isset($online_payment_terms["heading"]) ) { 
               	echo "<div class='portlet box blue margin-top-50'><div class='portlet-title'><h3 class='custom_title'>" . $online_payment_terms["heading"] . "</h3></div>"; 
               }
               if( $count_bankTerms > 0 ){
               	echo "<div class='portlet-body'><ul class='client_listing'>";
               		for ( $i = 0; $i < $count_bankTerms; $i++ ) { 
               			echo "<li>" . $online_payment_terms[$i]["terms"] . "</li>";
               		}
               	echo "</ul> </div></div>";
               }
               	//how to book section
               	$count_book_package	= count( $book_package_terms );
               	if(isset($book_package_terms["heading"]) ) { 
               		echo "<div class='portlet box blue margin-top-50'><div class='portlet-title'><h3 class='custom_title'>". $book_package_terms["heading"]  ."</h3></div>";
               	}
               	if(isset($book_package_terms["sub_heading"]) ) { 
               		echo "<div class='portlet-body'><h5>". $book_package_terms["sub_heading"]  ."</h5>";
               	}							
               	if( $count_book_package > 0 ){
               		echo "<ul class='client_listing'>";
               			for ( $i = 0; $i < $count_book_package-2; $i++ ) { 
               				echo "<li>" . $book_package_terms[$i]["hotel_book_terms"] . "</li>";
               			}
               		echo "</ul> </div> </div>";
               	}	
               	
               	// advance payment section 
               	$count_ad_pay	= count( $advance_payment_terms );
               	if(isset($advance_payment_terms["heading"]) ) { 
               		echo "<div class='portlet box blue margin-top-50'><div class='portlet-title'><h3 class='custom_title'>". $advance_payment_terms["heading"]  ."</h3></div>";
               	}						
               	if( $count_book_package > 0 ){
               		echo "<div class='portlet-body'><ul class='client_listing'>";
               			for ( $i = 0; $i < $count_ad_pay-1; $i++ ) { 
               				echo "<li>" . $advance_payment_terms[$i]["terms"] . "</li>";
               			}
               		echo "</ul> </div> </div>";
               	}
               	//AMENDMENT POLICY section	
               	if(isset($amendment_policy["heading"]) ) { 
               		echo "<div class='portlet box blue margin-top-50'><div class='portlet-title'><h3 class='custom_title'>". $amendment_policy["heading"]  ."</h3></div>";
               	}	
               	$count_amendment_policy	= count( $amendment_policy );
               	if( $count_amendment_policy > 0 ){
               		echo "<div class='portlet-body'><ul class='client_listing'>";
               			for ( $i = 0; $i < $count_amendment_policy-1; $i++ ) { 
               				echo "<li>" . $amendment_policy[$i]["amend_policy"] . "</li>";
               			}
               		echo "</ul></div> </div>";
               	}	
               	//refund policy
               	if(isset($amendment_policy["heading"]) ) { 
               		echo "<div class='portlet box blue margin-top-50'><div class='portlet-title'><h3 class='custom_title'>". $cancel_tour_by_client["heading"]  ."</h3></div>";
               	}
               	
               	$count_cancel_content	= count( $cancel_tour_by_client );
               	if( $count_cancel_content > 0 ){
               		echo "<div class='portlet-body'><ul class='client_listing'>";
               			for ( $i = 0; $i < $count_cancel_content-1; $i++ ) { 
               				echo "<li>" . $cancel_tour_by_client[$i]["cancel_terms"] . "</li>";
               			}
               		echo "</ul> </div></div>";
               	}	
               	
               	//terms and condition
               	if(isset($terms_condition["heading"]) ) { 
               		echo "<div class='portlet box blue margin-top-50'><div class='portlet-title'><h3 class='custom_title'>". $terms_condition["heading"]  ."</h3></div>";
               	}
               	$count_cancel_content	= count( $terms_condition );
               	if( $count_cancel_content > 0 ){
               		echo "<div class='portlet-body'><ul class='client_listing'>";
               			for ( $i = 0; $i < $count_cancel_content-1; $i++ ) { 
               				echo "<li>" . $terms_condition[$i]["terms"] . "</li>";
               			}
               		echo "</ul></div></div>";
               	}
               ?>
                <hr>
                <div class="portlet box blue">
                    <div class="portlet-body">
                        <?php
                           $agent_id = $pack->agent_id;
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
                        <div class="form-group col-md-12 d-flex justify_content_between align_items_center">
                            <a href="<?php echo site_url("packages"); ?>" class="btn green uppercase iti_back"
                                title="Back">Back</a>
                            <!--Edit itinerary button-->
                            <a title='Edit' href=" <?php echo site_url("packages/edit/{$pack->package_id}/{$pack->temp_key}") ; ?> " class='btn btn-outline-warning'><i class='fa-solid fa-pen-to-square' aria-hidden='true'></i> Edit </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<?php }else{
   redirect("packages");
   } ?>