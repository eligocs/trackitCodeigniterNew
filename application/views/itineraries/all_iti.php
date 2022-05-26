<?php $todAy = date("Y-m-d");
 ?>
<!-- Begin page-container -->
<div class="page-container">
    <!-- Begin page-content-wrapper -->
    <div class="page-content-wrapper">
        <!-- Begin page-content -->
        <div class="page-content">
            <?php $message = $this->session->flashdata('success'); 
            if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
            ?>
            <!--error message-->
            <?php $err = $this->session->flashdata('error'); 
            if($err){ echo '<span class="help-block help-block-error2 red">'.$err.'</span>';}
            ?>
            <?php $sales_team_agents = get_all_sales_team_agents(); ?>
            <div class="portlet box blue" style="margin-bottom:0;">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>
                        <?php if( $user_role == 97 ){
                     echo "All Booked Itineraries";
                     }else{
                     echo "All Itineraries";
                     }	?>
                    </div>
                    <?php if( $user_role != 97 ){ ?>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("customers"); ?>"
                        title="add Itineraries"><i class="fa-solid fa-plus"></i> Add
                        Itinerary</a>
                    <?php } ?>

                    <!-- Show hide filter button -->
                    <button class="btn float-end me-2 p-2 " title="Filter Itineraries" type="button"
                        data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false"
                        aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
                </div>
            </div>

            <!-- Begin Filter Section -->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse <?= !empty($_GET['dateRange']) ? 'show' : '' ?>" id="filter_collapse">
                <?php
                    $hideClass = "";
                    if( isset( $_GET["todayStatus"] ) ){	
                        $first_day_this_month = $_GET["todayStatus"];
                        $last_day_this_month  = $_GET["todayStatus"];
                    }else{
                        $first_day_this_month = "";
                        $last_day_this_month  = "";
                    }
                ?>
                <?php if( $user_role == 97 ){
                    $hideClass = isset( $_GET["todayStatus"] ) || isset( $_GET["leadfrom"] ) ? "hideFilter" : "";
                ?>
                <form id="form-filter" class=" form-horizontal margin_bottom_0 <?php echo $hideClass; ?>"
                    action="<?php echo base_url(); ?>itineraries/index">
                    <div class="actions custom_filter">
                        <div class="row">
                            <!--Calender-->
                            <div class="col-md-3 my-2">
                                <label for="" class="control-label"><strong>Filter: </strong></label>
                                <input type="text" autocomplete="off" class="form-control" id="daterange"
                                    name="dateRange" value="<?= isset($_GET['dateRange']) ? $_GET['dateRange'] : '' ?>" required />
                            </div>
                            <!--End-->
                            <div class="col-md-3 my-2">
                                <label for="" class="control-label"><strong>Itinerary Type: </strong></label>
                                <select name="iti_type" class="form-control form-select" id="iti_type">
                                    <option value="">All</option>
                                    <option value="1">Holidays</option>
                                    <option value="2">Accommodation</option>
                                </select>
                            </div>
                            <div class="col-md-3 my-2">
                                <label class="control-label" for="">&nbsp;</label>
                                <select class="form-control form-select" name="" id="">
                                    <option name="filter" value="all" id="all">All</option>
                                    <option name="filter" value="9" id="approved">Approved</option>
                                    <option name="filter" value="revised" id="revised">Revised</option>
                                    <option name="filter" value="travel_date" id="travel_date">TD</option>
                                </select>

                                <input type="hidden" name="date_from" id="date_from"
                                    data-date_from="<?php if( isset( $_GET["leadfrom"] ) ){ echo $_GET["leadfrom"] ; }  else { echo $first_day_this_month; } ?>"
                                    value="">
                                <input type="hidden" name="date_to" id="date_to"
                                    data-date_to="<?php if( isset( $_GET["leadto"] ) ){ echo $_GET["leadto"] ; } else{ echo $last_day_this_month; }  ?>"
                                    value="">
                                <input type="hidden" name="filter_val" id="filter_val"
                                    value="<?php if( isset( $_GET["leadStatus"] ) ){ echo $_GET["leadStatus"]; }else{ echo "";	} ?>">
                                <input type="hidden" id="quotation"
                                    value="<?php if( isset( $_GET['quotation'] ) ){ echo "true"; }else{ echo "false"; } ?>">
                                <input type="hidden" name="todayStatus" id="todayStatus"
                                    value="<?php if( isset( $_GET["todayStatus"] ) ){ echo $_GET["todayStatus"]; } ?>">
                            </div>
                            <div class="col-md-3 my-2">
                                <label class="control-label d-block" for="">&nbsp;</label>
                                <input type="submit" class="btn btn-success" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
                <?php }else{ ?>
                <form id="form-filter" class="form-horizontal margin_bottom_0 <?php echo $hideClass; ?>"
                    action="<?php echo base_url(); ?>itineraries/index">
                    <div class="actions custom_filter">
                        <div class="row">
                            <!--Calender-->
                            <div class="col-md-3">
                                <label class="control-label">Filter: </label>
                                <input type="text" autocomplete="off" class="form-control" id="daterange"
                                    name="dateRange" value="<?= isset($_GET['dateRange']) ? $_GET['dateRange'] : '' ?>" required />
                            </div>
                            <!--End-->
                            <div class="col-md-3">
                                <label class="control-label">Itinerary Type: </label>
                                <select name="iti_type" class="form-control form-select" id="iti_type">
                                    <option value="">All</option>
                                    <option value="1" <?= !empty($_GET['iti_type']) &&  $_GET['iti_type'] == '1'?  "selected" : '' ?>>Holidays</option>
                                    <option value="2" <?= !empty($_GET['iti_type']) &&  $_GET['iti_type'] == '2'?  "selected" : '' ?>>Accommodation</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="filter_box">
                                    <label class="control-label">&nbsp; </label>
                                    <select name="filtername" class="form-control form-select">
                                        <option value="all"     <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'all'?  "selected" : '' ?>>All</option>
                                        <option value="draft"   <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'draft'?  "selected" : '' ?>>Draft</option>
                                        <option value="hold"    <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'hold'?  "selected" : '' ?>>Hold</option>
                                        <option value="pending" <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'pending'?  "selected" : '' ?>>Working</option>
                                        <option value="notwork" <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'notwork'?  "selected" : '' ?>>Not Process</option>
                                        <option value="7"       <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == '7'?  "selected" : '' ?>>Declined</option>
                                        <option value="9"       <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == '9'?  "selected" : '' ?>>Approved</option>
                                        <option value="travel_date" <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'travel_date'?  "selected" : '' ?>>TD</option>
                                        <option value="temp_travel_date" <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'temp_travel_date'?  "selected" : '' ?>>TTD </option>
                                        <option value="revised" <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'revised'?  "selected" : '' ?>>Amendment</option>
                                        <option value="agent_margen_20" <?= !empty($_GET['filtername']) &&  $_GET['filtername'] == 'agent_margen_20'?  "selected" : '' ?>>
                                            AM>=20%</option>
                                    </select>
                                </div>
                                <input type="hidden" name="date_from" id="date_from"
                                    data-date_from="<?php if( isset( $_GET["leadfrom"] ) ){ echo $_GET["leadfrom"] ; }  else { echo $first_day_this_month; } ?>"
                                    value="">
                                <input type="hidden" name="date_to" id="date_to"
                                    data-date_to="<?php if( isset( $_GET["leadto"] ) ){ echo $_GET["leadto"]; } else{ echo $last_day_this_month; }  ?>"
                                    value="">
                                <input type="hidden" name="filter_val" id="filter_val"
                                    value="<?php if( isset( $_GET["leadStatus"] ) ){ echo $_GET["leadStatus"]; }else{ echo "";	} ?>" />
                                <input type="hidden" id="quotation"
                                    value="<?php if( isset( $_GET['quotation'] ) ){ echo "true"; }else{ echo "false";} ?>" />
                                <input type="hidden" name="todayStatus" id="todayStatus"
                                    value="<?php if( isset( $_GET["todayStatus"] ) ){ echo $_GET["todayStatus"]; } ?>" />

                            </div>
                            <div class="col-md-3">
                                <label for="" class="control-label d-block">&nbsp;</label>
                                <input type="submit" class="btn btn-success d_block" value="Filter">
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                </form>
                <?php } ?>
            </div>
            <!-- End Filter Section -->

            <!-- Begin demo table design -->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive itineraryData table-ver-scroll">
                    <table class="table data-table-large">
                        <tbody>
                            <?php     if( !empty($list) ){
                            foreach ($list as $iti) {
                                // dump($iti);
                                $pub_status = $iti->publish_status;
                                $iti_id = $iti->iti_id;
                                $key = $iti->temp_key;
                                $iti_status = $iti->iti_status;
                                // dump($iti_status);die;
                                if( $pub_status == "publish" ){
                                    $p_status = "<strong>" . ucfirst($pub_status) . "</strong>";
                                }elseif( $pub_status == "price pending" ){
                                    $p_status = "<strong class='blue'>" . ucfirst($pub_status) . "</strong>";
                                }else{
                                    $p_status = "<strong class='red'>" . ucfirst($pub_status) . "</strong>";
                                }



                                //if itinerary status is publish
                                if( $pub_status == "publish" || $pub_status == "price pending" ){
                                    //delete itinerary button only for admin
                                    if( is_admin_or_manager() && empty( $countChildIti ) ){ 
                                        $row_delete = "<a data-id={$iti_id} title='Delete Itinerary' href='javascript:void(0)' class='btn_trash ajax_delete_iti'><i class='fa-solid fa-trash-can' aria-hidden='true'></i></a>";
                                    }
                                    //Check for iti status
                                    if( isset( $iti->booking_status ) && $iti->booking_status != 0 ){
                                        $iti_s = isset( $iti->booking_status ) && $iti->booking_status == 0 ? '<div title="iti-status" class="badge bg-danger mb-1 me-2">
                                        <strong>APPROVED</strong>
                                    </div>' : '<div title="iti-status" class="badge bg-dark-purpule mb-1 me-2">
                                        <strong>ON HOLD</strong>
                                    </div>';
                                    }else if( $iti_status == 9 ){
                                        $it_status = '<div title="iti-status" class="badge bg-success mb-1 me-2">
                                            <strong>APPROVED</strong>
                                        </div>';
                                    }else if( $iti_status == 7 ){
                                        $it_status = '<div title="iti-status" class="badge bg-danger mb-1 me-2">
                                            <strong>Decline</strong>
                                        </div>';
                                    }else if( $iti_status == 6 ){
                                        $it_status = '<div title="iti-status" class="badge bg-danger mb-1 me-2">
                                            <strong>REJECTED</strong>
                                        </div>';
                                    }else{
                                        $it_status = empty( is_iti_followup_exists( $iti->iti_id ) ) ? '<div title="iti-status" class="badge bg-yellow-casablanca mb-1 me-2">
                                        <strong>NOT PROCESS</strong>
                                    </div>' : '<div title="iti-status" class="badge bg-yellow-mint mb-1 me-2">
                                    <strong>WORKING</strong>
                                </div>';
                                    }
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
                                $iti_type = $iti->iti_type == 2 ? "Accommodation" : "Holiday";

                                /* customer Details */
                                $customerDetail = get_customer($iti->customer_id);
                                // dump($customerDetail['0']);

                                /* get iti followup*/
                                $where_follow		 = array( "customer_id" => $iti->customer_id );
                                $itineary_followup 	= $this->global_model->getdata("iti_followup", $where_follow);
                                // dump($itineary_followup);

                            ?>

                            <tr>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="d-flex justify-content-between px-1 w-100">
                                            <div class="requirment">
                                                <p title="Lead Id" class="fs-7 fw-bold mb-2 mt-0 d-inline-block">
                                                    #<?= $iti->customer_id ?>
                                                </p>
                                                <span>/</span>
                                                <p title="Iti Id" class="fs-7 fw-bold mb-2 mt-0 d-inline-block">
                                                    #<?= $iti->iti_id ?></p>
                                                <div title="Tour Type" class="badge bg-danger mb-1 me-2">
                                                    <strong><?= $iti_type ?></strong>
                                                </div>
                                                <div class="fs-8 me-2 text-success">
                                                    <strong class=""><?= $p_status ?>...</strong>
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <p class="fs-7 mb-2 mt-0 ">
                                                    <span class="customer_name_text d-block">
                                                        <strong
                                                            class="d-block mb-1"><?= !empty($iti->customer_name) ? $iti->customer_name : 'N/A' ?></strong>
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
                                                    <i
                                                        class="me-2 fa-solid fa-plane-departure <?= isset($requirements_meta['requirements_flight']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                    <i
                                                        class="me-2 fa-solid fa-hotel <?= isset($requirements_meta['requirements_hotel']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                    <i
                                                        class="me-2 fa-solid fa-taxi  <?= isset($requirements_meta['requirements_cab']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                    <i
                                                        class="me-2 fa-solid fa-train-subway  <?= isset($requirements_meta['requirements_train']) ? 'text-primary' : 'text-muted' ?>"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <div class="my-1">
                                                    <span
                                                        class="d-block fs-7 mb-2"><?= !empty($iti->customer_contact) ? $iti->customer_contact : '' ?></span>
                                                </div>
                                                <div>
                                                    <span
                                                        title="<?= !empty($iti->email_count) ? 'sent' .  $iti->email_count . 'times' :  'NOT SENT' ; ?>"
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
                                                <span
                                                    class="text-secondary fs-7 package_name"><?= $iti->package_name ?></span>
                                            </div>
                                        </div>
                                        <div class="bg-light d-flex justify-content-between p-1 w-100">
                                            <div class="flex-grow-1 ms-2 border-end">
                                                <p class="fs-7 m-0 mb-2 text-secondary">travellers</p>
                                                <span class="badge fs-7 pb-0 text-dark" title="Adult">
                                                    <?= $iti->adults ?> <i class="fa-solid fa-user text-black-50"></i>
                                                </span>
                                                <?php
                                                        if($iti->child != 00){
                                                            $totalTravel = $iti->adults + $iti->child;
                                                            ?>
                                                <span class="badge fs-7 me-1 pb-0 text-dark" title="Children">
                                                    <?= $iti->child ?> <i
                                                        class="fa-solid fa-child text-black-50"></i></span>
                                                <span class="badge fs-7 me-1 pb-0 text-dark" title="Baby">
                                                    <?= $totalTravel ?> <i class="fa-solid fa-baby text-black-50"></i>
                                                </span>
                                                <?php
                                                        }
                                                        ?>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="fs-7 m-0 mb-2 text-secondary">Iti Status</p>
                                                <?= $it_status ?>
                                            </div>
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
                                            <p class="my-1 text-dark"><i
                                                    class="text-success fa-solid fa-phone-volume"></i>
                                                <?= date("h:i A",  strtotime( $itineary_followup['0']->nextCallDate ))?>
                                            </p>
                                        </div>
                                        <?php
                                        }else{
                                        ?>
                                        <div class="mb-2 px-2">
                                            <p class="my-1 fs-7 text-secondary"><span>Next Call</span></p>
                                            <p class="my-1 text-dark"><i
                                                    class="text-success fa-solid fa-phone-volume"></i>
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

                            <?php
                                }
                            } else{
                                ?>
                            <span class="text-center">Data not found</span>
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <p><?php echo $links; ?></p>
                </div>
            </div>
            <!-- End end demo table design -->

            <!--  <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
                <?php if( is_admin_or_manager() ){ ?>
                <div class="row ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="sales_user_id" class>Select Sales Team User:</label>
                            <select required class="form-control form-select form-select select_user" id='sales_user_id' name="user_id">
                                <option value="">All Users</option>
                                <?php foreach( $sales_team_agents as $user ){ ?>
                                <option value="<?php echo $user->user_id; ?>">
                                    <?php echo $user->user_name . " ( " . ucfirst( $user->first_name ) . " "  . ucfirst( $user->last_name) . " )"; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="space" class="control-label">&nbsp;</label>
                        <div class="dropdown float-end">
                            <button class="btn btn_blue_outline dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</button>
                            <ul class="dropdown-menu">
                                
                                <li>
                                    <a href="<?php echo site_url("itineraries"). "/?todayStatus={$todAy}&leadStatus=QsentPast&quotation=true"; ?>"><i class="fa fa-envelope"></i> Today Revised Quotation Sent</a>
                                </li>
                          
                                <li>
                                    <a href="<?php echo site_url("itineraries"). "/?todayStatus={$todAy}&leadStatus=Qsent&quotation=true"; ?>"><i class="fa fa-envelope"></i> Today Sent Quotation</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }else if( is_teamleader() ){
				$team_members = is_teamleader(); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sales_user_id">Select Team Member:</label>
                            <select required class="form-control form-select select_user" id='sales_user_id' name="user_id">
                                <option value="">All Teammembers</option>
                                <?php echo "<option value={$user_id}>Myself</option>"; ?>
                                <?php if( $team_members ){
							foreach( $team_members as $mem ){
								$user_n = get_user_name($mem);
								echo "<option value={$mem}>{$user_n}</option>";
							}
							} ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>-->
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

</div>
<style>
/* .yellow_row {
    background-color: yellow !important;
} */

.hold_row {
    background-color: pink !important;
}
</style>

<div id="myModal" class="modal" role="dialog"></div>
<style>
#editModal,
#duplicatePakcageModal {
    top: 20%;
}
</style>
<!-- Modal Edit Itinerary -->
<div id="editModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close editPopClose" data-dismiss="modal">Close</button>
                <h4 class="modal-title">Permission denied</h4>
            </div>
            <div class="modal-body">
                Please contact to Manager or Administrator to edit Itinerary. Or Duplicate the Itinerary for revised
                quotation.
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- Modal Duplicate Itinerary-->
<div id="duplicatePakcageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">Close</button>
                <h4 class="modal-title">Select Package</h4>
            </div>
            <div class="modal-body">
                <form id="createIti">
                    <div class="">
                        <?php $prePackages = get_all_packages(); ?>
                        <?php $getPackCat = get_package_categories(); ?>
                        <?php $state_list = get_indian_state_list(); ?>
                        <div class="form-group">
                            <label>Select Package Category*</label>
                            <select required name="package_cat_id" class="form-control form-select" id="pkg_cat_id">
                                <option value="">Choose Package</option>
                                <?php if( $getPackCat ){ ?>
                                <?php foreach($getPackCat as $pCat){ ?>
                                <option value="<?php echo $pCat->p_cat_id ?>"><?php echo $pCat->package_cat_name; ?>
                                </option>
                                <?php } ?>
                                <?php }	?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select State*</label>
                            <select required disabled name="satate_id" class="form-control form-select" id="state_id">
                                <option value="">Select State</option>
                                <?php if( $state_list ){ 
                           foreach($state_list as $state){
                           	echo '<option value="'.$state->id.'">'.$state->name.'</option>';
                           }
                           } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Package*</label>
                            <select required disabled name="packages" class="form-control form-select" id="pkg_id">
                                <option value="">Choose Package</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" id="cust_id" value="">
                            <input type="hidden" id="iti_id" value="">
                            <input type="submit" class='btn btn-green disabledBtn' id="continue_package"
                                value="Continue">
                        </div>
                    </div>
                    <div id="pack_response"></div>
                </form>
                <hr>
                <h2><strong>OR</strong></h2>
                <div class="form-group">
                    <a href="" class='btn btn-green disabledBtn' id="clone_current_iti" title='Clone Itinerary'><i
                            class='fa fa-plus'></i> Clone Current Itinerary</a>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>


<script type="text/javascript">
jQuery(document).ready(function($) {

    //export btn click
    $(document).on("click", ".export_btn", function(e) {
        e.preventDefault();
        //get filtered perameters
        var filter = $("#filter_val").val(),
            d_from = $("#date_from").attr("data-date_from"),
            end = $("#date_to").attr("data-date_to"),
            todayStatus = $("#todayStatus").val(),
            quotation = $("#quotation").val(),
            agent_id = $("#sales_user_id").val();

        var export_url = "<?php echo base_url('export/export_itinerary_fiter_data?filter='); ?>" +
            filter + "&d_from=" + d_from + "&end=" + end + "&todayStatus=" + todayStatus +
            "&quotation=" + quotation + "&agent_id=" + agent_id;
        //redirect to export
        if (confirm("Are you sure to export data ?")) {
            window.location.href = export_url;
        }
    });

    //change iti_status	
    $(document).on("click", ".ajax_iti_status", function() {
        var iti_id = $(this).attr("data-id");
        var temp_key = $(this).attr("data-key");
        $.ajax({
            url: "<?php echo base_url(); ?>" + "itineraries/update_comment_status",
            type: "POST",
            data: {
                iti_id: iti_id
            },
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $(".loader").show();
                /* console.log("Please wait......."); */
            },
            success: function(r) {
                $(".loader").hide();
                if (r.status = true) {
                    window.location.href = "<?php echo site_url('itineraries/view/');?>" +
                        iti_id + "/" + temp_key + "#comments";
                } else {
                    $(".loader").hide();
                    alert("error");
                    console.log("Error.......");

                }
            },
            error: function() {
                $(".loader").hide();
                alert("error");
                console.log("error");
            }
        });
    });
    jQuery(document).on("click", ".close", function() {
        jQuery("#myModal").fadeOut();
    });
});

//update iti del status
jQuery(document).ready(function($) {
    $(document).on("click", ".ajax_delete_iti", function() {
        var id = $(this).attr("data-id");
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                // if (confirm("Are you sure?")) {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>" +
                            "AjaxRequest/ajax_delete_iti?id=" +
                            id,
                        type: "GET",
                        data: id,
                        dataType: 'json',
                        cache: false,
                        success: function(r) {
                            if (r.status = true) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });

                                location.reload();
                                //console.log("ok" + r.msg);
                                //console.log(r.msg);
                            } else {
                                alert("Error! Please try again.");
                            }
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
                // }

            })
    });
    //delete permanently Draft Itineraries
    $(document).on("click", ".delete_iti_permanent", function() {
        var id = $(this).attr("data-id");
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>" +
                            "itineraries/delete_iti_permanently?id=" +
                            id,
                        type: "GET",
                        data: id,
                        dataType: 'json',
                        cache: false,
                        success: function(r) {
                            if (r.status = true) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                setTimeout((function() {
                                    window.location.reload();
                                }), 3000);
                                //console.log("ok" + r.msg);
                                //console.log(r.msg);
                            } else {
                                alert("Error! Please try again.");
                            }
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                    setTimeout((function() {
                        window.location.reload();
                    }), 3000);
                }
            })
    });
});
</script>

<script type="text/javascript">
var table;
$(document).ready(function() {
    var table;
    var tableFilter;
    //Custom Filter
    // $("#form-filter").validate({
    //     rules: {
    //         filter: {
    //             required: true
    //         },
    //         dateRange: {
    //             required: true
    //         },
    //     },
    // });
    // $("#form-filter").submit(function(e) {
    //     e.preventDefault();
    //     table.ajax.reload(null, true);
    // });

    $(document).on("change", 'select[name=filtername]', function() {
        var filter_val = $(this).val();
        $("#filter_val").val(filter_val);
        console.log(filter_val);
    });

    //Get all itineraries by agent 
    // $(document).on("change", '#sales_user_id', function() {
    //     table.ajax.reload(null, true);
    // });

    //Export Data filter
    $("#export-filter").validate();
    /* {
   			submitHandler: function(){
   				$(".loader").show();
   				var data_from 	= $("#date_range_export").attr("data-date_from");
   				var data_to		= $("#date_range_export").attr("data-date_to");
   				var agent_id 	= $("#ex_user_id").val();
   				var _export_href = "<?php echo base_url('export/export_itinerary_data/?date_from='); ?>" + data_from + "&date_to=" + data_to + "&agent_id=" + agent_id;
   				//alert(_export_href);
   				window.location.href = _export_href;
   			}
   		} */

    //datatables
    /*   table = $('#itinerary2').DataTable({
           "aLengthMenu": [
               [10, 25, 50, 100, -1],
               [10, 25, 50, 100, 'All']
           ],
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.
           "createdRow": function(row, data, dataIndex) {
               //console.log( dataIndex );
               var iti_status = data.slice(-1)[0];

               if (iti_status == 'NOT PROCESS')
                   $(row).addClass('yellow_row');
               else if (iti_status == 'APPROVED')
                   $(row).addClass('green_row');
               else if (iti_status == 'DECLINED')
                   $(row).addClass('red_row');
               if (iti_status == 'ON HOLD')
                   $(row).addClass('hold_row');
           },

           language: {
               search: "<strong>Search By Itinerary Id/Customer:</strong>",
               searchPlaceholder: "Search..."
           },
           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('itineraries/ajax_itinerary_list')?>",
               "type": "POST",
               "data": function(data) {
                   data.filter = $("#filter_val").val();
                   data.from = $("#date_from").attr("data-date_from");
                   data.end = $("#date_to").attr("data-date_to");
                   data.todayStatus = $("#todayStatus").val();
                   data.quotation = $("#quotation").val();
                   data.agent_id = $("#sales_user_id").val();
                   data.iti_type = $("#iti_type").val();
               },
           },
           //Set column definition initialisation properties.
           "columnDefs": [{
               "targets": [0], //first column / numbering column
               "orderable": false, //set not orderable
           }, ],
       });*/

});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    //btn toggle
    $(document).on("click", ".optionToggleBtn", function(e) {
        e.preventDefault();
        var _this = $(this);
        _this.parent().find(".optionTogglePanel").slideToggle();
    });
    var date_from = $("#date_from").attr("data-date_from");
    //console.log("date_from"+date_from);
    if (date_from != "") {
        $('#daterange').val($("#date_from").attr("data-date_from") + '-' + $("#date_to").attr("data-date_to"));
    } else {
        $('#daterange').val("");
    }

    //Date range for exportdata
    $("#date_range_export").daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            dateLimit: {
                days: 90
            },
            showDropdowns: true,
            minDate: new Date(2016, 10 - 1, 25),
            //singleDatePicker: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Next 30 Days': [moment(), moment().add(30, 'days')],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Last Three Month': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
                'Next Three Month': [moment().add(1, 'month').startOf('month'), moment().add(3, 'month')
                    .endOf('month')
                ]
            },
            autoUpdateInput: false,
        },
        function(start, end, label) {
            $('#date_range_export').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
            //$('#daterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $("#ex_date_from").val(start.format('YYYY-MM-DD'));
            $("#ex_date_to").val(end.format('YYYY-MM-DD'));
            $("#date_range_export").val(start.format('YYYY-MM-DD'));
            $("#date_range_export").val(end.format('YYYY-MM-DD'));
            console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD'));
        });

    //Date range for filter
    $("#daterange").daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            showDropdowns: true,
            minDate: new Date(2016, 10 - 1, 25),
            //singleDatePicker: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'Next 30 Days': [moment(), moment().add(30, 'days')],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Last Three Month': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
            },
            autoUpdateInput: false,
            // startDate: moment().startOf('month'),
            //endDate: moment().endOf('month'), 
            // startDate: $("#date_from").attr("data-date_from"),
            //endDate: $("#date_to").attr("data-date_to"),  
        },
        function(start, end, label) {
            $('#daterange').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
            //$('#daterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $("#date_from").val(start.format('YYYY-MM-DD'));
            $("#date_to").val(end.format('YYYY-MM-DD'));
            $("#todayStatus").val("");
            console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD'));

        });

    //Show Modal if itinerary price updated for agent
    $(document).on("click", ".editPop", function() {
        $("#editModal").show();
    });
    $(document).on("click", ".close", function() {
        $(".modal").hide();
        $("#continue_package, #clone_current_iti").addClass("disabledBtn");
    });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    //open modal on duplicate iti btn click
    $(document).on("click", ".duplicateItiBtn", function(e) {
        e.preventDefault();
        var _this = $(this);
        var _this_href = _this.attr("href");
        var iti_id = _this.data("iti_id");
        var customer_id = _this.data("customer_id");
        $("#clone_current_iti").attr("href", _this_href);
        $("#iti_id").val(iti_id);
        $("#cust_id").val(customer_id);
        $("#duplicatePakcageModal").show();
        $("#continue_package, #clone_current_iti").removeClass("disabledBtn");
        //console.log(iti_id + " " + customer_id);
    });

    $(document).on('change', 'select#pkg_cat_id', function() {
        $("#state_id, #pkg_id").val("");
        $("#state_id").removeAttr("disabled");
    });
    /*get Packages by Package Category*/
    $(document).on('change', 'select#state_id', function() {
        var p_id = $("#pkg_cat_id option:selected").val();
        var state_id = $("#state_id option:selected").val();

        var _this = $(this);
        $("#pkg_id").val("");
        _this.parent().append(
            '<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('packages/packagesByCatId'); ?>",
            data: {
                pid: p_id,
                state_id: state_id
            }
        }).done(function(data) {
            $(".bef_send").hide();
            $("#pkg_id").html(data);
            $("#pkg_id").removeAttr("disabled");
        }).error(function() {
            $(".bef_send").html("Error! Please try again later!");
        });
    });

    //ajax request if predefined package choose
    var ajaxReq;
    $("#createIti").validate({
        submitHandler: function() {
            if (ajaxReq) {
                ajaxReq.abort();
            }
            $("#continue_package, #clone_current_iti").addClass("disabledBtn");
            var resp = $("#pack_response");
            var package_id = $("#pkg_id").val();
            var customer_id = $("#cust_id").val();
            var iti_id = $("#iti_id").val();

            if (package_id == '' || customer_id == '' || iti_id == '') {
                resp.html("Please Choose Package First");
                resp.html(
                    '<div class="alert alert-danger"><strong>Error! </strong>Please Choose Package First OR Reload page and try again.</div>'
                );
                return false;
            }
            //resp.html( "Iti Id: " + iti_id + "Package Id: " + package_id + "Customer Id: " + customer_id );
            ajaxReq = $.ajax({
                type: "POST",
                url: "<?php echo base_url('itineraries/cloneItineraryFromPackageId'); ?>",
                data: {
                    package_id: package_id,
                    customer_id: customer_id,
                    parent_iti_id: iti_id
                },
                dataType: "json",
                beforeSend: function() {
                    resp.html(
                        '<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>'
                    );
                },
                success: function(res) {
                    if (res.status == true) {
                        resp.html(
                            '<div class="alert alert-success"><strong>Success! </strong>' +
                            res.msg + '</div>');
                        window.location.href =
                            "<?php echo site_url('itineraries/edit/');?>" + res.iti_id +
                            "/" + res.temp_key;
                    } else {
                        resp.html(
                            '<div class="alert alert-danger"><strong>Error! </strong>' +
                            res.msg + '</div>');
                        //console.log("error");
                    }
                },
                error: function(e, r) {
                    console.log(r);
                    resp.html(
                        '<div class="alert alert-danger"><strong>Error!</strong> Please Try again later! </div>'
                    );
                }
            });
        }
    });

    $(document).on("click", '.child_clone', function() {
        return confirm('Are you sure to create duplicate itinerary ?');
    });


    // /*****************************************/
    // $(".customer_name_text").text(function() {
    //     return $(this).text().length > 75 ? $(this).text().substr(0, 75) + '...' : $(this).text();
    // });

    $(".email_text").text(function() {
        return $(this).text().length > 75 ? $(this).text().substr(0, 75) + '...' : $(this).text();
    });

    // $(".package_name").text(function() {
    //     return $(this).text().length > 5 ? $(this).text().substr(0, 5) + '...' : $(this).text();
    // });




});
</script>