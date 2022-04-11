<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN SAMPLE TABLE PORTLET-->
		 <?php $err = $this->session->flashdata('error'); 
		if($err){ echo '<span class="help-block help-block-error2 red">'.$err.'</span>';}
		?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>All Profit And Loss
					</div>
				</div>
				<div class="portlet-body">
					<!-- form Filter -->
					<form action="">
						<div class="row">
							<div class="col-md-3 my-2">
								<div class="form-group">
									<label for="" class="control-label"><strong>Filter:</strong></label>
									<input type="text" autocomplete="off" class="form-control" id="daterange" name="dateRange" value="" required />
								</div>
							</div>
							<div class="col-md-3 my-2">
								<label for="" class="control-label"><strong>User Id: </strong></label>
								<select name="" class="form-control" id='sales_user_id'>
									<option value="">All</option>
									<?php
                             $agents = get_all_sales_team_agents();
                              if($agents){
								foreach( $agents as $a ){
									$agent_full_name = $a->first_name . ' ' . $a->last_name;
								  ?>
							  <option value="<?= $a->user_id ?>"><?= $agent_full_name ?></option>
								  <?php
							  }
							}
							
							?>
								</select>
							</div>
							<div class="col-md-3 my-2">
								<label class="control-label d-block" for="">&nbsp;</label>
								<input type="submit" class="btn btn-success" value="Filter">
								<?php
								//  if( $user_role == 99 || $user_role == 98 ){ ?>
								<a href="<?php echo base_url("export/export_profit_loss");?>"
									class="btn btn-danger export_btn"><i class="fa fa-file-excel"></i>
									Export</a>
								<?php
								//  } ?>
							</div>
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
					</form>
					<!-- End Form filter -->
					<div class="table-responsive margin-top-15">
						<table id="profit_loss" class="table table-striped display white_space_fix">
							<thead>
								<tr>
									<th> # </th>
									<th> Iti Id</th>
									<th> Customer Name</th>
									<th> Agent Name</th>
									<th> Selling Price</th>
									<th> Total Expenses </th>
									<th> Total Profit/loss  </th>
									<th> Total Profit/Loss Percent <i class="fas fa-percent    "></i> </th>
									<th> Is Profit Or Loss </th>
									<th> View </th>
								</tr>
							</thead>
							<tbody>
								<!--DataTable goes here-->
							</tbody>
						</table>
							<!--<div class="row">-->
								<?php
							//	if(!empty(TotalProfit())){
									?>
							<!--	<div class="col-md-6">-->
							<!--		<span class="profit_"><strong> Total Tenover:</strong> <?= round(total_Sales_without_tax(), 2); ?></span> &nbsp;&nbsp;&nbsp;-->
							<!--		<span class="profit_"><strong> Gross Profit Amount:</strong> <?= TotalProfit(); ?></span> &nbsp;&nbsp;&nbsp;-->
							<!--		<span class="profit_"><strong> Gross Profit Percent:</strong> <?= round(calculateTotalProfit(), 2); ?>%</span>-->
							<!--	</div>-->
								<?php
							//	}
							//	if(!empty(TotalLoss())){
								?>
							<!--	<div class="col-md-6">-->
							<!--	    <span class="profit_"><strong> Total Tenover:</strong> <?= round(total_Sales_without_tax_loss(), 2); ?></span> &nbsp;&nbsp;&nbsp;-->
							<!--		<span class="loss_"><strong> Gross Loss Amount:</strong> <?= TotalLoss(); ?></span> &nbsp;&nbsp;&nbsp;-->
							<!--		<span class="loss_"><strong> Gross Loss Percent:</strong> <?= round(calculateTotalloss(), 2); ?>%</span>-->
							<!--	</div>-->
							<?php
								//}
							?>
					</div>
				</div>
					
				<!--==== Profit and Loss Section ====-->
				<div>
					<!--Profit Table Start-->
					<?php
					if(!empty(TotalProfit())){
					?>
					<div class="table-responsive">
						<table class="table table-striped display white_space_fix dataTable no-footer loss_profit_table">
							<thead>
								<tr>
									<th>Total Tenover</th>
									<th>Gross Profit Amount</th>
									<th>Gross Profit Percent:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= round(total_Sales_without_tax(), 2); ?></td>
									<td><?= TotalProfit(); ?></td>
									<td><?= round(calculateTotalProfit(), 2); ?>%</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--Profit Table End-->
					<?php
						}
					if(!empty(TotalLoss())){
					?>
					<!--Loss Table Start-->
					<div class="table-responsive">
						<table class="table table-striped display white_space_fix dataTable no-footer loss_profit_table">
							<thead>
								<tr>
									<th>Total Tenover</th>
									<th>Gross Profit Amount</th>
									<th>Gross Profit Percent:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= round(total_Sales_without_tax_loss(), 2); ?></td>
									<td><?= TotalLoss(); ?></td>
									<td><?= round(calculateTotalloss(), 2); ?>%</td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php
					}
					?>
					<!--Loss Table End-->
				</div>
				<!--==== Profit and Loss Section End ====-->
			</div>
		</div>
	</div>
</div>
<!-- End page-container -->



<!-- Modal --> 
<script type="text/javascript">
$(document).ready(function() {
	

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

        var export_url = "<?php echo base_url('export/export_profit_loss?filter='); ?>" +
            filter + "&d_from=" + d_from + "&end=" + end + "&todayStatus=" + todayStatus +
            "&quotation=" + quotation + "&agent_id=" + agent_id;
        //redirect to export
        if (confirm("Are you sure to export data ?")) {
            window.location.href = export_url;
        }
    });

var table;
    //datatables
	table = $('#profit_loss').DataTable({ 
		"aLengthMenu": [[10,25, 50, 100, -1], [10, 25, 50, 100, 'All']],
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.
		language: {
			search: "<strong>Search By Itinerary/Customer ID:</strong>",
			searchPlaceholder: "Search..."
		},
		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "<?php echo site_url('Profit/ajax_lis_profit')?>",
			"type": "POST",
			"data": function ( data ) {
				data.filter = $("#filter_val").val();
				data.from = $("#date_from").attr("data-date_from");
				data.end = $("#date_to").attr("data-date_to");
				data.todayStatus = $("#todayStatus").val();
				data.agent_id = $("#sales_user_id").val();
			},
		},
		//Set column definition initialisation properties.
		"columnDefs": [
		{ 
			"targets": [ 0 ], //first column / numbering column
			"orderable": false, //set not orderable
		},
		],

	});


	 //Date range for filter
	 $("#daterange").daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
			todayBtn: "linked",
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
            $("#date_from").attr("data-date_from", start.format('YYYY-MM-DD'));
            $("#date_to").attr("data-date_to", end.format('YYYY-MM-DD'));
            $("#todayStatus").val("");
            console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD'));

        });
    
    
    
});
</script>