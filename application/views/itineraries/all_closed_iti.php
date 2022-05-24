<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<?php $message = $this->session->flashdata('success'); 
			if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
			?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-users"></i>All Closed Itineraries
					</div>
				</div>
			</div>	
			  <!-- Begin demo table design -->
			  <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive itineraryData">
                    <?php     if( !empty($list) ){
                    foreach ($list as $iti) {
                        // dump($iti);
                        $pub_status = $iti->publish_status;
                        $iti_id = $iti->iti_id;
                        $key = $iti->temp_key;
                        $iti_status = $iti->iti_status;
                        if( $pub_status == "publish" ){
                            $p_status = "<strong>" . ucfirst($pub_status) . "</strong>";
                        }elseif( $pub_status == "price pending" ){
                            $p_status = "<strong class='blue'>" . ucfirst($pub_status) . "</strong>";
                        }else{
                            $p_status = "<strong class='red'>" . ucfirst($pub_status) . "</strong>";
                        }

                        //Lead Prospect Hot/Warm/Cold
                        $cus_pro_status = get_iti_prospect($iti->iti_id);
                        if( $cus_pro_status == "Warm" ){
                            $l_pro_status = "<strong class='green'> ( " . $cus_pro_status . " )</strong>";
                        }else if( $cus_pro_status == "Hot" ){
                            $l_pro_status = "<strong class='black'> ( " . $cus_pro_status . " )</strong>";
                        }else if( $cus_pro_status == "Cold" ){
                            $l_pro_status = "<strong class='red'> ( " . $cus_pro_status . " )</strong>";
                        }else{
                            $l_pro_status = "";
                        }

                        /* iti package Type */
                        $itiPackType = $iti->iti_package_type;
                        if($itiPackType == 'Fixed Departure'){
                            $packageType = "<span class='badge bg-yellow-haze mt-2'>
                            <strong class=''>{$itiPackType }</strong>
                            </span>";
                        }else if($itiPackType == 'Group Package'){
                            $packageType = "<span class='badge bg-dark-purpule mt-2'>
                            <strong class=''>{$itiPackType }</strong>
                            </span>";
                        }else if($itiPackType == 'Honeymoon Package'){
                            $packageType = "<span class='badge bg-success mt-2'>
                            <strong class=''>{$itiPackType }</strong>
                            </span>";
                        }else if($itiPackType == 'Other'){
                            $packageType = "<span class='badge bg-yellow-gold mt-2'>
                            <strong class=''>{$itiPackType }</strong>
                            </span>";
                            
                        }
                    
                        /* total day and night */
                        $start_ts = date_create(get_iti_tour_start_date($iti->iti_id)); 
                        $end_ts = date_create(get_iti_tour_end_date($iti->iti_id)); 
                        $diff = date_diff($end_ts,$start_ts); 
                        if($diff->d == '0'){
                            $totalDayNight = '1D';
                        }else{
                            $night = $diff->d + 1;
                            $totalDayNight = $diff->d . 'D' . ' ' . '/' . ' ' .  $night . 'N' ;
                        }

                        //Get itinerary type 1=itinerary , 2=accommodation
                        $iti_type = $iti->iti_type == 2 ? "<strong class='red'>Accommodation</strong>" : "<strong class='white'>Holiday</strong>";

                        /* customer Details */
                        $customerDetail = get_customer($iti->customer_id);
                        // dump($customerDetail['0']);

                        /* get iti followup*/
                        $where_follow		 = array( "customer_id" => $iti->customer_id );
                        $itineary_followup 	= $this->global_model->getdata("iti_followup", $where_follow);
                        // dump($itineary_followup);

                    ?>
                    <table class="table data-table-large">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="d-flex justify-content-between px-1 w-100">
                                            <div class="requirment">
                                                <p title="Iti Id" class="fs-7 fw-bold mb-2 mt-0 d-inline-block">
                                                    #<?= $iti->customer_id ?>
                                                </p>
                                                <span>/</span>
                                                <p title="Lead Id" class="fs-7 fw-bold mb-2 mt-0 d-inline-block">
                                                    #<?= $iti->iti_id ?></p>
                                                <div title="Tour Type" class="badge bg-danger mb-1 me-2">
                                                    <strong class="white"><?= $iti_type ?></strong>
                                                </div>
                                                <div class="fs-8 me-2 text-success">
                                                    <strong class="" title="Iti Status
                                                                "><?= $p_status ?>...</strong>
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <p class="fs-7 mb-2 mt-0 ">
                                                <span class="customer_name_text d-block">
                                                    <strong
                                                    class="d-block mb-1"><?= !empty($iti->customer_name) ? $iti->customer_name : '' ?></strong>
                                                </span>
                                                    <span title="Leads From"
                                                        class="text-primary"><?= get_customer_type_name($customerDetail['0']->customer_type) ?></span>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        $requirements_meta = !empty($iti->requirements_meta) ? unserialize($iti->requirements_meta) : '' ; 
                                        ?>
                                        <div class="bg-light d-flex justify-content-between p-1 w-100">
                                            <div class="border-end flex-grow-1">
                                                <p class="fs-7 mb-2 mt-0 text-secondary">requirement </p>
                                                <div>
                                                    <i class="me-2 fa-solid fa-plane-departure <?= isset($requirements_meta['requirements_flight']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                    <i class="me-2 fa-solid fa-hotel <?= isset($requirements_meta['requirements_hotel']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                    <i class="me-2 fa-solid fa-taxi  <?= isset($requirements_meta['requirements_cab']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                    <i class="me-2 fa-solid fa-train-subway  <?= isset($requirements_meta['requirements_train']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <div class="my-1">
                                                    <span
                                                        class="d-block fs-7 mb-2"><?= !empty($iti->customer_contact) ? $iti->customer_contact : '' ?></span>
                                                </div>
                                                <div>
                                                    <span title="<?= !empty($iti->email_count) ? 'sent' .  $iti->email_count . 'times' :  'NOT SENT' ; ?>"
                                                        class="bg-info fs-8 px-2 rounded-3 text-white"><?= !empty($iti->email_count) ? $iti->email_count : 'N/S' ; ?></span>
                                                    <span class="tooltip_right">
                                                        <i class="fa-envelope fa-solid text-primary"></i>
                                                        <span class="email_text">
                                                            <?= !empty($iti->customer_email)  ? $iti->customer_email : 'N/A'?></span>
                                                        <span
                                                            class="tooltip_right_text"><?= !empty($iti->customer_email)  ? $iti->customer_email : 'N/A'?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-2 w-100">
                                            <div class="mb-2">
                                                <strong class="d-block fs-7">Himahal Pradesh </strong>
                                                <?= $packageType ?>
                                            </div>
                                            <div class="">
                                                <span class="text-secondary fs-7 package_name"><?= $iti->package_name ?></span>
                                            </div>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <p class="fs-7 m-0 mb-2 text-secondary">travellers</p>
                                            <span class="badge fs-7 pb-0 text-dark" title="Adult"> <?= $iti->adults ?> <i
                                                    class="fa-solid fa-user text-black-50"></i> </span>
                                            <?php
                                                    if($iti->child != 00){
                                                        $totalTravel = $iti->adults + $iti->child;
                                                        ?>
                                            <span class="badge fs-7 me-1 pb-0 text-dark" title="Children"> <?= $iti->child ?> <i
                                                    class="fa-solid fa-child text-black-50"></i></span>
                                            <span class="badge fs-7 me-1 pb-0 text-dark" title="Baby"> <?= $totalTravel ?> <i
                                                    class="fa-solid fa-baby text-black-50"></i> </span>
                                            <?php
                                                    }
                                                    ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="mb-2 px-2">
                                            <p class="fw-bold m-0">
                                                <?= date("d-F-Y", strtotime(get_iti_tour_start_date($iti->iti_id))) ?>
                                            </p>
                                            <span class="fs-8 text-secondary">Till
                                                <?= date("d-F", strtotime(get_iti_tour_end_date($iti->iti_id))) ?>
                                                (<?=  $totalDayNight  ?>)</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">assigned to</span>
                                            <a class="text-primary d-block fw-bold" href=""
                                                title="View Agent"><?= ucFirst(get_user_name( $iti->agent_id )) ?></a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <?php
                                                if(!empty($iti->final_amount)){
                                                    ?>
                                        <div class="mb-2 px-2">
                                            <p class="fs-7 m-0">
                                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                                <strong> <?= $iti->final_amount ?>/-</strong>
                                            </p>
                                            <span class="fs-8 text-secondary">Total</span>
                                        </div>
                                        <?php
                                                }else{
                                                    ?>
                                        <div class="mb-2 px-2">
                                            <p class="fs-7 m-0">
                                                <strong> Price Pending</strong>
                                            </p>
                                        </div>
                                        <?php
                                                }
                                                ?>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-secondary">Created on </span>
                                            <p class="fs-8 fw-400 m-0 text-dark">
                                                <?=  date("d-F-Y", strtotime( $iti->lead_created )); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <?php
                                        if($itineary_followup != false){
                                            ?>
                                        <div class="mb-2 px-2">
                                            <p class="my-1 fs-7 text-secondary"><span>Next Call</span>
                                                <span><?= date("d-F",  strtotime( $itineary_followup['0']->nextCallDate ))?></span>
                                            </p>
                                            <p class="my-1 text-dark"><i class="text-success fa-solid fa-phone-volume"></i>
                                                <?= date("h:i A",  strtotime( $itineary_followup['0']->nextCallDate ))?></p>
                                        </div>
                                        <?php
                                        }else{
                                        ?>
                                        <div class="mb-2 px-2">
                                            <p class="my-1 fs-7 text-secondary"><span>Next Call</span></p>
                                            <p class="my-1 text-dark"><i class="text-success fa-solid fa-phone-volume"></i>
                                                not sheduled</p>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-secondary">last call on</span>
                                            <p class="fs-7 fs-8 my-1 text-dark">
                                                <i class="text-success fa-solid fa-phone-volume"></i>
                                                <?= date("d-F-Y h:i A",  strtotime( $customerDetail['0']->lead_last_followup_date ))?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item" target='_blank'
                                                    href="<?= site_url("itineraries/edit/$iti_id/$key") ?>"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" target='_blank'
                                                    href="<?=site_url("itineraries/view_iti/$iti_id/$key") ?>"><i
                                                        class="fa-solid fa-eye"></i> View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" target='_blank'
                                                    href="<?=site_url("itineraries/pdf/$iti_id/$key") ?>"><i
                                                        class="fa-solid fa-file-pdf"></i> PDF</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" target='_blank'
                                                    href="<?= site_url("itineraries/duplicate/$iti_id") ?>"><i
                                                        class="fa-solid fa-clone"></i> Clone</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item delete_iti_permanent" data-id="<?= $iti_id ?>"
                                                    href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    }
                    }else{?>      
                    <div>
                        No Data Found....
                    </div> 
                    <?php
                    }
                    ?>                             
                </div>
            </div>
            <!-- End end demo table design -->
		</div>
	</div>
</div>
</div>
