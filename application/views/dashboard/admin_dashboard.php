<?php
//date use to filter
$from = date('Y-m-01');
$to = date('Y-m-t');
//from date from app start
$from_start = "2017-11-01";
$today_date = date('Y-m-d');
//This Month
$this_month = date("Y-m");
?>

<style>
#chartdiv {
    width: 100%;
    height: 500px;
}
.quick-nav-chart {
    /* position: fixed;
    z-index: 10103;
    top: 126px;
    right: 10px;
     margin-top: -230px; 
    pointer-events: none; */
}
</style>

<?php $todAy = date("Y-m-d"); ?>
<div class="page-container">
    <div class="page-content-wrapper sales_team_dashboard">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content p-4">
            <!-- BEGIN PAGE HEADER-->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul id="theme_color_listing">
                            <li class="color-default current tooltips" data-style="default" data-container="body"
                                data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="theme_dark" data-container="body"
                                data-original-title="Theme Dark"> </li>
                            <li class="color-blue tooltips" data-style="theme_light" data-container="body"
                                data-original-title="Theme Light"> </li>
                        </ul>
                    </div>
                    <div class="th_response"></div>
                </div>
            </div>
            <!-- BEGIN PAGE BAR -->
            <?php
             $this->load->view('dashboard/followupnav');
            ?>
            <div class="page-bar px-3">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Dashboard</span>
                    </li>
                </ul>

                <?php $user_data = get_user_info();
                    $h_user_role = isset($user_data[0]->user_type) ? $user_data[0]->user_type : "";
                    $h_user_id = isset($user_data[0]->user_id) ? $user_data[0]->user_id : "";

                    //if saleteam user show monthly target
                    if ($h_user_role == 99 || $h_user_role == 98) {
                        $mtarget = (int)get_total_target_by_month();
                        $mbooked = (int)get_agents_booked_packages();
                        //$mtarget = 10; 
                        //$mbooked = 10;
                        $percentage =  !empty($mtarget) ?  floor(($mbooked / $mtarget) * 100) : 0; ?>
                <div class='header_target_section'>
                    <a href="<?php echo base_url("incentive"); ?>" title="Go to incentive page">
                        <div class="progress" style="max-width:100%; min-width:250px;">
                            <span class="target"><span>Booked: <?php echo $mbooked; ?></span> / <span>Target:
                                    <?php echo $mtarget; ?> </span></span>
                            <div class="progress-bar progress-bar-success progress-bar-striped active"
                                role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0"
                                aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
                            </div>
                        </div>
                    </a>
                </div>
                <?php } else if ($h_user_role == 96) { ?>
                <!--check teamleader-->
                <?php if (!empty(get_teamleader())) {
                            $team_leader = get_teamleader();
                            echo "<div class='header_team-leader-name'>TEAM : <span title='Team Name ( Leader )'>{$team_leader}</span></div>";
                        } ?>
                <!--end check teamleader-->
                <?php
                        if (is_teamleader()) {
                            $agent_in = is_teamleader();
                            $mtarget = (int)get_total_target_by_month($agent_in);
                            $mbooked = (int)get_agents_booked_packages(NULL, NULL, $agent_in);
                            //$mtarget = 10; 
                            //$mbooked = 10;
                            $percentage = !empty($mtarget) ? floor(($mbooked / $mtarget) * 100) : 0;
                        } else {
                            $mtarget = (int)get_agent_monthly_target();
                            $mbooked = (int)get_agents_booked_packages();
                            //$mtarget = 10; 
                            //$mbooked = 10;
                            $percentage =  !empty($mtarget) ?  floor(($mbooked / $mtarget) * 100) : 0;
                        } ?>
                <div class='header_target_section'>
                    <a href="<?php echo base_url("incentive"); ?>" title="Go to incentive page">
                        <div class="progress" style="max-width:100%; min-width:250px;">
                            <span class="target"><span>Booked: <?php echo $mbooked; ?></span> / <span>Target:
                                    <?php echo $mtarget; ?> </span></span>
                            <div class="progress-bar progress-bar-success progress-bar-striped active"
                                role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0"
                                aria-valuemax="100" style="width:<?php echo $percentage; ?>%">
                            </div>
                        </div>
                    </a>
                </div>
                <?php }    ?>


            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Admin Dashboard
                <small>Users, recent customers and vouchers</small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->

            <div class="portlet box blue">
                <div class="row portlet-body">
                    <div class="col-lg-6 col-xxl-3 col-xl-4 col-xs-12">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                href="<?php echo site_url("agents?ustatus=active"); ?>">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($total_agents) ? $total_agents : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Active Users </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-3 col-xl-4 col-xs-12">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 red"
                                href="<?php echo site_url("customers"); ?>">
                                <div class="visual">
                                    <i class="fa-solid fa-chart-column"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($total_customers) ? $total_customers : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Customers </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-3 col-xl-4 col-xs-12">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                href="<?php echo site_url("itineraries"); ?>">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($total_iti) ? $total_iti : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Itineraries </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-3 col-xl-4 col-xs-12">
                        <div class="callCountBlock">
                            <a class="dashboard-stat dashboard-stat-v2 purple"
                                href="<?php echo site_url("vouchers"); ?>">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($total_vouchers) ? $total_vouchers : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Vouchers </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- END DASHBOARD STATS 1-->
            
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-calendar"></i>Today's Section</div>
                </div>
                <!-- Todays status-->
                <div class="todayssection row">
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                href="<?php echo site_url("customers") . "/?todayStatus={$todAy}"; ?>">
                                <div class="visual">
                                    <i class="fa-solid fa-chart-column"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($totalContLeadsToday) ? $totalContLeadsToday : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Leads </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=callpicked"; ?>">
                                <div class="visual">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($totalPickCallsToday) ? $totalPickCallsToday : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Call <br>Picked </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=callnotpicked"; ?>">
                                <div class="visual">
                                    <i class="fa-solid fa-phone-slash"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($totalNotPickCallsToday) ?  $totalNotPickCallsToday : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Call <br>Not Picked </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=8"; ?>">
                                <div class="visual">
                                    <i class="fa-solid fa-user-xmark"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($totalDecLeadsToday) ? $totalDecLeadsToday : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Total Declined <br>Leads </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="callCountBlock">
                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=unwork"; ?>">
                                <div class="visual">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup"
                                            data-value="<?php echo isset($totalUnworkLeadsToday) ? $totalUnworkLeadsToday : 0; ?>">0</span>
                                    </div>
                                    <div class="desc"> Unwork<br> Leads </div>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                    <div id="todays_full_stats">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                        href="<?php echo site_url("indiatourizm") . "/?todayStatus={$todAy}"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-chart-column"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($today_ind_tour_query) ? $today_ind_tour_query : 0; ?>">0</span>
                                            </div>
                                            <div class="desc"> Leads </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=Qsent&quotation=true"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-envelope-circle-check"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($totalQuotSentToday) ? $totalQuotSentToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc"> Quotations<br> Sent </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=pending"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-spinner"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($totalWorkingItiToday) ? $totalWorkingItiToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc"> Total Working <br>Itineraries </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=9"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($totalApprovedItiToday) ? $totalApprovedItiToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc"> Total Approved <br>Itineraries </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=7"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-file-circle-xmark"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($totalDecItiToday) ? $totalDecItiToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc"> Total Declined <br>Itineraries </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Todays full stat -->
                   
                    <!---------------------------------Revised section ---------------------------->
                    <div class="today_revised_section">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=QsentPast&quotation=true"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-repeat"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($pastQuotSentToday) ? $pastQuotSentToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc"> Revised Quotations <br> Sent </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=revApproved"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-spell-check"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($pastApprovedItiToday) ? $pastApprovedItiToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc">Revised Approved <br>Itineraries </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                        href="<?php echo site_url("itineraries") . "/?todayStatus={$todAy}&leadStatus=revDecline"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-file-circle-exclamation"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($pastDeclineItiToday) ? $pastDeclineItiToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc">Revised Declined <br>Itineraries </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                <div class="callCountBlock">
                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                        href="<?php echo site_url("customers") . "/?todayStatus={$todAy}&leadStatus=revDeclineLeads"; ?>">
                                        <div class="visual">
                                            <i class="fa-solid fa-file-signature"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"
                                                    data-value="<?php echo isset($pastDecLeadsToday) ? $pastDecLeadsToday : 0; ?>">0</span>
                                            </div>
                                            <div class="desc">Declined <br>Revised Leads </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------End Todays Revised section ---------------------------->
                </div>
                <!-- End Today section -->
            </div>
            <!--portlet close -->
            <!--PENDING PRICE SECTION-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="custom_title"><i class="fa fa-inr"></i> RATES SECTION</div>
                </div>
                <div class="portlet-body">
                    <div class="row dashboard-tables-all-info">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading2">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#ratestab1" data-toggle="tab">ABOVE 40000.00/-
                                                PACKAGES (ON WORKING)</a></li>
                                        <li><a href="#ratestab2" data-toggle="tab">RATES REQUEST BY MANAGER</a></li>
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="dashboard-scroll">
                                        <div class="tab-content">
                                            <div class="tab-pane  in active" id="ratestab1">
                                                <table class="table table-hover d-table table-fixed">
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Contact No</th>
                                                        <th>Rate</th>
                                                        <th>Agent</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php if (isset($above_fourty_thousand_wrk_pkg) && !empty($above_fourty_thousand_wrk_pkg)) {
                                                            $p_count1 = 1;
                                                            foreach ($above_fourty_thousand_wrk_pkg as $a_forty_pkg) {
                                                                $iti_type =  "<span class='lead_app arrow_bottom red_row' title='Iti Type'>" . check_iti_type($a_forty_pkg->iti_id) . "</span>";
                                                                $get_customer_info = get_customer($a_forty_pkg->customer_id);
                                                                $cust = $get_customer_info[0];
                                                                $cust_name = !empty($cust) ? $cust->customer_name : "";
                                                                $cust_no = !empty($cust) ? $cust->customer_contact : "";
                                                                $agent_id = $a_forty_pkg->agent_id;
                                                                $a_user_name = get_user_name($agent_id);

                                                        ?>
                                                    <tr>
                                                        <td colspan="6"><span
                                                                class="lead_app arrow_bottom"><?php echo $a_forty_pkg->package_name; ?></span>
                                                            <?php echo $iti_type; ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><?php echo $p_count1; ?>.</td>
                                                        <td><?php echo $cust_name; ?></td>
                                                        <td><?php echo $cust_no; ?></td>
                                                        <td><?php echo $a_forty_pkg->MAXP; ?> /-</td>
                                                        <td><?php echo $a_user_name; ?></td>
                                                        <td><a class="btn btn-custom" target="_blank"
                                                                href="<?php echo site_url("itineraries/view/{$a_forty_pkg->iti_id}/{$a_forty_pkg->temp_key}"); ?>">
                                                                View</a> </td>
                                                    </tr>
                                                    <?php
                                                                $p_count1++;
                                                            }
                                                        } else { ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            <div class="mt-comment-text"> No Data found. </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                                <!--<button type="button" class="btn btn_blue_outline view_table_data"><i class="fa fa-angle-down"></i> View All</button>-->
                                            </div>
                                            <div class="tab-pane " id="ratestab2">
                                                <table class="table table-hover d-table table-fixed">
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Contact No</th>
                                                        <th>Agent</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php if (isset($itiPendingRates_Manager) && !empty($itiPendingRates_Manager)) {
                                                            $p_count = 1;
                                                            foreach ($itiPendingRates_Manager as $pendingRates_m) {
                                                                $iti_type =  "<span class='lead_app arrow_bottom red_row' title='Iti Type'>" . check_iti_type($pendingRates_m->iti_id) . "</span>";
                                                                $reject_btn = $pendingRates_m->iti_status == 6 ? "<span class='lead_app arrow_bottom red_row' title='Rejected Itinerary'>Rejected</span>" : "";
                                                                $get_customer_info = get_customer($pendingRates_m->customer_id);
                                                                $cust = $get_customer_info[0];

                                                                $cust_name = !empty($cust) ? $cust->customer_name : "";
                                                                $cust_no = !empty($cust) ? $cust->customer_contact : "";

                                                                $agent_id = $pendingRates_m->agent_id;
                                                                $user_info = get_user_info($agent_id);
                                                                if ($user_info) {
                                                                    $agent = $user_info[0];
                                                                    $a_name = $agent->first_name . " " . $agent->last_name;
                                                                }
                                                        ?>
                                                    <tr>
                                                        <td colspan="5"><span
                                                                class="lead_app arrow_bottom"><?php echo $pendingRates_m->package_name; ?></span>
                                                            <?php echo $reject_btn; ?> <?php echo $iti_type; ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><?php echo $p_count; ?>.</td>
                                                        <td><?php echo $cust_name; ?></td>
                                                        <td><?php echo $cust_no; ?></td>
                                                        <td><?php echo $a_name; ?></td>
                                                        <td><a class="btn btn-custom" target="_blank"
                                                                href="<?php echo site_url("itineraries/view/{$pendingRates_m->iti_id}/{$pendingRates_m->temp_key}"); ?>">
                                                                View</a> </td>
                                                    </tr>
                                                    <?php //check for child itinerary
                                                                $child_iti = check_child_iti($pendingRates_m->iti_id);
                                                                $count_records = count($child_iti);
                                                                //if child iti exists
                                                                if (!empty($child_iti) && $count_records > 1) {
                                                                    $cl = 1;
                                                                ?>
                                                    <tr>
                                                        <td colspan="4">
                                                            <?php foreach ($child_iti as $c_iti) { ?>
                                                            <?php if ($cl == 1) { ?>
                                                            <a class="btn btn-custom" target="_blank"
                                                                href="<?php echo site_url("itineraries/view/{$c_iti->iti_id}/{$c_iti->temp_key}"); ?>">View
                                                                Parent
                                                                <strong><?php echo $c_iti->iti_id; ?></strong></a>
                                                            <?php } else { ?>
                                                            <a class="btn btn-custom" target="_blank"
                                                                href="<?php echo site_url("itineraries/view/{$c_iti->iti_id}/{$c_iti->temp_key}"); ?>">View
                                                                Child <strong><?php echo $c_iti->iti_id; ?></strong></a>
                                                            <?php } ?>
                                                            <?php
                                                                                $cl++;
                                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php
                                                                $p_count++;
                                                            }
                                                        } else { ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="mt-comment-text"> No Data found. </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                                <!--<button type="button" class="btn btn_blue_outline view_table_data"><i class="fa fa-angle-down"></i> View All</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END PENDING PRICE SECTION-->
            
            <hr>
            <!--MONTH SECTION-->
            <div class="total-leads-for-month">
                <div class="month_section">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="custom_title"><i class="fa fa-handshake-o" aria-hidden="true"></i> Month's
                                Status</div>
                            <button type="button" data-target_id="month_full_stat"
                                class="btn btn_blue_outline purple view_all_stat_btn float-end"
                                style="margin-top: 3px;">
                                <i class="fa fa-angle-down"></i> View All Stats
                            </button>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="callCountBlock">
                                        <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                            href="<?php echo site_url("customers") . "/?leadfrom={$from}&leadto={$to}"; ?>">
                                            <div class="visual">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup"
                                                        data-value="<?php echo isset($totalLeadsMonth) ? $totalLeadsMonth : 0; ?>">0</span>
                                                </div>
                                                <div class="desc"> Total Leads<br> </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="callCountBlock">
                                        <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$this_month}&leadStatus=callpicked"; ?>">
                                            <div class="visual">
                                                <i class="fa-solid fa-phone-volume"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup"
                                                        data-value="<?php echo isset($totalPickCallsMonth) ? $totalPickCallsMonth : 0; ?>">0</span>
                                                </div>
                                                <div class="desc"> Total Call <br>Picked </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="callCountBlock">
                                        <a target="_blank" class="dashboard-stat dashboard-stat-v2 green"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$this_month}&leadStatus=callnotpicked"; ?>">
                                            <div class="visual">
                                                <i class="fa-solid fa-phone-slash"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup"
                                                        data-value="<?php echo isset($totalNotPickCallsMonth) ? $totalNotPickCallsMonth : 0; ?>">0</span>
                                                </div>
                                                <div class="desc"> Total Call <br>Not Picked </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="callCountBlock">
                                        <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$this_month}&leadStatus=8"; ?>">
                                            <div class="visual">
                                                <i class="fa-solid fa-user-large-slash"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup"
                                                        data-value="<?php echo isset($totalDecLeadsMonth) ? $totalDecLeadsMonth : 0; ?>">0</span>
                                                </div>
                                                <div class="desc"> Total Declined <br>Leads </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="callCountBlock">
                                        <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                            href="<?php echo site_url("customers") . "/?todayStatus={$this_month}&leadStatus=unwork"; ?>">
                                            <div class="visual">
                                                <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup"
                                                        data-value="<?php echo isset($totalUnworkLeadsMonth) ? $totalUnworkLeadsMonth : 0; ?>">0</span>
                                                </div>
                                                <div class="desc"> Total Unwork<br> Leads </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div id="month_full_stat" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                                href="<?php echo site_url("itineraries") . "/?todayStatus={$this_month}&leadStatus=Qsent&quotation=true"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-envelope-circle-check"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($totalQuotSentMonth) ? $totalQuotSentMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Quotations<br> Sent </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                                href="<?php echo site_url("itineraries") . "/?todayStatus={$this_month}&leadStatus=pending"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-spinner"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($totalWorkingItiMonth) ? $totalWorkingItiMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Total Working <br>Itineraries </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                                href="<?php echo site_url("itineraries") . "/?todayStatus={$this_month}&leadStatus=9"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-thumbs-up"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($totalApprovedItiMonth) ? $totalApprovedItiMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Total Approved <br>Itineraries</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                                href="<?php echo site_url("itineraries") . "/?todayStatus={$this_month}&leadStatus=7"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-file-circle-xmark"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($totalDecItiMonth) ? $totalDecItiMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Total Declined <br>Itineraries</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                                href="<?php echo site_url("itineraries") . "/?todayStatus={$this_month}&leadStatus=QsentRevised&quotation=true"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-repeat"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($totalRevQuotSentMonth) ? $totalRevQuotSentMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Revised Quotations <br> Sent </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               
                                <!---------------------------------Revised section Month---------------------------->
                                <div class="month_revised_section row">
                                    <!-- <div class="col-lg-4 col-md-4">
                                                <div class="callCountBlock">
                                                    <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple" href="<?php //echo site_url("itineraries") . "/?leadfrom={$from}&leadto={$to}&leadStatus=QsentPastMonth&quotation=true"; ?>">
                                                        <div class="visual">
                                                            <i class="fa-solid fa-repeat"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="number">
                                                                <span data-counter="counterup" data-value="<?php //echo isset($pastQuotSentMonth) ? $pastQuotSentMonth : 0; ?>">0</span>
                                                            </div>
                                                            <div class="desc"> Revised Quotations <br> Sent </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div> -->
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 blue"
                                                href="<?php echo site_url("itineraries") . "/?leadfrom={$from}&leadto={$to}&leadStatus=revApprovedMonth"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-spell-check"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($pastApprovedItiMonth) ? $pastApprovedItiMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Total Revised Approved <br>Itineraries </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a target="_blank" class="dashboard-stat dashboard-stat-v2 purple"
                                                href="<?php echo site_url("itineraries") . "/?leadfrom={$from}&leadto={$to}&leadStatus=revDeclineMonth"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-file-circle-exclamation"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($pastDeclineItiMonth) ? $pastDeclineItiMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Total Revised Declined <br>Itineraries </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="callCountBlock">
                                            <a class="dashboard-stat dashboard-stat-v2 blue"
                                                href="<?php echo site_url("customers") . "/?leadfrom={$from}&leadto={$to}&leadStatus=revDeclineLeadsMonth"; ?>">
                                                <div class="visual">
                                                    <i class="fa-solid fa-file-signature"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="<?php echo isset($pastDecLeadsMonth) ? $pastDecLeadsMonth : 0; ?>">0</span>
                                                    </div>
                                                    <div class="desc"> Total Revised Declined <br>Leads </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End month full stats-->
                            <!-- row -->
                        </div>
                        <!-- portlet-body -->
                    </div>
                </div>
            </div>
            
            <!-- END CONTENT BODY -->
            <?php $get_agents = get_all_sales_team_agents(); ?>
            <!--Chart Section-->
            
        </div>
        <!--End Chart Section-->
    </div>
    <!-- end page-content-wrapper -->
</div>
<!-- End page-container -->
<!-- END QUICK SIDEBAR -->
</div>
</div>
<!-- END Main container-fluid -->



<script>
    $(function(){
         $('#float_this').css('float','right'),
         $('#float_this').css( { marginRight : "50px" } );
     });
</script>