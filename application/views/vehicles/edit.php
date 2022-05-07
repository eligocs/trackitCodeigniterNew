<div class="page-container customer_content">
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php if($vehicles){ 	
			$category = $vehicles[0]; ?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="fa-solid fa-pen-to-square"></i> Edit Vehicle</div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("vehicles"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
			<div class="bg-white p-3 rounded-4 shadow-sm">
				<form class="mb-0" role="form" id="editCab">
					<div class="row">
						<div class="col-md-4 my-2">
							<div class="form-group">
								<label class="control-label">Vehicle Name*</label>
								<input required type="text" placeholder="vehicle name with seater" name="car_name" class="form-control" value="<?php echo $category->car_name; ?>"/> 
							</div>
						</div>
						
						<div class="col-md-4 my-2">
							<div class="form-group">
								<label class="control-label">Max Person*</label>
								<select name="max_person" class="form-control form-select" required >
									<option value="">Select Max Person</option>
									<?php $max = $category->max_person; ?>
									<?php for($i = 2 ; $i<= 40; $i++ ){
										$select = $max == $i ? "selected" : "";
										echo "<option {$select} value={$i}>{$i}</option>";
									} ?>
								</select>
							</div>
						</div>

						<div class="col-md-4 my-2">
							<div class="form-group">
								<label class="control-label">Vehicle Rate*</label>
								<input required type="number" placeholder="vehicle rate" name="car_rate" class="form-control price_input" value="<?php echo $category->car_rate; ?>"/> 
							</div>
						</div>
						
						<div class="col-md-12 my-2">
							<input type="hidden" name="id" value="<?php echo $category->id;?>"/>
							<button type="submit" class="btn green uppercase edit_cab">Update</button>
						</div>
					</div>
				</form>
			</div>
			<div id="editRoomCatRes"></div>		
			<?php }else{
				echo "Invalid Hotel id";
			}?>
		</div>
		<!-- End page-content -->
	</div>
	<!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->

<script type="text/javascript">

jQuery(document).ready(function($){
		//Prevent Dot from number field
	$(".price_input").on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 46) { 
			e.preventDefault();
			return false;
		}
	});
	var form = $("#editCab");
	var resp = $("#editRoomCatRes"), ajaxReq;
	$("#editCab").validate({
		submitHandler: function(form) {
			var formData = $("#editCab").serializeArray();
			//console.log(formData);
			if (ajaxReq) {
				ajaxReq.abort();
			}
			ajaxReq = $.ajax({
				type: "POST",
				url: "<?php echo base_url('AjaxRequest/editcabs'); ?>" ,
				dataType: 'json',
				data: formData,
				beforeSend: function(){
					resp.html('<div class="alert alert-success"><i class="fa fa-spinner fa-spin"></i> Please wait...</div>');
				},
				success: function(res) {
					if (res.status == true){
						resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
						console.log("done");
						 $("#editCab")[0].reset();
						window.location.href = "<?php echo site_url("vehicles");?>"; 
					}else{
						resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
						console.log("error");
					}
				},
				error: function(e){
						//console.log(e);
					resp.html('<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>');
				}
			});
			return false;
		}
	});	
}); 
</script>
