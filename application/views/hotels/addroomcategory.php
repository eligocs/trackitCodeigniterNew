<div class="page-container customer_content">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
					<i class="fa-solid fa-plus"></i> Add New Room Category
					</div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("hotels/viewroomcategory"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
		
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<form class="mb-0" role="form" id="addRoomCategory">
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="form-group">
								<label class="control-label">Room Category</label>
								<input type="text" placeholder="Room Category" name="room_cat_name" class="form-control" value=""/> 
							</div>
						</div>
						<div class="col-md-12 my-2">
							<button type="submit" class="btn green uppercase add_roomcategory">Add Room Category</button>
						</div>
					</div>
				</form>
				<div id="addresEd" class="sam_res"></div>	
			</div>
			<!-- End portlet-body -->
		</div>	
		<!-- End page-content -->
	</div>
	<!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
jQuery(document).ready(function($){
	var form = $("#addRoomCategory");
	var resp = $("#addresEd");
	form.validate({
		rules: {
			room_cat_name: {required: true},
		},
		submitHandler: function(form) {
			var formData = $("#addRoomCategory").serializeArray();
			//console.log(formData);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('AjaxRequest/addRoomCategory'); ?>" ,
				dataType: 'json',
				data: formData,
				beforeSend: function(){
					resp.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
				},
				success: function(res) {
					if (res.status == true){
						resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
						//console.log("done");
						$("#addRoomCategory")[0].reset();
						window.location.href = "<?php echo site_url("hotels/viewroomcategory");?>"; 
					}else{
						resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
						//console.log("error");
					}
				},
				error: function(e){
				//	console.log(e);
					resp.html('<div class="alert alert-danger"><strong>Error!</strong> Please Try again later! </div>');
				}
			});
			return false;
		}
	});	
}); 
</script>
