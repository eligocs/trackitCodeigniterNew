<style>


</style>

<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
		 <!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>All Profit And Loss
				</div>
			</div>
			<div class="portlet-body">
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
					<!--</div>-->
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
	<!-- END CONTENT BODY -->
</div>
<!-- Modal -->

 
<script type="text/javascript">
$(document).ready(function() {
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
    
    
    
});
</script>