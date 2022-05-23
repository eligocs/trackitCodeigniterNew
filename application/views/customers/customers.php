<style>
.hold_row {
    background-color: pink !important;
}

#pakcageModal {
    top: 20%;
}
</style>
<?php $todAy = date("Y-m-d"); 
?>

<!-- Begin page-container -->
<div class="page-container">
    <!-- Begin page-content-wrapper -->
    <div class="page-content-wrapper">
        <!-- Begin page-content -->
        <div class="page-content">
            <?php $message = $this->session->flashdata('success'); 
                if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
            ?>
            <!--error message-->
            <?php $err = $this->session->flashdata('error'); 
                if($err){ echo '<span class="help-block help-block-error2 red">'.$err.'</span>';}
            ?>
            <?php $sales_team_agents = get_all_sales_team_agents(); ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>All Customers
                    </div>
                    <?php if( is_admin_or_manager() || is_teamleader() ){ ?>
                    <button class="btn btn-primary float-end me-2 add-edit-customer" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" data-id=""
                        aria-controls="offcanvasTop">
                        <i class="fa-solid fa-plus"></i> Add Customer
                    </button>
                    <?php  } ?>
                    <!-- Show hide filter button -->
                    <button class="btn float-end me-2 p-2" title="Filter Customers" type="button"
                        data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false"
                        aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
                </div>
            </div>

            <?php
                $hideClass = "";
                if( isset( $todayStatus ) ){	
                    $first_day_this_month = $todayStatus; 
                    $last_day_this_month  = $todayStatus;
                }else{
                    $first_day_this_month = ""; 
                    $last_day_this_month  = "";
                }
            ?>

            <div class="portlet-body">
                <!-- Begin filter_collapse Section -->
                <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse <?= !empty($_GET['search']) ? 'show' : '' ?>" id="filter_collapse">
                    <!--sort by agent -->
                    <?php
                        if( isset( $_GET["todayStatus"] ) ){	
                            $first_day_this_month = $_GET["todayStatus"];
                            $last_day_this_month  = $_GET["todayStatus"];
                        }else{
                            $first_day_this_month = "";
                            $last_day_this_month  = "";
                        }
                    ?>
                    <?php if( $user_role == 97 ){ ?>
                    <form id="form-filter" class="flex form-horizontal margin_bottom_0 <?php echo $hideClass; ?>">
                        <div class="actions">
                            <div class="row">
                                <!--Calender-->
                                <div class="col-md-3 my-2">
                                    <label class="control-label">Filter: </label>
                                    <input placehoder="Select Date" type="text" autocomplete="off" class="form-control"
                                        id="daterange" name="dateRange" value="" required />
                                </div>
                                <!--End-->
                                <div class="col-md-3 my-2">
                                    <label class="control-label">Itinerary Type: </label>
                                    <select name="quotation_type" class="form-control form-select" id="quotation_type" required>
                                        <option value="" selected disabled>All</option>
                                        <option value="1" <?= ($_GET['quotation_type'] == 1) ? 'selected' : '' ?>>Holidays</option>
                                        <option value="2">Accommodation</option>
                                    </select>
                                </div>
                                <div class="col-md-6 my-2">
                                    <label class="control-label">&nbsp; </label>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default btn-primary custom_active"><input type="radio"
                                                name="filter" value="all" id="all" />All</label>
                                        <label class="btn btn-default btn-success custom_active"><input type="radio"
                                                name="filter" value="9" id="approved" />Approved</label>
                                        <label class="btn btn-default purple custom_active"><input type="radio"
                                                name="filter" value="revised" id="revised" />Revised</label>
                                        <label class="btn btn-default btn-danger custom_active"><input type="radio"
                                                name="filter" value="travel_date" id="travel_date" />Travel Date</label>
                                    </div>
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
                                    <input type="submit" class="btn btn-success" value="Filter">
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php }else{ ?>
                    <form id="form-filter" class="form-horizontal margin_bottom_0  <?php echo $hideClass; ?>" action="<?php echo base_url(); ?>customers/index">
                        <div class="actions">
                            <div class="row">
                                <!--Calender-->
                                <div class="col-md-3 my-2">
                                    <label class="control-label">Filter: </label>
                                    <input placeholder="Select Date" type="text" autocomplete="off" class="form-control"
                                        id="daterange" name="dateRange" value="" required />
                                </div>
                                <!--End-->
                                <div class="col-md-3 my-2">
                                    <label class="control-label" for="">Itinerary Type:</label>
                                    <select name="quotation_type" class="form-control form-select" id="leadsType" required>
                                        <option value="" selected disabled>All</option>
                                        <option value="1">Holidays</option>
                                        <option value="2">Accommodation</option>
                                    </select>
                                </div>
                                <div class="col-md-3 my-2">
                                    <label class="control-label" for="">Itinerary Status:</label>
                                    <select name="leadStatus" id="" class="form-control form-select" required>
                                        <option value="" selected disabled>Select Iti Status</option>
                                        <option value="all">All</option>
                                        <option value="draft">Draft</option>
                                        <option value="hold">Hold</option>
                                        <option value="pending">Working</option>
                                        <option value="notwork">Not Process</option>
                                        <option value="travel_date">Travel Date</option>
                                        <option value="9">Approved</option>
                                        <option value="8">Declined</option>
                                        <option value="amendment">Amendment</option>
                                    </select>
                                    <input type="hidden" name="search" value="True">

                                    <!-- <input type="hidden" name="date_from" id="date_from"
                                        data-date_from="<?php if( isset( $_GET["leadfrom"] ) ){ echo $_GET["leadfrom"] ; }  else { echo $first_day_this_month; } ?>"
                                        value="">
                                    <input type="hidden" name="date_to" id="date_to"
                                        data-date_to="<?php if( isset( $_GET["leadto"] ) ){ echo $_GET["leadto"]; } else{ echo $last_day_this_month; }  ?>"
                                        value="">
                                    <input type="hidden" name="filter_val" id="filter_val"
                                        value="<?php if( isset( $_GET["leadStatus"] ) ){ echo $_GET["leadStatus"]; }else{ echo "all"; } ?>" />
                                    <input type="hidden" id="quotation"
                                        value="<?php if( isset( $_GET['quotation'] ) ){ echo "true"; }else{ echo "false";} ?>" />
                                    <input type="hidden" name="todayStatus" id="todayStatus"
                                        value="<?php if( isset( $_GET["todayStatus"] ) ){ echo $_GET["todayStatus"]; } ?>" /> -->

                                </div>
                                <div class="col-md-3 d-flex align-items-center mt-md-3">
                                    <input type="submit" class="btn btn-success d-block mt-2" value="Filter">
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                    </form>
                    <?php } ?>
                </div>
                <!-- End filter_collapse -->
                <form id="search_customer_data" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="customer_id">Enter Customer
                            ID/name/contact:</label>
                        <div class="col-sm-4">
                            <input type="text" id="customer_id" required maxlength="20" name="keyword"
                                value="<?php echo $customer->customer_id; ?>" class="form-control"
                                placeholder="Type Lead Id or Customer Name or Contact Number"
                                title="Type Lead Id or Customer Name or Contact Number" />
                            <ul class="dropdown-menu txtcustomer" style="margin-left:20px;margin-right:0px;" role="menu"
                                aria-labelledby="dropdownMenu" id="DropdownCusInfo"></ul>
                        </div>
                    </div>
                </form>
                <!-- Begin demo table design -->
                <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                    <div class="table-responsive min-h-300 customersData">
                        <?php
                        if(!empty($list)){ 
                            ?>
                        <table class="table data-table-large">
                            <tbody>
                                <?php
                                foreach ($list as $customer) {
                                    // dump($customer);
                                    $cust_id = $customer->customer_id;
                                    //Lead Prospect Hot/Warm/Cold
                                    $cus_pro_status = get_cus_prospect($customer->customer_id);
                                    // dump($cus_pro_status);diel;
                                    if( $cus_pro_status == "Warm" ){
                                        $l_class = '<div class="badge bg-warning"><strong>Warm</strong></div>';
                                    }else if( $cus_pro_status == "Hot" ){
                                        $l_class = '<div class="badge bg-danger"><strong>Hot</strong></div>';
                                    }else if( $cus_pro_status == "Cold" ){
                                        $l_class = '<div class="badge bg-info"><strong>Cold</strong></div>';
                                    }else{
                                        $l_class = '<div class="badge bg-secondary"><strong>Undifined</strong></div>';
                                    }
                                    //Check customer status 9=approved,8=decline,0=working
                                    switch( $customer->cus_status ){
                                        case 9:
                                            //Check for iti status
                                            $iti_status = $customer->iti_status;
                                            // if( isset( $customer->booking_status ) && $customer->booking_status != 0 ){
                                                if( isset( $customer->booking_status )){
                                                    $iti_s = isset( $customer->booking_status ) && $customer->booking_status == 0 ? '<span title="Working on lead" class="badge bg-success">
                                                    <strong class="white">Approved</strong> 
                                                    </span>' : '<span title="Working on lead" class="badge bg-yellow-mint">
                                                    <strong class="white">On Hold</strong> 
                                                    </span>';
                                                }else if( $iti_status == 9 ){
                                                    $iti_s = "APPROVED";
                                                }else if( $iti_status == 7 ){
                                                    $iti_s = "DECLINED";
                                                }else if( $iti_status == 6 ){
                                                    $iti_s = "REJECTED";
                                                }else{
                                                    $iti_s = empty( $customer->followup_id ) ? '<span title="Working on lead" class="badge bg-yellow-casablanca">
                                                    <strong class="white">Not Process</strong> 
                                                    </span>' : '<div title="Working on lead" class="badge bg-success">
                                                    <strong class="white">Working...</strong> 
                                                    </div>';
                                                }                                            
                                            $decUserStatus = "<strong class='btn btn-success'>Lead Approved</strong>";
                                            $add_iti = '<div title="Holiday Type" class="fs-8  text-success">
                                                            <strong class="" title="Lead Status ">Verified</strong> 
                                                        </div>';
                                            break;
                                        case 8:
                                            $add_iti = '<div title="Holiday Type" class="fs-8  text-danger">
                                                            <strong class="" title="Lead Status ">Declined</strong> 
                                                        </div>';
                                            $decUserStatus = "<strong class='badge_danger_pill'> Declined</strong>";
                                            $iti_s = '<span title="Working on lead" class="badge bg-danger">
                                                        <strong class="white">Declined</strong> 
                                                    </span>';
                                            break;
                                        default:
                                            $add_iti = "<div title='Holiday Type' class='fs-8  text-danger'>
                                                            <strong class='' title='Lead Status'>Not Processed</strong> 
                                                        </div>";
                                            $decUserStatus = "<strong class='btn btn-success'>Working...</strong>";
                                            $iti_s = empty( $customer->followup_id ) ? ' <span title="Working on lead" class="badge bg-yellow-casablanca">
                                            <strong class="white">Not Process</strong> 
                                                </span>' : '<div title="Working on lead" class="badge badge-primary">
                                                <strong class="white">Working...</strong> 
                                            </div>';
                                            break;
                                    }
                                    ?>
                                <tr>
                                    <td class="w-30">
                                        <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                            <div class="d-flex justify-content-between px-1 w-100">
                                                <div class="requirment flex-grow-1">
                                                    <p title="Lead Id" class="fs-7 fw-bold mb-1 mt-0 d-inline-block">
                                                        <a class="dropdown-item"
                                                            href="<?= site_url("customers/view_lead/") . $customer->customer_id ?>">#<?= $customer->customer_id ?></a>
                                                    </p>
                                                    <div title="Holiday Type" class="fs-8 me-2 text-success">
                                                        <strong class="" title="Lead Status "><?= $add_iti ?></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-2 mt-0 ">
                                                    <span class="tooltip_right d-block">
                                                        <span class="customer_name_text">
                                                            <strong
                                                                class="d-block mb-1 uppercase"><?= !empty($customer->customer_name) ? ucFirst($customer->customer_name) : 'N/A' ?></strong></span>
                                                                <span
                                                                class="tooltip_right_text"><?= !empty($customer->customer_name) ? ucFirst($customer->customer_name) : 'N/A' ?>
                                                            </span>
                                                        </span>
                                                        <span title="Leads From"
                                                            class="text-primary"><?= get_customer_type_name($customer->customer_type) ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bg-light d-flex justify-content-between p-1 w-100">
                                                <div class="border-end flex-grow-1">
                                                    <p class="fs-7 mb-2 mt-0 text-secondary">Lead Status </p>
                                                    <?= $l_class ?>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <div class="my-1">
                                                        <span class="d-block fs-7 mb-2">
                                                            <i class="fa-solid fa-phone text-primary"></i>
                                                            <?= !empty($customer->customer_contact) ? $customer->customer_contact : '' ?>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="tooltip_right">
                                                            <i class="fa-envelope fa-solid text-primary"></i>
                                                            <span class="email_text">
                                                                <?= !empty($customer->customer_email) ? $customer->customer_email : 'Not Available' ?>
                                                            </span>

                                                            <span
                                                                class="tooltip_right_text"><?= !empty($customer->customer_email) ? $customer->customer_email : 'Not Available' ?>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                            <div class="px-2">
                                                <div class="mb-2">
                                                    <strong
                                                        class="d-block fs-7 mb-1"><?= !empty(get_state_name($customer->state_id)) ? get_state_name($customer->state_id) : 'Not Available' ?>
                                                    </strong>
                                                    <span class="fs-8 fw-500 text-secondary">Pick Up Point</span>
                                                </div>
                                            </div>
                                            <div class="bg-light p-1 w-100">
                                                <p class="fs-7 m-0 mb-2 text-secondary">Itinerary Stage</p>
                                                <?= $iti_s ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                            <div class="mb-2 px-2">
                                                <p class="fw-bold m-0">
                                                    <?= !empty($customer->assigned_date) ? date("d-F-y",  strtotime( $customer->assigned_date)) : ''?>
                                                </p>
                                                <span class="fs-8 text-secondary">Assigned on</span>
                                            </div>
                                            <div class="bg-light p-1 w-100">
                                                <span class="d-block fs-7 mb-2 text-muted">Assigned to</span>
                                                <a class="text-primary fw-bold" target="_blank"
                                                    href="<?= site_url("agents/view/$customer->agent_id")?>"
                                                    title="View Agent"><?= ucFirst(get_user_name( $customer->agent_id )) ?></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                            <div class="mb-2 px-2">
                                                <p class="fs-7 m-0">
                                                    <i class="fa-solid fa-phone-volume fs-8"></i>
                                                    <strong> <?= count_total_no_of_call($cust_id) ?> </strong>
                                                </p>
                                                <span class="fs-8 text-secondary">Total calls</span>
                                            </div>
                                            <div class="bg-light p-1 w-100">
                                                <span class="d-block fs-7 mb-2 text-secondary">Created on </span>
                                                <p class="fs-8 fw-400 m-0 text-dark">
                                                    <?=  date("d-F-Y", strtotime( $customer->created )); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <?php if(get_iti_next_followup($cust_id) || (get_iti_last_call_followup($cust_id))){}
                                        ?>
                                    <td>
                                        <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                            <div class="mb-2 px-2">
                                                <p class="my-1 fs-7 text-secondary"><span>Next Call</span>
                                                    <?php if(get_iti_next_followup($cust_id) || (get_iti_last_call_followup($cust_id))){
                                        ?>
                                                    <span><?= !empty(get_iti_next_followup($cust_id)) ?  date("d-F",  strtotime( get_iti_next_followup($cust_id) )) : '' ?></span>
                                                    <?php } else{
                                                         ?>
                                                    <span><?= !empty(get_leads_next_followup($cust_id)) ?  date("d-F",  strtotime( get_leads_next_followup($cust_id) )) : '' ?></span>
                                                    <?php
                                                     }  ?>
                                                </p>
                                                <p class="my-1 text-dark"><i
                                                        class="<?= (missLeadsCallFollowup($cust_id) == 'Miss') ?
                                                            'text-danger': 'text-success'; ?> fa-solid fa-phone-volume"></i>
                                                    <?php if(get_iti_next_followup($cust_id) || (get_iti_last_call_followup($cust_id))){
                                                            echo !empty(get_iti_last_call_followup($cust_id)) ? date("h:i A",  strtotime( get_iti_last_call_followup($cust_id) )) : 'Not sheduled';
                                                            }else{
                                                                if(missLeadsCallFollowup($cust_id) == 'Miss') {
                                                                 $misCalTime = !empty(get_leads_next_followup($cust_id)) ? date("h:i A",  strtotime( get_leads_next_followup($cust_id) )) : '' ; 
                                                                   echo "<strong class='text-danger' title='{$misCalTime}'>   Call Missed</strong>";
                                                                } else{
                                                                    echo !empty(get_leads_next_followup($cust_id)) ? date("h:i A",  strtotime( get_leads_next_followup($cust_id) )) : 'Not sheduled' ;
                                                                }
                                                            }?>
                                                </p>
                                            </div>
                                            <div class="bg-light p-1 w-100">
                                                <span class="d-block fs-7 mb-2 text-secondary">Last Call On</span>
                                                <p class="fs-7 fs-8 my-1 text-dark">
                                                    <i class="text-success fa-solid fa-phone-volume"></i>
                                                    <?= !empty(get_leads_last_call_followup($cust_id)) ? date("d-F h:i A",  strtotime( get_leads_last_call_followup($cust_id) )) : ' Not sheduled' ?>
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
                                                    <!-- <?= site_url("customers/edit/$customer->customer_id") ?> -->
                                                    <a class="dropdown-item add-edit-customer" href="#"
                                                        data-bs-toggle="offcanvas"
                                                        data-id="<?= $customer->customer_id ?>"
                                                        data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>

                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="<?= site_url("customers/view_lead/") . $customer->customer_id ?>"><i
                                                            class="fa-solid fa-eye"></i> View</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item ajax_delete_customer"
                                                        data-id="$customer->customer_id" href="javascript:;"><i
                                                            class="fa-solid fa-trash-can"></i> Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <p><?php echo $links; ?></p>
                        <?php }else{
                                ?>
                        Data Not Found..............

                        <?php
                            }?>

                    </div>
                </div>
                <!-- Table Section -->
                <div class="bg-white p-3 rounded-4 shadow-sm">
                    <?php if( is_admin_or_manager() ){ ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sales_user_id">Select Sales Team User:</label>
                                <select required class="form-control form-select select_user" id='sales_user_id'
                                    name="user_id">
                                    <option value="">All Users</option>
                                    <?php foreach( $sales_team_agents as $user ){ ?>
                                    <option value="<?php echo $user->user_id; ?>">
                                        <?php echo $user->user_name . " ( " . ucfirst( $user->first_name ) . " "  . ucfirst( $user->last_name) . " )"; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!--export button for admin and manager-->
                        <div class="col-md-9">
                            <label class="control-label d-block" for="">&nbsp;</label>
                            <div class="dropdown float-end action_menu">
                                <a class="btn btn_blue_outline dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Action
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <!-- dropdown-item -->
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$todAy}"; ?>"><i
                                                class="fa fa-users"></i> Today's Lead</a>
                                    </li>
                                    <!-- dropdown-item -->
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=callpicked"; ?>"><i
                                                class="fa fa-phone"></i> Today Call Picked</a>
                                    </li>
                                    <!-- dropdown-item -->
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=callnotpicked"; ?>"><i
                                                class="fa fa-phone"></i> Today Call Not Picked</a>
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
                                <select required class="form-control form-select select_user" id='sales_user_id'
                                    name="user_id">
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

                </div>
            </div>
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
</div>
<!-- End page-container -->
</div>



<!------------------------------------- offcanvas Start ------------------------ -->
<!-- Begin offcanvas-top for add customer -->
<div class="bg_fade">
    <div class="offcanvas offcanvas-end offcanvasTop" tabindex="-1" id="offcanvasTop"
        aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">
                <p class="headerData"></p>
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="edit-add-cust">


            </div>
        </div>
    </div>
</div>
<!-- End offcanvas-top for add customer -->




<!-- Begin Offcanvas-end for Reassign Customer -->
<div class="bg_fade">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEnd">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Reassign Customer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <table class="table table-bordered table_details">
                <tbody>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Type</th>
                    </tr>
                    <tr>
                        <td>Akash Dhiman</td>
                        <td>Travel Partner</td>
                    </tr>
                    <tr>
                        <th>quotation Type</th>
                        <th>Agent</th>
                    </tr>

                    <tr>
                        <td>Holidays</td>
                        <td>sahil Hans</td>
                    </tr>
                </tbody>
            </table>
            <form action="">
                <div class="row">
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label for="" class="control-label">Customer Name </label>
                            <input type="text" class="form-control" placeholder="Customer Name">
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label for="" class="control-label">Customer Email</label>
                            <input type="email" class="form-control" placeholder="Customer Email">
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label for="" class="control-label">Customer Contact <sup
                                    class="text-danger">*</sup></label>
                            <input type="number" class="form-control" placeholder="Customer Contact">
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label for="" class="control-label">Reassign To <sup class="text-danger">*</sup></label>
                            <select name="" id="" class="form-control form-select" required>
                                <option value="" disabled selected>Select Sales Team Agents</option>
                                <option value="sales1">Sales1</option>
                                <option value="sales2">Sales2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <button class="btn btn-primary">Save Customer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Offcanvas for Reassign Customer-->

<!-- Begin offcanvas-top for Reopen Lead -->
<div class="bg_fade">
    <div class="offcanvas offcanvas-top" tabindex="-1" id="reopenLead" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Offcanvas top</h5>
            <div>
                <a href="" class="btn btn-sm btn-warning me-2 text-white"><i class="fa-solid fa-eye"></i> View
                    Customer</a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
        </div>
        <div class="offcanvas-body">
            <form action="">
                <div class="row">
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label for="" class="control-label">Assign To</label>
                            <select name="" id="" class="form-control form-select">
                                <option value="" disabled selected>Select Sales Team Agent</option>
                                <option value="sales1">Sales1</option>
                                <option value="sales2">Sales2</option>
                            </select>
                            <span class="text-danger fs-7">Note: if you reopen this lead all related itineraries and
                                followup will be deleted.</span>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="bg-light m-0 ps-4 py-2">
                            <p class="m-0">Query Decline By Customer</p>
                        </div>
                        <div class="ps-4">
                            <p class="my-1 fs-7"><strong>Reason:</strong> Package is Too Costly !</p>
                            <p class="my-1 fs-7"><strong>Comment</strong> Client Budget is 12K</p>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <button class="btn btn-primary"><i class="fa-solid fa-rotate-right"></i> Reopen Lead</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End offcanvas-top for Reopen Lead -->
<!-- package Modal -->
<div id="pakcageModal" class="modal" role="dialog">
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
                            <label>Select Package</label>
                            <select required disabled name="packages" class="form-control form-select" id="pkg_id">
                                <option value="">Choose Package</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" id="cust_id" value="">
                            <input type="submit" class='btn btn-green' id="continue_package" value="Continue">
                        </div>
                    </div>
                    <div id="pack_response"></div>
                </form>
                <hr>
                <h2><strong>OR</strong></h2>
                <div class="form-group">
                    <a href="" class='btn btn-green' id="readyForQuotation" title='Add Itinerary'><i
                            class='fa fa-plus'></i> Create New</a>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<div class="addCustomerFormres"></div>
<script src="<?php echo base_url();?>site/assets/customjs/customers.js" type="text/javascript"></script>