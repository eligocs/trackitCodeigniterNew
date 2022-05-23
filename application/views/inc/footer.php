	<!-- ITINERARIES FOLLOW UP -->
	<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
	    <div class="modal-dialog modal-fullscreen" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel2">PAYMENT FOLLOW UP</h4>
	            </div>
	            <div class="col-md-12 column" id="iti_folloup_cal_section">
	                <div id='calendar_payment_followup' class='calender_dashboard'></div>
	            </div>
	        </div><!-- modal-content -->
	    </div><!-- modal-dialog -->
	</div><!-- modal -->

	<!-- Pending advance payment ITINERARIES FOLLOW UP -->
	<div class="modal right fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4">
	    <div class="modal-dialog modal-fullscreen" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel4">ADVANCE PAYMENT PENDING FOLLOW UP</h4>
	            </div>
	            <div class="col-md-12 column">
	                <div id='calendar_advance_payment_followup' class='calender_dashboard'></div>
	            </div>
	        </div><!-- modal-content -->
	    </div><!-- modal-dialog -->
	</div><!-- modal -->

	<!-- Pending payment ITINERARIES FOLLOW UP -->
	<div class="modal right fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5">
	    <div class="modal-dialog modal-fullscreen" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel5">PAYMENT PENDING FOLLOW UP AFTER ADVANCE RECIEVED</h4>
	            </div>
	            <div class="col-md-12 column">
	                <div id='calendar_bal_payment_followup' class='calender_dashboard'></div>
	            </div>
	        </div><!-- modal-content -->
	    </div><!-- modal-dialog -->
	</div><!-- modal -->

	<!-- Travel Dates -->
	<div class="modal right fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
	    <div class="modal-dialog modal-fullscreen" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel3">Travel Dates</h4>
	            </div>
	            <div class="col-md-12 column" id="travel_cal_section">
	                <div id='calendar_travel_dates' class='calender_dashboard'></div>
	            </div>
	        </div><!-- modal-content -->
	    </div><!-- modal-dialog -->
	</div><!-- modal -->
	<!-- END CONTAINER -->


	<!-- CHARTS -->
	<div class="modal right fade" id="myModa20" tabindex="-1" role="dialog" aria-labelledby="myModalLabe20">
	    <div class="modal-dialog modal-fullscreen" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabe20"></h4>
	                <div class="col-md-12">
	                    <div class="portlet-title">
	                        <div class="custom_title" id="float_this">
	                            <i class="fa fa-bar-chart" style="font-size:18px;"></i>
	                            <span class="caption-subject bold uppercase">Statistics</span>
	                        </div>
	                    </div>
	                </div>
	                </h4>
	            </div>
	            <div class="col-md-12 column" id="travel_cal_section">
	                <div id='chart_sections' class='calender_dashboard'></div>
	            </div>
	        </div><!-- modal-content -->
	    </div><!-- modal-dialog -->
	</div><!-- modal -->

	<!-- CUSTOMER FOLLOW UP -->
	<div class="modal right fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
	    <div class="modal-dialog modal-fullscreen" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel2">CUSTOMER FOLLOW UP</h4>
	            </div>
	            <div class="modal-body">
	                <div class="col-md-12 column calander-section" id="customer_folloup_cal_section">
	                    <div id='calendar_customer_followup' class='calender_dashboard'></div>
	                </div>
	            </div>
	        </div>
	        <!-- modal-content -->
	    </div>
	    <!-- modal-dialog -->
	</div>
	<!-- profit and loss model ---->
	<div class="modal fade margianModel" id="" role="dialog">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Calculate Margin</h4>
	                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
	            </div>
	            <div class="modal-body">
	                <div class="id"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--end model -->
	<?php if( !empty( get_thought_of_day() ) ){ ?>
	<a class="btn green btn-outline sbold thought-btn" id="checkTODbtn" data-toggle="modal" href="#thoughtOfDayPopup">
	    Latest Update </a>
	<div class="modal fade " id="thoughtOfDayPopup" tabindex="-1" role="basic" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">

	            <div class="modal-header ui-draggable-handle">
	                <button type="button" class="close closetModal" data-dismiss="modal" aria-hidden="true"></button>
	                <h4 class="modal-title text-center"><i class="fa fa-thumbs-o-up"></i> &nbsp; Latest Update </h4>
	            </div>

	            <div class="modal-body">
	                <?php echo get_thought_of_day(); ?>
	            </div>

	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<?php 
			//check time
			if( ((int) date('H')) >= 11 ){ ?>
	<script>
jQuery(document).ready(function($) {
    //var dt = new Date();
    //var hours = dt.getHours();
    //var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    //if( hours <= 18 ){
    //showTODPopup();
    //}

    //Set Cookie
    if (!!$.cookie('openThoughtPopup')) {
        // have cookie
        //console.log("have cookies");
    } else {
        //console.log("Not have cookies");
        // no cookie
        //set cookie for 1 minute
        showTODPopup();
    }

    function showTODPopup() {
        $("#thoughtOfDayPopup").show();
        var date = new Date();
        //set cookie time in minutes
        var minutes = 800;
        date.setTime(date.getTime() + (minutes * 60 * 1000));
        $.cookie("openThoughtPopup", true, {
            path: '/',
            expires: date
        });
    }
});
	</script>
	<?php } ?>
	<script>
jQuery(document).ready(function($) {
    $(document).on("click", "#checkTODbtn", function(e) {
        e.preventDefault();
        console.log("clicke");
        $("#thoughtOfDayPopup").show();
    });

    //close popup
    $(".closetModal").click(function() {
        $("#thoughtOfDayPopup").fadeOut();
        var video = $("#iframe_tod").attr("src");
        $("#iframe_tod").attr("src", "");
        $("#iframe_tod").attr("src", video);
    });
});
	</script>
	<?php } ?>
	<!--------------------Popup THOUGHT OF THE DAY end------------>

	</div><!-- main_page_container End -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
	    <div class="page-footer-inner"> <?php echo date("Y"); ?> &copy; Develop By
	        <a target="_blank" href="http://eligocs.com">Eligocs</a>
	    </div>
	    <!-- <div class="footer_text">Footer</div> -->
	    <div class="text-right">Page rendered in <strong>{elapsed_time}</strong> seconds</div>
	    <div class="scroll-to-top">
	        <i class="icon-arrow-up"></i>
	    </div>

	    <div class="tool_tipTop">Hover over me
	        <span class="tooltip_top_text">Tooltip text</span>
	    </div>
	</div>
	<!-- END FOOTER -->
	<?php 
			$segment_one =  $this->uri->segment(1);
			$current_url = base_url(uri_string());
		?>
	<!-- Angluar js -->

	<!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo base_url();?>site/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/bootstrap-fileinput.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/table-bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/daterangepicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/jquery.repeater.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
	    type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/morris.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/jquery.counterup.min.js" type="text/javascript"></script>
	<?php /*<script src="<?php echo base_url();?>site/assets/js/jquery.multiselect.js" type="text/javascript"></script>
	*/?>
	<script src="<?php echo base_url();?>site/assets/js/app.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/dashboard.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/layout.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/fullcalendar.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/jquery.cookie.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/sweetalert.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/script_themes.js" type="text/javascript"></script>

	<!--call chart script for dashboard only -->
	<?php 
		if( ( $segment_one == "dashboard" || $current_url == base_url() ) && is_admin_or_manager()){ ?>
	<script src="<?php echo base_url();?>site/assets/dist/echarts-all.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>site/assets/chart/funelChart/index.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>site/assets/chart/funelChart/percent.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>site/assets/chart/funelChart/Animated.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/chart/admin_chart.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>site/assets/chart/funelChart/funelchart.js" type="text/javascript"></script>
	<?php 
		}
		?>

	<!-------------------- sales Dashboard Chart ------------------------------------>
	<?php
		if(($segment_one == "dashboard" || $current_url == base_url() ) && is_salesteam() ){ ?>
	<script src="<?php echo base_url();?>site/assets/dist/echarts-all.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/chart/sales_chart.js" type="text/javascript"></script>
	<?php } ?>


	<?php
		if(($segment_one == "dashboard" || $current_url == base_url() ) && (is_accounts() ||   is_admin())){ ?>
	<script src="<?php echo base_url();?>site/assets/js/calander.js" type="text/javascript"></script>
	<?php } ?>

	<!--desktop notifications script 103.97.231.30 -->
	<!--hide notifications for development ip-->
	<?php if (isset( $_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] != '182.75.81.2' && $_SERVER['REMOTE_ADDR'] != '117.247.236.178' )){ ?>
	<script src="<?php echo base_url();?>site/assets/js/notifications.js" type="text/javascript"></script>
	<?php } ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>site/assets/css/croppie.css">
	<script src="<?php echo base_url(); ?>site/assets/js/croppie.js"></script>
	<script src="<?php echo base_url();?>site/assets/js/custom.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>site/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>


	    <!-- Select2 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<!-- <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->

	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script> -->
	<!-- END THEME LAYOUT SCRIPTS -->


	<script>
function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var day = date.getDay(); // 0 - 6
    var session = "AM";

    var weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'][day];


    if (h >= 12) session = "PM";

    if (h == 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = weekday + "  " + h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);

}
//    showTime();
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
	</script>


	</body>

	</html>