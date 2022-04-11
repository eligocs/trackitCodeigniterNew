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
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper sales_team_dashboard">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
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

        <!--div class="more-info-right-sidebar">
			<button class="btn blue sidebar-button btn-side-1" data-toggle="modal" data-target="#myModal2"><i class="fa fa-money"></i> Payment Follow Up</button>
			<button class="btn blue sidebar-button btn-side-2" data-toggle="modal" data-target="#myModal3"><i class="fa fa-money"></i> Travel Dates</button>
		</div-->

        <!-- <nav class="quick-nav">
            <a class="quick-nav-trigger" href="javascript: void(0)">
                <span aria-hidden="true"></span>
            </a>
            <ul class="sidebar-buttons">
                <li><button class="btn" id="btn_load_payment_followup"><i class="fa fa-money"></i> Payment Follow
                        Up</button></li>
                <li><button class="btn" id="btn_load_ad_payment_followup"><i class="fa fa-money"></i> Advance Payment
                        Follow Up</button></li>
                <li><button class="btn" id="btn_load_balance_payment_followup"><i class="fa fa-money"></i> Balance
                        Payment Follow Up</button></li>
                <li><button class="btn" id="btn_load_travel_followup"><i class="fa fa-clock-o"></i> Travel Dates
                        Follow</button></li>
            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav> -->
        <?php
             $this->load->view('dashboard/followupnav');
        ?>
        <div class="quick-nav-overlay"></div>
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url(); ?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Accounts Team Dashboard
            <small>recent payments received, payments pending etc.</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-calendar"></i>Today's Status</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 green"
                        href="<?php echo site_url("payments"). "/?todayStatus={$today_date}&payStatus=pending"; ?>">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($pendingPaymentsToday) ? $pendingPaymentsToday : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Payment Pending <br>Today </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 blue"
                        href="<?php echo site_url("payments"). "/?todayStatus={$today_date}&payStatus=pay_received"; ?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($receivedPaymentsToday) ? $receivedPaymentsToday : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Payment Received <br>Today </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 green"
                        href="<?php echo site_url("payments"). "/?todayStatus={$this_month}&payStatus=pending"; ?>">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($pendingPaymentsMonth) ? $pendingPaymentsMonth : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Payment Pending <br>This Month </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 blue"
                        href="<?php echo site_url("payments"). "/?todayStatus={$this_month}&payStatus=pay_received"; ?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($receivedPaymentsMonth) ? $receivedPaymentsMonth : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Payment Received <br> This Month </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 blue"
                        href="<?php echo site_url("itineraries") . "/?todayStatus={$today_date}&leadStatus=approved"; ?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($totalApprovedItiToday) ? $totalApprovedItiToday : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Iti Booked <br> Today </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 blue"
                        href="<?php echo site_url("itineraries") . "/?todayStatus={$this_month}&leadStatus=approved"; ?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($totalApprovedItiMonth) ? $totalApprovedItiMonth : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Iti Booked <br> This Month </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 blue"
                        href="<?php echo site_url("payments"). "/?todayStatus={$this_month}&payStatus=advance_pending"; ?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($advance_payment_pending_count) ? $advance_payment_pending_count : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Advance Payment <br> Pending Month </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="callCountBlock">
                    <a class="dashboard-stat dashboard-stat-v2 blue"
                        href="<?php echo site_url("payments"). "/?todayStatus={$this_month}&payStatus=bal_pending"; ?>">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup"
                                    data-value="<?php echo isset($balance_payment_pending_count) ? $balance_payment_pending_count : 0; ?>">0</span>
                            </div>
                            <div class="desc"> Balance Pending <br> This Month </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row2">

            <div class="clearfix clearboth"></div>

            <!--AMENDMENT SECTION-->
            <div class="portlet box blue margin-top-40">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-inr"></i>Today's Payment</div>
                </div>
                <div class="portlet-body">
                    <div class="row dashboard-tables-all-info">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading2">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#pending_payments" data-toggle="tab">PENDING
                                                PAYMENTS</a></li>
                                        <li><a href="#online_payments" data-toggle="tab">RECEIVED PAYMENTS (ONLINE)</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="dashboard-scroll">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="pending_payments">
                                                <table class="table table-hover d-table table-fixed">
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Contact No</th>
                                                        <th>Payment</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php if( isset($pendingPaymentsFollow) && !empty($pendingPaymentsFollow) ) { 
                                                        $icount = 1;	
                                                        foreach( $pendingPaymentsFollow as $pen_pay ){ ?>

                                                    <tr>
                                                        <td><?php echo $icount;?>.</td>
                                                        <td><?php echo $pen_pay->customer_name;?></td>
                                                        <!--td><?php //echo $t_leads->customer_email;?></td-->
                                                        <td><?php echo $pen_pay->customer_contact;?></td>
                                                        <td><?php echo $pen_pay->next_payment;?></td>

                                                        <td><a class="btn btn-custom"
                                                                href="<?php echo site_url("payments/update_payment/{$pen_pay->id}/{$pen_pay->iti_id}"); ?>">
                                                                View</a></td>
                                                    </tr>
                                                    <?php 
                                                        $icount++;
                                                        } 
                                                     }else{ ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="mt-comment-text"> No Data found. </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <!-- END: Pending Payments section -->
                                                </table>
                                                <!--<button type="button" class="btn btn_blue_outline view_table_data"><i-->
                                                <!--        class="fa fa-angle-down"></i> View All</button>-->
                                            </div>
                                            <div class="tab-pane fade" id="online_payments">
                                                <table class="table table-hover d-table table-fixed">
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>OrderId</th>
                                                        <th>Name</th>
                                                        <th>Payment</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php if( isset($todayPaymentReceived) && !empty($todayPaymentReceived) ) { 
                                                    $icountd = 1;	
                                                    foreach( $todayPaymentReceived as $transaction ){ ?>

                                                    <tr>
                                                        <td><?php echo $icountd;?>.</td>
                                                        <td><?php echo $transaction->order_id;?></td>
                                                        <td><?php echo $transaction->customer_name;?></td>
                                                        <td><?php echo $transaction->trans_amount;?></td>
                                                        <td><a class="btn btn-custom" target='_blank'
                                                                href="<?php echo site_url("accounts/view_pay/{$transaction->id}"); ?>">
                                                                View</a></td>
                                                    </tr>
                                                    <?php 
                                                        $icountd++;
                                                        } 
                                                    }else{ ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="mt-comment-text"> No Data found. </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <!-- END: Pending Payments section -->
                                                </table>
                                                <!--<button type="button" class="btn btn_blue_outline view_table_data"><i-->
                                                <!--        class="fa fa-angle-down"></i> View All</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--REFUND PaymentS-->
            <div class="col-lg-12 col-xs-12 col-sm-12 padding-0">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bubbles font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Refund Pending</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_comments_d1">
                                <div class="dashboard-scroll">
                                    <table class="table table-hover d-table table-fixed">
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php if( isset($get_refund_payments) && !empty( $get_refund_payments ) ) { 
										$ir = 1;	
										foreach( $get_refund_payments as $rf_iti ){ ?>

                                        <tr>
                                            <td><?php echo $ir;?>.</td>
                                            <td><?php echo $rf_iti->customer_name;?></td>
                                            <td><?php echo $rf_iti->refund_amount;?></td>
                                            <td><?php echo $rf_iti->customer_contact;?></td>

                                            <td><a class="btn btn-custom" target="_blank"
                                                    href="<?php echo site_url("payments/update_payment/{$rf_iti->id}/{$rf_iti->iti_id}"); ?>">
                                                    View</a></td>
                                        </tr>
                                        <?php 
										$ir++;
										} 
									        }else{ ?>
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <div class="mt-comment-text"> No Data found. </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <!-- END: Pending Payments section -->
                                    </table>
                                </div>
                            </div>
                            <button type="button" class="btn btn_blue_outline view_table_data"><i
                                    class="fa fa-angle-down"></i>
                                View All</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix clearboth"></div>


            <!--AMENDMENT SECTION-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-calendar"></i>LATEST AMENDMENT</div>
                </div>
            </div>
            <div class="row dashboard-tables-all-info">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubbles font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Last 20 Amendments</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_comments_21">
                                    <div class="dashboard-scroll">
                                        <table class="table table-hover d-table table-fixed">
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Package</th>
                                                <th>agent</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php if( isset($amendmentItineraries) && !empty( $amendmentItineraries )) { 
										$ii = 1;	
										foreach( $amendmentItineraries as $am_iti ){ ?>

                                            <tr>
                                                <td><?php echo $ii;?>.</td>
                                                <td><?php echo $am_iti->customer_name;?></td>
                                                <td><?php echo $am_iti->package_name;?></td>
                                                <td><?php echo get_user_name($am_iti->agent_id);?></td>

                                                <td><a class="btn btn-custom" target="_blank"
                                                        href="<?php echo site_url("itineraries/view_iti/{$am_iti->iti_id}/{$am_iti->temp_key}"); ?>">
                                                        View</a></td>
                                            </tr>
                                            <?php 
										$ii++;
										} 
									}else{ ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <div class="mt-comment-text"> No Data found. </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <!-- END: Pending Payments section -->
                                        </table>
                                    </div>
                                </div>
                                <button type="button" class="btn btn_blue_outline view_table_data"><i
                                        class="fa fa-angle-down"></i> View All</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End REFUND PaymentS-->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->


<script type="text/javascript">
/**************** Payment FOLLOW UP CALENDAR ****************/

</script>