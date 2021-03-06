<!-- Begin page-container -->
<div class="page-container">
	<!-- Begin page-content-wrapper -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
			?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-building"></i>All State/city
					</div>
					
					<!-- Show hide filter button -->
                    <button  class="btn float-end me-2 p-2" title="Filter codes by state/city" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
				</div>
			</div>	
			
			<!--Begin filter_collapse-->
			<div class="cat_wise_filter bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
				<form class="mb-0" role="form" id="filter_frm" method="post">
					<div class="row">
						<div class="col-md-6 my-2">
							<label class="control-label">Country </label>
							<div class="form-group">
								<select name='CD' class='form-control form-select' id='cdd'>
									<option value="">INDIA ( CODE: 101 )</option>
								</select>	
							</div>
						</div>
						<div class="col-md-6 my-2">
							<label class="control-label">State </label>
							<div class="form-group">
								<select name='state' class='form-control form-select' id='state'>
									<?php $state_list = get_indian_state_list(); 
										if( $states ){
											foreach($states as $state){
												$selected = isset($state_id) && $state_id == $state->id ? "selected" : "";
												echo "<option {$selected} value='{$state->id}'>{$state->name} ( Code: {$state->id} ) </option>";
											}
										} ?>
								</select>	
							</div>
						</div>
					</div>
				</form>	
				<div class="res"></div>
			</div>
			<!--End filter_collapse-->

			<!-- Begin portlet-body / data-table -->
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<div class="table-responsive">
					<table id="packageslist" class="table table-striped display">
						<thead>
							<tr>
								<th> # </th>
								<th>City Code</th>
								<th>City Name</th>
								<th>State Code</th>
							</tr>
						</thead>
						<tbody>
						<div class="loader"></div>
						<div id="res"></div>
							<?php if( isset( $cities ) ){
								$i = 1;
								foreach( $cities as $city ){
									echo "<tr data-id='{$city->id}'>
										<td>{$i}</td>
										<td>{$city->id}</td>
										<td>{$city->name}</td>
										<td>{$city->state_id}</td>
									</tr>";
									$i++;
								}
							} ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- End portlet-body / data-table -->
		</div>
	</div>
</div>
<!-- End page-container -->


<div id="myModal" class="modal" role="dialog"></div>
<script type="text/javascript">
$(document).ready(function() {
	$('#packageslist').DataTable();
	//state change
	$('#state').on('change', function () {
		var id = $(this).val(); // get selected value
		var url = BASE_URL + "marketing/state_codes?state_id=" + id; // get selected value
		window.location = url; // redirect
	});
});
</script>
