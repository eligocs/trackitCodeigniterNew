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
                        <i class="fa fa-users"></i> All Booked Itineraries
                    </div>
                    <?php 
                  $rev_link 	= $this->config->item('google_review_link');
                  if( !empty( $rev_link ) ){
                  ?>
                    <div class="pull-right">
                        <button class="btn btn-primary float-end" onclick="copy_rev_link()"><i class="fa-solid fa-plus"></i> Copy Review Link</button>
                        <strong id="altPassTemp" class='hide'><?php echo $rev_link; ?></strong>
                    </div>
                    <?php } ?>

                    <!-- Show hide filter button -->
                    <button  class="btn float-end me-2 p-2 " title="Filter Itineraries" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
                </div>
            </div>
            <?php
            //Hide filter
            $hideClass = isset( $_GET["todayStatus"] ) || isset( $_GET["leadfrom"] ) ? "hideFilter" : "";
            if( isset( $_GET["todayStatus"] ) ){	
            	$first_day_this_month = $_GET["todayStatus"]; 
            	$last_day_this_month  = $_GET["todayStatus"];
            }else{
            	$first_day_this_month = ""; 
            	$last_day_this_month  = "";
            }
            ?>
            <!--sort by agent -->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
                <!--start filter section-->
                <form id="form-filter" class="form-horizontal bg_white padding_zero overflow_visible mb-0">
                    <div class="row">
                    <?php if( $user_role == 99 || $user_role == 98 ){ ?>
                        <div class="col-md-3 my-2">
                            <?php $sales_team_agents = get_all_sales_team_agents(); ?>
                            <div class="form-group">
                                <label class="control-label" for="sales_user_id">Select Sales Team User:</label>
                                <select required class="form-control" id='sales_user_id' name="user_id">
                                    <option value="">All Users</option>
                                    <?php foreach( $sales_team_agents as $user ){ ?>
                                    <option value="<?php echo $user->user_id; ?>">
                                        <?php echo $user->user_name . " ( " . ucfirst( $user->first_name ) . " "  . ucfirst( $user->last_name) . " )"; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="<?php echo $hideClass; ?> col-md-3 my-2">
                            <div class="actions custom_filter">
                                <label class="control-label">Filter: </label>
                                <!--Calender-->
                                <input type="text" autocomplete="off" class="form-control d_block" id="daterange"
                                    name="dateRange" value="" required />
                                <input type="hidden" name="date_from" id="date_from"
                                    data-date_from="<?php if( isset( $_GET["leadfrom"] ) ){ echo $_GET["leadfrom"]; }else { echo $first_day_this_month; } ?>"
                                    value="">
                                <input type="hidden" name="date_to" id="date_to"
                                    data-date_to="<?php if( isset( $_GET["leadto"] ) ){ echo $_GET["leadto"]; }else{ echo $last_day_this_month; } ?>"
                                    value="">
                                <input type="hidden" name="filter_val" id="filter_val"
                                    value="<?php if( isset( $_GET["leadStatus"] ) ){ echo $_GET["leadStatus"]; }else{ echo "9"; } ?>">
                                <input type="hidden" name="todayStatus" id="todayStatus"
                                    value="<?php if( isset( $_GET["todayStatus"] ) ){ echo $_GET["todayStatus"]; } ?>">

                            </div>
                        </div>
                        <div class="col-md-3 my-2">
                            <div class="filter_box">
                                <label class="control-label" for="">&nbsp;</label>
                                <select class="form-control" name="filtername" id="">
                                    <option  value="9" id="all">All</option>
                                    <option  value="9" id="approved">Approved</option>
                                    <option  value="travel_date" id="travel_date">Travel Date</option>
                                    <option  value="travel_end_date" id="travel_end_date">Checkout</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 my-2">
                            <label class="control-label d-block" for="">&nbsp;</label>
                            <input type="submit" class="btn btn-success" value="Filter">
                            <?php if( $user_role == 99 || $user_role == 98 ){ ?>
                                <a href="<?php echo base_url("export/export_itinerary_fiter_data");?>"
                                    class="btn btn-danger export_btn"><i class="fa fa-file-excel"></i>
                                    Export</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- loding spinner -->
            <div class="spinner_load" style="display: none;">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
            </div>
            
          <!-- Begin demo table design -->
          <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive itineraryData">
                <table class="table data-table-large">
                        <tbody>
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
                        
                    <?php
                    }
                    }else{?>      
                    <div>
                        No Data Found....
                    </div> 
                    <?php
                    }
                    ?> 
                    </tbody>
                    </table>                            
                </div>
            </div>
            <!-- End end demo table design -->
        </div>
        <!-- end page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->



<script type="text/javascript">
jQuery(document).ready(function($) {
    //SENT GOOGLE REVIEW LINK TO CUSTOMER
    $(document).on("click", '.sendReview_req', function(e) {
        e.preventDefault();
        var _this = $(this);
        var cus_id = _this.attr("data-cusid");
        if (confirm("Are you sure to send review request to customer ?")) {
            $(".spinner_load").show();
            $.ajax({
                url: "<?php echo base_url(); ?>" +
                    "customers/update_review_status?customer_id=" + cus_id,
                type: "GET",
                data: cus_id,
                dataType: 'json',
                cache: false,
                success: function(r) {
                    $(".spinner_load").hide();
                    if (r.status = true) {
                        alert("Request sent successfully. ");
                        _this.removeClass("sendReview_req").html(
                            "<i class='fa fa-check-circle-o'></i> Sent");
                        //location.reload();
                    } else {
                        alert("Error! Please try again.");
                    }
                }
            });

        }
    });


    $(document).on("change", 'select[name=filtername]', function() {
        var filter_val = $(this).val();
        $("#filter_val").val(filter_val);
        console.log(filter_val);
    });

    //Export Data filter
    $(document).on("click", ".export_btn", function(e) {
        e.preventDefault();
        //get filtered perameters
        var filter = $("#filter_val").val(),
            d_from = $("#date_from").attr("data-date_from"),
            end = $("#date_to").attr("data-date_to"),
            todayStatus = $("#todayStatus").val(),
            //quotation 	= $("#quotation").val(),
            agent_id = $("#sales_user_id").val();

        var export_url = "<?php echo base_url('export/export_itinerary_fiter_data?filter='); ?>" +
            filter + "&d_from=" + d_from + "&end=" + end + "&todayStatus=" + todayStatus +
            "&agent_id=" + agent_id;
        //redirect to export
        if (confirm("Are you sure to export data ?")) {
            window.location.href = export_url;
        }
    });

    //calendar
    var date_from = $("#date_from").attr("data-date_from");
    if (date_from != "") {
        $('#daterange').val($("#date_from").attr("data-date_from") + '-' + $("#date_to").attr("data-date_to"));
    } else {
        $('#daterange').val("");
    }
    //Date range
    $("#daterange").daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            autoUpdateInput: false,
            showDropdowns: true,
            minDate: new Date(2016, 10 - 1, 25),
            //singleDatePicker: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
        },
        function(start, end, label) {
            $('#daterange').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
            $("#date_from").attr("data-date_from", start.format('YYYY-MM-DD'));
            $("#date_to").attr("data-date_to", end.format('YYYY-MM-DD'));
            $("#todayStatus").val("");
            console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD'));
        });
});
</script>
<script type="text/javascript">
  
//copy review link
function copy_rev_link() {
    /* Get the text field */
    var element = document.getElementById("altPassTemp");
    /* Alert the copied text */
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    var copyText = document.execCommand("copy");
    //alert("Review Link Copied: " + $(element).text() );
    swal("Copied!", "The link to Review has been copied to clipboard!.", "success");

    $temp.remove();
}
</script>