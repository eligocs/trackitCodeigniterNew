<div class="page-container customer_content">
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php $message = $this->session->flashdata('error'); 
			if($message){ echo '<span class="help-block help-block-error1 red">'.$message.'</span>';} ?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa-solid fa-plus"></i> Add Season
					</div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("hotels/seasons"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
			<form role="form" id="addSeason" method="post" action="<?php echo site_url("hotels/saveseason"); ?>">
				<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
					<div class="row">
						<div class="col-md-4 my-2">
							<div class="form-group">
								<label class="control-label">Season Name*</label>
								<input type="text" required placeholder="Season Name. eg: Mid Season etc." name="inp[season_name]" class="form-control" value=""/> 
							</div>
						</div>
						<div class="col-md-8 my-2">
							<label class="control-label">Season Dates*</label>
							<div class="mt-repeater">
								<div data-repeater-list="season_date_meta">
									<div data-repeater-item class="mt-repeater-item mt-overflow">
										<div class="mt-repeater-cell">
											<div class="row">
												<div class="col-md-10 my-2">
													<div class="input-group input-daterange mmt-repeater-input-inline">
														<input readonly required type="text" class="form-control season_from" name="season_from" value="" >
														<span class="input-group-addon hotel_addon"> to </span>
														<input readonly required type="text" class="form-control season_to" name="season_to" value=""  > 
													</div>
												</div>
												<div class="col-md-2 my-2">
													<a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-left mt-repeater-btn-inline">
													fa-solid fa-trash-can 
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
								<i class="fa-solid fa-plus"></i> Add new</a>
							</div>
						</div>
						<div class="col-md-12 my-2">
							<button type="submit" class="btn green uppercase add_roomcategory">
								<i class="fa-solid fa-plus"></i> Add Season
							</button>
						</div>
					</div> 
				</div>
				<!--End portlet body -->
			</form>
		</div> 
		<!-- End page-content -->
	</div>
	<!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script>
jQuery(document).ready(function($){
	//Get First and Last Date of year
	var firstDayYear = new Date(new Date().getFullYear(), 0, 1);
	var lastDayYear = new Date(new Date().getFullYear(), 11, 31);
	
	$('.input-daterange').datepicker({
		startDate: firstDayYear,
		endDate: lastDayYear,
		format: 'yyyy-mm-dd',
	});
	
	//Season From Date change
	$(document).on("click", ".season_from", function(){
		$(this).datepicker({	
			startDate: firstDayYear,
			endDate: lastDayYear,
			autoclose: true,
			format: 'yyyy-mm-dd',
		}).on('changeDate', function (selected) {
			var season_to = $(this).datepicker('getDate');
			var nextDayMin = moment(season_to).add(1, 'day').toDate();
			$(this).parent().find('.season_to').datepicker('setStartDate', nextDayMin);
			//$(this).parent().find('.season_to').datepicker('setEndDate', lastDayYear);
		});	
	});
	
	//Season To Date change
	$(document).on("click", ".season_to", function(){
		var season_from = $(this).parent().find(".season_from").datepicker('getDate');
		var nextDayMin = moment(season_from).add(1, 'day').toDate();
		//var CheckIn = $(this).datepicker('getDate');
		$(this).datepicker({	
			autoclose: true,
			startDate: nextDayMin,
			endDate: lastDayYear,
			format: 'yyyy-mm-dd',
		}).on('changeDate', function (selected) {
			var season_from = $(this).datepicker('getDate');
			var nextDayMin = moment(season_from).add(1, 'day').toDate();
			//$(this).parent().find('.season_to').datepicker('setStartDate', firstDayYear);
			$(this).parent().find('.season_from').datepicker('setEndDate', nextDayMin);
		});	
	});
});	
</script>

<script type="text/javascript">
	/* Hotel Exclusion repeater */
	jQuery(document).ready(function($) {
		FormRepeater.init();
	});
	var FormRepeater = function () {
		return {
			init: function () {
				jQuery('.mt-repeater').each(function(){ 
					$(this).find(".mt-repeater-delete:eq( 0 )").hide();
					$(this).repeater({
						show: function () {
							$(this).find(".mt-repeater-delete:eq( 0 )").show();
							
							var firstDayYear = new Date(new Date().getFullYear(), 0, 1);
							var lastDayYear = new Date(new Date().getFullYear(), 11, 31);
	
							var prevDiv = $(this).prev(".mt-repeater-item");
							var lastDate = prevDiv.find(".season_to").datepicker('getDate');
							//var CheckIn = $(this).datepicker('getDate');
							var nextDayMin = moment(lastDate).add(1, 'day').toDate();
							//Get First and Last Date of year
							$('.input-daterange').datepicker({
								format: 'yyyy-mm-dd',
								startDate: nextDayMin
							});
							$(this).find('.season_from').datepicker('setStartDate', nextDayMin);
							$(this).find('.season_from').datepicker('setEndDate', lastDayYear);
							
							$(this).find('.season_to').datepicker('setStartDate', nextDayMin);
							$(this).find('.season_to').datepicker('setEndDate', lastDayYear);
							
							$(this).show();
						},
						hide: function (deleteElement) {
							if(confirm('Are you sure you want to delete this element?')) {
								$(this).slideUp(deleteElement);
							}
						},
						ready: function (setIndexes) {

						}

					});
				});
			}	
		};
	}();
</script>

<script type="text/javascript">
jQuery(document).ready(function($){
	$("#addSeason").validate();	
}); 
</script>
